<?php 
		require "includes/db.php";

		$data = $_POST;
		if( isset($data['do_login']) ){
			$errors = array();
			$user = R::findOne('users', 'name = ?', array($data['name']));
					if( $user )
					{
						if( password_verify($data['password'], $user->password)){
						$_SESSION['logged_user'] = $user;
						echo '<div id="log" style="font-family: Over; color: green;"> Vse ZAIBIS<!br/>Pizdui <a href="connect.php">Na glavnuy</a>str</div><hr>';

						}
						else{
							$errors[] = 'password error';
					}
					}
					else
					{
						$errors[] = 'this name not finded';
					}
					if( ! empty($errors)){
						echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
	}

				}

 ?>


 <form action="login.php" method="POST">
 	
 	<p>
 			<p><strong>LOGIN</strong>:</p>
 			<input type="text" name="name" value="<?php echo @$data['name']; ?>">
 	</p>


 	<p>
 			<p><strong>PASSWORD</strong>:</p>
 			<input type="password" name="password" value="<?php echo @$data['password']; ?>">
 	</p>


		<p>
			<button type="submit" name="do_login">VOITI</button>
		</p>

 </form>