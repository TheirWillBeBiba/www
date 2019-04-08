<?php 
require "includes/db.php"
 ?>
<?php if( isset($_SESSION['logged_user']) ) : ?>
	AVTORIZED<br>
	Hi, <?php echo $_SESSION['logged_user']->name; ?>!

	<hr>
	<a href="/logout.php">Vihod</a>

<?php else :  ?>
<a href="/login.php">AUT</a><br>
<a href="/signup.php">reg</a>
<?php endif; ?>
