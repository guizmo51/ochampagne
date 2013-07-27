<?php
class Runner {
    public $nom;
    public $prenom;
    public $licence;
    public $puce;
    public $sexe;
    public $id_club;
    public $club;

  
}  
class InscriptionsController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
       
    }
    
    
    public function edit($id=null){
	   $data_tarif['majeur']['avant_majoration']['une_course']=6;
       $data_tarif['majeur']['avant_majoration']['trois_courses']=15;
        $data_tarif['majeur']['apres_majoration']['une_course']=8;
       $data_tarif['majeur']['apres_majoration']['trois_courses']=20;
        $data_tarif['mineur']['avant_majoration']['une_course']=5;
       $data_tarif['mineur']['avant_majoration']['trois_courses']=12;
        $data_tarif['mineur']['apres_majoration']['une_course']=6;
       $data_tarif['mineur']['apres_majoration']['trois_courses']=15;
       
       if($this->request->is('post')){
	       
	     
	       //On ajoute le timestamp d'inscription 
	       
	       $this->request->data['Inscription']['inscription']=time();
	       
	       
	       //On va calculer le prix à payer 
	       
	      if($this->request->data['Inscription']['age']=="majeur"){
		      
		     $majeur=true;
	      }else{
		      $majeur=false;
	      }
	       
	       
	       $cpt_course=0;
	       
	       if(!empty($this->request->data['Inscription']['sprint'])){
		       $cpt_course++;
		       
	       }
	       if(!empty($this->request->data['Inscription']['nuit'])){
		        $cpt_course++;
		       
	       }
	        if(!empty($this->request->data['Inscription']['dimanche'])){
		        $cpt_course++;
		       
	       }
	       
	       $majoration=false;
	       if(date('Y-m-d')>='2012-09-16'){
		       
		       $majoration=true;
		       
	       }
	       
	       if($cpt_course==0){
		       
		       $tarif=0;
		       
	       }else if($cpt_course==3){
		       
		       if($majeur){
			       
			       if($majoration){
				       
				       $tarif=  $data_tarif['majeur']['apres_majoration']['trois_courses'];
				       
			       }else{
				       
				       $tarif=  $data_tarif['majeur']['avant_majoration']['trois_courses'];

			       }
			       
			       
		       }else{
			         if($majoration){
				       
				       $tarif=  $data_tarif['mineur']['apres_majoration']['trois_courses'];
				       
			       }else{
				       
				       $tarif=  $data_tarif['mineur']['avant_majoration']['trois_courses'];

			       }
			       
			       
		       }
		       
		       
		       
		       
	       }else {
		       
		       
		       
		       
		       
		         if($majeur){
			       
			       if($majoration){
				       
				       $tarif=  $cpt_course*$data_tarif['majeur']['apres_majoration']['une_course'];
				       
			       }else{
				       
				       $tarif=  $cpt_course*$data_tarif['majeur']['avant_majoration']['une_course'];

			       }
			       
			       
		       }else{
			         if($majoration){
				       
				       $tarif=  $cpt_course*$data_tarif['mineur']['apres_majoration']['une_course'];
				       
			       }else{
				       
				       $tarif=  $cpt_course*$data_tarif['mineur']['avant_majoration']['une_course'];

			       }
			       
			       
		       }
		       
		       
		       
		       
	       }
	       $this->request->data['Inscription']['montant']=$tarif;
	       
	       
	       
	        $this->request->data['Inscription']['etat']="Non payé";
	        

	       if($retour=$this->Inscription->save($this->request->data)){
		       
		       
		      		        
		        if($retour['Inscription']['sexe']=="h"){
			        $retour['Inscription']['sexe']="Homme / man";
			        
		        }else {
			        $retour['Inscription']['sexe']="Femme / woman";
			        
		        }
		        
		          if($retour['Inscription']['age']=="mineur"){
			        $retour['Inscription']['age']="non";
			        
		        }else {
			        $retour['Inscription']['age']="oui";
			        
		        }
		        
		        
		        $this->set('data_inscrit', $retour);
		        
		      // dans $retour

	       }
	       
	       
	             }

	   
	   
	   
	    else{
		    
		      if(isset($id)){
	    
	    
	    
	    if($inscription=$this->Inscription->find('all', array('conditions'=>array('key' => $id)))){
	   	   $this->set('inscription', $inscription[0]);
	    
	    }else{
		    
		    
	    }
	    
	    
	    
	    
	    
	    
    }
		    
		    
	    }
	  
    
    }
    
    
    public function afficher(){
	    
	    
	   //$this->set('inscrits', $this->Inscription->find('all'));
	    $this->set('inscrits', $this->Paginate('Inscription'));
	    
	    
	    
	    
    }
    
    
    
    public function add(){
       
       $data_tarif['majeur']['avant_majoration']['une_course']=6;
       $data_tarif['majeur']['avant_majoration']['trois_courses']=15;
        $data_tarif['majeur']['apres_majoration']['une_course']=8;
       $data_tarif['majeur']['apres_majoration']['trois_courses']=20;
        $data_tarif['mineur']['avant_majoration']['une_course']=5;
       $data_tarif['mineur']['avant_majoration']['trois_courses']=12;
        $data_tarif['mineur']['apres_majoration']['une_course']=6;
       $data_tarif['mineur']['apres_majoration']['trois_courses']=15;
       
       if($this->request->is('post')){
	       
	       
	       //On ajoute le timestamp d'inscription 
	       
	       $this->request->data['Inscription']['inscription']=time();
	       
	       
	       //On va calculer le prix à payer 
	       
	      if($this->request->data['Inscription']['age']=="majeur"){
		      
		     $majeur=true;
	      }else{
		      $majeur=false;
	      }
	       
	       
	       $cpt_course=0;
	       
	       if(isset($this->request->data['Inscription']['sprint'])){
		       $cpt_course++;
		       
	       }
	       if(isset($this->request->data['Inscription']['nuit'])){
		        $cpt_course++;
		       
	       }
	        if(isset($this->request->data['Inscription']['dimanche'])){
		        $cpt_course++;
		       
	       }
	       
	       $majoration=false;
	       if(date('Y-m-d')>='2012-09-16'){
		       
		       $majoration=true;
		       
	       }
	       
	       if($cpt_course==0){
		       
		       $tarif=0;
		       
	       }else if($cpt_course==3){
		       
		       if($majeur){
			       
			       if($majoration){
				       
				       $tarif=  $data_tarif['majeur']['apres_majoration']['trois_courses'];
				       
			       }else{
				       
				       $tarif=  $data_tarif['majeur']['avant_majoration']['trois_courses'];

			       }
			       
			       
		       }else{
			         if($majoration){
				       
				       $tarif=  $data_tarif['mineur']['apres_majoration']['trois_courses'];
				       
			       }else{
				       
				       $tarif=  $data_tarif['mineur']['avant_majoration']['trois_courses'];

			       }
			       
			       
		       }
		       
		       
		       
		       
	       }else {
		       
		       
		       
		       
		       
		         if($majeur){
			       
			       if($majoration){
				       
				       $tarif=  $cpt_course*$data_tarif['majeur']['apres_majoration']['une_course'];
				       
			       }else{
				       
				       $tarif=  $cpt_course*$data_tarif['majeur']['avant_majoration']['une_course'];

			       }
			       
			       
		       }else{
			         if($majoration){
				       
				       $tarif=  $cpt_course*$data_tarif['mineur']['apres_majoration']['une_course'];
				       
			       }else{
				       
				       $tarif=  $cpt_course*$data_tarif['mineur']['avant_majoration']['une_course'];

			       }
			       
			       
		       }
		       
		       
		       
		       
	       }
	       $this->request->data['Inscription']['montant']=$tarif;
	       
	       
	       $key="";

	       $lettres="abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	       	     
	       for($i=0;$i<18;$i++){
		       //debug($i);
		       $key.=$lettres[rand(0,strlen($lettres)-1)];
	       }
	        $this->request->data['Inscription']['key']=$key;
	        $this->request->data['Inscription']['etat']="Non payé";
	

	       if($retour=$this->Inscription->save($this->request->data)){
		       
		       
		        
		        if($retour['Inscription']['sexe']=="h"){
			        $retour['Inscription']['sexe']="Homme / man";
			        
		        }else {
			        $retour['Inscription']['sexe']="Femme / woman";
			        
		        }
		        
		          if($retour['Inscription']['age']=="mineur"){
			        $retour['Inscription']['age']="non";
			        
		        }else {
			        $retour['Inscription']['age']="oui";
			        
		        }
		        
		        
		        $this->set('data_inscrit', $retour);
		        
		      // dans $retour

	       }
	       
	       
	             }
    }
    public function get_archive(){
	    
	     
	    $path_csv="http://licences.ffcorientation.fr/licencesFFCO.csv";
	    $path_json="licences.json";
	    
	    
	    
	    $alphabet="abcdefghijklmnopqrstuvwxyz";


	    if (($handle_csv = fopen($path_csv, "r")) !== FALSE) {
	    $cpt=0;
	    	while (($data_csv = fgetcsv($handle_csv, 1000, ";")) !== FALSE) {
	    	
	    	
	    		
	    	if($cpt!=0){
	    		$licence=$data_csv[0];
	    		$puce=$data_csv[1];
	    		$annee=$data_csv[4];
	    		$nom=$data_csv[2];
	    		$prenom=$data_csv[3];
	    		$sexe=$data_csv[5];
	    		$club=$data_csv[8];
	    		$id_club=$data_csv[7];
	    		
	    		
	    		
	    		$runner=new Runner();
	    		$runner->nom=$nom;
	    		$runner->prenom=$prenom;
	    		$runner->licence=$licence;
	    		$runner->puce=$puce;
	    		$runner->sexe=$sexe;
	    		$runner->club=$id_club." ".$club;
	    		$runner->annee_naiss=$annee;
	    		
	    		//$tab["lic".$licence.""]=$runner;
	    		/*$tab[$alphabet[rand(0,25)].$alphabet[rand(0,25)].$alphabet[rand(0,25)].$alphabet[rand(0,25)].$alphabet[rand(0,25)].$alphabet[rand(0,25)].$alphabet[rand(0,25)].$alphabet[rand(0,25)].$alphabet[rand(0,25)]]=$runner;*/
	    		
	    		$tab_final["".$licence.""]=$runner;
	    		unset($tab);
	    		unset($runner);
	    	}
	    	$cpt++;
	    	}
	    
	    	
	    
	    fclose($handle_csv);
	    $handle_json=fopen($path_json, "w+");
	   //sort($tab);
	    //var_dump($tab);
	    $tab_fin['licence']=$tab_final;
	    fwrite($handle_json, json_encode($tab_fin));
	    fclose($handle_json);
	    	
	    }
	   
	    
	   
	    
	    
    }
}

?>