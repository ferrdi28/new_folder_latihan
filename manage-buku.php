<?php
session_start();
error_reporting(0);
include('config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:index.php');
  } else{


if(isset($_GET['del']))
		  {
		  	$bukuid=$_GET['id'];
		          mysqli_query($con,"delete from tabelbuku where id ='$bukuid'");
                  $_SESSION['msg']="data deleted !";
		  }
?>
<!DOCTYPE html>
<html lang="en">
<br>
<br>

<head>
    <title>Manage Buku</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-6.4.0-web/css/all.css">
</head>
<style>
body {
    background-image: url("buku.jpg");
}

h1 {
    color: white;
}

button{
    margin-left: 50%;
}

</style>

<body>
    <br>
    <div class="main-content">
        <div class="wrap-content container">
            <section>
                <div class="row">
                    <div class="col-sm-8">
                        <h1><b>MANAGE BUKU</b></h1>
                    </div>
                </div>
            </section>
            <br>
            <div class="container-fluid bg-light">
                <div class="row">
                    <div class="col-md-12">
                        <p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
                            <?php echo htmlentities($_SESSION['msg']="");?></p>
                        <br>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Buku</th>
                                    <th>Penulis</th>
                                    <th>Penerbit</th>
                                    <th>Jumlah</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
		$sql=mysqli_query($con,"select * from tabelbuku");
		$cnt=1;
		while($row=mysqli_fetch_array($sql))
		{
		?>

                                <tr>
                                    <td><?php echo $cnt;?>.</td>
                                    <td><?php echo $row['judulBuku'];?></td>
                                    <td><?php echo $row['penulis'];?></td>
                                    <td><?php echo $row['penerbit'];?></td>
                                    <td><?php echo $row['jumlah'];?></td>
                                    <td>
                                        <div>
                                            <a href="edit-buku.php?id=<?php echo $row['id'];?>" class="btn"><i
                                                    class="fa-sharp fa-solid fa-pen-to-square"></i></a>

                                            <a href="manage-buku.php?id=<?php echo $row['id']?>&del=delete"
                                                onClick="return confirm('Are you sure you want to delete?')"
                                                class="btn"><i class="fa fa-times fa fa-white"></i></a>
                                        </div>
                                    </td>
                                </tr>

                                <?php 
		$cnt=$cnt+1;
									 }?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row text-end">
                    <a href="add-buku.php" class="btn">
                        <i class="fa-solid fa-circle-plus fa-2xl"></i>
                    </a>
                </div>
            </div>
        </div>
        <br>
        <br>
        <a href="index.php"><button type="submit" class="btn btn-primary" name="submit">
            LOGOUT
        </button></a>
    </div>
</body>

</html>
<?php } ?>