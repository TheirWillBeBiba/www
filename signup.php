<?php 

require "includes/db.php";

$data = $_POST;

if( isset($data['do_signup']) )
{
	$errors = array();
	if( trim($data['name']) == '')
			{
				$errors[] = 'enter login!';
			}

	if( trim($data['email']) == '')
			{
				$errors[] = 'enter Email!';
			}
	

	if( $data['password'] == '')
			{
				$errors[] = 'enter password!';
			}
	if( $data['password_2'] != $data['password'])
			{
				$errors[] = 'password_2 error';
			}
	if( R::count('users', "name = ? ", array($data['name'])) > 0)
	{
		$errors[] = 'this name has benn added';
	}
	if( R::count('users', "email = ?", array($data['email'])) > 0)
	{
		$errors[] = 'this email has ben added';
	}

	if( empty($errors)){

		$user = R::dispense('users');
		$user->name = $data['name'];
		$user->email = $data['email'];
		$user->password = password_hash($data['password'],PASSWORD_DEFAULT);
		R::store($user);
		echo '<div style="color: green;">+REP</div><hr>';
	}
	else{
		echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
	}

}

?>


<form action="/signup.php" method="POST">
	
	<p>
		<p><strong>Your Name</strong>:</p>
		<input type="text" name="name" value="<?php echo @$data['name']; ?>">
	</p><p>
		<p><strong>Your Email</strong>:</p>
		<input type="email" name="email" value="<?php echo @$data['email']; ?>">
	</p>
	<p>
		<p><strong>Your Password</strong>:</p>
		<input type="password" name="password">
	</p>
		<p>
		<p><strong>RE-enter your Password</strong>:</p>
		<input type="password" name="password_2">
	</p>

		<p>
			<button type="submit" name="do_signup">Registration</button>
		</p>





</form>