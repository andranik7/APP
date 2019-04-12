<?php

echo 'Page de connexion';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Connexion</title>
	<link rel="stylesheet" type="text/css" href="Vues/css/style.css">
</head>
<body>
	<div style="text-align: center">
		<div class="rectangle center">
			<h2 class="title">Connexion</h2>
			<div>
				<form action="" method="POST">
					<input type="text" required name="email" class="input_connexion" placeholder="Email" style="border-top-left-radius:5px; border-top-right-radius:5px;">
					<input type="password" required name="password" class="input_connexion" placeholder="Mot de passe" style="border-bottom-left-radius:5px;border-bottom-right-radius:5px;">

					<button class="btn-connect">Se connecter</button>
				</form>
				
			</div>
		</div>
	</div>

</body>
</html>
