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
				$('input#id_dosen').val('');
				$('input#nama').val('');
				$('input#nip').val('');
				$('input#tempat_lahir').val('');
				$('input#tgl_lahir').val('');
				$('input#karpeg').val('');
				$('input#pendidikan_tertinggi').val('');
				$('input#nama_sekolah').val('');
				$('input#thn_ijazah').val('');
				$('input#pangkat').val('');
				$('input#golongan').val('');
				$('input#jabatan').val('');
				$('input#surat_instansi').val('');
				$('input#tgl_surat').val('');
				$('input#no_surat').val('');
				$('input#tmt').val('');
				$('input#jabatan_struktural').val('');
				$('input#photo').val('');
				$('input#npwp').val('');
				$('input#keterangan').val('');
				$('input#update').val('no');
			}
		})
		return false;
	});
	
$('#tgl_lahir').datepicker({
		changeMonth:true,
		changeYear:true
	});
	
$('#tgl_surat').datepicker({
		changeMonth:true,
		changeYear:true
	});
