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
$('#msg').hide();
function input(){
		$('#msg').hide('4000');
		var kd_prodi = $('input#kd_prodi').val();
		var prodi = $('input#prodi').val();
		var update = $('input#update').val();
        $.ajax({
            url: "<?php echo HOSTNAME; ?>/module/prodi/proses.php",
            data: "kd_prodi="+kd_prodi+"&prodi="+prodi+"&update="+update,
            cache: false,
            success: function(msg){
                $("#output").html(msg);
                $('#msg').fadeIn('1000');
                $('#msg').fadeTo('slow',0.8);
                $('input#kd_prodi').val("");
                $('input#prodi').val("");
                $('input#update').val("no");
            }
        });
    }
    


$("#dialog").dialog({
			autoOpen: false,
			width :480,
			modal: false,
			buttons: {
				Add: function() {
					input();
				},
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			},
			open: function() {
				$tab_title_input.focus();
			},
			close: function() {
				$form[ 0 ].reset();
			}
		});

$('#add').click(function(){
	$('#dialog').dialog('open');
	return false;
	});

$('input#delete').click(function(){
	var id = $(this).attr('name');
	$.ajax({
            url: "<?php echo HOSTNAME; ?>/module/prodi/proses.php",
            data: "delete="+yes+"&id="+id,
            cache: false,
            success: function(msg){
				alert(msg);
            }
        })
});

$('input#rubah').click(function(){
	var kd_prodi = $(this).attr('kd_prodi');
	var prodi = $(this).attr('prodi');
	var update = $(this).attr('update');
	$('input#kd_prodi').val("");
	$('input#prodi').val("");
	$('input#update').val("");
	$('input#kd_prodi').val(kd_prodi);
	$('input#prodi').val(prodi);
	$('input#update').val(update);
	$('#dialog').dialog('open');
	return false;
});
