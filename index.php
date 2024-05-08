<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Calculadora - PHP</title>
	<link rel="stylesheet" href="src/style.css">
	<link rel="stylesheet" href="src/reset.css">
</head>

<body>
	<div class="content">

		<div class="form">

			<form method="post">
				<div class="formNumbers">
					<label for="number1">Numero 1:</label>
					<input type="text" name="number1" id="number1"><br><br>

					<label for="number2">Numero 2:</label>
					<input type="text" name="number2" id="number2"><br><br>

				</div>

				<label for="operation">Escolha operacao</label><br>

				<div class="formButtons">
					<button type="submit" name="operation" value="subtraction" id="operationButton">Subtracao</button>
					<button type="submit" name="operation" value="addition" id="operationButton">Adicao</button>
					<button type="submit" name="operation" value="multiplication" id="operationButton">Multiplicacao</button>
					<button type="submit" name="operation" value="exponentiation" id="operationButton">Exponenciacao</button>
					<button type="submit" name="operation" value="division" id="operationButton">Divisao</button>
					<button type="submit" name="operation" value="squareRoot" id="operationButton">Radiciacao</button>
					<button type="submit" name="operation" value="factorial" id="operationButton">Fatorial</button><br><br>

				</div>

			</form>
		</div>


	</div>

	</div>


	<?php

	function calculateMathOperation($operation, $number1, $number2)
	{

		if (!is_numeric($number1) || !is_numeric($number2)) {
			return "<a id=\"localEcho\">Error! Prencha apenas valores válidos </a>";
		}

		switch ($operation) {
			case 'subtraction':
				$result = $number1 - $number2;
				$exibir = $result;
				break;
			case 'addition':
				$result = $number1 + $number2;
				break;
			case 'multiplication':
				$result = $number1 * $number2;
				break;
			case 'exponentiation':
				$result = pow($number1, $number2);
				break;
			case 'division':
				if ($number2 == 0) {
					return "<a id=\"localEcho\">Error! divisão por 0.</a>";
				}
				$result = $number1 / $number2;
				break;
			case 'squareRoot':
				if ($number1 + $number2 < 0) {
					return "<a id=\"localEcho\">Error!Não existe raiz de valores negativos</a>";
				} else if ($number1 + $number2 == 0) {
					$result = 0;
				} else {
					$tempVar = $number1 + $number2;
					$result = sqrt($tempVar);
				}
				break;
			case "factorial":

				$tempVar = $number1 + $number2;
				if ($tempVar < 0) {
					return "<a id=\"localEcho\">Error! Não existe fatorial de numeros negativos.</a>";
				}

				if ($tempVar == 0) {
					return "<a id=\"localEcho\">Alerta! Fatorial de 0 é 1</a>";
				}

				if($tempVar == 1){
					return "<a id=\"localEcho\">Alerta! Fatorial de 1 é 1</a>";
				}

				$result = 1;
				for ($i = 2; $i <= $tempVar; $i++) {
					$result *= $i;
				}

				break;
			default:
				return "<a id=\"localEcho\">Error!operacao inválida.</a>";
		}

		number_format($result, 2, ',', ' ');

		return "<a id=\"localEcho\"> Resultado: " . number_format($result, 2, ',', ' ') . "</a>";
	}


	if (isset($_POST['operation']) && isset($_POST['number1']) && isset($_POST['number2'])) {
		$operation = $_POST['operation'];
		$number1 = $_POST['number1'];
		$number2 = $_POST['number2'];

		$result = calculateMathOperation($operation, $number1, $number2);
		echo $result;
	} else {
		echo '<a id="localEcho">Preencha valores nos campos</a>';
	}

	?>

	<footer>
		<p>&copy; 2024 Calculadora - PHP - Developd by Gabriel Santos Camargo All rights reserved.</p>
	</footer>

</body>

</html>