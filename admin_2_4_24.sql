-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2024 at 08:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_home`
--

CREATE TABLE `about_home` (
  `id` bigint(20) NOT NULL,
  `about` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_home`
--

INSERT INTO `about_home` (`id`, `about`) VALUES
(4, '<h6>Welcome to lugx</h6>\r\n            <h2>BEST GAMING SITE EVER!</h2>\r\n            <p>LUGX Gaming is free Bootstrap 5 HTML CSS website template for your gaming websites. You can download and use this layout for commercial purposes. Please tell your friend');

-- --------------------------------------------------------

--
-- Table structure for table `game_category`
--

CREATE TABLE `game_category` (
  `id` int(45) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game_category`
--

INSERT INTO `game_category` (`id`, `category_name`) VALUES
(1, 'Action'),
(2, 'Adventure');

-- --------------------------------------------------------

--
-- Table structure for table `game_content`
--

CREATE TABLE `game_content` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `discount_price` varchar(255) NOT NULL,
  `our_price` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `about_game` varchar(400) DEFAULT NULL,
  `game_place` varchar(255) DEFAULT NULL,
  `game_description` varchar(400) NOT NULL,
  `game_id` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `multitags` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game_content`
--

INSERT INTO `game_content` (`id`, `name`, `discount_price`, `our_price`, `category`, `about_game`, `game_place`, `game_description`, `game_id`, `genre`, `multitags`, `image`, `created_at`, `deleted_at`) VALUES
(3, 'Cybernetic Revolution', '$14.99', '$24.99', '1', 'Cybernetic Revolution thrusts players into a dystopian future where technology has both empowered and enslaved humanity. As a member of the resistance, you must hack your way through corporate strongholds, uncovering the truth behind their oppressive regime.', 'TRENDING', 'With cutting-edge cybernetic enhancements, players navigate through neon-lit cityscapes, utilizing stealth, hacking skills, and combat prowess to dismantle the corrupt systems ruling society. Every choice made will shape the fate of the rebellion and determine the future of mankind.', 'Cybernetic Revolution###', ' Action, Adventure, Cyberpunk', 'Hacking, Futuristic', 'trending-01.jpg', NULL, NULL),
(4, 'Legends of Valor', '$19.99', '$29.99', '2', 'Legends of Valor is an epic fantasy RPG where players embark on a quest to defeat an ancient evil threatening the realm. With a vast open world to explore, intricate quests to complete, and legendary loot to uncover, it promises adventure at every turn.', 'TRENDING', 'Players will create their hero, choosing from various classes and races, each with unique abilities and traits. As they journey through the land of Valor, theyll encounter mythical creatures, forge alliances with powerful factions, and ultimately face off against the dark forces threatening to plunge the world into chaos.', 'Legends of Valor##', 'RPG, Fantasy', 'Adventure, Magic, Questing, Character Customization, Epic Battle', 'trending-02.jpg', NULL, NULL),
(5, 'Galactic Conquest', '$24.99', '$34.99', '1', 'Galactic Conquest is a grand strategy game set in the vast expanse of space, where empires clash and civilizations rise and fall. Command fleets, forge alliances, and conquer worlds as you vie for dominance in the galaxy.', 'TRENDING', 'From managing your economy and researching new technologies to engaging in epic space battles and negotiating treaties with rival powers, every decision you make will shape the course of history. Will you lead your people to victory and establish a lasting legacy, or will you be consigned to the dustbin of history?', 'Galactic Conquest###', 'Strategy, Simulation, Sci-Fi', 'Empire Building, Diplomacy, Space Colonization, Tactical Warfare, Resource Management', 'trending-03.jpg', NULL, NULL),
(6, 'Astral Frontier', '$19.99', '$29.99', '2', ' Astral Frontier is a space RPG set in a distant galaxy where humanity struggles for survival against alien threats and political intrigue. As a captain of your own starship, you must navigate the dangers of the cosmos and carve out your destiny among the stars.', 'TRENDING', 'With a vast universe to explore, dynamic quests to complete, and factions to ally with or oppose, every decision you make will shape the fate of the galaxy. Will you be a hero of the people, a ruthless mercenary, or a cunning diplomat? The choice is yours.', ' Astral Frontier##$', 'RPG, Space, Adventure', 'Space Exploration, Intergalactic Warfare, Diplomacy, Questing, Alien Encounters', 'trending-04.jpg', NULL, NULL),
(7, ' Warframe: Shadows of the Sentients', '$29', '$26', '1', 'Warframe: Shadows of the Sentients is the latest expansion to the critically acclaimed free-to-play action shooter, Warframe. This expansion introduces a new storyline revolving around the mysterious Sentients, ancient enemies of the Origin System, threatening the balance of power in the universe.', 'TOP_GAMES', 'In Shadows of the Sentients, players embark on a journey across new exotic locations, battle against powerful Sentient foes, and uncover the secrets of the past. With enhanced graphics, revamped gameplay mechanics, and new warframes and weapons to master, this expansion offers endless hours of fast-paced, cooperative action.', ' Warframe@#%', 'Shooter, Sci-Fi', 'Free-to-Play, Cooperative, Multiplayer', 'top-game-01 (1).jpg', NULL, NULL),
(8, 'PUBG Battlegrounds', '$19.99', '$29.99', '2', 'PUBG Battlegrounds: Survival Arena offers an intense battle royale experience where players parachute onto a remote island, scavenge for weapons and equipment, and fight to be the last one standing. With its realistic graphics, vast map, and thrilling gameplay, its the ultimate test of skill and strategy.', 'TOP_GAMES', 'In Survival Arena, players must adapt to constantly shrinking play zones, unpredictable encounters with other players, and the ever-present threat of danger. Whether playing solo, in duos, or as part of a squad, every match offers adrenaline-pumping action and the chance for victory.', 'Battle Royale, ShoPUBG Battlegrounds$@#@oter', 'Battle Shooter', 'Multiplayer, Survival, Tactical', 'top-game-02.jpg', NULL, NULL),
(9, 'Apex Legends: Legends Unleashed', '$211', '$333', '1', 'Apex Legends: Legends Unleashed is a free-to-play battle royale game developed by Respawn Entertainment and set in the Titanfall universe. Players select from a diverse cast of Legends, each with unique abilities, and compete in fast-paced matches to become the last squad standing.', 'TOP_GAMES', 'In Legends Unleashed, teams of three players are dropped onto the map without any gear and must quickly scavenge for weapons, attachments, and resources to survive. With a focus on squad-based gameplay and fluid movement mechanics, including sliding and wall-running, Apex Legends delivers an exhilarating experience that rewards teamwork and skillful play.', 'Apex Legend@$#', 'Battle Royale', 'Free-to-Play, Multiplayer', 'top-game-03.jpg', NULL, NULL),
(10, 'The Sims 4: Life Simulation Deluxe', '$29.99', '$39.99', '2', 'The Sims 4: Life Simulation Deluxe is the latest installment in the beloved simulation franchise developed by Maxis and published by Electronic Arts. Players create and control virtual characters, known as Sims, and guide them through various aspects of life, from career advancement to building relationships and designing homes.\r\n', 'TOP_GAMES', 'In Life Simulation Deluxe, players have unprecedented control over their Sims lives, with expanded customization options for appearance, personality traits, and aspirations. Explore vibrant neighborhoods, pursue unique careers, and engage in social interactions that shape the stories of your Sims lives. With endless possibilities for creativity and expression, every playthrough offers a unique and', 'The Sims 4#$u', 'Simulation', 'Life Simulation, Character Customization, Building, Relationships, Sandbox', 'top-game-04.jpg', NULL, NULL),
(11, 'LostRak', '$24.99', '$34.99', '1', 'LostRak: Journey to the Unknown is an adventure game developed by a small indie studio. Set in a mysterious and uncharted world, players take on the role of an intrepid explorer seeking to uncover the secrets of a forgotten civilization.', 'TOP_GAMES', 'In LostRak, players embark on an epic journey across diverse landscapes, from dense jungles to treacherous mountains, encountering strange creatures and ancient ruins along the way. With its immersive storytelling and breathtaking visuals, the game offers a captivating experience that will keep players on the edge of their seats until the very end.\r\n', 'LostRak^%$$%', 'Adventure', 'Indie, Exploration', 'top-game-05.jpg', NULL, NULL),
(12, 'Destiny 2', '$39.99', '$49.99', '2', 'Destiny 2: Guardians of Light is a popular online multiplayer first-person shooter developed by Bungie. Set in a mythic science fiction universe, players take on the role of Guardians, powerful warriors tasked with defending humanity from various threats.', 'TOP_GAMES', 'In Guardians of Light, players embark on epic missions across the solar system, battling against alien armies and unraveling the mysteries of the universe. With its immersive storylines, fast-paced gameplay, and expansive open-world environments, Destiny 2 offers an unparalleled gaming experience that keeps players coming back for more.\r\n', 'Destiny 2&*)', 'Person Shooter', 'Online Multiplayer, Sci-Fi, Cooperative, Loot-based, Competitive', 'top-game-06.jpg', NULL, NULL),
(13, 'Brawlhalla', '$40.00', '$50.00', '1', 'Brawlhalla: Legends Clash is a free-to-play platform fighting game developed by Blue Mammoth Games. Players choose from a roster of colorful characters, known as Legends, each with their own unique abilities and playstyles, and engage in fast-paced battles across various stages.', 'CATEGORIES', 'In Legends Clash, players can duke it out in both casual and competitive matches, with options for single-player, local multiplayer, and online play. With intuitive controls, responsive gameplay, and a vibrant community, Brawlhalla offers a fun and accessible fighting experience for players of all skill levels.', 'Brawlhalla##', 'Fighting, Platformer', 'Free-to-Play, Multiplayer, Couch Co-op, Esports, Cross-Platform', 'categories-01.jpg', NULL, NULL),
(14, 'Titanfall', '$39.99', '$49.99', '2', 'Titanfall: Warzone Assault is a high-octane first-person shooter set in a futuristic world where pilots and giant mechs known as Titans clash in epic battles. As a pilot, you ll utilize agile parkour movements and powerful weaponry to outmaneuver your enemies and dominate the battlefield.', 'CATEGORIES', 'Engage in adrenaline-fueled combat across dynamic maps, utilizing advanced tactics and teamwork to secure victory. Whether piloting a Titan or battling on foot, every match in Warzone Assault offers intense action and explosive gameplay.', 'Titanfall$%^', 'Action, Shooter, Mecha', 'Parkour, Giant Robots', 'download.jpg', NULL, NULL),
(15, 'Shadow of Vengeance', '$19.99', '$29.99', '1', 'Shadow of Vengeance is a dark and gritty action-adventure game set in a crime-ridden city overrun by corruption and violence. As a vigilante seeking justice, you ll navigate through the city s seedy underbelly, battling gangs and unraveling a web of conspiracy.', 'CATEGORIES', 'With its nonlinear narrative and branching storylines, Shadow of Vengeance offers players the freedom to shape their own path and determine the fate of the city. Engage in intense combat, stealthy takedowns, and moral dilemmas as you confront the darkness lurking within.', 'Shadow of Vengeance#$%^', 'Action, Adventure, Crime', 'Vigilante, Noir, Urban, Open World, Revenge', 'download (1).jpg', NULL, NULL),
(16, 'Warhamme', '$24.99', '$34.99', '2', 'Warhammer 40,000: Eternal Crusade is a massive multiplayer online third-person shooter set in the grimdark universe of Warhammer 40,000. Choose your faction - Space Marines, Chaos, Orks, or Eldar - and wage war for control of the galaxy.', 'CATEGORIES', 'Join epic battles on sprawling battlefields, commanding armies of iconic Warhammer 40,000 units and vehicles. With deep customization options, intense PvP and PvE gameplay, and ongoing updates and events, Eternal Crusade offers endless hours of war and glory.', 'Warhammer 40,000:@#e', 'Action, Shooter, MMO', 'Warhammer 40k, Space Warfare, Faction-based, Strategy, Massive Battles', 'download (2).jpg', NULL, NULL),
(17, 'Ninja Fury: Shadow Assassin', '$14.99', '$24.99', '1', 'Ninja Fury: Shadow Assassin is a fast-paced action game that puts players in the shoes of a skilled ninja on a quest for vengeance. Master the art of stealth, acrobatics, and deadly combat as you infiltrate enemy strongholds and eliminate high-profile targets.', 'CATEGORIES', 'With its fluid movement system and responsive combat mechanics, Ninja Fury offers a thrilling gameplay experience that rewards precision and finesse. Navigate through intricate levels, outsmarting enemies and uncovering the secrets of your past.', 'Ninja Fury:$$', ' Action, Stealth, Ninja', 'Assassination, Martial Arts, Revenge, Parkour, Japanese', 'download (3).jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `name`, `image`) VALUES
(4, 'logosssss', 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `middle_menu`
--

CREATE TABLE `middle_menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `middle_menu`
--

INSERT INTO `middle_menu` (`id`, `name`, `url`, `image`) VALUES
(2, 'FREE STORAGE', '#', 'featured-01.png'),
(4, 'User More', '#', 'featured-02.png'),
(5, 'Reply Ready', '#', 'featured-03.png'),
(6, 'Easy Layout', '#', 'featured-04.png');

-- --------------------------------------------------------

--
-- Table structure for table `websitemenu`
--

CREATE TABLE `websitemenu` (
  `id` bigint(20) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `websitemenu`
--

INSERT INTO `websitemenu` (`id`, `menu_name`, `menu_url`) VALUES
(2, 'Home', 'index.php'),
(4, 'Our Shop', 'shop.php'),
(6, 'Product Details', 'product-details.php?id=3'),
(7, 'Contact Us', 'contact.php'),
(8, 'Sign In', 'admin.php');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_home`
--
ALTER TABLE `about_home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_category`
--
ALTER TABLE `game_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_content`
--
ALTER TABLE `game_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `middle_menu`
--
ALTER TABLE `middle_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `websitemenu`
--
ALTER TABLE `websitemenu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_home`
--
ALTER TABLE `about_home`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `game_category`
--
ALTER TABLE `game_category`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `game_content`
--
ALTER TABLE `game_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `middle_menu`
--
ALTER TABLE `middle_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `websitemenu`
--
ALTER TABLE `websitemenu`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
