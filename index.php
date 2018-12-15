<?php 
	session_start();
	if (!empty($_SESSION['loginname'])) {
		header('location:pages/register.php');
	}
	require'pages/connect.php';

	if (isset($_POST['submit'])) {
		 $pseudo = $_POST['loginname'];
		 $password = $_POST['loginpass'];

		if (empty($pseudo) || empty($password)) {
			$message = "Veuillez remplir tous les champs";
		}else{
			$query ="SELECT pseudo, password FROM user WHERE pseudo = :pseudo AND password = :password";
			$statement = $connection->prepare($query);
			$statement->execute(
				array(
					'pseudo' => $pseudo,
					'password' => md5($password)
				)
			);
			$count = $statement->rowCount();

			if ($count > 0) {
				$_SESSION['loginname'] = $pseudo;
				header('location:pages/register.php');
			}else{
				$message = "Username/Password is wrong";
			}
		}
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
	<body>
		<div class="login">
			<div class="login-screen">
				<div class="app-title">
					<h1>Login</h1>
				</div>
				<?php if (isset($message)) echo $message; ?>
				<form method="post" action="">
				<div class="login-form">
					<div class="control-group">
					<input type="text" class="login-field" value="" placeholder="Username" name="loginname">
					<label class="login-field-icon fui-user" for="login-name"></label>
					</div>

					<div class="control-group">
					<input type="password" class="login-field" value="" placeholder="Password" name="loginpass">
					<label class="login-field-icon fui-lock" for="login-pass"></label>
					</div>

					<button class="btn btn-primary btn-large btn-block" name="submit">login</button>
				</div>
			</div>
		</div>
	</body>
</html>