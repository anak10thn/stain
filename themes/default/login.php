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

<html>
<title>SIAKAD FAKULTAS KEHUTANAN</title>
<head>
<?php
css_themes($themes,"login");
jquery_min();
?>
<script type="text/javascript"> 
      $(document).ready(function(){
      	$("#demo img[title]").tooltip('#demotip');
      	$("#loginadmin").hide();
      	$("#logindosen").hide();
      	$("#loginmahasiswa").hide();
      	$("#formsignupdosen").hide();
      	$("#formsignupmahasiswa").hide();
      	$("#formforgetdosen").hide();	
      	$("#formforgetmahasiswa").hide();
      	$("#signupdosen").click(
      	function(){
			$("#logindosen").hide("slow");
			$("#formsignupdosen").slideDown("slow");
      	});
      	$("#signupmahasiswa").click(
      	function(){
			$("#loginmahasiswa").hide("slow");
			$("#formsignupmahasiswa").slideDown("slow");
      	});
      	$("#forgetdosen").click(
      	function(){
			$("#logindosen").hide("slow");
			$("#formforgetdosen").slideDown("slow");
      	});
      	$("#forgetmahasiswa").click(
      	function(){
			$("#loginmahasiswa").hide("slow");
			$("#formforgetmahasiswa").slideDown("slow");
      	});
      	$("img.admin").click(
			function(){
			$("#loginadmin").slideDown("slow");
			$("#logindosen").hide("slow");
			$("#loginmahasiswa").hide("slow");	
			$("#formsignupdosen").hide();
			$("#formsignupmahasiswa").hide();
			$("#formforgetdosen").hide();
			$("#formforgetmahasiswa").hide();
			}
      	);
      	$("img.dosen").click(
			function(){
			$("#loginadmin").hide("slow");
			$("#logindosen").slideDown("slow");
			$("#loginmahasiswa").hide("slow");	
			$("#formsignupdosen").hide();	
			$("#formsignupmahasiswa").hide();	
			$("#formforgetdosen").hide();	
			$("#formforgetmahasiswa").hide();	
			}
      	);
      	$("img.mahasiswa").click(
			function(){
			$("#loginadmin").hide("slow");
			$("#logindosen").hide("slow");
			$("#loginmahasiswa").slideDown("slow");	
			$("#formsignupdosen").hide();	
			$("#formsignupmahasiswa").hide();	
			$("#formforgetdosen").hide();	
			$("#formforgetmahasiswa").hide();
			}
      	);
	});
</script>
</head>
<body>  
<div id="header"><img src="themes/default/images/logo-login.png"></div>
<div id='doc' class='yui-t7'>

