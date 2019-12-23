
function enregistrerUtil(){
	var formUtil = new FormData(document.getElementById('formEnregUtil'));
	formUtil.append('action','enregistrerUtil');
	$.ajax({
		type : 'POST',
		url : 'Requests/requestsControleur.php',
		data : formUtil, //$('#formEnreg').serialize();
		dataType : 'json', //text pour le voir en format de string
		//async : false,
		//cache : false,
		contentType : false,
		processData : false,
		success : function (reponse){//alert(reponse);
					requestsVue(reponse);
            document.getElementById('id02').style.display='none';
            $( "#btn_connexion" ).click();
		},
		fail : function (err){
		   requestsVue("reponse");
		}
	});
    
}

function enregistrerUtil2(){
	var formUtil = new FormData(document.getElementById('formEnregUtil'));
	formUtil.append('action','enregistrerUtil2');
	$.ajax({
		type : 'POST',
		url : 'Requests/requestsControleur.php',
		data : formUtil, //$('#formEnreg').serialize();
		dataType : 'json', //text pour le voir en format de string
		//async : false,
		//cache : false,
		contentType : false,
		processData : false,
		success : function (reponse){//alert(reponse);
					requestsVue(reponse);
            document.getElementById('id02').style.display='none';
		},
		fail : function (err){
		   requestsVue("reponse");
		}
	});
    
}

function enregistrerUtil00(){
	$("formEnregUtil").ajaxSubmit({url: 'Requests/requestsControleur.php', type: 'post'})
}


function connexionUtil(){
    rep=null;
	var formConnexion = new FormData(document.getElementById('formConnexion'));
	formConnexion.append('action','connexion');
	$.ajax({
		type : 'POST',
		url : 'Requests/requestsControleur.php',
		data : formConnexion, //$('#formEnreg').serialize();
		dataType : 'json', //text pour le voir en format de string
		//async : false,
		//cache : false,
		contentType : false,
		processData : false,
		success : function (reponse){//alert(reponse);
					requestsVue(reponse);
		},
		fail : function (err){
		   
		}
	});
}



function profilUtil(){
	var formProfilUtil = new FormData();
	formProfilUtil.append('action','profilUtil');
	$.ajax({
		type : 'POST',
		url : 'Requests/requestsControleur.php',
		data : formProfilUtil,
		contentType : false, 
		processData : false,
		dataType : 'json', 
		success : function (reponse){

                requestsVue(reponse);
            
		},
		fail : function (err){
		}
	});
}

function lister(){
	var formFilm = new FormData();
	formFilm.append('action','lister');//alert(formFilm.get("action"));
	$.ajax({
		type : 'POST',
		url : 'Films/filmsControleur.php',
		data : formFilm,//{action:'lister'}
		contentType : false,
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){//alert(reponse);
					filmsVue(reponse);
		},
		fail : function (err){
		}
	});
}

function enlever(){
	var leForm=document.getElementById('formEnlever');
	var formFilm = new FormData(leForm);
	formFilm.append('action','enlever');//alert(formFilm.get("action"));
	$.ajax({
		type : 'POST',
		url : 'Films/filmsControleur.php',
		data : formFilm,//leForm.serialize(),
		contentType : false, //Enlever ces deux directives si vous utilisez serialize()
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){//alert(reponse);
					filmsVue(reponse);
		},
		fail : function (err){
		}
	});
}

function obtenirFiche(){
	$('#divFiche').hide();
	var leForm=document.getElementById('formFiche');
	var formFilm = new FormData(leForm);
	formFilm.append('action','fiche');
	$.ajax({
		type : 'POST',
		url : 'Films/filmsControleur.php',
		data : formFilm,
		contentType : false, 
		processData : false,
		dataType : 'json', 
		success : function (reponse){//alert(reponse);
					filmsVue(reponse);
		},
		fail : function (err){
		}
	});
}

function modifier(){
	var leForm=document.getElementById('formFicheF');
	var formFilm = new FormData(leForm);
	formFilm.append('action','modifier');
	$.ajax({
		type : 'POST',
		url : 'Films/filmsControleur.php',
		data : formFilm,
		contentType : false, 
		processData : false,
		dataType : 'json', 
		success : function (reponse){//alert(reponse);
					$('#divFormFiche').hide();
					filmsVue(reponse);
		},
		fail : function (err){
		}
	});
}