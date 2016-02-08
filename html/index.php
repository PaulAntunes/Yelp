<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href='https://fonts.googleapis.com/css?family=Playfair+Display' rel='stylesheet' type='text/css'>
		<title></title>
	</head>
	<body>
		<header>
		<?php include '../header/header.html';
		?>
		<div id='logoDiv'>Yelp</div>
			<h1>Yelp</h1>
			<h2>the best way to find great local businesses</h2>
		</header>
		

		<!-- ECRAN DINSCRIPTION -->
		<div id="registerZone">
			<section>

				<form>
					<h3>Sign up for Yelp</h3>
					<table>
						<tr>
							<td><label for="firstNameRegister">Prénom</label></td>
							<td><input type="text" name="firstNameRegister" id="firstNameRegister" /></td>
						</tr>
							<tr>
							<td><label for="lastNameRegister">Name</label></td>
							<td><input type="text" name="lastNameRegister" id="lastNameRegister" /></td>
						</tr>
						<tr>
							<td><label for="emailRegister">Adresse mail</label></td>
							<td><input type="email" name="emailRegister" id="emailRegister" /></td>
						</tr>
						<tr>
							<td><label for="passRegister">Mot de passe</label></td>
							<td><input type="password" name="passRegister" id="passRegister" /></td>
						</tr>
					</table>
				    <input type="submit" value="Je m'inscrit" class="bouton" />
			    </form>

			    <button class="switchBtn">J'ai déjà un compte</button>
			</section>
			<article>
			    <aside>
					<button class="closePopIn">x</button>
					<p></p>
				</aside>
			</article>
		</div>

		<!-- ECRAN DE CONNEXION -->
		<div id="connexionZone">
			<section>
				<form>
					<h3>Indiquez vos identifiants pour vous connecter</h3>
					<table>
						<tr>
							<br><td><label for="emailConnect">Email</label></td><br/>
							<td><input type="email" name="emailConnect" id="emailConnect" /></td>
						</tr>
						<tr>
							<td><label for="passConnect">Mot de passe</label></td>
							<td><input type="password" name="passConnect" id="passConnect" /></td>
						</tr>
					</table>
				    <input type="submit" value="Je me connecte" class="bouton" />
			    </form>

			    <button class="switchBtn">créer un compte</button>
		    </section>

		    <article>
			    <aside>
					<button class="closePopIn">x</button>
					<p></p>
				</aside>
			</article>
		</div>
						<!--CONTENU-->
		<div>
			<article>
			<figure>
				<img src="https://pbs.twimg.com/profile_images/2105196522/image.jpg">
			</figure>
			<div>
				<i>nom du lieu</i>
			</div>



				<section id ="description">					
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</section>
			</article>
		</div>

		<!-- Intégration du CDN jQuery -->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</body>
	<footer>
		<h4>2016 &copy; </h4>
	</footer>
		

</html>