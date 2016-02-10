<?php 
require'../html/header.html';
?>

<section class="secProfile">
	<figure>
		PhotoProfil
	</figure>
	<div id="infoProfile">
		<h2>Votre Nom</h2>
		<ul>
			<li>Adresse :</li>
			<li>tel :</li>
			<li>Etudes :</li>
			<li>Plat(s) préféré(s) :</li>
			<li>tournevis préféré :</li>
		</ul>
	</div>
	<ul id="interactProfile">
		<li>
			<div>
				Téléchargez votre photo!
				<input type="file" placeholder="Votre photo">
			</div>
		</li>
		<li><a href="">Mes amis</a></li>
		<li><a href="">Mettre à jour profil</a></li>
	</ul>
	<ul id="infoProfile">
		<a href="amis">amis</a>
		<a href="nb d'avis">nb d'avis</a>
		<a href="photos">photos</a>
	</ul>
</section>
<section class="secProfile"> 
	<aside>
		<h3>vos avis récents</h3>
		<ul>
			<li>avis</li>
			<li>avis</li>
			<li>avis</li>
			<li>avis</li>
			<li>avis</li>

		</ul>
	</aside>
	<article>
		<div>
			<h2>nom business</h2>
			<figure>
				
			</figure>
			<div>
				infos business
			</div>
			<iframe src=""></iframe>
			<div>avis business</div>
		</div>
	</article>
</section>

<?php
require'../html/footer.html';
?>