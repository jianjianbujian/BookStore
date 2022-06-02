<?
session_start();
include_once("conn.php");
if(!isset($_SESSION['userid'])){
	//return;
	console.log("没有id");
}
$sqlS="delete from userinfo where userId='".$_SESSION['userid']."'";
$r=mysqli_query($conn,$sqlS);
	if($r){
		echo"<script>alert('删除成功!');";
		echo"window.location.href='zhuxiao.php';</script>";
	}else{
		echo"<script>alert('删除失败!');";
		echo"window.location.href='userInfo.php';</script>";
	}
?>