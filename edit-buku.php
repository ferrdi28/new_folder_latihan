<?php
session_start();
error_reporting(0);
include('config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:index.php');
  } else{

$bukuid=intval($_GET['id']);// get id
if(isset($_POST['submit']))
{
$judulBuku=$_POST['judulBuku'];
$penulis=$_POST['penulis'];
$penerbit=$_POST['penerbit'];
$jumlah=$_POST['jumlah'];
$sql=mysqli_query($con,"Update tabelbuku set judulBuku='$judulBuku',penulis='$penulis',penerbit='$penerbit',jumlah='$jumlah' where id='$bukuid'");
if($sql)
{
// $msg="Data Buku Berhasil Diperbaharui";
$_SESSION['msg']="Data Buku Berhasil Diperbaharui !";
echo "<script>window.location.href ='manage-buku.php'</script>";

}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Buku</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<style>
body {
    background-image: url("buku.jpg");
}

h1 {
    color: white;
	margin-top: 10%;
}

button {
    margin-left: 50%;
}
</style>

<body>
    <div class="container">
        <section>
            <div class="row">
                <div class="col-sm-8">
                    <h1>Edit Buku</h1>
                </div>
            </div>
        </section>
        <div class="container-fluid bg-white p-3">
            <div class="row">
                <div class="col-md-12">
                    <h5 style="color: green; font-size:18px; ">
                        <?php if($msg) { echo htmlentities($msg);}?>
                    </h5>
                    <div class="row">
                        <div class="col-sm-8 col-md-12">
                            <?php $sql=mysqli_query($con,"select * from tabelbuku where id='$bukuid'");
								while($data=mysqli_fetch_array($sql))
								{
								?>
                            <form role="form" method="post">
                                <div class="row">
                                    <label>
                                        Judul Buku
                                    </label>
                                    <input type="text" name="judulBuku" class="form-control" required="required"
                                        value="<?php echo htmlentities($data['judulBuku']);?>">
                                </div>
                                <div class="row">
                                    <label>
                                        Penulis
                                    </label>
                                    <input type="text" name="penulis" class="form-control" required="required"
                                        value="<?php echo htmlentities($data['penulis']);?>">
                                </div>
                                <div class="row">
                                    <label>
                                        Penerbit
                                    </label>
                                    <input type="text" name="penerbit" class="form-control" required="required"
                                        value="<?php echo htmlentities($data['penerbit']);?>">
                                </div>
                                <div class="row">
                                    <label>
                                        Jumlah
                                    </label>
                                    <input type="text" name="jumlah" class="form-control" required="required"
                                        value="<?php echo htmlentities($data['jumlah']);?>">
                                </div>
                                <?php } ?>
                                <button style="margin-top:10px;" type="submit" name="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php } ?>