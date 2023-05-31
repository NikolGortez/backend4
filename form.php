<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="gg.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
	<title>Web4</title>
</head>
<body>

<body style="background-color: rgb(218, 196, 226);">
	<div class="form">
		<form action="" method="post">
			<br><h2 align="center" id="head2">Форма</h2>
	<?php 
		if (!empty($messages)) {
			if(isset($messages['save'])) print('<div id="messages" class="ok">'); else print('<div id="messages">');
			foreach ($messages as $message) {
				print($message);
			}
		  print('</div>');
		}
	?>
	<div class="container">
		<form action="" method="POST">
			<p><label for="name">Имя</label>
			<input name="name" <?php if (!empty($errors['name'])) {print 'class="error"';} ?> <?php if(empty($errors['name'])&&!empty($values['name'])) print 'class="ok"';?> value="<?php isset($_COOKIE['name_error'])? print trim($_COOKIE['name_error']) : print $values['name']; ?>"> </p>

			<p><label for="email">E-mail</label>
			<input type="text" id="email" name="email" <?php if(!empty($errors['email']))  print 'class="error"';?> value=<?php if(empty($errors['email'])&&!empty($values['email'])) print $values['email'];?> <?php if(empty($errors['email'])&&!empty($values['email'])) print 'class="ok"';?>> </p>
			
			<p><label for="year">Год рождения</label>
			<select id="year" name="year" <?php if(!empty($errors['year']))  print 'class="error"';?> <?php if(empty($errors['year'])&&!empty($values['year'])) print 'class="ok"';?>>
				<option selected ><?php !empty($values['year']) ? print ($values['year']) : print '' ?></option>
				<?php 
					for ($i = 1980; $i <= 2014; $i++)
						echo '<option>' . $i . '</option>';
				?>
			</select>
			
			<p><label <?php if(!empty($errors['gender'])) print 'class="error_check"'?> <?php if(empty($errors['gender'])) print 'class="ok_check"';?>>Пол:</label>
			<input type="radio" id="male" value="male" name="gender" <?php if (isset($values['gender'])&&$values['gender'] == 'male') print("checked"); ?>>Мужской
			<input type="radio" id="female" value="female" name="gender" <?php if (isset($values['gender'])&&$values['gender'] == 'female') print("checked"); ?>>Женский</p>

			<p><label <?php if(isset($_COOKIE['kon_error'])) print 'class="error_check"'?>  <?php if(empty($errors['gender'])) print 'class="ok_check"';?>>Количество конечностей:</label>
			<input type="radio" id="1" name="kon" value='1'<?php if (isset($values['kon'])&&$values['kon'] == '1') print("checked"); ?>>1
			<input type="radio" id="2" name="kon" value='2'<?php if (isset($values['kon'])&&$values['kon'] == '2') print("checked"); ?>>2
			<input type="radio" id="3" name="kon" value='3'<?php if (isset($values['kon'])&&$values['kon'] == '3') print("checked"); ?>>3
			<input type="radio" id="4" name="kon" value='4'<?php if (isset($values['kon'])&&$values['kon'] == '4') print("checked"); ?>>4</p>

			<p><label <?php if(!empty($errors['super'])) print 'class="error_check"'?> <?php if(empty($errors['gender'])&&!empty($values['gender'])) print 'class="ok_check"';?> multiple>Сверхспособности:</label> <br>
			<select name="super[]" id="super" multiple>
			<option id="immortality" value="immortality" <?php if(isset($values['super']['immortality'])&&$values['super']['immortality']=='immortality')print("selected");?>>Бессмертие</option>
			<option id="stena" value="stena" <?php if(isset($values['super']['stena'])&&$values['super']['stena']=='stena')print("selected");?>>Прохождение сквозь стены</option>
			<option id="levitation" value="levitation" <?php if(isset($values['super']['levitation'])&&$values['super']['levitation']=='levitation')print("selected");?>>Левитация</option></select></p>

			<p><label for="bio">Биография</label>
			<textarea id="bio" name="bio" <?php if(!empty($errors['bio']))  print 'class="error"';?> <?php if(empty($errors['bio'])&&!empty($values['bio'])) print 'class="ok"';?>><?php isset($_COOKIE['bio_error']) ? print trim($_COOKIE['bio_error']) : print $values['bio'] ?></textarea>
			
			<p><label <?php if(!empty($errors['contr_check'])) print 'class="error_check"'?>  <?php if(empty($errors['gender'])&&!empty($values['gender'])) print 'class="ok_check"';?>>С контрактом ознакомлен:</label>
			<input type="checkbox" id="contr_check" name="contr_check" value="contr_check" <?php if (isset($values['contr_check'])&&$values['contr_check'] == 'contr_check') print("checked"); ?>></p>
			
			<p><button type="submit" value="send">Отправить</button></p>
		</form>
	</div>
</body>
</html>