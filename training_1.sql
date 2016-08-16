-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2016 at 09:07 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `training_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `acl`
--

CREATE TABLE IF NOT EXISTS `acl` (
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acl`
--

INSERT INTO `acl` (`key`, `value`) VALUES
('resources', '["administrator","user","role","resource"]'),
('resource_role_permissions::administrator::administrator', '["read"]'),
('resource_role_permissions::resource::administrator', '["create","read","update","delete"]'),
('resource_role_permissions::role::administrator', '["create","read","update","delete"]'),
('resource_role_permissions::user::administrator', '["create","read","update","delete"]'),
('roles', '["administrator"]'),
('user_roles::1', '["administrator"]');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(3) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `captcha`
--

CREATE TABLE IF NOT EXISTS `captcha` (
`captcha_id` bigint(13) NOT NULL,
  `captcha_time` int(10) NOT NULL,
  `ip_address` varchar(16) NOT NULL,
  `word` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=799 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(796, 1470751007, '::1', '4801'),
(797, 1470752893, '::1', '3786'),
(798, 1470752903, '::1', '4683');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
`id` int(2) NOT NULL,
  `kategori` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(1, 'Pendidikann'),
(2, 'coba'),
(3, 'bayue'),
(4, 'asas');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
`id` int(3) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `status` enum('pending','aktif','tidak_aktif','') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `username`, `password`, `nama`, `email`, `alamat`, `tgl_lahir`, `no_hp`, `status`) VALUES
(1, 'member', 'aa08769cdcb26674c6706093503ff0a3', 'Bayu Anggoro Saktii', 'bayu@anggoro.sakt', 'pati', '2016-08-23', '89080809', 'pending'),
(2, 'coba', '1621a5dc746d5d19665ed742b2ef9736', 'Danang Agung Triwiasfasdf', 'asfsaf@agmial.com', 'afasfsa', '0000-00-00', 'fsafasf', 'pending'),
(3, 'lutvi', '7e96f0a92e84e79e04c4da1c83b64755', 'Lutvi Havifazrin', 'lutvi@lutvi.com', 'pati', '0000-00-00', '0908980', 'pending'),
(4, 'bayue', '40205e15e436cac598108ddedd5a9f3b', 'asdasf', 'bayu@bayu.com', 'sadsadas', '0000-00-00', 'dsadsad', 'pending'),
(5, 'aaaaaaaa', '64ce713ea6e67efea1093d7db844148b', 'asSASDASDv', 'bayu.anggoro.s@mail.ugm.ac.id', 'adwqdwqd', '0000-00-00', '213123123123', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
`id` int(4) NOT NULL,
  `id_kategori` int(2) NOT NULL,
  `id_admin` int(3) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `link` varchar(200) NOT NULL,
  `updatetimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` enum('0','1','','') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `id_kategori`, `id_admin`, `judul`, `isi`, `gambar`, `link`, `updatetimestamp`, `deleted`) VALUES
(1, 1, 1, 'ganti2', '<p>asdasdgant</p>\r\n', 'ganti.jpg', '', '2016-08-09 14:17:22', '1'),
(2, 2, 1, 'safsdfsd', '<p>wefwef</p>\r\n', 'gambar-08082016112043.jpg', '', '2016-08-09 12:25:40', '0'),
(3, 1, 1, 'dasdasdsd', '<p>dwadqwd</p>\r\n', 'gambar-08082016115242.jpg', '', '2016-08-09 12:28:42', '0'),
(4, 1, 1, 'sadasd', '<p>sadasdsadads</p>\r\n', 'gambar-09082016193951.jpg', '', '2016-08-09 12:40:10', '1'),
(5, 2, 1, 'adad', '<p>safasf</p>\r\n', 'gambar-09082016212329.jpg', '', '2016-08-09 14:23:29', '0'),
(6, 1, 1, 'sacasc', '<p>ascasc</p>\r\n', 'gambar-09082016212347.jpg', '', '2016-08-09 14:23:47', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'foo@bar.com', 'sha256:1024:54AlT2uYic6Jvn+Y2EdF69hew6VNtXYH:KOnD8F7Ef9kX1P0TZ36aL+u15GeNvgZD'),
(2, 'bayu.anggoro.s@mail.ugm.ac.id', 'sha256:1024:r/2cUKyJXM3GQo0KSkAgQmT92W51XvUi:nwFMvuPtT+tNBD9zkYFkvZDumYseo0cE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acl`
--
ALTER TABLE `acl`
 ADD PRIMARY KEY (`key`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `captcha`
--
ALTER TABLE `captcha`
 ADD PRIMARY KEY (`captcha_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `captcha`
--
ALTER TABLE `captcha`
MODIFY `captcha_id` bigint(13) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=799;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
