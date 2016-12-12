-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2016 at 02:21 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trainee_006`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` int(6) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `friend` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `intro` text,
  `user_level` tinyint(4) NOT NULL DEFAULT '2',
  `time` datetime DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `fullname`, `password`, `friend`, `avatar`, `intro`, `user_level`, `time`, `sex`, `birthday`) VALUES
(7, 'minhnguyen', 'nguyenminhtan893@gmail.com', 1234567888, 'nguyá»…n minh tÃ¢n', '$2y$10$yqRIqrhTTQo8r2RXhlmDbOef9qxo01OhrMImcL2mzC4qR6UCg.n16', '', 'apps/public/upload/avatar.jpg', NULL, 0, NULL, NULL, NULL),
(10, 'vkmxk', 'mmv@df.com', 441651, 'fullname', '$2y$10$j83kZ4.Sz2Q3MgTggeNhqeXHjEroQ8REOYxalJQRtzM/rUDs6ftX2', 'dfjsdf', 'apps/public/upload/X0DFbDH.jpg', 'introdklmf', 2, '2016-12-06 13:41:45', 'nam', '2016-12-31'),
(11, 'ksdkd', 'msdk@nfd.com', 121010, 'f,ndj', '$2y$10$g18nIHQnTBKLsTucFEtyoeYbncDBHBcHKhSsryJugP90PeYr.JXk2', '', '', NULL, 2, '2016-12-06 13:45:52', NULL, NULL),
(12, 'sdmfdkm', 'kmfsd@dsd.com', 2147483647, 'kfmdk', '$2y$10$NkZ8Awyo81PIG9MkGXN7teGxwfU6kL6DakhRKdWMvphG9IAatA9l2', 'dlksmlds', '', NULL, 2, '2016-12-06 13:53:12', NULL, NULL),
(13, 'lklsdml', 'nkds@sdnsd.cp', 2147483647, 'dkfnksd', '$2y$10$AeVfpHFb9jpI3QukEV9tEOOZtyudiTbn82mjKuSuFAiXDsXELY/gG', 'sdls,fsdfdsl', '', NULL, 2, '2016-12-06 13:56:32', NULL, NULL),
(14, 'mdslksmd', 'msdlsd@fd.cp', 5544, 'dkmdflksdm', '$2y$10$5x4YZPkqBg2sZoIQYZBELej.Jfk3wwqMnkbk8oYMSymzRNLcuFBDm', 'jhkjnk', '', NULL, 2, '2016-12-06 13:57:34', NULL, NULL),
(15, 'mlfdml', 'mdlkfm@mfd.cp', 2147483647, 'kgmlkfdm', '$2y$10$18XVhE99uWPHe6dRtUdpx.qo/0.pR/KfoT6KhVKBqH7LOZoyVEiEi', '', '', NULL, 2, '2016-12-06 13:58:28', NULL, NULL),
(17, 'dfnvkd', 's@fjndivkdv.com', 148, 'nkdn', '$2y$10$w9T8gFUFUtyHTCoOVIVvoePhEgsDff0SWrca0.R3x5rLTWQJK2dla', '', '', NULL, 2, '2016-12-06 14:04:24', NULL, NULL),
(18, 'ljlsdfmslfmslfmsdl', 'ksfmsl@mf.com', 2147483647, 'jdnjbfgjgefjoila', '$2y$10$yeEfqvAN9b8mm318KuH52eiPd1Yp17mYDfJz0El.aS45KQyUvnjfO', '', 'apps/public/upload/wallpaper-2594020.jpg', 'dvndfkdlvdff', 2, '2016-12-06 14:07:39', 'nam', '2016-12-16'),
(19, 'ldmvdlfm', 'kmdfvld@ls.com', 5, 'lfmkdl', '$2y$10$phlCvAH4J0BpS.p4I59AXeOL2BoTpfJa9o7UnS1ivUqdgoqnITPEq', 'minhnguyen', '', NULL, 2, '2016-12-06 14:10:02', NULL, NULL),
(21, 'lskdms', 'd@dc.com', 51, 'ldm', '$2y$10$5xvMIjTsIKcNZC3FWdLgNeWXZAuxlHkCWNgVn84uBgwCsj3LK1XCa', 'minhnguyen', 'apps/public/upload/arsenal.png', NULL, 2, '2016-12-06 15:01:05', NULL, NULL),
(22, '3', '3@3.com', 25, '3', '$2y$10$B0vOGQSbNz8QVjMLO7PCZ.gAEsteQCk9RopoRcyNUUA2jfc4BmDhi', '', 'apps/public/upload/aston-villa.png', NULL, 2, '2016-12-06 15:01:29', NULL, NULL),
(23, '4', 'ds@ds.cp', 3513, '5', '$2y$10$41axDlSpKyY7FKaFFmBPoeTK3XTGEEGR.3O.u181SlkQS/tsDreGS', '', 'apps/public/upload/chelsea.png', NULL, 2, '2016-12-06 15:01:48', NULL, NULL),
(24, 'nguyenvan', 'nguyenvan@ng.com', 2147483647, 'nguyenvana', '$2y$10$/KWQsv.8oeIQWA8LTF/wT.qZZ8PxdwXbdgsyXecv1xNYFdVCsFE4u', '', '', NULL, 1, '2016-12-09 13:32:00', NULL, NULL),
(25, 'afd', 'sds@c.com', 45417, 'dfs', '$2y$10$.f3JfNBlO5u6ioB3zWs5oOckJWX1ZOYhY1slvUEKKSxzchsrHbR.O', '', '', NULL, 2, '2016-12-09 14:11:52', NULL, NULL),
(26, 'dsfsd', 'ds@ds.com', 2147483647, 'ds,nfdf', '$2y$10$bodPOv9Z/KY5NVALfUS/AO8o/ikXI7jNvVHGTik71K0LPla2D86..', '', '', NULL, 2, '2016-12-09 14:12:58', NULL, NULL),
(27, 'sfs', 'fs@df.co', 2147483647, 'fd', '$2y$10$dsKRCpgnunH27u4X9ZIzNObVRk3Gt20nOmGJ3kDPzTszbEZkthRHG', '', '', NULL, 2, '2016-12-09 14:13:32', NULL, NULL),
(28, 'dmsm', 'ds@com.vm', 2147483647, 'kd', '$2y$10$1QRIgFolabI13jNW9l5WN.B6FM/h/BAnvKhR9Le0lAedXjfsg6Cyi', '', '', NULL, 2, '2016-12-09 14:14:33', NULL, NULL),
(29, ',sl;d', 'fs@co.vom', 3123, 'fmdlmkdm', '$2y$10$y5.EfcwgFjrTKBo1weIqruwLWdVPHl9UXPszSMmVj84xEZkJ/bVT.', '', '', NULL, 2, '2016-12-09 14:15:39', NULL, NULL),
(30, 'sd', 'ds@dc.co', 2147483647, 'dds', '$2y$10$dw//cTrvQbzBnIcBTN53YO6MQTt2oIMolIHgj.I6xpeIAgo3VU4.O', '', '', NULL, 2, '2016-12-09 14:16:43', NULL, NULL),
(31, 'kfndlkfdl', 'ldkglfk@co.co', 61351511, 'fldddnfdfll', '$2y$10$Mrs.PYLeLlo0EX03pqphSuz/8dYDRcoCnLQqWChw73ckcygUOpUdy', '', '', NULL, 2, '2016-12-10 10:07:16', NULL, NULL),
(32, 'u1', 'u1.com@com.vom', 123456789, 'msms', '$2y$10$.DCCqvuUzD/q2UYMwbr.UuGx9gZo4tgEsPud0PstS6j773oH/Dq66', '', '', NULL, 2, '2016-12-10 10:10:44', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
