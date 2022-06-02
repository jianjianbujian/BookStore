<?
session_start();
include_once("conn.php");
if(!isset($_GET['bookid'])){
	//return;
	console.log("没有id");
}
$sqlS="delete from bookinfo where bookID='".$_GET['bookid']."'";
$r=mysqli_query($conn,$sqlS);
	if($r){
		echo"<script>alert('删除成功!');";
		echo"window.location.href='index.php';</script>";
	}else{
		echo"<script>alert('删除失败!');";
		echo"window.location.href='bookInfo.php?book=".$_GET['bookid']."';</script>";
	}
?>