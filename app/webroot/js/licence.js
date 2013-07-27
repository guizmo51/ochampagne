$(document).ready(function () {
 
 $('#button-man').click(function() {
 $('#value-sex').val("h");
 
 });
 
  $('#button-woman').click(function() {
 $('#value-sex').val("f");
 
 });


 $('#button-majeur').click(function() {
 $('#value-age').val("majeur");
 
 });
 
  $('#button-mineur').click(function() {
 $('#value-age').val("mineur");
 
 });
 
 
 
 $('#recherche').click(function() {
   
    var lic=$('#licence').val();
    if(lic!=""){
	     $(this).button('loading');
	      
	          $.ajax({
    cache: false,
    dataType: 'json',
    async: false, 
    url:'/ochampagne/licences.json',
    success: function(json) {
        // do something now that the data is loaded
        data=json.licence[lic];
        if(data!==undefined){
	       $('#InscriptionNom').val(data.nom);
         $('#InscriptionPrenom').val(data.prenom);
         $('#InscriptionClub').val(data.club);
          $('#InscriptionPuce').val(data.puce);
         if(data.sexe=="H"){
         //On passe man en active
	         $('#button-man').addClass('active');
	         $('#button-woman').removeClass('active');
	         
	          $('#value-sex').val("h");
	         
         }else{
         //On passe woman en active
	         $('#button-man').removeClass('active');
	         $('#button-woman').addClass('active');
	         $('#value-sex').val("f");
	         
         }
        
       
         var majeur=false;
         if(data.annee_naiss>="1995"){
	          $('#button-mineur').addClass('active');
	         $('#button-majeur').removeClass('active');
	         $('#value-age').val("majeur");
	         
         }else{
	         $('#button-majeur').addClass('active');
	         $('#button-maineur').removeClass('active');
	         $('#value-age').val("mineur");
         }
         
         
         
         
         $('#recherche').button('complete'); 
	        
	        
        }else{
	        
	        alert("Licencié introuvable");
	        $('#licence').val("");
	         $('#recherche').button('reset');
	        
        }
        
         
    },
   
});

	    
    }
      
    
  
    
    
     
  
    return false;
});
 
 


 
});