<?
		header("Content-type:text/html;charset=utf-8");
		include_once("conn.php");
		if(isset($_POST['regsend'])){
			//书名非空验证
			function checkBN(){
							if(trim($_POST['bookName']=="")){
								echo"<script>alert('书名不能为空 ，请输入书名!');";
								echo"window.location.href='bookRegister.php';</script>";
								return false;
							}else{
								return true;
							}
						}
			
			//作者非空验证
			function checkAuthor(){
							if(trim($_POST['author']=="")){
								echo"<script>alert('作者不能为空 ，请输入作者!');";
								echo"window.location.href='bookRegister.php';</script>";
								return false;
							}else{
								return true;
							}
						}
						
			//价格验证
			function checkBP(){
							if(trim($_POST['bookPrice']=="")){
								echo"<script>alert('价格不能为空 ，请输入价格!');";
								echo"window.location.href='bookRegister.php';</script>";
								return false;
							}else if(!floatval(trim($_POST['bookPrice']))){
								echo"<script>alert('价格不是数字 ，请重新输入!');";
								echo"window.location.href='bookRegister.php';</script>";
								return false;
							}else{
								return true;
							}
						}
			
			//简介非空验证
			function checkIntroduce(){
							if(trim($_POST['bookIntroduce']=="")){
								echo"<script>alert('书籍简介不能为空 ，请输入简介!');";
								echo"window.location.href='bookRegister.php';</script>";
								return false;
							}else{
								return true;
							}
						}
			if(checkBN()&&checkAuthor()&&checkBP()&&checkIntroduce()){
				$bookName=trim($_POST["bookName"]);
				$author=trim($_POST["author"]);
				$bookPrice=floatval(trim($_POST['bookPrice']));
				$bookIntroduce=trim($_POST["bookIntroduce"]);
				$bookImage="bookcover.jpg";
				
				if(!empty($_FILES['bookImage']['name'])){
					$t=time()%10000;
					$s=rand(10000,99999);
					$bookImage=$t.$s.".".pathinfo($_FILES['bookImage']['name'],PATHINFO_EXTENSION);
					move_uploaded_file($_FILES['bookImage']['tmp_name'],"images\\".$bookImage);
				}
				//编写sql语句
				$sqls="INSERT INTO bookinfo(bookName,author,bookPrice,bookIntroduce,bookImage)
				VALUES('".$bookName."','".$author."',".$bookPrice.",'".$bookIntroduce."','".$bookImage."')";
				$r=mysqli_query($conn,$sqls);
				if($r){
						echo"<script>alert('书籍添加成功!');";
						echo"window.location.href='index.php';</script>";
					}else{
						echo"<script>alert('书籍添加失败 ，请重新添加!');";
						echo"window.location.href='bookRegister.php';</script>";
					}
			}
			
		}
?>