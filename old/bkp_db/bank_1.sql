/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `anime_bank` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `anime_bank`;

CREATE TABLE IF NOT EXISTS `anime` (
  `user_id` int DEFAULT NULL,
  `anime_id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `name2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status_id` int DEFAULT NULL,
  `season` int DEFAULT NULL,
  `episodes` int DEFAULT NULL,
  `watched` int DEFAULT NULL,
  `date` date DEFAULT NULL,
  `score` int DEFAULT NULL,
  `platform` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '{}',
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'https://fl-1.cdn.flockler.com/embed/no-image.svg ',
  PRIMARY KEY (`anime_id`) USING BTREE,
  KEY `user_id` (`user_id`),
  KEY `status_id` (`status_id`),
  CONSTRAINT `FK__users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `FK_anime_status` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `anime` (`user_id`, `anime_id`, `name`, `name2`, `status_id`, `season`, `episodes`, `watched`, `date`, `score`, `platform`, `link`, `img`) VALUES
	(1, 1, 'King\'s Raid: Successors of the Will', 'King\'s Raid: Ishi wo Tsugumono-tachi', 1, 1, 26, 26, '2022-09-29', 2, '{Funimation}', 'https://bs.to/serie/Kings-Raid-Ishi-wo-Tsugumono-tachi', 'https://cdn.myanimelist.net/images/anime/1885/109122.jpg'),
	(1, 2, 'Violet Evergarden', 'ヴァイオレット・エヴァーガーデン', 0, 1, 13, 13, '2022-09-30', 4, '{Netflix}', 'https://bs.to/serie/Violet-Evergarden', 'https://cdn.myanimelist.net/images/anime/1795/95088.jpg'),
	(1, 3, 'Violet Evergarden the Movie', '劇場版 ヴァイオレット・エヴァーガーデン', 3, 4, 1, 1, '2022-09-30', 4, '{Netflix}', 'https://bs.to/serie/Violet-Evergarden', 'https://cdn.myanimelist.net/images/anime/1825/110716.jpg'),
	(1, 4, 'Violet Evergarden und das Band der Freundschaft', 'Violet Evergarden Gaiden: Eien to Jidou Shuki Ningyou', 3, 3, 1, 1, '2022-10-02', 4, '{Netflix}', 'https://bs.to/serie/Violet-Evergarden', 'https://cdn.myanimelist.net/images/anime/1667/112943.jpg'),
	(1, 5, 'Violet Evergarden: The Day You Understand "I Love You" Will Surely Come', 'Violet Evergarden: Kitto "Ai" wo Shiru Hi ga Kuru no Darou', 3, 2, 1, 1, '2022-10-01', 4, '{Netflix}', 'https://bs.to/serie/Violet-Evergarden', 'https://cdn.myanimelist.net/images/anime/9/89993.jpg'),
	(1, 6, 'Charlotte', 'シャーロット', 1, 1, 14, 14, '2022-10-02', 4, '{Crunchyroll;Funimation;Netflix}', 'https://bs.to/serie/Charlotte', 'https://cdn.myanimelist.net/images/anime/12/74683.jpg'),
	(1, 7, 'Chihiros Reise ins Zauberland', 'Sen to Chihiro no Kamikakushi', 3, 1, 1, 1, '2022-10-02', 2, '{Netflix}', '', 'https://cdn.myanimelist.net/images/anime/6/79597.jpg'),
	(1, 8, 'Blade Runner: Black Lotus', 'ブレードランナー：ブラック・ロータス', 1, 1, 13, 13, '2022-10-02', 4, '{Crunchyroll}', 'https://bs.to/serie/Blade-Runner-Black-Lotus', 'https://cdn.myanimelist.net/images/anime/1657/120783.jpg'),
	(1, 9, 'One Punch Man', 'ワンパンマン', 1, 1, 12, 12, '2022-10-02', 3, '{Crunchyroll;Funimation;Netflix}', 'https://bs.to/serie/One-Punch-Man', 'https://cdn.myanimelist.net/images/anime/12/76049.jpg'),
	(1, 10, 'One Punch Man Staffel 2', 'ワンパンマン', 1, 2, 12, 12, '2022-10-02', 3, '{Crunchyroll}', 'https://bs.to/serie/One-Punch-Man', 'https://cdn.myanimelist.net/images/anime/1247/122044.jpg'),
	(1, 11, '86 Eighty-Six', '86―エイティシックス―', 1, 1, 11, 11, '2022-10-03', 4, '{Crunchyroll;Bahamut_Anime_Crazy;Bilibili;iQIYI}', 'https://bs.to/serie/86-Eighty-Six', 'https://cdn.myanimelist.net/images/anime/1987/117507.jpg'),
	(1, 12, '86 Eighty-Six Part 2', '86―エイティシックス―', 0, 2, 12, 12, '2022-10-05', 5, '{Crunchyroll}', 'https://bs.to/serie/86-Eighty-Six', 'https://cdn.myanimelist.net/images/anime/1321/117508.jpg'),
	(1, 13, 'Darling in the FranXX', '', 1, 1, 24, 24, '2022-10-06', 4, '{Crunchyroll;Funimation;Netflix;Bilibili Global}', 'https://bs.to/serie/Darling-in-the-FranXX', 'https://cdn.myanimelist.net/images/anime/1614/90408.jpg'),
	(1, 14, 'Rascal Dpes Not Dream Of Bunny Girl Senpai', 'Seishun Buta Yarou wa Bunny Girl Senpai no Yume wo Minai', 1, 1, 13, 13, '2022-10-06', 4, '{Crunchyroll;Funimation;Netflix;Shahid}', 'https://bs.to/serie/Rascal-Does-Not-Dream-of-Bunny-Girl-Senpai', 'https://cdn.myanimelist.net/images/anime/1301/93586.jpg'),
	(1, 15, 'Rascal Does Not Dream of a Dreaming Girl', 'Seishun Buta Yarou wa Yumemiru Shoujo no Yume wo Minai', 3, 2, 1, 1, '2022-10-06', 4, '{Netflix;Shahid}', 'https://bs.to/serie/Rascal-Does-Not-Dream-of-Bunny-Girl-Senpai', 'https://cdn.myanimelist.net/images/anime/1613/102179.jpg'),
	(1, 16, 'Love, Chunibyo & Other Delusions!', 'Chuunibyou demo Koi ga Shitai!', 1, 1, 13, 13, '2022-10-06', 3, '{Crunchyroll;Funimation;HIDIVE;Netflix}', 'https://bs.to/serie/Love-Chunibyo-Other-Delusions', 'https://cdn.myanimelist.net/images/anime/12/46931.jpg'),
	(1, 17, 'Love, Chunibyo & Other Delusions! Heart Throb', 'Chuunibyou demo Koi ga Shitai! Ren', 1, 2, 13, 13, '2022-10-06', 3, '{HIDIVE}', 'https://bs.to/serie/Love-Chunibyo-Other-Delusions', 'https://cdn.myanimelist.net/images/anime/7/56643.jpg'),
	(1, 18, 'Love, Chunibyo & Other Delusions! Take On Me', 'Chuunibyou demo Koi ga Shitai! Movie: Take On Me', 3, 3, 1, 1, '2022-10-06', 3, '{HIDIVE;Netflix}', 'https://bs.to/serie/Love-Chunibyo-Other-Delusions', 'https://cdn.myanimelist.net/images/anime/2/89974.jpg'),
	(1, 19, 'Hyouka', '', 1, 1, 22, 3, '2022-10-06', 1, '{Crunchyroll;Funimation}', 'https://bs.to/serie/Hyouka', 'https://cdn.myanimelist.net/images/anime/13/50521.jpg');

CREATE TABLE IF NOT EXISTS `anime_tab` (
  `anime_id` int NOT NULL AUTO_INCREMENT,
  `name_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `name_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `name_3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `aired` varchar(255) DEFAULT NULL,
  `platform` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '{}',
  `link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`anime_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `anime_tab` (`anime_id`, `name_1`, `name_2`, `name_3`, `aired`, `platform`, `link`) VALUES
	(1, 'Love, Chunibyo & Other Delusions!', 'Chuunibyou demo Koi ga Shitai!', '', 'Oct 4, 2012 to Dec 20, 2012', '{\r\nCrunchyroll\r\n,Netflix\r\n,Funimation\r\n,HIDIVE\r\n}', 'https://bs.to/serie/Love-Chunibyo-Other-Delusions'),
	(2, 'Love, Chunibyo & Other Delusions!: Take On Me', 'Chuunibyou demo Koi ga Shitai! Movie: Take On Me', 'Take On Me', 'Jan 6, 2018', '{\r\nCrunchyroll\r\n,Netflix\r\n,Funimation\r\n,HIDIVE\r\n}', 'https://bs.to/serie/Love-Chunibyo-Other-Delusions'),
	(3, 'Seraph of the End: Vampire Reign', 'Owari no Seraph', '', 'Apr 4, 2015 to Jun 20, 2015', '{\r\nNetflix\r\n,HIDIVE\r\n}', 'https://bs.to/serie/Owari-no-Seraph-Seraph-of-the-End'),
	(4, 'Seraph of the End: Battle in Nagoya', 'Owari no Seraph: Nagoya Kessen-hen', '', 'Oct 10, 2015 to Dec 26, 2015', '{}', 'https://bs.to/serie/Owari-no-Seraph-Seraph-of-the-End'),
	(5, 'My Stepmom\'s Daughter Is My Ex', 'Mamahaha no Tsurego ga Motokano datta', '', 'Jul 6, 2022 to Sep 21, 2022', '{\r\nCrunchyroll\r\n,Ani-One Asia\r\n,Animax Mongolia\r\n,Aniplus TV\r\n,Bahamut Anime Crazy\r\n,Bilibili Global\r\n,CatchPlay\r\n,MeWatch\r\n,TrueID\r\n,iQIYI\r\n}', 'https://bs.to/serie/Mamahaha-no-Tsurego-My-Stepmom-s-Daughter-Is-My-Ex'),
	(6, 'Cautious Hero: The Hero Is Overpowered but Overly Cautious', 'Shinchou Yuusha: Kono Yuusha ga Ore Tueee Kuse ni Shinchou Sugiru', NULL, 'Oct 2, 2019 to Dec 27, 2019', '{\r\nCrunchyroll\r\n,Funimation\r\n,Netflix\r\n}', 'https://bs.to/serie/Shinchou-Yuusha-Cautious-Hero'),
	(7, 'The Greatest Demon Lord Is Reborn as a Typical Nobody', 'Shijou Saikyou no Daimaou, Murabito A ni Tensei suru', NULL, 'Apr 6, 2022 to Jun 22, 2022', '{\r\nAnimax Korea\r\n,Bahamut Anime Crazy\r\n,Bilibili Global\r\n,CatchPlay\r\n,Genflix\r\n,Laftel\r\n,MeWatch\r\n,Muse Asia\r\n,Sushiroll\r\n,Upstream\r\n,iQIYI\r\n}', 'https://bs.to/serie/Shijou-Saikyou-no-Daimaou-The-Greatest-Demon-Lord'),
	(8, 'Euphoria', NULL, NULL, 'Dec 11, 2011 to Feb 26, 2016', '{}', 'https://haho.moe/anime/mvst2uef'),
	(9, 'Neon Genesis Evangelion', NULL, NULL, 'Oct 4, 1995 to Mar 27, 1996', '{Netflix}', 'https://bs.to/serie/Neon-Genesis-Evangelion'),
	(10, 'Neon Genesis Evangelion: Death & Rebirth', NULL, NULL, 'Mar 15, 1997', '{Netflix}', 'https://bs.to/serie/Neon-Genesis-Evangelion'),
	(11, 'Neon Genesis Evangelion: The End of Evangelion', NULL, NULL, 'Jul 19, 1997', '{Netflix}', 'https://bs.to/serie/Neon-Genesis-Evangelion'),
	(12, 'Evangelion: 1.0 You Are (Not) Alone', 'Evangelion Shin-Gekijōban: Jo', NULL, 'Sep 1, 2007', '{amazon prime video}', 'https://bs.to/serie/Neon-Genesis-Evangelion'),
	(13, 'Evangelion: 2.0 You Can (Not) Advance', 'Evangelion Shin-Gekijōban: Ha', NULL, 'Jul 27, 2009', '{amazon prime video}', 'https://bs.to/serie/Neon-Genesis-Evangelion'),
	(14, 'Evangelion: 3.0 You Can (Not) Redo', 'Evangelion Shin-Gekijōban: Kyū', NULL, 'Nov 17, 2012', '{amazon prime video}', 'https://bs.to/serie/Neon-Genesis-Evangelion'),
	(15, 'Evangelion: 3.0+1.0 Thrice Upon a Time', 'Evangelion Shin-Gekijōban', NULL, 'Mar 8, 2021', '{amazon prime video}', 'https://bs.to/serie/Neon-Genesis-Evangelion'),
	(16, 'Attack on Titan', 'Shingeki no Kyojin', 'AoT', 'Apr 7, 2013  to Jul 1, 2019', '{\r\nCrunchyroll\r\n,Funimation\r\n,Netflix\r\n,Shahid\r\n}', 'https://bs.to/serie/Shingeki-no-Kyojin-Attack-on-Titan-AoT'),
	(17, 'Attack on Titan: The Final Season', 'Shingeki no Kyojin: The Final Season', 'AoT', 'Dec 7, 2020 to Mar 29, 2021', '{\r\nCrunchyroll\r\n,Netflix\r\n}', 'https://bs.to/serie/Shingeki-no-Kyojin-Attack-on-Titan-AoT'),
	(18, 'King\'s Raid: Successors of the Will', 'King\'s Raid: Ishi wo Tsugumono-tachi', NULL, 'Oct 3, 2020 to Mar 27, 2021', '{Funimation}', 'https://bs.to/serie/Kings-Raid-Ishi-wo-Tsugumono-tachi'),
	(19, 'Red eyes kick!', 'Akame ga Kill!', NULL, 'Jul 7, 2014 to Dec 15, 2014', '{\r\nCrunchyroll\r\n,HIDIVE\r\n}', 'https://bs.to/serie/Akame-ga-Kill'),
	(20, 'I’m Quitting Heroing', 'Yuusha, Yamemasu', NULL, 'Apr 5, 2022 to Jun 21, 2022', '{\r\nHIDIVE\r\n,Ani-One Asia\r\n,Animax Mongolia\r\n,Anime Digital Network\r\n,Aniplus TV\r\n,Aniverse\r\n,Bahamut Anime Crazy\r\n,Bilibili Global\r\n,CatchPlay\r\n,Laftel\r\n,MeWatch\r\n,Sushiroll\r\n,TrueID\r\n,Viu\r\n,iQIYI\r\n}', 'https://bs.to/serie/Yuusha-Yamemasu-I-m-Quitting-Heroing'),
	(21, 'Hyouka', NULL, NULL, 'Apr 23, 2012 to Sep 17, 2012', '{\r\nCrunchyroll\r\n,Funimation\r\n}', 'https://bs.to/serie/Hyouka'),
	(22, 'Classroom of the Elite', 'Youkoso Jitsuryoku Shijou Shugi no Kyoushitsu e', NULL, 'Jul 12, 2017 to Sep 27, 2017', '{\r\nCrunchyroll\r\n,Funimation\r\n,Netflix\r\n}', 'https://bs.to/serie/Youkoso-Jitsuryoku-Shijou-Shugi-Classroom-of-the-Elite'),
	(23, 'Classroom of the Elite II', 'Youkoso Jitsuryoku Shijou Shugi no Kyoushitsu e 2nd Season', NULL, 'Jul 4, 2022 to Sep 26, 2022', '{\r\nCrunchyroll\r\n,Disney+\r\n,Aniplus TV\r\n,Bahamut Anime Crazy\r\n,Bilibili Global\r\n,CatchPlay\r\n,MeWatch\r\n,Muse Asia\r\n,Pops\r\n,Sushiroll\r\n,Upstream\r\n,iQIYI\r\n}', 'https://bs.to/serie/Youkoso-Jitsuryoku-Shijou-Shugi-Classroom-of-the-Elite');

CREATE TABLE IF NOT EXISTS `seasons` (
  `anime_id` int DEFAULT NULL,
  `season` int DEFAULT '0',
  `episodes` int DEFAULT '0',
  `watched` int DEFAULT '0',
  `date` date DEFAULT NULL,
  `status_id` int DEFAULT NULL,
  `score` int DEFAULT '0',
  KEY `seasons_status` (`status_id`),
  KEY `seasons_anime` (`anime_id`) USING BTREE,
  CONSTRAINT `seasons_anime` FOREIGN KEY (`anime_id`) REFERENCES `anime_tab` (`anime_id`) ON DELETE SET NULL,
  CONSTRAINT `seasons_status` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `seasons` (`anime_id`, `season`, `episodes`, `watched`, `date`, `status_id`, `score`) VALUES
	(1, 1, 13, 13, '2022-09-09', 1, 2),
	(1, 2, 13, 13, '2022-09-10', 1, 2),
	(2, 3, 1, 1, '2022-09-10', 3, 2),
	(3, 1, 12, 12, '2022-09-11', 1, 3),
	(4, 2, 12, 12, '2022-09-11', 1, 3),
	(5, 1, 12, 10, '2022-09-12', 0, 2),
	(6, 1, 12, 12, '2022-09-12', 0, 2),
	(7, 1, 12, 12, '2022-09-13', 0, 3),
	(8, 1, 6, 0, '2022-09-13', 1, 0),
	(9, 1, 26, 26, '2022-09-14', 1, 2),
	(10, 2, 1, 1, '2022-09-14', 3, 2),
	(11, 3, 1, 1, '2022-09-14', 3, 2),
	(12, 4, 1, 1, '2022-09-14', 3, 2),
	(13, 5, 1, 1, '2022-09-14', 3, 3),
	(14, 6, 1, 1, '2022-09-14', 3, 3),
	(15, 7, 1, 1, '2022-09-14', 3, 3),
	(16, 1, 25, 25, '2022-09-15', 1, 3),
	(16, 2, 12, 12, '2022-09-15', 1, 3),
	(16, 3, 22, 22, '2022-09-16', 1, 3),
	(17, 4, 28, 28, '2022-09-17', 1, 2),
	(18, 1, 26, 1, '2022-09-19', 1, 1),
	(19, 1, 24, 2, '2022-09-19', 1, 1),
	(20, 1, 12, 12, '2022-09-19', 1, 3),
	(21, 1, 22, 1, '2022-09-19', 1, 1),
	(22, 1, 12, 122, '2022-09-20', 1, 3),
	(23, 2, 12, 12, '2022-09-20', 1, 2);

CREATE TABLE IF NOT EXISTS `status` (
  `status_id` int NOT NULL DEFAULT '0',
  `status_name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  KEY `status_id` (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `status` (`status_id`, `status_name`) VALUES
	(0, 'Ongoing'),
	(1, 'Finished'),
	(2, 'Dropped'),
	(3, 'Movie');

CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `pass` int DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `users` (`id`, `user`, `pass`) VALUES
	(1, 'kevin', 4556),
	(2, 'tim', 8754);

CREATE DATABASE IF NOT EXISTS `manga_bank` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `manga_bank`;

CREATE TABLE IF NOT EXISTS `manga` (
  `user_id` int DEFAULT NULL,
  `manga_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `name2` varchar(255) DEFAULT NULL,
  `status_id` int DEFAULT NULL,
  `chapters` int DEFAULT '0',
  `watched` int DEFAULT '0',
  `date` date DEFAULT NULL,
  `score` int DEFAULT '0',
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'https://fl-1.cdn.flockler.com/embed/no-image.svg',
  PRIMARY KEY (`manga_id`) USING BTREE,
  KEY `user_id` (`user_id`),
  KEY `status_id` (`status_id`),
  CONSTRAINT `FK_manga_status` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`) ON DELETE SET NULL,
  CONSTRAINT `FK_manga_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

INSERT INTO `manga` (`user_id`, `manga_id`, `name`, `name2`, `status_id`, `chapters`, `watched`, `date`, `score`, `link`, `img`) VALUES
	(1, 1, 'The Eminence In Shadow', 'Kage no Jitsuryokusha ni Naritakute', 0, 44, 0, '2022-10-05', 5, 'https://readmanganato.com/manga-de980539', 'https://avt.mkklcdnv6temp.com/32/m/17-1583496423.jpg'),
	(1, 2, 'Tomb Raider King', '도굴왕', 0, 354, 50, '2022-10-05', 0, 'https://readmanganato.com/manga-eu982203', 'https://avt.mkklcdnv6temp.com/42/y/18-1583498764.jpg'),
	(1, 3, 'Pure Villain', 'O amor puro de um vilão', 0, 17, 17, '2022-10-05', 5, 'https://readmanganato.com/manga-oa992083', 'https://avt.mkklcdnv6temp.com/43/e/26-1661564380.jpg'),
	(1, 4, 'Overgeared', 'テムパル〜アイテムの力〜', 0, 146, 146, '2022-10-03', 5, 'https://readmanganato.com/manga-hi985065', 'https://avt.mkklcdnv6temp.com/50/b/20-1585716010.jpg'),
	(1, 5, 'Olgami', '', 0, 133, 131, '2022-10-05', 5, 'https://manganato.com/manga-ls988427', 'https://avt.mkklcdnv6temp.com/38/i/23-1615048680.jpg'),
	(1, 6, 'Match Made In Heaven By Chance', '	 Maybe Meant to Be', 0, 39, 0, '2022-10-05', 0, 'https://readmanganato.com/manga-nl991146', 'https://avt.mkklcdnv6temp.com/3/c/26-1654856033.jpg'),
	(1, 7, 'Iron Ladies', '	 Iron Ladies Steel Soldiers', 0, 445, 0, '2022-10-05', 0, 'https://readmanganato.com/manga-dp980372', 'https://avt.mkklcdnv6temp.com/26/e/17-1583496195.jpg'),
	(1, 8, 'Survival Story Of A Sword King In A Fantasy World', 'The Survival Record of the Sword King in Another World', 0, 146, 146, '2022-10-05', 5, 'https://readmanganato.com/manga-gt984176', 'https://avt.mkklcdnv6temp.com/16/h/20-1583501658.jpg'),
	(1, 9, 'Swordmaster’S Youngest Son', 'Youngest Son of the Renowned Swordsmanship Clan', 0, 40, 36, '2022-10-05', 4, 'https://readmanganato.com/manga-nk990919', 'https://avt.mkklcdnv6temp.com/44/e/25-1653917603.jpg'),
	(1, 10, 'Goblin Slayer', '	 ゴブリンスレイヤー', 0, 92, 72, '2022-10-05', 4, 'https://readmanganato.com/manga-us971827', 'https://avt.mkklcdnv6temp.com/2/r/14-1583489781.jpg'),
	(1, 11, 'How To Kill A God', '신을 죽이는 방법', 0, 78, 9, '2022-10-05', 2, 'https://manganato.com/manga-da980935', 'https://avt.mkklcdnv6temp.com/46/v/17-1583496953.jpg'),
	(1, 12, 'Slave Of Black Knight', 'Black na Kishidan no Dorei ga White na Boukensha Guild ni Hikinukarete S-Rank ni Narimashita', 0, 13, 13, '2022-10-05', 4, 'https://readmanganato.com/manga-kj987592', 'https://avt.mkklcdnv6temp.com/4/d/23-1610251893.jpg'),
	(1, 13, 'The World After The Fall', 'The World After The End ', 0, 42, 37, '2022-10-05', 5, 'https://readmanganato.com/manga-nb990510', 'https://flamescans.org/wp-content/uploads/2022/02/TWATFCOVERNEW.webp'),
	(1, 14, 'My Girlfriend Cheated On Me With A Senior, So I’M Cheating On Her With His Girlfriend', 'Kanojo ga Senpai ni NTR-reta node', 0, 6, 6, '2022-10-05', 4, 'https://manganato.com/manga-ng990663', 'https://avt.mkklcdnv6temp.com/33/w/25-1648354419.jpg'),
	(1, 15, 'My Divorced Crybaby Neighbour', 'Batsuichide Nakimushina Otonarisan', 0, 45, 0, '2022-10-05', 0, 'https://manganato.com/manga-mf989962', 'https://avt.mkklcdnv6temp.com/4/a/25-1636371801.jpg'),
	(1, 16, 'My Daughter Is The Final Boss', '내 딸은 최종 보스', 0, 45, 40, '2022-10-05', 5, 'https://readmanganato.com/manga-nm990947', 'https://avt.mkklcdnv6temp.com/45/g/25-1654293245.jpg'),
	(1, 17, 'Omniscient Reader’s Viewpoint', 'Jeonjijeok Dokja Sijeom', 0, 126, 122, '2022-10-05', 5, 'https://flamescans.org/series/1662523321-omniscient-readers-viewpoint/', 'https://flamescans.org/wp-content/uploads/2021/01/ORV-NEW-COVER2.webp'),
	(1, 18, 'Dreamland Adventure', '', 0, 176, 167, '2022-10-05', 4, 'https://readmanganato.com/manga-lr988974', 'https://avt.mkklcdnv6temp.com/10/v/24-1620016001.jpg'),
	(1, 19, 'The Return Of The Disaster-Class Hero', 'Resurrection of the Catastrophic Hero', 0, 48, 48, '2022-10-05', 5, 'https://readmanganato.com/manga-md990338', 'https://avt.mkklcdnv6temp.com/20/i/25-1640663894.jpg'),
	(1, 20, 'The Lone Necromancer', '나 혼자 네크로맨서', 0, 61, 55, '2022-10-05', 4, 'https://readmanganato.com/manga-mu989829', 'https://avt.mkklcdnv6temp.com/48/k/24-1634298190.jpg'),
	(1, 21, 'The Max Level Hero Has Returned!', '', 0, 103, 97, '2022-10-05', 4, 'https://readmanganato.com/manga-je987087', 'https://avt.mkklcdnv6temp.com/33/f/22-1603951570.jpg'),
	(1, 22, 'Mercenary Enrollment', 'Teenage Mercenary', 0, 104, 97, '2022-10-05', 5, 'https://readmanganato.com/manga-jz987182', 'https://avt.mkklcdnv6temp.com/36/y/22-1605087752.jpg'),
	(1, 23, 'Chromosome 47', 'CHR-47', 0, 295, 287, '2022-10-05', 4, 'https://readmanganato.com/manga-da980683', 'https://avt.mkklcdnv6temp.com/37/x/17-1583496631.jpg');

CREATE TABLE IF NOT EXISTS `status` (
  `status_id` int NOT NULL DEFAULT '0',
  `status_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  KEY `status_id` (`status_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `status` (`status_id`, `status_name`) VALUES
	(0, 'Ongoing'),
	(1, 'Finished'),
	(2, 'Dropped');

CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` varchar(255) DEFAULT NULL,
  `pass` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `users` (`id`, `user`, `pass`) VALUES
	(1, 'kevin', 7889),
	(2, 'tim', 5945);

CREATE DATABASE IF NOT EXISTS `test_bank` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `test_bank`;

CREATE TABLE IF NOT EXISTS `users` (
  `usersId` int NOT NULL AUTO_INCREMENT,
  `usersName` varchar(255) DEFAULT NULL,
  `usersEmail` varchar(255) DEFAULT NULL,
  `usersUid` varchar(255) DEFAULT NULL,
  `usersPwd` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`usersId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `users` (`usersId`, `usersName`, `usersEmail`, `usersUid`, `usersPwd`) VALUES
	(1, 'Superadmin', 'admin@example.com', 'admin', '$2y$10$ln69Mpmr3zPiBMr4EVvnFuKD8aLsMhCFMeSAg9XkK//eitm37D/q.');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
