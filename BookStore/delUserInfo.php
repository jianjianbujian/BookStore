<?
include_once("conn.php");
echo"<script type='text/javascript'>
	if(!confirm('是否删除个人信息？')){
		window.location.href='userInfo.php';
	}else{
		window.location.href='delUser.php';
	}
</script>";
?>

