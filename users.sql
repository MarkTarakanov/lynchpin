-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: May 17, 2016 at 07:30 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Users`
--

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
`id` int(11) NOT NULL,
`username` varchar(255) NOT NULL,
`password` varchar(255) NOT NULL,
`gender` varchar(255) NOT NULL,
`color` varchar(255) NOT NULL,
`languages` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `username`, `password`, `gender`, `color`, `languages`) VALUES
(1, 'localhost', 'topsecret', 'm', '#00f', 'Array'),
(2, 'Mark Tarakanov', 'Cool guy', 'm', '#00f', 'Array'),
(3, 'Daniil Tarakanov', '', 'm', '#00f', 'Array'),
(4, 'debbie', 'HOHO', 'f', '#0f0', 'Array'),
(5, 'Eric Li', 'Shoes', 'm', '', 'Array'),
(6, 'blabla', '', 'm', '#0f0', ''),
(7, 'Mr X', '', 'm', '#f00', 'Array');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;