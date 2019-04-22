<?php 

ini_set("display_errors", 1);
error_reporting(-1);
require_once 'config.php';
require_once 'function.php';

if( isset($_POST['test']) ){
	$test = (int)$_POST['test'];
	unset($_POST['test']);
	$result = get_correct_answers($test);
	print_r($_POST);
	print_r($result);
	if( !is_array($result) ) exit('PILIGRIM GOVNO');
	// dannie testa
	$test_all_data = get_test_data($test);
	// 1 - массив вопрос/ответы, 2 - правильные ответы, 3 - ответы пользователя
	$test_all_data_result = get_test_data_result($test_all_data, $result);
	// print_r($_POST);
	// print_r($result);
	print_r($test_all_data_result);
	die;
}

$howto = get_howto();
 
	if (isset($_GET['test']) )
	{
		$test_id = (int)$_GET['test'];
		$test_data = get_test_data($test_id);
		if( is_array($test_data) ){
			echo $count_questions = count($test_data);
		}
	}

 ?>






<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
			<title>Test System</title>
			<link rel="stylesheet" href="css/test.css">
	</head>

	<body>
	<div class="wrap">
		
		<?php if( $howto ): ?>
			<h3>Варианты</h3>

			<?php foreach($howto as $test): ?>
				<p><a href="?test=<?=$test['id']?>"><?=$test['test_name']?></a></p>
				
			<?php endforeach; ?>

			<br><hr><br>
				<div class="content">
					
				<?php if( isset($test_data) ): ?>

				<?php if( is_array($test_data) ): ?>

				<p>Всего вопросов: <?=$count_questions?></p>


				<div class="test_data">
					<?php print_arr($test_data) ?>
				</div>


							<?php else: ?>
								Не закончен
						<?php endif; ?>

						<?php  else: ?>
							Выберите тест
					<?php endif; ?>

				</div>




			<?php else: ?>
				<h3>No TEST</h3>

		<?php endif; ?>

	</div>
		</body>

</html>