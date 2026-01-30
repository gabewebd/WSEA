-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2026 at 11:00 PM
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
-- Database: `danonos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` enum('Doughnuts','Brownies','Beverages') DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_visible` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `name`, `description`, `price`, `category`, `image`, `alt_text`, `created_at`, `is_visible`) VALUES
(1, 'Glazed Doughnut', 'Classic glazed brioche doughnuts', 65.00, 'Doughnuts', '', 'glazed-doughnut', '2026-01-29 17:19:19', 1),
(2, 'Chocolate Brownie', 'Rich fudgy brownie', 85.00, 'Brownies', '', NULL, '2026-01-29 17:19:19', 1),
(3, 'Iced Americano', 'Bold espresso over ice', 95.00, 'Beverages', '', NULL, '2026-01-29 17:19:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `image_alt_text` varchar(255) DEFAULT 'Delicious Donut',
  `meta_description` varchar(160) DEFAULT NULL,
  `status` enum('published','draft') DEFAULT 'draft',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `author_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `featured_image`, `image_alt_text`, `meta_description`, `status`, `created_at`, `author_id`) VALUES
(16, 'Beyond the Doughnut: The Ultimate Guide to Our Iced Drinks', 'beyond-the-doughnut-the-ultimate-guide-to-our-iced-drinks', '<p class=\"lead\" style=\"font-size: 20px; line-height: 1.6; color: #555;\">\r\n    There is a rule of thermodynamics we live by at <strong>Danonos</strong>: For every warm, fluffy doughnut, there must be an equal and opposite <strong>ice-cold beverage</strong>. Whether you need a caffeine rocket-boost to start your morning or a creamy, sweet escape in the afternoon, our drink menu is designed to do one thing: <strong>Refresh you instantly.</strong>\r\n</p>\r\n\r\n<p style=\"font-size: 18px; color: #555; margin-bottom: 40px;\">\r\n    Move over, pastries. Today, we are talking about the liquid lineup that keeps our regulars coming back.\r\n</p>\r\n\r\n<hr style=\"border-top: 1px solid #e5e7eb; margin: 40px 0;\">\r\n\r\n<div style=\"margin-bottom: 60px;\">\r\n    <h2 style=\"color: #EF7D32; font-size: 32px; margin-bottom: 20px;\">The Energizer: Iced Spanish Latte</h2>\r\n    \r\n    <p>Sometimes, a regular iced coffee just doesn\'t cut it. You need something that hits harder but tastes sweeter. Enter the <strong>Spanish Latte</strong>.</p>\r\n\r\n    <p>This isn\'t your average coffee shop brew. We use a base of sweetened condensed milk to create a rich, velvety texture, then top it with our signature <strong>Medium-Dark Roast Espresso</strong>. The result? A beautiful gradient look and a taste that strikes the perfect balance between strong coffee and creamy sweetness.</p>\r\n\r\n    <p><strong>Perfect Pairing:</strong> Try this with a <em>Classic Glazed Doughnut</em>. The bitterness of the espresso cuts right through the sugar glaze.</p>\r\n\r\n    <div style=\"text-align: center; margin-top: 30px;\">\r\n        <img src=\"/danonos/uploads/danonos-iced-spanish-latte.jpg\" alt=\"Danonos Iced Spanish Latte with layers of milk and espresso\" style=\"width: 100%; max-width: 600px; border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);\">\r\n        <p style=\"font-size: 14px; color: #888; margin-top: 10px; font-style: italic;\">\r\n            Bold espresso meets sweet condensed milk.\r\n        </p>\r\n    </div>\r\n</div>\r\n\r\n<hr style=\"border-top: 1px solid #e5e7eb; margin: 40px 0;\">\r\n\r\n<div style=\"margin-bottom: 60px;\">\r\n    <h2 style=\"color: #EF7D32; font-size: 32px; margin-bottom: 20px;\">The Indulgence: Cookies &amp; Cream Frappe</h2>\r\n    \r\n    <p>Let’s be real—sometimes you don\'t want a drink; you want a <strong>dessert you can sip</strong>. The Cookies &amp; Cream Frappe is our love letter to everyone who grew up dunking cookies in milk.</p>\r\n\r\n    <p>We blend rich vanilla cream with heaps of crushed chocolate cookies, then crown it with a mountain of whipped cream. It is thick, frosty, and unapologetically decadent. It’s comforting, creamy, and undeniably classic.</p>\r\n\r\n    <p><strong>Pro Tip:</strong> This is a favorite among the \"I don\'t drink coffee\" crowd!</p>\r\n\r\n    <div style=\"text-align: center; margin-top: 30px;\">\r\n        <img src=\"/danonos/uploads/danonos-cookies-cream-frappe.jpg\" alt=\"Danonos Cookies and Cream Frappe topped with whipped cream\" style=\"width: 100%; max-width: 600px; border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);\">\r\n        <p style=\"font-size: 14px; color: #888; margin-top: 10px; font-style: italic;\">\r\n            Creamy, comforting, and packed with cookie crunch.\r\n        </p>\r\n    </div>\r\n</div>\r\n\r\n<hr style=\"border-top: 1px solid #e5e7eb; margin: 40px 0;\">\r\n\r\n<div style=\"margin-bottom: 60px; text-align: center;\">\r\n    <h2 style=\"color: #431407; font-size: 36px; margin-bottom: 20px;\">Stay Chilled All Summer</h2>\r\n    <p style=\"max-width: 700px; margin: 0 auto 30px auto; color: #555;\">\r\n        From the zesty kick of our <strong>Strawberry Lemonade</strong> to the earthy smooth vibes of our <strong>Strawberry Matcha Latte</strong>, our menu is exploding with color. We don\'t just do brown and beige here—we do vibrant.\r\n    </p>\r\n\r\n    <img src=\"/danonos/uploads/danonos-summer-beverage-lineup.jpg\" alt=\"Danonos Summer Drink Menu Collection\" style=\"width: 100%; max-width: 800px; border-radius: 20px; box-shadow: 0 12px 30px rgba(0,0,0,0.1);\">\r\n    \r\n    <p style=\"font-size: 14px; color: #EF7D32; margin-top: 15px; font-weight: 600; letter-spacing: 1px;\">\r\n        ▲ THE SUMMER SQUAD IS HERE\r\n    </p>\r\n</div>\r\n\r\n<h3 style=\"text-align: center; color: #431407; margin-top: 50px;\">Found Your Flavor Yet?</h3>\r\n<p style=\"text-align: center; max-width: 600px; margin: 0 auto;\">\r\n    Whether you need to wake up, cool down, or just treat yourself, there is a cup with your name on it at Danonos. Come visit us and sip the difference!\r\n</p>', 'danonos-iced-beverage-lineup.jpg', 'Danonos \'Feel Refreshed\' summer lineup featuring four iced beverages: Strawberry Milk, Cookies & Cream Frappe, Mixed Berries Frappe, and Red Iced Tea.', 'Discover the refreshing side of Danonos! Beyond doughnuts, explore our iced lineup: energizing artisan coffee and creamy frappes to beat the heat.', 'published', '2026-01-29 16:57:17', 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','editor') DEFAULT 'admin',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('active','pending') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `role`, `created_at`, `status`) VALUES
(5, 'SuperAdmin', 'admin@danonos.com', '$2y$10$7ihdn9QDiFwv6pEVAbIkf.aIljPQxklN9h7z4Lqp3dmS3GGIaCgPG', 'admin', '2026-01-29 13:21:29', 'active'),
(7, 'Gabrielle Ainshley Velasquez', 'eiyadwnlds@gmail.com', '$2y$10$L.Fr30vC9rUZVcjFJ122HOq21vMq9gfWdW2TFNNq/zWkzGc/e9TPa', 'editor', '2026-01-29 14:09:55', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
