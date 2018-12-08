<?php 
$conn_mysql = mysqli_connect("localhost","root", "", "aplikasi_penjualan");
?>
<?php 
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
$pas=md5($password);
$query=mysqli_query($conn_mysql,"select * from user where username='$username' and password='$pas'");
$data = mysqli_fetch_array($query);
if(mysqli_num_rows($query)==1){
	$_SESSION['username']=$username;
	$_SESSION['password']=$password;
	if($data['level']=="1")
	{
		header ('location:admin/index.php');
	}
	if($data['level']=="2")
	{
		header("location:admin/index2.php");
	}
	if($data['level']=="3")
	{
		header("location:admin/index3.php");
	}
	
}else{
	header("location:index.php?pesan=gagal")or die(mysql_error());
}

 ?>