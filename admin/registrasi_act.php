<?php 
$conn_mysql = mysqli_connect("localhost","root", "", "aplikasi_penjualan");
?>
<?php
    $nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$no_telp = $_POST['no_telp'];
    $username = $_POST['username'];
	$email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
	$level = '2'; // default,

if ($password != $repassword){
	 echo '<script language="javascript">
              alert ("password tidak valid");
              window.location="registrasi.php";
              </script>';
              exit();
}else {
	$pass = md5($password);
}
	$cek_user=mysqli_query($conn_mysql,"SELECT * FROM user WHERE username='$username'");
	$data=mysqli_fetch_array($cek_user);
if ($cek_user == true  && empty($password)== true) {
        echo '<script language="javascript">
              alert ("Data Anda Tidak valid");
              window.location="registrasi.php";
              </script>';
              exit();
}else {
	if($data['username']==$username){
		 echo '<script language="javascript">
              alert ("Username Tidak valid");
              window.location="registrasi.php";
              </script>';
              exit();
	}else {
		mysqli_query($conn_mysql,"insert into user values('$username','$pass','$level')");
	$insert= mysqli_query($conn_mysql,"insert into pegawai values('','$username','$nama','$alamat','$no_telp','$email')");
	
		if ($insert) {
        echo "<script>alert('Insert Data Berhasil'); window.location.href = 'profil_pegawai.php';</script>"; 
		} else {
        echo "<script>alert('Insert Data Gagal'); window.location.href = 'registrasi.php';</script>";
		}
	}
	
}

	
?>