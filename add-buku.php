<?php
session_start();
error_reporting(0);
include('config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:index.php');
  } else{

if(isset($_POST['submit']))
{	$judulBuku=$_POST['judulBuku'];
$penulis=$_POST['penulis'];
$penerbit=$_POST['penerbit'];
$jumlah=$_POST['jumlah'];
$sql=mysqli_query($con,"insert into tabelbuku(judulBuku,penulis,penerbit,jumlah) values('$judulBuku','$penulis','$penerbit','$jumlah')");
if($sql)
{
echo "<script>alert('Buku Berhasil ditambahkan');</script>";
echo "<script>window.location.href ='manage-buku.php'</script>";

}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Add Buku</title>
		<link rel="stylesheet" href="bootstrap.min.css">
	</head>
	<style>
		.container{
			margin-top: 5%;
			margin-left: 20%;
		}

		body{
			background-image: url("buku.jpg");
		}

		h1{
			color: white;
		}

	</style>
	<body>
		<div class="container">
			<section>
				<div class="row">
					<div class="col-sm-8">
						<h1 class="mainTitle"><b>ADD BUKU</b></h1>
					</div>
				</div>
			</section>
			<div class="container-fluid bg-white p-3">
				<div class="row">
					<div class="col-md-12">
						<div class="col-sm-8 col-md-12">
							<form role="form" name="adddoc" method="post">
								<center>
								<div class="row">
									<label>
										 Judul Buku
									</label>
									<input type="text" name="judulBuku" class="form-control"  placeholder="Masukkan Judul Buku" required="true">
								</div>
								<div class="row">
									<label>
										 Penulis
									</label>
									<input type="text" name="penulis" class="form-control"  placeholder="Masukkan Penulis" required="true">
								</div>
								<div class="row">
									<label>
										 Penerbit
									</label>
									<input type="text" name="penerbit" class="form-control"  placeholder="Masukkan Penerbit" required="true">
								</div>
								<div class="row">
									<label>
										 Jumlah
									</label>
									<input type="text" name="jumlah" class="form-control"  placeholder="Masukkan Jumlah" required="true">
								</div>									
								<button style="margin-top:10px;" type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
									Submit
								</button>
								</center>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
<?php } ?>