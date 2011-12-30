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
include (CONF);
?>

<script type="text/javascript">

	function ajaxrefresh(){
		$("#dataplugin").load("<?php echo HOSTNAME;?>admin/plugin/report_plugin.php");
		return false;
	}
	function ajaxFileUpload()
	{
		$("#loading")
		.ajaxStart(function(){
			$(this).show();
		})
		.ajaxComplete(function(){
			$(this).hide();
			$("#fileToUpload").attr("value","");
			$("#dataplugin").load("<?php echo HOSTNAME;?>admin/plugin/report_plugin.php");
		});

		$.ajaxFileUpload
		(
			{
				url:'<?php echo HOSTNAME; ?>admin/plugin/doajaxfileupload.php',
				secureuri:false,
				fileElementId:'fileToUpload',
				dataType: 'json',
				data:{name:'logan', id:'id'},
				success: function (data, status)
				{
					if(typeof(data.error) != 'undefined')
					{
						if(data.error != '')
						{
							alert(data.error);
						}else
						{
							alert(data.msg);
						}
					}
				},
				error: function (data, status, e)
				{
					alert(e);
				}
			}
		)
		
		return false;

	}
	</script>
<img id="loading" src="<?php echo (HOSTNAME.THEMES.$themes."/images/load.gif"); ?>" style="display:none;">	
<?php
echo "<form name='form' action='' method='POST' enctype='multipart/form-data'>";
form_input("","file","fileToUpload","","","fileToUpload","<td>:</td>");
echo "<td> <button class='' id='buttonUpload' onclick='return ajaxFileUpload();'>Upload</button> <button class='' id='buttonRefresh' onclick='return ajaxrefresh();'>Show Plugin List</button></td>";
echo "</form>";
?>
<div id='dataplugin'>
</div>

