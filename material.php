<?php	
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Главная</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
   <link href="css/style2.css" rel="stylesheet">
   <style>
   	@font-face{
   		font-family: Over;
   		src: url(font/roboto/Over.ttf);
   	}
   	h4{
   		font-family: Over, cursive;
   	}
   	h1{
   		font-family: Over, cursive;
   	}
   	h2{
   		font-family: Over, cursive;
   	}
   	h3{
   		font-family: Over, cursive;
   	}
   </style>
</head>

<body>
	
	<header>
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
	<div class="container">
	
		<a href="index.php" class="navbar-brand" style="font-family: Over"><big>Меню</big></a>
	
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" 
				aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle Navigation">
			<span class="navbar-toggler-icon"></span>
			
		</button>
			
			<div class="collapse navbar-collapse" id="basicExampleNav">
			<ul class="navbar-nav mr-auto smooth-scroll">
				<li class="nav-item">
					<a href="#intro" class="nav-link waves-effect waves-light" style="font-family: Over"><big>Пользователь</big></a>
					</li>
				<li class="nav-item">
					<a href="#best-features" class="nav-link waves-effect waves-light" style="font-family: Over"><big>Статьи</big></a>
					</li>
				<li class="nav-item">
					<a href="TestOfTests.php" class="nav-link waves-effect waves-light" style="font-family: Over"><big>Тесты</big></a>
					</li>
				<li class="nav-item">
					<a href="#gallery" class="nav-link waves-effect waves-light" style="font-family: Over"><big>Блог</big></a>
					</li>
				<li class="nav-item">
					<a href="#contacts" class="nav-link waves-effect waves-light" style="font-family: Over"><big>Обратная связь</big></a>
					</li>	
				</ul>
				<ul class="navbar-nav nav-flex-icons">
					<li class="nav-item">
						<a href="#" class="nav-link waves-effect waves-light">
							<i class="fa fa-youtube"></i>
							</a>
					<li class="nav-item">
						<a href="#" class="nav-link waves-effect waves-light">
							<i class="fa fa-github"></i>
							</a>
					<li class="nav-item">
						<a href="#" class="nav-link waves-effect waves-light">
							<i class="fa fa-vk"></i>
							</a>		
					</li>
					</ul>
					
	 
	 <button type="button" class="btn btn-outline-white waves-effect waves-light" onclick="showStuff();" style="font-family: Over" id="btn1"><big>Регистрация</big></button>	
	<button type="button" class="btn btn-outline-white waves-effect waves-light" onclick="showStuff2();" style="font-family: Over" id="btn2"><big>Вход</big></button>	

	<?php 
		
			
		session_start();
		require('reg.php');
		if (isset($_POST['name']) and isset($_POST['password']))
		{
			$name = $_POST['name'];
			$password = $_POST['password'];

			$query = "SELECT * FROM polzovatel WHERE name = '$name' and password='$password'";
			$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
			$count = mysqli_num_rows($result);


			if ($count == 1)
			{
				$_SESSION['name'] = $name;

			} 
			else
			{
				$fmsg = "Ошибка";
			}
			

			if ($count == 1)
			{
				$_SESSION['password'] = $password;
			}
			else 
			{
				$fmsg = "Ошибка";
			}

 		if(isset($_SESSION['name']))
 		{
 			$name = $_SESSION['name'];
 			echo "<div style='font-family: Over' id='DP'>Добро Пожаловать! </div>" . "<div id='DP'> $name </div>";
 			echo "<a href='logout.php' class='btn btn-lg btn-primary' style='font-family: Over' id='DP'> Выйти <a/>";
 		}

 		else 
		{
			session_start();
            session_destroy();
			echo "<h2><div id='Er'>Error</div></h2>";
			echo "<div id='ud'><embed src='audio/ud.mp3' autostart='true' loop='true' width='1' height='1' align='left'></embed></div>";
		} 	

		}

			?>

						<?php 
		require('reg.php');
		if (isset($_POST['name']) && isset($_POST['password']) && isset($_POST['email']))
		{
			$name = $_POST['name'];
			$email = $_POST['email'];
			$password = $_POST['password'];

			$query = "INSERT INTO polzovatel (name, email, password) VALUES ('$name', '$email', SHA('$password'))";
			$result = mysqli_query($connection, $query);

			if ($result)
			{
				$smsg = "Регистрация выполнена успешно";
			}
			else
			{
				$fsmsg = "Ошибка регистрации";
			}
		}
	 ?>

<script type="text/javascript">
	
            
	function showStuff() {
		if (document.getElementById('f1').style.display=='none')  
                     {document.getElementById('f1').style.display = 'block';
                	document.getElementById('f2').style.display = 'none'
                	document.getElementById('f3').style.display = 'none'
             		}
                 else{ document.getElementById('f1').style.display = 'none';
                		 document.getElementById('f2').style.display = 'block'
             			}
}

  			function showStuff2(){
  				if (document.getElementById('f3').style.display=='none')  
                     {document.getElementById('f3').style.display = 'block';
                	document.getElementById('f2').style.display = 'none'
                	document.getElementById('f1').style.display = 'none'
             		}
                 else{ document.getElementById('f3').style.display = 'none';
                		 document.getElementById('f2').style.display = 'block'
             			}
  			}
  			function showStuff3(){
  				if (document.getElementById('DP').style.display=='none'){
  					document.getElementById('DP').style.display ='block';
  					document.getElementById('btn1').style.display = 'none'
                	document.getElementById('btn2').style.display = 'none'
  				}
  				else {
                	document.getElementById('f1').style.display = 'block';
                	document.getElementById('btn1').style.display = 'block'
                	document.getElementById('btn2').style.display = 'block'

  				}


  			}

