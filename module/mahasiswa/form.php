<?php
/*
 *      This program is free software; you can redistribute it and/or modify
 *      it under the terms of the GNU General Public License as published by
 *      the Free Software Foundation; either version 2 of the License, or
 *      (at your option) any later version.
 *      
 *      This program is distributed in the hope that it will be useful,
 *      but WITHOUT ANY WARRANTY; without even the implied warranty of
 *      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *      GNU General Public License for more details.
 *      
 *      You should have received a copy of the GNU General Public License
 *      along with this program; if not, write to the Free Software
 *      Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 *      MA 02110-1301, USA.
 * 		
 * 		created by ibnu yahya <ibnu.yahya@toroo.org>
 * 
 */
$array_label = array("Id Mahasiswa : ","Nim : ","Nama : ","Jenis Kelamin : ","Status Nikah : ","Tempat Lahir : ","Tanggal Lahir : ","Asal Propinsi ; ","Asal Kab/Kota : ","Kewarganegaraan : ","No Telp/Hp : ","Kode Jurusan : ","Kode Prodi : ","Sekolah Asal : ","Jenis Sekolah : ","Alamat Sekolah : ","Kab/Kota : ","Nama Sekolah : ","Tahun Lulus : ","Jurusan : ","Nilai Ijazah : ","Jumlah Mapel : ","Nama Ayah : ","Nama Ibu : ","Alamat Ortu : ","Propinsi : ","Kab/Kota Ortu : ","Kode Pos : ","No Telp/Hp Ortu : ","Pekerjaan : ","Pendidikan Ayah : ","Penghasilan : ","Photo : ","","");
$array_type = array("text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","text","hidden","submit");
$array_name = array("id_mahasiswa","nim","nama","jk","status_nikah","tempat_lahir","tgl_lahir","asal_propinsi","asal_kab/kota","kewarganegaraan","no_telp/hp","kd_jurusan","kd_prodi","sekolah_asal","jenis_sekolah","kab/kota","nama_sekolah","thn_lulus","jurusan","nilai_ijazah","jumlah_mapel","nama_ayah","nama_ibu","alamat_ortu","propinsi","kab/kota_ortu","kd_pos","telp/hp_ortu","pekerjaan","pendidikan_ayah","penghasilan","photo","update","kirim");
$array_value = array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","no","Submit");
$tag_app = "<tr><td><fieldset>:</fieldset></td></tr>";
$tag_opt = "<tr><td><div id='button'>:</div></td></tr>";
$array_class = "effect";
$array_id = $array_name;
$input_tag = array($tag_app,$tag_app,$tag_app,$tag_app,$tag_app,$tag_app,$tag_app,$tag_app,$tag_app,$tag_app,$tag_app,$tag_app,$tag_app,$tag_app,$tag_app,$tag_app,$tag_app,$tag_app,$tag_app,$tag_app,$tag_app,$tag_app,$tag_app,$tag_app,$tag_app,$tag_app,$tag_app,$tag_app,$tag_app,$tag_app,$tag_app,$tag_app,$tag_app,$tag_opt,$tag_opt);
echo ("<form  id='".$modul_name."' action='".HOSTNAME."plugin/".$modul_name."/proses.php' method='POST'><center><table border='0'>");
tcake_form::show('form')->view($array_label,$array_type,$array_name,$array_value,$array_class,$array_id,$input_tag);
echo ("</table></center></form>");

?>

