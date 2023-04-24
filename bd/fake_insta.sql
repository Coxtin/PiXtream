-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gazdă: localhost
-- Timp de generare: apr. 24, 2023 la 06:29 PM
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
(1, 'Oltean', 'Costin', 'Coxtin', 'olteancostin3@gmail.com', '2004-04-01', 'Male', '0752827968', '$2y$10$ps9hZ0Gr/1ryrtOkcfFRs.Kf2oGpLnf3wLJ6jJebuaFeGOYFgeIrS', NULL, '2023-04-22 19:49:37', NULL);

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
-- AUTO_INCREMENT pentru tabele `posts`
--
ALTER TABLE `posts`
  MODIFY `postId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
