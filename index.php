<?php
	session_start();

	if(!isset($_SESSION['tasks'])){
		$_SESSION['tasks'] = array();
	}

	if(isset($_GET['task_name'])){
		array_push($_SESSION['tasks'], $_GET['task_name']);
		unset($_GET['task_name']);
	}

	if(isset($_GET['clear'])){
		unset($_SESSION['tasks']);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css">
	<title>Tarefas em PHP</title>
</head>
<body>
	<div class="container">
		<div class="header">
			<h1>Gerenciador de Tarefas em PHP</h1>
		</div>
		<div class="form">
			<form accept="" method="get">
				<label for="task_name">Tarefas</label>
				<input type="text" name="task_name" placeholder="Digite suas tarefas">
				<button type="submit">Cadastrar</button>
			</form>
		</div>
		<div class="separatos">

		</div>
		<div class="list-tasks">
			<?php
				if(isset($_SESSION['tasks'])){
					echo "<ul>";
						foreach ($_SESSION['tasks'] as $key => $task) {
							echo "<li>$task</li>";
						}
					echo "</ul>";
				}
			?>

			<form action="" method="get">
				<input type="hidden" name="clear" value="clear">
				<button type="submit" class="btn-clear">Limpar Tarefas</button>
			</form>
		</div>
		<?php
			include('footer.php');
		?>
	</div>
</body>
</html>