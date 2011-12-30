CREATE TABLE IF NOT EXISTS `setting` (
  `id_setting` varchar(50) NOT NULL default 'STG',
  `message` text NOT NULL,
  `title` varchar(50) NOT NULL default 'SIAKAD',
  `themes` varchar(50) NOT NULL default 'default',
  `content_themes` varchar(50) NOT NULL default 'base'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


INSERT INTO `setting` (`id_setting`, `message`, `title`, `themes`, `content_themes`,) VALUES
('STG', '<p>Sistem ini merupakan berisi informasi tentang kegiatan akademik STAIN. System ini dapat memberikan informasi tentang segala sesuatu yang berhubungan dengan kegiatan akademik, perkuliahan, data diri Dosen maupun Mahasiswa. Untuk masuk anda dapat memilih pilihan gambar Login yang tertera di samping kanan, memasukan Username dan Password anda, kemudian menekan tombol login. Jika mengalami kesulitan silahkan menghubungi admin di emailadmin@domain.ac.id</p><p>Untuk demo masuk dengan user admin password admin. program dalam perbaikan bugs dan akan terus di update tiap hari. sesuai kebutuhan.</p>', 'SIAKAD', 'default', 'base');
