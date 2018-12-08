<!DOCTYPE html>
<html>
<head>
	<title>PENJUALAN</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.js"></script>
	<?php include 'admin/config.php'; ?>
	<style type="text/css">
	.kotak{	
		margin-top: 150px;
	}

	.kotak .input-group{
		margin-bottom: 20px;
	}
	</style>
</head>
<div class="col-md-4 col-md-offset-4 form-login">
    
    <?php
    /* handle error */
    if (isset($_GET['error'])) : ?>
        <div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>Warning!</strong> <?=base64_decode($_GET['error']);?>
        </div>
    <?php endif;?>

        <div class="outter-form-login">
            <form action="coba2.php" class="inner-login" method="post">
            <h3 class="text-center title-login">Registrasi</h3>
                <div class="form-group">
                    <input type="text" class="form-control" name="nama" placeholder="Nama">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                </div>
				 <div class="form-group">
                    <input type="text" class="form-control" name="alamat" placeholder="Alamat">
                </div>
				<div class="form-group">
                    <input type="text" class="form-control" name="no_telp" placeholder="Nomor Telephone">
                </div>
				<div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="E-Mail">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="repassword" placeholder="Re-Password">
                </div>

                <input type="submit" class="btn btn-block btn-custom-green" value="REGISTER" />
                
                <div class="text-center forget">
                    <p>Back To <a href="index.php">Login</a></p>
                </div>
            </form>
        </div>
    </div>
  </body>
</html>