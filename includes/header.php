<header>
	<script src="function2.js"></script>
	<div id="header">
	
		<div id="center_header">
	
			<div id="home">
				<a href="index.php" title="Home" id="light_home">
					<img src=""/>
				</a>
			</div>
			
			<div id="header_center"></div>
			
			<div id="header_right">
			
				<?php
				if (logged_in() === true) {
				?>
				
				<div id="header_profile">
					<!--<img src="images/login_black.png"/>-->
					<img src="data:image/*;base64,<?php echo base64_encode($user_data['image']);?>"/>
					<div id="header_profile_title"><?php echo $user_data['username']; ?></div>
					<div id="header_count">
						<a id="form_profile" href="profile.php">
							<button id="button_profile"><div>Profile</div></button>
						</a>
						<a id="form_logout" href="php/logout.php">
							<button id="button_deconnexion"><div>Deconnexion</div></button>
						</a>
						<hr id="login_separator">
						<ul id="form_item">
							<li id="form_add">
								<a href="add.php">
									<div>Add an Item</div>
								</a>
							</li>
							<li id="form_modify">
								<a href="modify.php">
									<div>Modify an Item</div>
								</a>
							</li>
						</ul>
					</div>
				</div>
				
				<?php
				} else {
				?>
				
				<div id="header_login">
					<!--<img src="images/login_black.png"/>-->
					<img src="images/login_black.png"/>
					<div id="header_login_title">Connexion</div>
					
					<div id="header_form">
						<form action="php/login.php" method="post" onsubmit="return connexion();">
							<ul id="form_login">
								<li id="form_email">
									<label for="email">Email</label>
									<input type="text" name="email" id="email_connexion" placeholder="Email">
								</li>
								<li id="form_password">
									<label for="password">Password</label>
									<input type="password" name="password" id="password_connexion" placeholder="Password">
								</li>
								<li>
									<button type="submit" id="button_connexion"><div>Connexion</div></button>
									<a href="forget.php" id="forget_password">Forget Password ?</a>
								</li>
							</ul>
							<ul id="errors_connexion"></ul>
						</form>
						<hr id="login_separator">
						<form action="register.php" method="post" id="form_create">
							<button type="submit" id="button_create"><div>Register</div></button>
						</form>
					</div>
				</div>
				
				<?php
				}
				?>
				
				<div id="header_options">
					<img src="images/options_black.png"/>
					<div id="header_options_title">Options</div>
					<div id="header_parameters">
						<div id="switch_language">
							<div id="language" onclick="selectLanguage(0)">EN</div> |
							<div id="language" onclick="selectLanguage(1)">FR</div>
						</div>
						<div id="switch_mode" title="Dark Mode">Dark Mode
							<label id="switch">
								<input type="checkbox" id="dark_checkbox">
								<span id="slider_mode"></span>
							</label>
						</div>
						<div id="switch_color" title="Dark Mode">Team Color
							<label id="switch">
								<input type="checkbox" id="color_checkbox">
								<span id="slider_color"></span>
							</label>
						</div>
					</div>
				</div>
			</div>
		
		</div>
		
	</div>
	
</header>

