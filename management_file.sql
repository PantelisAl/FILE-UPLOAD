SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE DATABASE IF NOT EXISTS `management_file` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `management_file`;


CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `downloads` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `files` (`id`, `name`, `size`, `downloads`) VALUES
(1, 'digital-ad.zip', 56349, 1);

ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

