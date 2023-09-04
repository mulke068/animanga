
use crate::AppData;
// ---------------------- Imports -------------------
use actix_web::{
    web::{self, Query},
    HttpRequest, HttpResponse, Responder,
};
use serde::{Deserialize, Serialize};

use surrealdb::sql::{Datetime, Thing};

use super::search::{MangaNames, MangaSearch};
// ---------------------- Structs -------------------

trait MangaField {
    fn base(&self) -> Manga;
}

#[derive(Debug, Deserialize, Serialize, Clone)]
pub struct Manga {
    names: MangaNames,
    chapters: u16,
    volumes: u16,
    score: u8,
    status: String,
    types: Vec<String>,
    platforms: Vec<String>,
    genres: Vec<String>,
    tags: Vec<String>,
    info_urls: Vec<String>,
    read_urls: Vec<String>,
    image_urls: Vec<String>,
}

impl MangaField for Manga {
    fn base(&self) -> Manga {
        self.clone()
    }
}

#[derive(Debug, Deserialize, Serialize)]
struct MangaCreate {
    #[serde(flatten)]
    base: Manga,
    updated_at: Datetime,
    created_at: Datetime,
}
#[derive(Debug, Deserialize, Serialize)]
struct MangaUpdate {
    #[serde(flatten)]
    base: Manga,
    updated_at: Datetime,
}
#[derive(Debug, Deserialize, Serialize)]
struct MangaRecord {
    id: Thing,
    #[serde(flatten)]
    base: Manga,
    updated_at: Datetime,
    created_at: Datetime,
}

#[derive(Deserialize)]
struct FormData {
    id: String,
}

// ---------------------------- Handlers ------------------------------

pub async fn handler_manga_get(params: HttpRequest, state: web::Data<AppData>) -> impl Responder {
    let param = Query::<FormData>::from_query(&params.query_string())
        .unwrap_or_else(|_| panic!("Failed to query from params"));

    let record: Option<MangaRecord> = match state.surreal.select(("manga", &param.id)).await {
        Ok(data) => data,
        Err(_) => None,
    };

    let res: String = match &record {
        Some(data) => {
            serde_json::to_string(&data).unwrap_or_else(|_| panic!("Failed at Serialize data"))
        }
        None => String::from("No Data Found"),
    };

    match &record {
        Some(_) => HttpResponse::Ok().body(res),
        None => HttpResponse::NotFound().body(res),
    }
}

pub async fn handler_manga_post(
    req: web::Json<Manga>,
    state: web::Data<AppData>,
) -> impl Responder {
    let record: Vec<MangaRecord> = match state
        .surreal
        .create("manga")
        .content(MangaCreate {
            base: req.base(),
            updated_at: Datetime::default(),
            created_at: Datetime::default(),
        })
        .await
    {
        Ok(data) => data,
        Err(_) => Vec::new(),
    };

    let res: String = match &record.len() {
        1 => {
            let data = &record[0];
            let search_index = state.meilisearch.index("manga");
            let names: MangaSearch = MangaSearch {
                mid: data.id.to_string(),
                original: data.base.names.original.clone(),
                en: data.base.names.en.clone(),
                jp: data.base.names.jp.clone(),
            };
            names.create(search_index).await;
            serde_json::to_string(&data).unwrap_or_else(|_| panic!("Failed at Serialize data"))
        }
        _ => String::from("Failed to Create"),
    };

    if !&record.is_empty() {
        HttpResponse::Created().body(res)
    } else {
        HttpResponse::NotAcceptable().body(res)
    }
}

pub async fn handler_manga_patch(
    params: HttpRequest,
    req: web::Json<Manga>,
    state: web::Data<AppData>,
) -> impl Responder {
    let param = Query::<FormData>::from_query(&params.query_string())
        .unwrap_or_else(|_| panic!("Failed to query from params"));

    let record: Option<MangaRecord> = match state
        .surreal
        .update(("manga", &param.id))
        .merge(MangaUpdate {
            base: req.base(),
            updated_at: Datetime::default(),
        })
        .await
    {
        Ok(data) => data,
        Err(_) => None,
    };

    let res: String = match &record {
        Some(data) => {
            let search_index = state.meilisearch.index("manga");
            let names: MangaSearch = MangaSearch {
                mid: data.id.to_string(),
                original: data.base.names.original.clone(),
                en: data.base.names.en.clone(),
                jp: data.base.names.jp.clone(),
            };
            names.create(search_index).await;
            serde_json::to_string(&data).unwrap_or_else(|_| panic!("Failed to Serialize to String"))
        }
        None => String::from("No Data Found | Failed to Create"),
    };

    match &record {
        Some(_) => HttpResponse::Created().body(res),
        None => HttpResponse::NotFound().body(res),
    }
}

pub async fn handler_manga_delete(
    params: HttpRequest,
    state: web::Data<AppData>,
) -> impl Responder {
    let param = Query::<FormData>::from_query(&params.query_string())
        .unwrap_or_else(|_| panic!("Failed to query from params"));

    let record: Option<MangaRecord> = match state.surreal.delete(("manga", &param.id)).await {
        Ok(data) => data,
        Err(_) => None,
    };

    match &record {
        Some(_) => HttpResponse::Ok().body("Data Deleted"),
        None => HttpResponse::NotFound().body("No Data Found"),
    }
}
