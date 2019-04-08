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
   </style>
</head>

<body>

	<header>
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
	<div class="container">
	
		<a href="#" class="navbar-brand" style="font-family: Over"><big>Меню</big></a>
	
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
					<a href="material.php" class="nav-link waves-effect waves-light" style="font-family: Over"><big>Статьи</big></a>
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

			$query = "SELECT * FROM polzovatel WHERE name = '$name' and password= '$password'";
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
									<h2	class="display-4 font-weight-bold white-text pt-5 mb-2">
										Главная
											</h2>
											<hr class="hr-light">
											<h4 class="white-text my4" style="font/roboto/10318.ttf">Здесь должен быть текст</h4>
											<button class="btn btn-outline-white waves-effect waves-light"><a href="proba.php">Read More<i class="fa fa-book"></i></a></button>
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
</div>
		</div> 
	
	</header>
	<main class="mt-5">
		<div class="container">
			<section id="best-features" class="text-center">
				<h2 class="mb-5 font-weigth-bold">Best Features</h2>
				<div class="row d-flex justify-content-center mb-4">
					<div class="col-md-8">
						<p class="grey-text">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam placeat aperiam molestiae consequatur rem esse repellendus cumque at repudiandae labore.
						</p>
					</div>
				</div>
			<div class="row">
				<div class="col-md-4 mb-5">
					<i class="fa fa-archive fa-4x grey-text"></i>
					<h4 class="my-4 font-weight-bold">Архив статей</h4>
					<p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo quasi ullam veniam quaerat eveniet inventore!</p>
				</div>
				<div class="col-md-4 mb-5">
					<i class="fa fa-book fa-4x grey-text"></i>
					<h4 class="my-4 font-weight-bold">Блог</h4>
					<p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo quasi ullam veniam quaerat eveniet inventore!</p>
				</div>
				<div class="col-md-4 mb-5">
					<i class="fa fa-check fa-4x grey-text"></i>
					<h4 class="my-4 font-weight-bold">Тесты</h4>
					<p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo quasi ullam veniam quaerat eveniet inventore!</p>
				</div>
			</div>
			</section>
		</div>
			<hr class="my-5">
			<section id="tests" class="text-center">
				<h2 class="mb-5 font-weight bold">Tests</h2>
				<div class="row">
					<div class="col-lg-4 col-md-12 mb-4">
						<div class="view overlay zoom">
							<img src="https://images.pexels.com/photos/943096/pexels-photo-943096.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" class="img-fluid">

							<div class="mask flex-center"></div>
						</div>
						<h4 class="my-4 font-weight-bold">ГОЛОВА</h4>
						<p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus error, voluptas repudiandae.</p>
					</div>
					<div class="col-lg-4 col-md-6 mb-4">
						<div class="view overlay">
							<img src="https://images.pexels.com/photos/4316/technology-computer-chips-gigabyte.jpg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" class="img-fluid">
							<div class="mask flex-center rgba-red-strong"></div>
						</div>
						<h4 class="my-4 font-weight-bold">ГОЛОВА</h4>
						<p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus error, voluptas repudiandae.</p>
					</div>
					<div class="col-lg-4 col-md-6 mb-4">
						<div class="view overlay hoverable">
							<img src="https://images.pexels.com/photos/8943/computer-motherboard-pc-wires.jpg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" class="img-fluid">
							<div class="mask flex-center"></div>
						</div>
						<h4 class="my-4 font-weight-bold">ГОЛОВА</h4>
						<p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus error, voluptas repudiandae.</p>
					</div>
				</div>
			</section>
			<hr class="my-5">
			<section id="gallery">
				<h2 class="mb-5 font-weight-bold text-center">Галлерея</h2>
				<div class="row">
					<div class="col-md-6 mb-4">
						<div id="carousel-exaple-1z" class="carousel slide carousel-fade" data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="carousel-exaple-1z" data-slide-to="0" class="active"></li>
								<li data-target="carousel-exaple-1z" data-slide-to="1" class=""></li>
								<li data-target="carousel-exaple-1z" data-slide-to="2" class=""></li>
							</ol>
							<div class="carousel-inner z-depth-1-half" role="listbox">
								<div class="carousel-item active">
									<img src="img/ai-blur-codes-577585.jpg" alt="" class="d-block w-100">
								</div>
								<div class="carousel-item">
									<img src="img/brand-business-cellphone-204611.jpg" alt="" class="d-block w-100">
								</div>
								<div class="carousel-item">
									<img src="img/apartment-architectural-architecture-1451399.jpg" alt="" class="d-block w-100">
								</div>
							</div>
							<a href="#carousel-exaple-1z" class="carousel-control-prev" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							</a>
							<a href="#carousel-exaple-1z" class="carousel-control-next" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
							</a>
						</div>
					</div>
					<div class="col-md-6">
						<h4 class="mb-3">
							<strong>Title</strong>
							<p>Lorem ipsum dolor sit.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
							<p>Lorem ipsum dolor sit amet.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem molestiae, aspernatur sequi sapiente quaerat, cupiditate.</p>
							<p>by <a><strong>It's Me</strong></a>,14/12/2k18</p>
							<a href="" class="btn btn-primary btn-md waves-effect waves-light">Read more
							</a>
						</h4>
					</div>
				</div>
			</section>

			<hr class="my-5">
			<section id="contacts">
				<h2 class="mb-5 font-weight-bold text-center">
					Связаться</h2>
					<div class="row">
						<div class="col-lg-5 col-md-12">
							<form class="p-5">
								<div class="md-form form-sm">
									<i class="fa fa-user prefix grey-text"></i>
									<input type="text" id="form3" class="form-control form-control-sm">
									<label for="form3">Name</label>
								</div>
								<div class="md-form form-sm">
									<i class="fa fa-envelope prefix grey-text"></i>
									<input type="text" id="form2" class="form-control form-control-sm">
									<label for="form2">Email</label>
								</div>
								<div class="md-form form-sm">
									<i class="fa fa-tag prefix grey-text"></i>
									<input type="text" id="form1" class="form-control form-control-sm">
									<label for="form1">Subject</label>
								</div>
								<div class="md-form form-sm">
									<i class="fa fa-pencil prefix grey-text"></i>
									<textarea type="text" id="form" class="md-textaria form-control form-control-sm" rows="3"></textarea>
									<label for="form">Message</label>
								</div>
								<div class="text-center mt-4">
									<button class="btn btn-primary waves-effect waves-light">Отправить <i class="fa fa-paper-plane-o ml-1"></i></button>
								</div>

							</form>
						</div>
						<div class="col-lg-7 col-md-12">
							<div class="row text-center">
								<div class="col-lg-4 col-md-12 mb-3">
									<p><i class="fa fa-map fa-1x mr-2 grey-text">LonDonDon</i></p>
								</div>
								<div class="col-lg-4 col-md-6 mb-3">
									<p><i class="fa fa-building fa-1x mr-2 grey-text">Mon - Fri</i></p>
								</div>
								<div class="col-lg-4 col-md-6 mb-3">
									<p><i class="fa fa-phone fa-1x mr-2 grey-text">+148 8 228</i></p>
								</div>
							</div>
							<div id="map-container" class="z-depth-1" style="height: 400px"></div>
						</div>
					</div>
			</section>
		</div>
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
