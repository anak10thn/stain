
CREATE TABLE IF NOT EXISTS `dosen` (
  `id_dosen` int(225) NOT NULL auto_increment,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `karpeg` varchar(50) NOT NULL,
  `pendidikan_tertinggi` varchar(50) NOT NULL,
  `nama_sekolah` varchar(50) NOT NULL,
  `thn_ijazah` varchar(50) NOT NULL,
  `pangkat` varchar(50) NOT NULL,
  `golongan` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `surat_instansi` varchar(50) NOT NULL,
  `tgl_surat` date NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `tmt` varchar(50) NOT NULL,
  `jabatan_struktural` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `npwp` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY  (`id_dosen`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


