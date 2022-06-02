<?
	$conn=mysqli_connect("127.0.0.1","root","ljx15717294037","bookdb");
	mysqli_query($conn,"set names utf8");
	header("Content-type:text/html;charset=utf-8");
	if(mysqli_connect_errno()){
		die("连接失败".mysqli_connect_error());
	}else{
		//echo"连接成功";
	}
?>