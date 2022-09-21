<!DOCTYPE html>
<html>
<head>
	<title>Rocket League</title>
	<?php include 'includes/head.php'; ?>

</head>
<body>

<?php
logged_in_redirect();
include 'includes/header.php';
?>

<div id="center_register">
	<form action="" method="post" onsubmit="return add_user();">
		<ul id="form_register">
<?php
function register_user($register_data) {
	include 'core/database/connect.php';
	$register_data['password'] = md5($register_data['password']);
	$fields = implode(', ', array_keys($register_data));
	$data = '\''.implode('\', \'', $register_data).'\'';
	$requete = "INSERT INTO users (".$fields.") VALUES (".$data.")";
	$query = $pdo->query($requete);
	// email($register_data['email'], 'Activate your account', "Hello ".$register_data['first_name'].",\n\nYou need to activate your account, so use the link below :\n\nhttp://localhost/rocketleague1/activate.php?email=".$register_data['email']."&email_code=".$register_data['email_code']."\n\nRocket League");
}

if (isset($_GET['success']) === true) {
	// header('Refresh: 5; url=index.php');
	echo '<script language="Javascript">setTimeout("document.location.replace(\'index.php\')", 5000);</script>';
	echo '<li id="success_register">You\'ve been registered successfully!<br>
	You\'ll be redirected in about 5 secs. If not, click <a href="index.php">here</a>.</li>';
} else {
	if (empty($_POST) === false) {
		$register_data = array(
			'username' 		=> htmlentities(strip_tags($_POST['username'])),
			'email' 		=> htmlentities(strip_tags($_POST['email'])),
			'password' 		=> htmlentities(strip_tags($_POST['password']))
		);
		register_user($register_data);
		// header('Location: register.php?success');
		echo '<script language="Javascript">document.location.replace("register.php?success");</script>';
		exit();
	}
?>

			<li>
				Username :<div id="legend_username">Between 3 and 32 characters</div><br>
				<input type="text" name="username" id="username_register" placeholder="Username">
			</li>
			<li>
				Email :<br>
				<input type="text" name="email" id="email_register" placeholder="Email">
			</li>
			<li>
				Confirm Email :<br>
				<input type="text" name="confirm_email" id="confirm_email_register" placeholder="Confirm Email">
			</li>
			<li>
				Password :<div id="legend_password">Minimum 8 characters with 1 lowercase character,<br>1 uppercase character and 1 number</div><br>
				<input type="password" name="password" id="password_register" placeholder="Password">
			</li>
			<li>
				Confirm Password :<br>
				<input type="password" name="confirm_password" id="confirm_password_register" placeholder="Confirm Password">
			</li>
			<ul id="errors_register"></ul>
			<li id="submit_register">
				<button type="submit" id="button_register"><div>Register</div></button>
			</li>

<?php
}
include 'includes/footer.php';
?>
		</ul>
	</form>
</div>
</body>
</html>