<div id='bd'>
	<div id='body'>
	<h2>Selamat Datang,</h2>
	<p>
		Sistem ini merupakan berisi informasi tentang kegiatan akademik <i>FAKULTAS KEHUTANAN</i> 
		Universitas Tadulako. System ini dapat memberikan informasi tentang segala sesuatu yang berhubungan 
		dengan kegiatan akademik, perkuliahan, data diri Dosen maupun Mahasiswa. Untuk masuk anda dapat 
		memilih pilihan gambar Login yang tertera di samping kanan, memasukan Username dan Password anda, 
		kemudian menekan tombol login. Jika mengalami kesulitan silahkan menghubungi admin di emailadmin@domain.ac.id
	</p>
	<p>
		Untuk demo masuk dengan user admin password admin. program dalam perbaikan bugs dan akan terus di update tiap hari.
		sesuai kebutuhan.
	</p>
	</div>
	
	<div id='login'>
		<div style="position: absolute; top: 38px; left: 237px; display: none;" id="demotip"></div>
		<div id="demo">
		<img class="admin" src="<?php echo HOSTNAME.THEMES.$themes; ?>/images/icon/admin.png" title="Jika anda ingin login sebagai 'ADMIN' silahkan memilih option ini!">
		<img class="dosen" src="<?php echo HOSTNAME.THEMES.$themes; ?>/images/icon/dosen.png" title="Option form login 'DOSEN', masukan NIP dan PASSWORD anda!">
		<img class="mahasiswa" src="<?php echo HOSTNAME.THEMES.$themes; ?>/images/icon/mahasiswa.png" title="Option form login 'MAHASISWA', masukan NIM dan PASSWORD anda!">
		
		<div id="loginadmin">
		<form method="post" action="inc/login.php/admin" name="subscribeForm">
			<fieldset>
				<label>Username: </label><input type="text" name="user">
			</fieldset>

			<fieldset>
				<label>Password: </label><input type="password" name="pass">
			</fieldset>

			<div id="button">
				<input type="submit" value="Masuk" name="subscribeForm"/>
			</div>
		</form>
		</div>
		
		<div id="logindosen">
		<form method="post" action="inc/login.php/dosen" name="subscribeForm">
			<fieldset>
				<label>N I P: </label><input type="text" name="user">
			</fieldset>

			<fieldset>
				<label>Password: </label><input type="password" name="pass">
			</fieldset>

			<div id="button">
				<a href="#" id="forgetdosen">Lupa Password</a> <a href="#" id="signupdosen">Daftar</a> <input type="submit" value="Masuk" name="subscribeForm"/>
			</div>
		</form>
		</div>
		
		<div id="formforgetdosen">
		<form method="post" action="inc/login.php/dosen" name="subscribeForm">
			<fieldset>
				<label>N I P: </label><input type="text" name="user">
			</fieldset>

			<div id="button">
				<input type="submit" value="Reset" name="subscribeForm"/>
			</div>
		</form>
		</div>
		
		<div id="formsignupdosen">
		<form method="post" action="" name="subscribeForm">
			<fieldset>
				<label>N I P : </label><input type="text" name="user">
			</fieldset>

			<fieldset>
				<label>Password : </label><input type="password" name="pass">
			</fieldset>
			
			<fieldset>
				<label>Pass Again : </label><input type="password" name="pass">
			</fieldset>
			
			<fieldset>
				<label>Email : </label><input type="password" name="pass">
			</fieldset>
			
			<div id="button">
				<input type="submit" value="SignUp" name="subscribeForm"/>
			</div>
		</form>
		</div>
		
		<div id="loginmahasiswa">
		<form method="post" action="inc/login.php/mahasiswa" name="subscribeForm">
			<fieldset>
				<label>N I M: </label><input type="text" name="user">
			</fieldset>

			<fieldset>
				<label>Password: </label><input type="password" name="pass">
			</fieldset>

			<div id="button">
				<a href="#" id="forgetmahasiswa">Lupa Password</a>  <a href="#" id="signupmahasiswa">Daftar</a> <input type="submit" value="Masuk" name="subscribeForm"/>
			</div>
		</form>
		</div>
		
		<div id="formsignupmahasiswa">
		<form method="post" action="" name="subscribeForm">
			<fieldset>
				<label>N I M : </label><input type="text" name="user">
			</fieldset>

			<fieldset>
				<label>Password : </label><input type="password" name="pass">
			</fieldset>
			
			<fieldset>
				<label>Pass Again : </label><input type="password" name="pass">
			</fieldset>
			
			<fieldset>
				<label>Email : </label><input type="password" name="pass">
			</fieldset>
			
			<div id="button">
				<input type="submit" value="SignUp" name="subscribeForm"/>
			</div>
		</form>
		</div>
		
		<div id="formforgetmahasiswa">
		<form method="post" action="inc/login.php/dosen" name="subscribeForm">
			<fieldset>
				<label>N I M: </label><input type="text" name="user">
			</fieldset>

			<div id="button">
				<input type="submit" value="Reset" name="subscribeForm"/>
			</div>
		</form>
		</div>
		
		</div>
	</div>
</div>
</body>
</html>

