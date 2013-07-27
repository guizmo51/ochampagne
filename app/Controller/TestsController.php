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
class TestsController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
       
    }
    
    
    public function add(){
       
       
       if($this->request->is('post')){
	       
	       
	       
	       debug($this->request->data);
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