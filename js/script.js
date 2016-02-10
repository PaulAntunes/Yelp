$(document).ready(function() {	//atend que le doc soit chargé
	$('.switchBtn').click(function(){
		$('#registerZone').toggle('slow');
		$('#connexionZone').toggle('slow');
	});

	$('.closePopIn').click(function(){
		$('article').hide('slow');
	});
	//CONNEXION
	$('#connexionZone form').submit(function(event){//quand on valide le formulaire on fait la fonction
		
		event.preventDefault();	//empeche le comportement par défaut (rechargement de la page)
		
		var pseudoInput = $('#name').val(); // on récupère nos valeur dans les input
		var passInput = $('#pass').val();
		if(pseudoInput=='' || passInput==''){ // si  yen a un qu'est vide
			$('#connexionZone article p').html('Remplissez tout ! '); //  je change l'html de la div #seconde
			$('#connexionZone article').show();
		
		}else{ // sinon (il sont tout les deux remplis)
			console.log(pseudoInput + " " + passInput);   

			//appel $.POST( URL(string) , paramètres(string ou objet), callback(function) )
			$.post('php/connexion.php', $('#connexionZone form').serialize()) 
			.done(function(retour){

				if(retour == 'OK'){ 
			  		$('#connexionZone article p').html('Vous êtes connecté.'); 
			  		$('#connexionZone article').show();
			  	}else if(retour == 'KO'){
			  		$('#connexionZone article p').html('Vous devez vous inscrire.');
			  		$('#connexionZone article').show();
			  	}
			});
		}
	});

	//INSCRIPTION
	$('#registerZone form').submit(function(event){
	    event.preventDefault();

	    if($('#lastNameRegister').val() == 0 || $('#passRegister').val() == 0 || $('#emailRegister').val() == 0) { //en effet il y a un bug sinon !
	      	$('#registerZone article p').html('Remplir tous les champs.');
			$('#registerZone article').show();
	    }
	    else{
	      $.ajax({
	        type: 'POST',
	        url: 'php/inscription.php',
	        data: 'lastName=' + $('#lastNameRegister').val() + '&pass=' + $('#passRegister').val() + '&email=' + $('#emailRegister').val(),

	        success: function(msg){
	          if(msg == 'Success') {
	          	$('#registerZone article p').html('Vous êtes inscrit.');
				$('#registerZone article').show();
	          }
	          else if(msg == 'Error') {
	          	$('#registerZone article p').html('Ereur de connexion.');
				$('#registerZone article').show();
	          }else if(msg == 'Exist') {
	          	$('#registerZone article p').html('Vous êtes déjà inscrit.');
				$('#registerZone article').show();
	          }else{
	          	$('#registerZone article p').html('Erreur inconnue lors de linscription');
				$('#registerZone article').show();
	          }
	        }
	      });
	    }
	  });
})