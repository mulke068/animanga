use crate::AppData;
// ---------------------------- Imports ------------------------------
use actix_web::{
    web::{self, Query},
    HttpRequest, HttpResponse, Responder,
};
use serde::{Deserialize, Serialize};
use surrealdb::sql::Datetime;
use surrealdb::sql::Thing;
// ---------------------------- Structs ------------------------------

#[derive(Debug, Serialize, Deserialize, Clone)]
struct UserPermission {
    grade: u8,
    read: bool,
    write: bool,
    update: bool,
    delete: bool,
}

#[derive(Debug, Serialize, Deserialize, Clone)]
struct UserName {
    first: String,
    last: String,
}

trait UsersField {
    fn base(&self) -> Users;
}

#[derive(Debug, Serialize, Deserialize, Clone)]
pub struct Users {
    username: String,
    name: UserName,
    email: String,
    password: String,
    status: bool,
    role: String,
    permission: UserPermission,
}

impl UsersField for Users {
    fn base(&self) -> Users {
        self.clone()
    }
}

#[derive(Debug, Serialize, Deserialize)]
struct UsersCreate {
    #[serde(flatten)]
    base: Users,
    updated_at: Datetime,
    created_at: Datetime,
}

#[derive(Debug, Serialize, Deserialize)]
struct UsersUpdate {
    #[serde(flatten)]
    base: Users,
    updated_at: Datetime,
}

#[derive(Debug, Deserialize, Serialize)]
#[allow(dead_code)]
struct UsersRecord {
    id: Thing,
    #[serde(flatten)]
    base: Users,
    updated_at: Datetime,
    created_at: Datetime,
}

#[derive(Deserialize)]
struct FormData {
    uid: String,
}

// ---------------------------- Handlers ------------------------------
pub async fn handler_user_get(params: HttpRequest, state: web::Data<AppData>) -> impl Responder {
    let param = Query::<FormData>::from_query(&params.query_string())
        .unwrap_or_else(|_| panic!("Failed to query params"));

    let record: Option<UsersRecord> = match state.surreal.select(("user", &param.uid)).await {
        Ok(data) => data,
        Err(_) => None,
    };

    let res: String = match &record {
        Some(data) => {
            serde_json::to_string(&data).unwrap_or_else(|_| panic!("Failed to prase to string"))
        }
        None => String::from("No Data Found"),
    };

    match &record {
        Some(_) => HttpResponse::Ok().body(res),
        None => HttpResponse::NotFound().body(res),
    }
}

pub async fn handler_user_post(req: web::Json<Users>, state: web::Data<AppData>) -> impl Responder {
    let record: Vec<UsersRecord> = match state
        .surreal
        .create("user")
        .content(UsersCreate {
            base: req.base(),
            updated_at: Datetime::default(),
            created_at: Datetime::default(),
        })
        .await
    {
        Ok(record) => record,
        Err(_) => Vec::new(),
    };

    let res: String = match &record.len() {
        1 => {
            let data = &record[0];
            serde_json::to_string(&data).unwrap_or_else(|_| panic!("Failed to prase to string"))
        }
        _ => String::from("No Data Found"),
    };

    if !&record.is_empty() {
        HttpResponse::Created().body(res)
    } else {
        HttpResponse::NotAcceptable().body(res)
    }
}

pub async fn handler_user_patch(
    req: web::Json<Users>,
    params: HttpRequest,
    state: web::Data<AppData>,
) -> impl Responder {
    let param = Query::<FormData>::from_query(&params.query_string())
        .unwrap_or_else(|_| panic!("Failed to query params"));

    let record: Option<UsersRecord> = match state
        .surreal
        .update(("user", &param.uid))
        .merge(UsersUpdate {
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
            serde_json::to_string(&data).unwrap_or_else(|_| panic!("Failed to prase to string"))
        }
        None => String::from("No Data Found"),
    };

    match &record {
        Some(_) => HttpResponse::Created().body(res),
        None => HttpResponse::NotFound().body(res),
    }
}

pub async fn handler_user_delete(params: HttpRequest, state: web::Data<AppData>) -> impl Responder {
    let param = Query::<FormData>::from_query(&params.query_string())
        .unwrap_or_else(|_| panic!("Failed to query params"));

    let record: Option<UsersRecord> = match state.surreal.delete(("user", &param.uid)).await {
        Ok(data) => data,
        Err(_) => None,
    };

    match &record {
        Some(_) => HttpResponse::Ok().body("Data Deleted"),
        None => HttpResponse::NotFound().body("No Data Found"),
    }
}
