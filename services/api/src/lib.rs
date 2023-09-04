#![recursion_limit = "256"]

pub mod constructor;
pub mod handlers;
pub mod middleware;

/// # Where the DB client lives
///
///
/// use crate::AppData;

#[derive(Debug)]
#[allow(dead_code)]
pub struct AppData {
    pub surreal: surrealdb::Surreal<surrealdb::engine::remote::ws::Client>,
    pub redis: redis::Client,
    pub meilisearch: meilisearch_sdk::Client,
}
