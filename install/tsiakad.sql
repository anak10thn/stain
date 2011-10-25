-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 05, 2011 at 04:16 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `tsiakad`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user`, `pass`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `plugin`
--

CREATE TABLE IF NOT EXISTS `plugin` (
  `id_plugin` int(255) NOT NULL auto_increment,
  `plugin_name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `position` varchar(50) NOT NULL,
  `status` enum('false','true') NOT NULL default 'false',
  `perm_dosen` enum('false','true') NOT NULL default 'false',
  `perm_mahasiswa` enum('false','true') NOT NULL default 'false',
  PRIMARY KEY  (`id_plugin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `id_setting` varchar(50) NOT NULL default 'STG',
  `login_message` text NOT NULL,
  `themes` varchar(50) NOT NULL default 'default',
  `content_themes` varchar(50) NOT NULL default 'base'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `login_message`, `themes`, `content_themes`) VALUES
('STG', '<p>Sistem ini merupakan berisi informasi tentang kegiatan akademik FAKULTAS KEHUTANAN Universitas Tadulako. System ini dapat memberikan informasi tentang segala sesuatu yang berhubungan dengan kegiatan akademik, perkuliahan, data diri Dosen maupun Mahasiswa. Untuk masuk anda dapat memilih pilihan gambar Login yang tertera di samping kanan, memasukan Username dan Password anda, kemudian menekan tombol login. Jika mengalami kesulitan silahkan menghubungi admin di emailadmin@domain.ac.id</p><p>Untuk demo masuk dengan user admin password admin. program dalam perbaikan bugs dan akan terus di update tiap hari. sesuai kebutuhan.</p>', 'default', 'base');
