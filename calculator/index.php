<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Calculator</title>
	<style>
		form{
			margin: 30px;
			width: 700px;
		}
		fieldset{
			height: auto;
		}
		#field1{
			margin: 10px;
		}
	</style>
</head>
<body>
	<h3>Простейший калькулятор</h3>
	<br>
	<form action="" method="post">
		<fieldset>
			<legend>
				Введите 2 аргумента в текстовые поля.
			</legend>
			<div id="field1">
				<input type="text" name="a" placeholder="Аргумент 'a'">
				<select name="operation" id="">
					<option value="Сложение">  +  </option>
					<option value="Вычитание">  -  </option>
					<option value="Умножение">  *  </option>
					<option value="Деление">  /  </option>
				</select>
				<input type="text" name="b" placeholder="Аргумент 'b'">
				<input type="submit" name="action" value="  =  ">
			

			<!-- Собственно вся процедура вычисления и проверок -->
			<?php 
				if(isset($_POST['action']) and $_POST['action'] == '  =  '){
					$a = $_POST['a'];
					$b = $_POST['b'];
					$result = 0;

					if(($a == 0) || ($b == 0)){
						$result = 'Введите оба аргумента!';
						echo $result;
					}else{
						switch ($_POST['operation']) {
							case 'Сложение':
								$result = $a+$b;
								break;
							case 'Вычитание':
								$result = $a-$b;
								break;
							case 'Умножение':
								$result = $a*$b;
								break;
							case 'Деление':
								if($b == 0){
									$result = 'На ноль делить нельзя!';
								}else{
									$result = $a/$b;
								}
								break;
						
							default:
								$result = 'Введите значения!';
								break;
						}
					}
				echo $result;
				}
				
			?>
			</div>
		</fieldset>
	</form>
	<!-- <p>
		<?php var_dump($_POST); ?>
	</p> -->
</body>
</html>