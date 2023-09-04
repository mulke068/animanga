use actix_web::{
    web::{self, Query},
    HttpRequest, HttpResponse, Responder,
};

use meilisearch_sdk::{indexes::Index, search::SearchResults, task_info::TaskInfo};
use serde::{Deserialize, Serialize};

use crate::handlers::splitted_data_at;
use crate::AppData;

// use super::main::AnimeSearch;

// #[derive(Debug, Deserialize, Serialize)]
// enum SearchForm {
//     SearchFormDefault { q: String },
//     SearchFormLimit { q: String, l: usize },
// }

// #[derive(Debug, Deserialize, Serialize)]
// struct SearchFormDefault {
//     q: String,
// }

#[derive(Debug, Deserialize, Serialize)]
struct SearchForm {
    q: String,
    l: usize,
}

trait AnimeNamesFields {
    fn base(&self) -> AnimeNames;
}

#[derive(Debug, Deserialize, Serialize, Clone)]
pub struct AnimeNames {
    pub original: String,
    pub en: String,
    pub jp: String,
}

impl AnimeNamesFields for AnimeNames {
    fn base(&self) -> AnimeNames {
        self.clone()
    }
}

#[derive(Debug, Deserialize, Serialize)]
struct AnimeNamesCreate {
    id: usize,
    aid: String,
    #[serde(flatten)]
    base: AnimeNames,
}

#[derive(Debug, Deserialize, Serialize)]
pub struct AnimeSearch {
    pub aid: String,
    pub original: String,
    pub en: String,
    pub jp: String,
}

#[derive(Debug, Deserialize, Serialize)]
struct AnimeSearchRecord {
    id: usize,
    aid: String,
    #[serde(flatten)]
    base: AnimeNames,
}

#[allow(dead_code)]
impl AnimeSearch {
    pub async fn latest_id(&self, index: Index, increase: usize) -> usize {
        match index.get_stats().await {
            Ok(stats) => stats.number_of_documents + increase,
            Err(_) => 0,
        }
    }

    #[allow(unused_assignments)]
    pub async fn create(&self, index: Index) -> TaskInfo {
        index
            .add_documents(
                &[AnimeNamesCreate {
                    id: self.latest_id(index.clone(), 1).await,
                    aid: splitted_data_at(self.aid.clone(), ":"),
                    base: AnimeNames {
                        original: self.original.clone(),
                        en: self.en.clone(),
                        jp: self.jp.clone(),
                    },
                }],
                Some("id"),
            )
            .await
            .unwrap()
    }

    pub async fn update(&self, mut index: Index) -> TaskInfo {
        index.primary_key = Some(self.aid.to_string());
        index.update().await.unwrap()
    }

    pub async fn delete(&self, id: usize, index: Index) -> TaskInfo {
        index.delete_document(&id).await.unwrap()
    }
}

pub async fn get(params: HttpRequest, state: web::Data<AppData>) -> impl Responder {
    let param = Query::<SearchForm>::from_query(&params.query_string()).unwrap();
    let search_index = state.meilisearch.index("anime");
    let limit = param.l;

    let record: Option<SearchResults<AnimeSearchRecord>> = search_index
        .search()
        .with_query(&param.q)
        .with_limit(limit)
        .execute::<AnimeSearchRecord>()
        .await
        .ok();

    match &record {
        Some(data) => {
            let res: Vec<&AnimeSearchRecord> = data.hits.iter().map(|res| &res.result).collect();
            // let res = format!("{:?}", &data.hits);
            HttpResponse::Ok().json(res)
        }
        None => HttpResponse::NotFound().body("body"),
    }
}

pub async fn post(req: web::Json<AnimeSearch>, state: web::Data<AppData>) -> impl Responder {
    let search_index = state.meilisearch.index("anime");

    let record: TaskInfo = req.create(search_index).await;
    let res: String = format!("{:#?}", &record);

    HttpResponse::Created().body(res)
}
