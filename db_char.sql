-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2025 at 05:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_char`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Anime'),
(2, 'Game');

-- --------------------------------------------------------

--
-- Table structure for table `karakter`
--

CREATE TABLE `karakter` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `asal` varchar(255) NOT NULL,
  `link` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(1000) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karakter`
--

INSERT INTO `karakter` (`id`, `nama`, `asal`, `link`, `deskripsi`, `foto`, `category_id`) VALUES
(6, 'Cha Hae-In', 'Solo Leveling', 'https://myanimelist.net/character/173979/Hae-In_Cha?q=cha%20hae%20in&cat=character', 'Age: 23\r\nOccupation: Hunter, Vice Guild Master\r\nRank: S-Rank\r\nClass: Sword Fighter\r\nGuild: Hunters Guild (Vice Guild Master)\r\n\r\nCha Hae-In is the Vice-Guild Master of the Hunters Guild and the sword woman of the main raiding party. She is the 9th ranked H', 'Cha Hae-In.jpg', 1),
(9, 'Monkey D. Luffy', 'One Piece', 'https://myanimelist.net/character/40/Luffy_Monkey_D?q=luffy&cat=character', 'Age: 17; 19\r\nBirthdate: May 5, Taurus\r\nHeight: 172 cm; 174 cm\r\nBlood type: F\r\nAffiliation: Straw Hat Pirates\r\nPosition: Captain\r\nDevil fruit: Gomu Gomu no Mi (Gum Gum Fruit)\r\nType: Paramecia\r\nHito Hito no Mi (Human Human Fruit: Model Nika Type: Mythical Zoan)\r\nBounty: 3,000,000,000 (previously: 30,000,000, 100,000,000, 300,000,000, 400,000,000, 500,000,000 and 1,500,000,000)', 'Monkey D. Luffy.jpg', 1),
(15, 'Changli', 'Wuthering Waves', 'https://wutheringwaves.fandom.com/wiki/Changli', 'Counselor to the Jinzhou Magistrate, Changli excels at leveraging human nature to corner her enemies into traps.\r\nBeing the mentor to Jinhsi, she is persuasive and patient.\r\nShe entertains an unwavering aspiration, holding her ground in the endless game against time and chaos.', 'Changli.jpg', 2),
(16, 'Raiden Shogun', 'Genshin Impact', 'https://genshin.hoyoverse.com/id/character/inazuma?char=4', 'The Raiden Shogun is the awesome and terrible power of thunder incarnate, the exalted ruler of the Inazuma Shogunate.\r\nWith the might of lightning at her disposal, she commits herself to the solitary pursuit of eternity.', 'Raiden Shogun.jpg', 2),
(17, 'Zhongli', 'Genshin Impact', 'https://genshin.hoyoverse.com/id/character/liyue?char=9', 'Wangsheng Funeral Parlor mysterious consultant. Handsome, elegant, and surpassingly learned.\r\nThough no one knows where Zhongli is from, he is a master of courtesy and rules. From his seat at Wangsheng Funeral Parlor, he performs all manner of rituals.', 'Zhongli.jpg', 2),
(27, 'Li sushang', 'Honkai Impact 3rd', 'https://honkai-impact-3rd-archives.fandom.com/wiki/Li_Sushang', 'Birthday: April 3rd, 1481\r\nBirthplace: Shenzhou\r\nRace: Human\r\nOccupation: S-Rank Valkyrie\r\nAffiliation: Schicksal\r\nLi Sushang is one of the protagonists of the Seven Swords visual novel. She is also a secondary character in the main game. She is the daughter of Qin Suyi, who was one of Fu Hua\'s disciples.', 'Li sushang.jpg', 2),
(28, 'Ellen Joe', 'Zenless Zone Zero', 'https://zenless-zone-zero.fandom.com/wiki/Ellen_Joe', 'Birthday: January 4th\r\nHeight: 161 cm (5\'3\")\r\nSpecies: Thiren (Shark)\r\nEllen Joe is a laid-back Shark Thiren that attends school in New Eridu who hates activities that require energy. Despite her personality and aloofness, Ellen is a significantly popular student at the school,[1] though she prefers spending time with fellow students Ruby, Monna and Lynn at karaoke bars, Godfinger and more.[2]\r\n\r\nEllen\'s school life is balanced with her job as a maid for Victoria Housekeeping Co., where she specializes in security management and garden maintenance.[3] Though she dislikes physical activities, the support of her teammates that she considers her friend as well, allow her to unleash formidable power, becoming a significant threat in combat. However, this comes at the caveat of consuming a lot of her energy, which is why she has a lollipop on her person at most times.\r\n\r\nEllen is shown to be constantly tired, possibly an effect of having to attend school and do commissions on a day-to-day b', 'Ellen Joe.jpg', 2),
(30, 'Tsukihiro Yanagi', 'Zenless Zone Zero', 'https://zenless-zone-zero.fandom.com/wiki/Tsukishiro_Yanagi', 'Birthday: September 21st\r\nHeight: 169 cm (5\'7\")\r\nSpecies: Human (Oni Blood)\r\nFaction: Hollow Special Operation 6\r\nThe Deputy Chief of Hollow Special Operations Section 6, Tsukishiro Yanagi is an ex-soldier from the New Eridu Defense Force who has been infused with Oni blood.[1] Her main jobs include general management, on-site support and being the guardian of her fellow member Soukaku; alongside all these duties, she usually finds herself having to complete the rest of the team\'s tasks as well. Due to the unique personalities of the other Section 6 members, Yanagi\'s seriousness and diligence classify her as the only \"normal\" member of the team. It is with her guidance, experience and leadership that the primary on-field group\'s powers combine into true combat power', 'Tsukihiro Yanagi.jpeg', 2),
(31, 'Roronoa Zoro', 'One Piece', 'https://myanimelist.net/character/62/Zoro_Roronoa', 'Age: 19; 21\r\nBirthdate: November 11, Scorpio\r\nHeight: 178 cm (5\'10\") , 181 (5\'11\") (after timeskip)\r\nAffiliation: Straw Hat Pirates\r\nPosition: Swordsman\r\nDevil Fruit: None\r\nBounty: 1,111,000,000 (previously: 60,000,000, 120,000,000 and 320,000,000)', 'Roronoa Zoro.jpg', 1),
(32, 'Hitori Gotou', 'Bocchi The Rock', 'https://bocchi-the-rock.fandom.com/wiki/Hitori_Gotoh', 'Birthday: February 21\r\nAge: 15\r\n17 (Chapter 73)\r\nGender: Female\r\nHeight: 156 cm\r\nWeight: 50 kg\r\nHair color: Pink\r\nEye color: Aqua\r\nBlood type: B\r\nOccupation: Student\r\nAffiliation:\r\nShuka High School\r\nKessoku Band\r\nRelatives:\r\nNaoki Gotoh (father)\r\nMichiyo Gotoh (mother)\r\nFutari Gotoh (little sister)\r\nJimihen (dog)', 'Hitori Gotou.jpeg', 1),
(33, 'Sakata Gintoki', 'Gintama', 'https://myanimelist.net/character/672/Gintoki_Sakata?q=gintoki&cat=character', 'Age: 27, 29 (2 years arc)\r\nBirthday: October 10 (Libra)\r\nHeight: 177 cm\r\nWeight: 65 kg\r\nLikes: sweets, alcohol, Shounen Jump, strawberry milk, pachinko\r\nDislikes: ghosts, horror stuff\r\nFavorite quote: \"Then and now, what I protect has never changed.\"\r\nOccupation: Yorozuya/Odd Jobs', 'Sakata Gintoki.png', 1),
(38, 'Jane Doe', 'Zenless Zone Zero', 'https://zenless-zone-zero.fandom.com/wiki/Jane_Doe', 'Real Name: Jane Doe\r\nBrief Name: Jane\r\nBirthday: February 16th\r\nHeight: 170 cm (5\'7\")\r\nGender: Female\r\nSpecies: Thiren (Rat)\r\nFaction: Criminal Investigation Special Response Team\r\nAffiliation: New Eridu Public Security (Consultant)', 'Jane Doe.jpg', 2),
(39, 'Acheron', 'Honkai: Star Rail', 'https://honkai-star-rail.fandom.com/wiki/Acheron', 'Real Name: Raiden Bosenmori Mei\r\nSpecies: Oni (formerly)\r\nLore Path: Path Nihility Nihility (Emanator)\r\nFactions: Self-Annihilators (On Profile)\r\nGalaxy Rangers (self-proclaimed)\r\nWorlds: Cosmic\r\nIzumo (home world)', 'Acheron.jpg', 2),
(40, 'Ryo Yamada', 'Bocchi The Rock!', 'https://bocchi-the-rock.fandom.com/wiki/Ryo_Yamada', 'Birthday: September 18\r\nAge: 16-17\r\nGender: Female\r\nHeight: 163 cm\r\nWeight: 50 kg\r\nHair color: Blue\r\nEye color: Yellow\r\nBlood type: AB\r\nOccupation: Student\r\nAffiliation:\r\nThe Hamukitasu (former member)\r\nShimokitazawa High School (student)\r\nKessoku Band (bassist, backing vocalist)\r\nRelatives: Kyoichi Yamada (father)\r\nKyoka Yamada (mother)', 'Ryo Yamada.jpg', 1),
(42, 'Ruan Mei', 'Honkai: Star Rail', 'https://honkai-star-rail.fandom.com/wiki/Ruan_Mei', 'Ruan Mei is a playable character in Honkai: Star Rail.\r\n\r\nA sweet-tempered and elegant scholar, and Member #81 of the Genius Society.\r\n\r\nAn expert in the biological sciences. She earned Nous\' attention with her talent and terrifying perseverance, and began her research on the origin of life in a secret corner of the universe. Because of that, she was invited by Herta to collaborate with Screwllum and Stephen to develop the Simulated Universe.\r\n\r\nSecretly, she greatly enjoys traditional theater and desserts, and she is also very interested in embroidery.', 'Ruan Mei.jpg', 2),
(43, 'Nanako Miku', 'Go-Toubun No Hanayome', 'https://myanimelist.net/character/160603/Miku_Nakano?q=miku%20nakano&cat=character', 'Age: 17-18\r\nBirthday: May 5, 2000\r\nHeight: 165 cm\r\nWeight: 49 kg\r\nBlood type: A\r\n\r\nMiku Nakano is initially depicted as a shy and introverted character who struggles to express herself and communicate with others. However, as the series progresses, she begins to come out of her shell and develop her own sense of confidence and individuality. Miku is particularly interested in literature, and her love for books is a central part of her character\'s identity.\r\n\r\nOverall, Miku\'s character is complex and multi-dimensional, with her quiet determination, creativity, and vulnerability making her a compelling and relatable figure for fans of the series.', 'Nanako Miku.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(5, 'user', 'user2@gmail.com', '$2y$10$GBvfRUN/hD5m8pFNOHZLkeUOb6yJVwiREDH9IxQLHdiiUMdZpzaXS', 'user'),
(6, 'admin', 'admin02@gmail.com', '$2y$10$2WiE2F9yjh0X.CVxbmNGruzSj/0LhG2vMs6.By1SvDFK0V1oA0nIm', 'admin'),
(8, 'user23', 'user2121@gmail.com', '$2y$10$QTXuWD/04qdpHKAOTiuBoOtZtK3dvI8tNE/cQxf4jYtuRpjfGeK06', 'user'),
(10, 'admin7', 'admin32@gmail.com', '$2y$10$kzzh3yzvNQM1CK49UbQy.e2em.hDCvcKfzdHlmonWkKRQF6GH9t/.', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karakter`
--
ALTER TABLE `karakter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `karakter`
--
ALTER TABLE `karakter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `karakter`
--
ALTER TABLE `karakter`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
