<?	
	$bd_connect = mysql_connect('localhost','root','');
	if (!mysql_select_db('howto',$bd_connect)) {
		echo '<font color="red">Невозможно открыть БД</font>';
		exit;
	}
	
	if ($_POST['name']) {
		$result = mysql_query("SELECT * FROM `polzovatel` WHERE `name`='".$_POST['name']."'");
		if (mysql_num_rows($result)) {//проверка, что выбраны строки в базе данных больше 0
			$row = mysql_fetch_assoc($result);//ассоциативный массив построчно из БД
			if ($_POST['password'] == $row['password']) {
				// данные пользователя
				echo 'Праздравляем '.$row['name'].' - вы молодец!';
				exit;
				
			} else $error['password'] = '<font color="red">неверный пароль!</font>'; // неверный пароль - это ассоц массив с проверкой на наличие одной из ошибок
		} else $error['name'] = '<font color="red">неверный логин!</font>'; // неверный логин
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Интерфейс</title>
</head>

<body onload="document.loginform.login.focus();"> //убирает некоторые ненужные элементы
<form action="proba.php" name="loginform" method="post"> // даем ссылку  в «действии» на этот же файл
	<table align="center" width="250" cellpadding="5" cellspacing="2" border="0">
		<tr>
			<td bgcolor="#d3dce3" colspan="2" align="center"><b>Вход</b></td>
		</tr>
		<tr>
			<td align="right" nowrap>Логин:</td>
			<td align="left" nowrap><?=($error['name']? $error['name'].'<br>':'')?><input type="text" size="25" maxlength="25" name="name"></td>
		</tr>
		<tr>
			<td align="right" nowrap>Пароль:</td>
			<td align="left" nowrap><?=($error['password']? $error['password'].'<br>':'')?><input type="password" size="25" maxlength="25" name="password"></td>
		</tr>
		<tr>
			<td bgcolor="#d3dce3" align="right" colspan="2" valign="bottom" nowrap><input type="submit" value="войти"></td>
		</tr>
	</table>
</form>
</body>
</html>
