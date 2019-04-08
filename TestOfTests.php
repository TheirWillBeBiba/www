<?php	
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Тесты</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
    <link href="css/style4.css" rel="stylesheet">
</head>
<body>

  <header>
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
  <div class="container">
  
    <a href="index.php" class="navbar-brand" style="font/roboto/10318.ttf">Меню</a>
  
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" 
        aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle Navigation">
      <span class="navbar-toggler-icon"></span>
      
    </button>
      
      <div class="collapse navbar-collapse" id="basicExampleNav">
      <ul class="navbar-nav mr-auto smooth-scroll">
        <li class="nav-item">
          <a href="#intro" class="nav-link waves-effect waves-light">Пользователь</a>
          </li>
        <li class="nav-item">
          <a href="#best-features" class="nav-link waves-effect waves-light">Статьи</a>
          </li>
        <li class="nav-item">
          <a href="TestOfTests.php" class="nav-link waves-effect waves-light">Тесты</a>
          </li>
        <li class="nav-item">
          <a href="#gallery" class="nav-link waves-effect waves-light">Блог</a>
          </li>
        <li class="nav-item">
          <a href="#contacts" class="nav-link waves-effect waves-light">Обратная связь</a>
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
          
  </div>
  
  </div>
  </nav>
  
  <div id="intro" class="view">
    <div class="mask rgba-black-strong">
        <div class="container-fluid d-flex align-items-center justify-content-center h=100" >
            <div class="row d-flex justify-content-center text-center">
          

        <?php

        if(!empty($_POST)):

            $q1 = $_POST['q1'];

            $q2 = $_POST['q2'];

            $q3 = $_POST['q3'];

            // check that all the data was received

            if($q1=='' or $q2=='' or $q3==''){

                echo '<p class="display-7 font-weight-bold white-text pt-5 mb-2">Вы не ответили на вопросы. <a href="TestOfTests.php">Назад</a></p>';

            }else{

                //add up the scores

                $score = 0;

                if($q1 == 1) // the correct answer for q1 is 1

                    $score++;

                if($q2 == 1) // the correct answer for q2 is 1

                    $score++;

                if($q3 == 1) // the correct answer for q3 is 1

                    $score++;



                 echo '<p class="display-7 font-weight-bold white-text pt-5 mb-2">Количество правильных ответов: <strong>'.$score.'</strong><br/><a href="TestOfTests.php" class="display-7 font-weight-bold white-text pt-5 mb-2">Назад</a></p>';

            }

        else: ?>

            <form action="TestOfTests.php" method="post">

                <div>
                  <hr>
                  <hr>
                  <hr>
                  <hr>
                  <hr>
                  <hr>
                  <hr>
                  <hr>


                    <h4 class="answer">Вопрос1: Название корневой папки в ОС Windows</h4>

                    <label class="answer"><input type="radio" name="q1" value="0" />System</label>

                    <label class="answer"><input type="radio" name="q1" value="1" />Windows</label>

                    <label class="answer"><input type="radio" name="q1" value="0" />Windows.Old</label>

                </div>

                

                <div>

                    <h4 class="answer">Вопрос2: Как называется приграмма для обозревания сети интернет</h4>

                    <label class="answer"><input type="radio" name="q2" value="1" />Браузер</label>

                    <label class="answer"><input type="radio" name="q2" value="0" />Брендмауэр</label>

                    <label class="answer"><input type="radio" name="q2" value="0" />Skype!?</label>

                </div>

                

                <div>

                    <h4 class="answer">Вопрос3: Расширение файла типа "изображение"</h4>

                    <label class="answer"><input type="radio" name="q3" value="0" />zip</label>

                    <label class="answer"><input type="radio" name="q3" value="0" />cpp</label>

                    <label class="answer"><input type="radio" name="q3" value="1" />jpg</label>

                </div>

                <div><input type="submit" value="Проверить" /></div>

            </form>

        <?php endif; ?>

              </div>
          </div>
      </div>
     
</div>
   
  
  </header>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
</body>
</html>