use actix_web::{web, HttpRequest, HttpResponse, Responder};
// use serde::{Deserialize, Serialize};

use crate::AppData;

// ------------------ TEST -----------------
// #[derive(Serialize, Deserialize, Debug)]
// struct TestAnime {
//     id: usize,
//     aid: String,
//     title: Vec<String>,
//     en: Vec<String>,
//     jp: Vec<String>,
//     de: Vec<String>,
//     fr: Vec<String>,
//     es: Vec<String>,
// }

// #[derive(Deserialize)]
// pub struct TestAnimeName {
//     name: String,
// }

// pub async fn test_get(state: web::Data<AppData>) -> impl Responder {
//     let anime = state.meilisearch.index("anime");
//     let record = anime
//         .add_documents(
//             &[TestAnime {
//                 id: 1,
//                 aid: String::from("anime:1"),
//                 title: vec![
//                     String::from("Fate/Grand Order: First Order"),
//                     String::from("Fate/Grand Order -First Order-"),
//                 ],
//                 en: vec![String::from("Fate/Grand Order -First Order-")],
//                 jp: vec![String::from("Fate/Grand Order -First Order-")],
//                 de: vec![String::from("Fate/Grand Order -First Order-")],
//                 fr: vec![String::from("Fate/Grand Order -First Order-")],
//                 es: vec![String::from("Fate/Grand Order -First Order-")],
//             }],
//             Some("id"),
//         )
//         .await
//         .unwrap();

//     let res = format!("{:#?}", &record);
//     HttpResponse::Created().body(res)
// }

// pub async fn test_post(
//     params: web::Json<TestAnimeName>,
//     state: web::Data<AppData>,
// ) -> impl Responder {
//     let anime = state
//         .meilisearch
//         .index("anime")
//         .search()
//         .with_query(&params.name)
//         .with_limit(10)
//         .execute::<TestAnime>()
//         .await
//         .unwrap();

//     let res: String = format!("{:?}", &anime.hits);

//     HttpResponse::Ok().body(res)
// }

pub async fn test_get(req: HttpRequest, state: web::Data<AppData>) -> impl Responder {
    let key = format!("{}:{}", req.method(), req.uri());
    let data: String =
        redis::Commands::get(&mut state.redis.get_connection().unwrap(), key).unwrap();
    HttpResponse::Ok().body(data)
}

pub async fn test_post(req: HttpRequest, state: web::Data<AppData>) -> impl Responder {
    let key = format!("{}:{}", req.method().to_string(), req.uri().to_string());
    let data = "Worked";
    let sec = 1000;
    let data: String =
        redis::Commands::set_ex(&mut state.redis.get_connection().unwrap(), key, data, sec)
            .unwrap();
    HttpResponse::Ok().body(data)
}

pub async fn test_patch() -> impl Responder {
    HttpResponse::Ok()
}

pub async fn test_delete() -> impl Responder {
    HttpResponse::Ok()
}
