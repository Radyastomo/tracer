<?php 
	session_start();
	$cek_id_pengguna=$_SESSION['id_pengguna'];
	$cek_level=$_SESSION['level'];
	
	if (!(isset($cek_id_pengguna)) or $cek_level!=2){
			session_destroy();
?>		<script>
			document.location.href="index.php";
		</script>
<?php 	
		} 
	include "koneksi.php";
	include_once "head.php"; 
	include_once "header.php"; 
	include_once "menu_member.php"; 
	
	$q_user=mysql_query("SELECT * from file_pengguna WHERE id_pengguna='$cek_id_pengguna'") or die ("ERROR query".mysql_error());
	$user=mysql_fetch_array($q_user);
?>
<div class="row" id="content_about">
	<div class="container">
		<h1><center> PROFILE </center></h1>
		<div class="col-md-4" style="text-align:left;">
			<h3 class="text-left">NIM</h3>
			<h3 class="text-left">Nama Lengkap</h3>
			<h3 class="text-left">Departemen</h3>
			<h3 class="text-left">Email</h3>
			<!-- <h3 class="text-left">Place of Birth</h3>
			<h3 class="text-left">Date of Birth</h3> -->
		</div>
		<div class="col-md-4" style="text-align:left;">
			<h3 class="text-left">:&nbsp <?php echo $user['nim'];?></h3>
			<h3 class="text-left">:&nbsp <?php echo $user['nama'];?></h3>
			<h3 class="text-left">:&nbsp <?php echo $user['departemen'];?></h3>
			<h3 class="text-left">:&nbsp <?php echo $user['email'];?></h3>
			<!-- <h3 class="text-left">:&nbsp <?php echo $user['tempat_lhr'];?></h3>
			<h3 class="text-left">:&nbsp <?php echo $user['tgl_lhr'];?></h3> -->
			<a href="edit_profile_member.php?id=<?php echo $cek_id_pengguna;?>"> <button type="button" class="btn btn-default btn-lg">Edit
			</button></a>
		</div>
<!-- 		<div class="col-md-4" >
			
			<a href="edit_profile_member.php?id=<?php echo $cek_id_pengguna;?>"> <button type="button" class="btn btn-default btn-lg">Edit
			</button></a>
		</div> -->
	</div>
</div>
<?php include_once "footer.php"?>