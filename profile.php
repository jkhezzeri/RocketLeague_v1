<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<?php include 'includes/head.php'; ?>
	
</head>
<body>

<?php
// protect_page();
include 'includes/header.php';
?>
	
	<div id="center_profile">
		
		<?php
			/*if(isset($_POST['submit_change_username'])) {
				$blob = '0x'.bin2hex(file_get_contents($_FILES['change_image']['tmp_name']));
				$requete = "UPDATE users SET image = ".$blob." WHERE id = ".$user_data['id']."";
				$query = $pdo->query($requete);
			}*/
		?>
		
		<div id="profile_slides">
			<div id="slide_general" onclick="profileGeneral()">General</div>
			<div id="slide_preferences" onclick="profilePreferences()">Preferences</div>
		</div>
		
		<div id="profile_general">
			<ul id="profile_username">
				<li>
					Username :<br>
					<input type="text" name="username" id="username_profile" value="<?php echo $user_data['username'];?>" placeholder="Username">
				</li>
				<li id="profile_label_username">
					<div id="label_username">Change Username</div>
					<!--<div id="success_username">Your username has been modified.</div>-->
				</li>
				<li id="profile_new_username">
					New Username :<div id="legend_username">Between 3 and 32 characters</div><br>
					<input type="text" name="new_username" id="new_username_profile" placeholder="New Username">
				</li>
				<ul id="errors_username"></ul>
				<li id="submit_new_username">
					<button id="button_cancel_username" class="cancel"><div>Cancel</div></button>
					<button type="submit" id="button_change_username" class="change"><div>Change</div></button>
				</li>
			</ul>
			<form id="profile_image" method="post" action="" enctype="multipart/form-data">
				<ul>
					<li id="change_image_success">
						<?php
						if (empty($_POST) === false) {
							echo 'Your profile image has been modified.';
						}
						?>
					</li>
					<li>
						<div id="profile_image_label">
							Image :<br>
							<label for="image_profile" id="label_image">Change Image</label>
							<input type="file" name="change_image" id="image_profile" accept="image/*">
						</div>
						<div id="image_profile_view">
							<img src="data:image/*;base64,<?php echo base64_encode($user_data['image']);?>" id="current_profile_image"/>
							<div id="arrow_image">→</div>
							<img src="" id="new_profile_image"/>
						</div>
					</li>
					<li id="submit_new_image">
						<button type="button" id="button_cancel_image" class="cancel"><div>Cancel</div></button>
						<button type="submit" id="button_change_username" class="change" name="submit_change_username"><div>Change</div></button>
					</li>
				</ul>
			</form>
			<ul id="profile_email">
				<li>
					Email :<br>
					<input type="text" name="email" id="email_profile" value="<?php echo $user_data['email'];?>" placeholder="Email">
				</li>
				<li id="profile_label_email">
					<div id="label_email">Change Email</div>
				</li>
				<li id="profile_new_email">
					New Email :<br>
					<input type="text" name="new_email" id="new_email_profile" placeholder="New Email">
				</li>
				<li id="submit_new_email">
					<button id="button_cancel_email" class="cancel"><div>Cancel</div></button>
					<button type="submit" id="button_change_email" class="change"><div>Change</div></button>
				</li>
			</ul>
			<ul id="profile_password">
				<li id="profile_label_password">
					<div id="label_password">Change Password</div>
				</li>
				<li id="profile_current_password">
					Current Password :<br>
					<input type="password" name="password" id="current_password_profile" placeholder="Current Password">
				</li>
				<li id="profile_new_password">
					New Password :<div id="legend_password">Minimum 8 characters with 1 lowercase character,<br>1 uppercase character and 1 number</div><br>
					<input type="password" name="password" id="new_password_profile" placeholder="New Password">
				</li>
				<li id="profile_confirm_password">
					Confirm Password :<br>
					<input type="password" name="confirm_password" id="confirm_password_profile" placeholder="Confirm Password">
				</li>
				<li id="submit_new_password">
					<button id="button_cancel_password" class="cancel"><div>Cancel</div></button>
					<button type="submit" id="button_change_password" class="change"><div>Change</div></button>
				</li>
			</ul>
			<ul id="profile_delete">
				<li id="submit_delete">
					<button type="submit" id="button_delete_account"><div>Delete Account</div></button>
				</li>
				<li id="profile_delete_password">
					Password :<br>
					<input type="password" name="password_delete" id="password_delete" placeholder="Password">
				</li>
				<li id="submit_delete_account">
					<button id="button_cancel_delete" class="cancel"><div>Cancel</div></button>
					<button type="submit" id="button_confirm_delete" class="change"><div>Confirm</div></button>
				</li>
			</ul>
		</div>
		
		<div id="profile_preferences">
			<div id="profile_options">
				
			</div>
			<div id="profile_search">
				
			</div>
		</div>
	</div>
	
<?php include 'includes/footer.php'; ?>

</body>
</html>