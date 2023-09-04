pub mod anime;
pub mod manga;
pub mod status;
pub mod test;
pub mod user;
/// Structs used for general proposes
/// ```
/// use api::handlers::general_structs;

pub mod general_structs {
    use serde::{Deserialize, Serialize};
    use surrealdb::sql::Datetime;
    // ---------------------------- Structs ------------------------------

    /// Status
    /// ```
    /// use api::handlers::general_structs;
    ///
    /// let Status = general_structs::Status {
    ///     name: "Online".to_string(),
    ///     updated_at: "2023-08-06T20:26:42.140145391Z".into(),
    ///     created_at: "2023-08-06T20:26:42.140145391Z".into(),
    /// };
    ///
    /// ```
    #[derive(Debug, Serialize, Deserialize)]
    pub struct Status {
        pub name: String,
        pub updated_at: Datetime,
        pub created_at: Datetime,
    }
    /// Type
    /// ```
    /// use api::handlers::general_structs;
    ///
    /// let Type = general_structs::Type {
    ///     name: "Anime".to_string(),
    ///     updated_at: "2023-08-06T20:26:42.140145391Z".into(),
    ///     created_at: "2023-08-06T20:26:42.140145391Z".into(),
    /// };
    ///
    /// ```
    #[derive(Debug, Serialize, Deserialize)]
    pub struct Type {
        pub name: String,
        pub updated_at: Datetime,
        pub created_at: Datetime,
    }
    /// Platform
    /// ```
    /// use api::handlers::general_structs;
    ///
    /// let Platform = general_structs::Platform {
    ///     name: "AniPlex".to_string(),
    ///     updated_at: "2023-08-06T20:26:42.140145391Z".into(),
    ///     created_at: "2023-08-06T20:26:42.140145391Z".into(),
    /// };
    ///
    /// ```
    #[derive(Debug, Serialize, Deserialize)]
    pub struct Platform {
        pub name: String,
        pub updated_at: Datetime,
        pub created_at: Datetime,
    }
    /// Genre
    /// ```
    /// use api::handlers::general_structs;
    ///
    /// let Genre = general_structs::Genre {
    ///     name: "Romance".to_string(),
    ///     updated_at: "2023-08-06T20:26:42.140145391Z".into(),
    ///     created_at: "2023-08-06T20:26:42.140145391Z".into(),
    /// };
    ///
    /// ```
    #[derive(Debug, Serialize, Deserialize)]
    pub struct Genre {
        pub name: String,
        pub updated_at: Datetime,
        pub created_at: Datetime,
    }
    /// Tag
    /// ```
    /// use api::handlers::general_structs;
    ///
    /// let Tag = general_structs::Tag {
    ///     name: "Adopted".to_string(),
    ///     updated_at: "2023-08-06T20:26:42.140145391Z".into(),
    ///     created_at: "2023-08-06T20:26:42.140145391Z".into(),
    /// };
    ///
    /// ```
    #[derive(Debug, Serialize, Deserialize)]
    pub struct Tag {
        pub name: String,
        pub updated_at: Datetime,
        pub created_at: Datetime,
    }
}

/// ## Split String at char
/// return splitted String as String
/// ```
///  use api::handlers::splitted_data_at;
///
///  let data = "anime:1234".to_string();
///  let data_new = splitted_data_at(data, ":");
///  debug_assert_eq!(data_new, "1234");
/// ```
pub fn splitted_data_at(data: String, split_chars: &str) -> String {
    let data_len = data.find(split_chars).unwrap();
    let (_, data_new) = data.split_at(data_len + 1);
    return data_new.to_string();
}
