-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gazdă: localhost
-- Timp de generare: mai 08, 2023 la 07:01 PM
-- Versiune server: 8.0.31
-- Versiune PHP: 7.4.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `fake_insta`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `comments`
--

CREATE TABLE `comments` (
  `commentId` int NOT NULL,
  `usersCommentId` int DEFAULT NULL,
  `postCommentId` int DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `postreaction`
--

CREATE TABLE `postreaction` (
  `reactionId` int NOT NULL,
  `reactionPostId` int DEFAULT NULL,
  `reactionUserId` int DEFAULT NULL,
  `reactionType` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `posts`
--

CREATE TABLE `posts` (
  `postId` int NOT NULL,
  `usersPostId` int DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `postImage` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `content` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `published` tinyint(1) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `posts`
--

INSERT INTO `posts` (`postId`, `usersPostId`, `title`, `postImage`, `content`, `published`, `createdAt`, `updatedAt`) VALUES
(2, 4, 'Ceva realizat de mine', 'img2.jpg', 'A durat ceva pana am facut aceasta poza da a meritat', 1, '2023-04-22 19:49:37', '2023-04-22 19:49:37'),
(3, 4, 'titlu', 'Rexxx.jpg', 'salut', 1, '2023-05-06 15:04:39', '2023-05-06 15:04:39'),
(7, 4, 'titlu', 'Rexxx_55dba08cf7a89aef4b5461448a91d9d8.jpg', 'salut', 1, '2023-05-06 16:24:47', '2023-05-06 16:24:47'),
(8, 4, 'tigru', 'Rexxx_46440966659612eb1cf80560974a2cb1.jpg', 'un tigru', 1, '2023-05-06 16:26:15', '2023-05-06 16:26:15'),
(9, 4, '', 'Rexxx_7553e5b81414fe4cf745d32c77800174.jpg', '', 1, '2023-05-06 16:34:09', '2023-05-06 16:34:09'),
(10, 4, 'salut', NULL, 'ce mai faceti fratilor?', 1, '2023-05-06 17:58:12', '2023-05-06 17:58:12'),
(18, 10, '', 'Coxtin_d726cdd10781fb4b1fb146058289f1af.gif', '', 1, '2023-05-08 18:58:03', '2023-05-08 18:58:03');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `profilecoverpicture`
--

CREATE TABLE `profilecoverpicture` (
  `profileCoverId` int DEFAULT NULL,
  `profilePicture` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `coverPicture` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `usersId` int NOT NULL,
  `usersFirstName` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `usersLastName` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `usersUsername` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `usersEmail` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `usersBirthday` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `usersGender` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `usersPhone` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `usersPwd` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `usersDescription` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`usersId`, `usersFirstName`, `usersLastName`, `usersUsername`, `usersEmail`, `usersBirthday`, `usersGender`, `usersPhone`, `usersPwd`, `usersDescription`, `createdAt`, `updatedAt`) VALUES
(4, 'Popescu', 'Marion', 'Rexxx', 'costin_oln@yahoo.com', '2001-11-16', 'Male', '62496746', '$2y$10$n7ZqAS9RMqjwAj/lwnaLu.Fe.ae5QQzPNY9AHBXauJzxu3KpwnJau', '', '2023-04-29 19:01:32', NULL),
(5, 'Bocirnea', 'Razvan', 'Simple', 'olteancstin3@gmail.com', '2004-06-01', 'Male', '35165641', '$2y$10$zekKtK5Ro.OyixB2yuo91u5bvt1Lfa77ZI/mEydj2KB54Ck8Fy43a', 'salut', '2023-04-30 10:01:16', NULL),
(10, 'Oltean', 'Costin', 'Coxtin', 'olteancostin3@gmail.com', '2004-04-01', 'Male', '0752827968', '$2y$10$5kXceykKPX8MTGgp/c5CSufptFppfs.bfpJKWsR0UJsxxOnIMp6vi', NULL, '2023-05-08 18:50:15', NULL);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `usersphotos`
--

CREATE TABLE `usersphotos` (
  `photosId` int NOT NULL,
  `usersPhotoId` int DEFAULT NULL,
  `dateAdded` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentId`),
  ADD KEY `usersCommentId` (`usersCommentId`),
  ADD KEY `postCommentId` (`postCommentId`);

--
-- Indexuri pentru tabele `postreaction`
--
ALTER TABLE `postreaction`
  ADD PRIMARY KEY (`reactionId`),
  ADD KEY `reactionPostId` (`reactionPostId`),
  ADD KEY `reactionUserId` (`reactionUserId`);

--
-- Indexuri pentru tabele `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postId`),
  ADD KEY `usersPostId` (`usersPostId`);

--
-- Indexuri pentru tabele `profilecoverpicture`
--
ALTER TABLE `profilecoverpicture`
  ADD KEY `profileCoverId` (`profileCoverId`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- Indexuri pentru tabele `usersphotos`
--
ALTER TABLE `usersphotos`
  ADD PRIMARY KEY (`photosId`),
  ADD KEY `usersPhotoId` (`usersPhotoId`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `comments`
--
ALTER TABLE `comments`
  MODIFY `commentId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `postreaction`
--
ALTER TABLE `postreaction`
  MODIFY `reactionId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `posts`
--
ALTER TABLE `posts`
  MODIFY `postId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pentru tabele `usersphotos`
--
ALTER TABLE `usersphotos`
  MODIFY `photosId` int NOT NULL AUTO_INCREMENT;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`usersCommentId`) REFERENCES `users` (`usersId`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`postCommentId`) REFERENCES `posts` (`postId`);

--
-- Constrângeri pentru tabele `postreaction`
--
ALTER TABLE `postreaction`
  ADD CONSTRAINT `postreaction_ibfk_1` FOREIGN KEY (`reactionPostId`) REFERENCES `posts` (`postId`),
  ADD CONSTRAINT `postreaction_ibfk_2` FOREIGN KEY (`reactionUserId`) REFERENCES `users` (`usersId`);

--
-- Constrângeri pentru tabele `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`usersPostId`) REFERENCES `users` (`usersId`);

--
-- Constrângeri pentru tabele `profilecoverpicture`
--
ALTER TABLE `profilecoverpicture`
  ADD CONSTRAINT `profilecoverpicture_ibfk_1` FOREIGN KEY (`profileCoverId`) REFERENCES `users` (`usersId`);

--
-- Constrângeri pentru tabele `usersphotos`
--
ALTER TABLE `usersphotos`
  ADD CONSTRAINT `usersphotos_ibfk_1` FOREIGN KEY (`usersPhotoId`) REFERENCES `users` (`usersId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
