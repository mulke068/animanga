use reqwest::*;

async fn handler_request_get(req: String) -> String {
    let client = reqwest::Client::new();

    let url = format!("https://api.jikan.moe/v4/{}", req);

    let body = client.get(url).send().await.unwrap();

    let res = format!("{:?}", body.text().await.unwrap());

    return res;
}
