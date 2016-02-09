 /* Smooth scroll */
	$("a[href^='#']").click(function(){
		var monID=$(this).attr("href");
		$('html, body').animate({
			scrollTop:$(monID).offset().top
		}, 'slow');
	});
	/*Sticky menu RWD + affichage du "retour haut"*/
	var scrollTop = 0; // init de notre valeur de référence
	$(window).scroll(function(){ // event scroll capturé
		var hauteur = $(this).scrollTop(); //stock ma position courante sur la page
		
		if (hauteur>100) { // je suis en dessous de mon nav
			$('nav').addClass('fixed'); // j'applique le sticky menu
		}else{// sinon on veut affiche le nav a sa place normale
			$('nav').removeClass('fixed');
		};

		if (vieuxScrollTop>hauteur && hauteur > 100) { // si on remonte
			$(returnUp).show('fast'); // on affiche le "retour haut"
		}else{ // sinon on le cache
			$(returnUp).hide('fast');
		}
		//on a changé de position dans la page, on maj la valeur
		vieuxScrollTop=hauteur;
	})
});