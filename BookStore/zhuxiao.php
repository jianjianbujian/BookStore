<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?
			session_start();
			session_destroy();
			echo"<script>window.location.href='index.php';</script>";
		?>
	</body>
</html>
