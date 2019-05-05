<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $_SESSION['title']; ?></title>
</head>
<body>
	<h3><?php echo $_SESSION['title']; ?></h3>
	<div>
		<p><?php echo $_SESSION['output']; ?></p>
	</div>
	<div>
		<form action="index.php" method="post">
			<input type="<?php if($_SESSION['logged']){
				echo 'hidden';
				}else{
					echo 'submit';
				}; ?>" name="action" value="Авторизация" />
		</form>
	</div>
	<div>
		<form action="index.php" method="post">
			<input type="<?php if(!$_SESSION['authorise']){
				echo 'hidden';
				}else{
					echo 'text';
				}; ?>" name="login" value="login" placeholder="login"/>
			<input type="<?php if(!$_SESSION['authorise']){
				echo 'hidden';
				}else{
					echo 'password';
				}; ?>" name="password" value="password" placeholder="password"/>
			<input type="<?php if(!$_SESSION['authorise']){
				echo 'hidden';
				}else{
					echo 'submit';
				}; ?>" name="action" value="Войти"/>
		</form>
	</div>
	<div>
		<form action="index.php" method="post">
			<input type="<?php if(!$_SESSION['logged']){
				echo 'hidden';
				}else{
					echo 'submit';
				}; ?>" name="action" value="Выйти" />
		</form>
	</div>
</body>
</html>