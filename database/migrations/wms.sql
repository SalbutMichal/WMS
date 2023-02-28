-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Lut 2023, 23:08
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `wms`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `group_permission`
--

CREATE TABLE `group_permission` (
  `user_group_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('route','other') NOT NULL,
  `access` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `tax` int(11) NOT NULL,
  `ean` varchar(13) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `price`, `tax`, `ean`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Laptop lenovo', 'laptop-lenovo', '2000.00', 23, '20124124122', 1, '2023-02-28 17:00:33', '2023-02-28 20:24:43'),
(2, 'Laptop hp', 'laptop-hp', '3000.00', 23, '20124124124', 1, '2023-02-28 17:05:27', '2023-02-28 20:47:01');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Elektronika', 'elektronika', '2023-02-28 20:17:32', '2023-02-28 20:17:32'),
(2, 'Spożywka', 'spozywka', '2023-02-28 20:17:56', '2023-02-28 20:17:56'),
(3, 'Słodycze', 'slodycze', '2023-02-28 20:18:21', '2023-02-28 20:18:21');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_group_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `surname`, `email`, `password`, `user_group_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'msalbut', 'Michał', 'Sałbut', 'm.salbut@polskaziemia.pl', '$2y$10$51W6aTozdPlzmmuR.4Zb0.CrR33W3BItz2v.VQe.SQHfVhbi6JVG.', 1, NULL, '2023-02-28 14:28:28', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_groups`
--

CREATE TABLE `user_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `acces_level` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `user_groups`
--

INSERT INTO `user_groups` (`id`, `name`, `warehouse_id`, `acces_level`) VALUES
(1, 'Administrator', 0, 1),
(2, 'Użytkownik', 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `warehouse releases`
--

CREATE TABLE `warehouse releases` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `products_quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `warehouses`
--

CREATE TABLE `warehouses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `zip_code` varchar(6) NOT NULL,
  `type` enum('Główny','Wysyłkowy') NOT NULL DEFAULT 'Wysyłkowy',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `warehouses`
--

INSERT INTO `warehouses` (`id`, `name`, `city`, `street`, `zip_code`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Magazyn Koźmin', 'Koźmin Wielkopolski', 'Koźmin Wielkopolski', '26-600', 'Główny', '2023-02-28 17:06:09', '2023-02-28 18:02:56'),
(2, 'Jakis magazyn', 'Radom', 'Kasztelańska 11d', '26-610', 'Wysyłkowy', '2023-02-28 16:39:07', '2023-02-28 16:39:07');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `warehouse_receipts`
--

CREATE TABLE `warehouse_receipts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `products_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `group_permission`
--
ALTER TABLE `group_permission`
  ADD PRIMARY KEY (`user_group_id`,`permission_id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- Indeksy dla tabeli `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `warehouse releases`
--
ALTER TABLE `warehouse releases`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `warehouse_receipts`
--
ALTER TABLE `warehouse_receipts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `warehouse releases`
--
ALTER TABLE `warehouse releases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `warehouse_receipts`
--
ALTER TABLE `warehouse_receipts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `group_permission`
--
ALTER TABLE `group_permission`
  ADD CONSTRAINT `group_permission_user_group_id_foreign` FOREIGN KEY (`user_group_id`) REFERENCES `user_groups` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