</script>
				</div>	
	
	</div>
	</nav>

	<div id="intro" class="view">
		<div id="f2" class="mask rgba-black-strong">
				<div class="container-fluid d-flex align-items-center justify-content-center h=100" >
						<div class="row d-flex justify-content-center text-center">
							 <div class="col-md-12">
								<hr>
								<hr>
									<h2	class="display-4 font-weight-bold white-text pt-5 mb-2">Введение</h2>
											<hr class="hr-light">
											<!--<div id="ud"><embed src="audio/ud.mp3"  autostart="true" loop="false" width="1" height="1" align="left"></embed></div>-->
								</div>
							</div>
					</div>
			</div>
			<div class="container" style="display: none" id="f1">
	<form class="form-signin" method="POST">
		<hr>
		<hr>
		<hr>
		<hr>
		<h2 class="display-7 font-weight-bold white-text pt-5 mb-2">Регистрация</h2>
		<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"><?php echo $smsg; ?></div><?php  }  ?>
		<?php if(isset($fsmsg)){ ?><div class="alert alert-danger" role="alert"><?php echo $fsmsg; ?></div><?php  }  ?>
			<input type="text" name="name" class="form-control" placeholder="Name" required>
			<input type="email" name="email" class="form-control" placeholder="Email" required>
			<input type="password" name="password" class="form-control" placeholder="Password" required>
			<button class="btn btn-lg btn-primary btn-block" type="submit" onclick="showStuff3();">Регистрация</button>

	</form>
</div>

	<div class="container" style="display: none" id="f3">
	<form class="form-signin" method="POST">
		<hr>
		<hr>
		<hr>
		<hr>

		<h2 class="display-7 font-weight-bold white-text pt-5 mb-2">Вход</h2>
		
			<input type="text" name="name" class="form-control" placeholder="Name" required>
			<input type="password" name="password" class="form-control" placeholder="Password" required>
			<button class="btn btn-lg btn-primary btn-block" type="submit" onclick="showStuff3();">Войти</button>
		
	</form>
<div>
		</div> 
	
	</header>
	<main class="mt-5">
	</main>
	<footer class="page-footer font-small unique-color-dark pt-0">
		<div class="primary-color">
			<div class="container">
				<div class="row py-4 d-flex align-items-center">
					<div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
						<h6 class="mb-0 white-text">Get connect </h6>
					</div>
					<div class="col-md-6 col-lg-7 text-center text-md-right">
						<a href="#" class="fb-ic ml-0">
							<i class="fa fa-facebook white-text mr-4"></i>
						</a>
						<a href="#" class="fb-ic ml-0">
							<i class="fa fa-vk white-text mr-4"></i>
						</a>
						<a href="#" class="fb-ic ml-0">
							<i class="fa fa-google white-text mr-4"></i>
						</a>
						<a href="#" class="fb-ic ml-0">
							<i class="fa fa-youtube white-text mr-4"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="container mt-5 mb-4 text-center text-md-left">
			<div class="row mt-3">
				<div class="col-md-3 col-lg-4 col-xl-3 mb-4">
					<h6 class="text-uppercase font-weight-bold"><strong>Our comp</strong>></h6>
					<hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width:  60px">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, fugit!</p>
				</div>

				<div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
					<h6 class="text-uppercase font-weight-bold"><strong>Prod</strong>></h6>
					<hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width:  60px">

					<p><a href="#">MDBoooooo!trap</a></p>
					<p><a href="#">MDBoooooo!trap</a></p>
					<p><a href="#">MDBoooooo!trap</a></p>
				</div>

				<div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
					<h6 class="text-uppercase font-weight-bold"><strong>Links</strong>></h6>
					<hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width:  60px">

					<p><a href="#">Acc</a></p>
					<p><a href="#">Hlep!</a></p>
					<p><a href="#">MDBoooooo!trap</a></p>
				</div>

				<div class="col-md-4 col-lg-3 col-xl-3">
					<h6 class="text-uppercase font-weight-bold"><strong>Contact</strong>></h6>
					<hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width:  60px">
					<p><i class="fa fa-home mr-3"></i>London</p>
					<p><i class="fa fa-home mr-3"></i>Moskvachkala</p>
					<p><i class="fa fa-home mr-3"></i>Kazakhstan</p>
				</div>

			</div>
		</div>
	</footer>
  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <script src="https://maps.google.com/maps/api/js?"></script>
  <script>
  	function regular_map(){
  		var var_location = new google.maps.LatLng(40.725118, -3.997699);

  		var var_mapoptions = {
  			center: var_location,
  			zoom: 8
  		};

  		var var_map = new google.maps.Map(document.getElementById("map-container"),
  			var_mapoptions);
  		var var_marker = new google.maps.Marker({
  			position: var_location,
  			map: var_map,
  			title: "New York"
  		});
  	}

  	google.maps.event.addDomListener(window, 'load', regular_map);
  </script>
</body>

</html>
