-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023 年 12 月 15 日 01:09
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_db231216`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE `gs_bm_table` (
  `id` int(12) NOT NULL,
  `title` varchar(64) NOT NULL,
  `publisher` varchar(64) NOT NULL,
  `link` text NOT NULL,
  `imgLink` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `title`, `publisher`, `link`, `imgLink`, `date`) VALUES
(1, 'H.264/AVC教科書', 'インプレスR&D', 'http://books.google.co.jp/books?id=jbgSgvqtPVQC&dq=h&hl=&source=gbs_api', 'http://books.google.com/books/content?id=jbgSgvqtPVQC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '2023-12-15 07:59:50'),
(2, '円朝全集', '出版社（不明）', 'http://books.google.co.jp/books?id=CSPSoAEACAAJ&dq=%E6%9C%9D&hl=&source=gbs_api', 'http://books.google.com/books/content?id=CSPSoAEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '2023-12-15 08:09:03'),
(3, '悪魔人形の廻る夜（分冊版16）', 'コンパス', 'https://play.google.com/store/books/details?id=A2ZVEAAAQBAJ&source=gbs_api', 'http://books.google.com/books/content?id=A2ZVEAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '2023-12-15 08:09:48'),
(4, '夜の光☆昼の闇', '秋田書店', 'https://play.google.com/store/books/details?id=ChnYDAAAQBAJ&source=gbs_api', 'http://books.google.com/books/content?id=ChnYDAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '2023-12-15 08:37:41'),
(5, 'フクロミコ J.マツオ短編集', '電書バト', 'https://play.google.com/store/books/details?id=1tnbDwAAQBAJ&source=gbs_api', 'http://books.google.com/books/content?id=1tnbDwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '2023-12-15 08:42:01');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
