// ---------------------- Imports -------------------
use actix_web::{
    web::{self, Query},
    HttpRequest, HttpResponse, Responder,
};
use meilisearch_sdk::{indexes::Index, search::SearchResults, task_info::TaskInfo};
use serde::{Deserialize, Serialize};

use crate::{handlers::splitted_data_at, AppData};

// ---------------------- Structs -------------------

trait MangaNamesField {
    fn base(&self) -> MangaNames;
}

#[derive(Debug, Serialize, Deserialize, Clone)]
pub struct MangaNames {
    pub original: String,
    pub en: String,
    pub jp: String,
}

impl MangaNamesField for MangaNames {
    fn base(&self) -> MangaNames {
        self.clone()
    }
}

#[derive(Debug, Serialize, Deserialize)]
pub struct MangaSearch {
    pub mid: String,
    pub original: String,
    pub en: String,
    pub jp: String,
}

#[derive(Debug, Serialize, Deserialize)]
struct MangaSearchCreate {
    id: usize,
    mid: String,
    #[serde(flatten)]
    base: MangaNames,
}

#[derive(Debug, Deserialize, Serialize)]
struct MangaSearchRecord {
    id: usize,
    mid: String,
    #[serde(flatten)]
    base: MangaNames,
}

impl MangaSearch {
    pub async fn latest_id(&self, index: Index, increase: usize) -> usize {
        match index.get_stats().await {
            Ok(data) => data.number_of_documents + increase,
            Err(_) => 0,
        }
    }

    pub async fn create(&self, index: Index) -> TaskInfo {
        index
            .add_documents(
                &[MangaSearchCreate {
                    id: self.latest_id(index.clone(), 1).await,
                    mid: splitted_data_at(self.mid.clone(), ":"),
                    base: MangaNames {
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
}

#[derive(Deserialize)]
struct SearchForm {
    q: String,
    l: usize,
}

// ---------------------- Handlers -------------------
pub async fn get(params: HttpRequest, state: web::Data<AppData>) -> impl Responder {
    let param = Query::<SearchForm>::from_query(&params.query_string()).unwrap();
    let search_index = state.meilisearch.index("manga");

    let record: Option<SearchResults<MangaSearchRecord>> = search_index
        .search()
        .with_query(&param.q)
        .with_limit(param.l)
        .execute::<MangaSearchRecord>()
        .await
        .ok();

    match &record {
        Some(data) => {
            let res: Vec<&MangaSearchRecord> = data.hits.iter().map(|res| &res.result).collect();
            HttpResponse::Ok().json(res)
        }
        None => HttpResponse::NotFound().into(),
    }
}

pub async fn post(req: web::Json<MangaSearch>, state: web::Data<AppData>) -> impl Responder {
    let search_index = state.meilisearch.index("manga");

    let record: TaskInfo = req.create(search_index).await;
    let res: String = format!("{:#?}", &record);

    HttpResponse::Created().body(res)
}
