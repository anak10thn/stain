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

?>

	$('#jurusan').submit(function() {
		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			success: function(data) {
				alert(data);
				$('input#id_mahasiswa').val('');
				$('input#nim').val('');
				$('input#nama').val('');
				$('input#jk').val('');
				$('input#status_nikah').val('');
				$('input#tempat_lahir').val('');
				$('input#tgl_lahir').val('');
				$('input#asal_propinsi').val('');
				$('input#asal_kab/kota').val('');
				$('input#kewarganegaraan').val('');
				$('input#no_telp/hp').val('');
				$('input#kd_jurusan').val('');
				$('input#kd_prodi').val('');
				$('input#sekolah_asal').val('');
				$('input#jenis_sekolah').val('');
				$('input#alamat_sekolah').val('');
				$('input#kab/kota').val('');
				$('input#nama_sekolah').val('');
				$('input#thn_lulus').val('');
				$('input#jurusan').val('');
				$('input#nilai_ijazah').val('');
				$('input#jumlah_mapel').val('');
				$('input#nama_ayah').val('');
				$('input#nama_ibu').val('');
				$('input#alamat_ortu').val('');
				$('input#propinsi').val('');
				$('input#kab/kota_ortu').val('');
				$('input#kd_pos').val('');
				$('input#telp/hp_ortu').val('');
				$('input#pekerjaan').val('');
				$('input#pendidikan_ayah').val('');
				$('input#penghasilan').val('');
				$('input#photo').val('');
				$('input#update').val('no');
			}
		})
		return false;
	});
$('#tgl_lahir').datepicker({
		changeMonth:true,
		changeYear:true
	});	
