
<?php if(isset($data_inscrit)){
	
	
?>

<table class="table table-bordered">
<tr><td>Nom :</td><td><?php echo $data_inscrit['Inscription']['nom']; ?></td> </tr>
<tr><td>Prénom :</td><td><?php echo $data_inscrit['Inscription']['prenom']; ?></td> </tr>
<tr><td>Sexe :</td><td><?php echo $data_inscrit['Inscription']['sexe']; ?></td> </tr>
<tr><td>Majeur ? :</td><td><?php echo $data_inscrit['Inscription']['age']; ?></td> </tr>
<tr><td>Email :</td><td><?php echo $data_inscrit['Inscription']['mail']; ?></td> </tr>
<tr><td>Club :</td><td><?php echo $data_inscrit['Inscription']['club']; ?></td> </tr>
<tr><td>N° SportIdent :</td><td><?php echo $data_inscrit['Inscription']['puce']; ?></td> </tr>
<tr><td>Choix du circuit "Sprint" :</td><td><?php echo $data_inscrit['Inscription']['sprint']; ?></td> </tr>
<tr><td>Choix du circuit "Nuit" :</td><td><?php echo $data_inscrit['Inscription']['nuit']; ?></td> </tr>
<tr><td>Choix du circuit "Dimanche" :</td><td><?php echo $data_inscrit['Inscription']['dimanche']; ?></td> </tr>
<tr><td>Visite de caves :</td><td><?php echo $data_inscrit['Inscription']['cave']; ?></td> </tr>
<tr><td>Lien à sauvegader vous permettant d'effectuer une modification :</td><td><?php echo $this->Html->link('Editer ma fiche', array('controller'=>'inscriptions','action'=>'edit',$data_inscrit['Inscription']['key'] )); ?></td> </tr>
<tr><td>Montant de votre inscription :</td><td><?php echo $data_inscrit['Inscription']['montant'].'€' ?></td> </tr>
</table>


<br/><button href="" type="button" value="" class="" id="" data-toggle="button">Voir la liste des inscrits</button>

<?php
	
}else{
?>





<h1>Ajouter un inscrit</h1>
<?php
echo $this->Html->script('licence');
echo $this->Html->script('bootstrap-button');
echo $this->Form->create('Inscription',array('class'=>'well'));
?>
<p>Merci d'indiquer votre numéro de licence et de valider afin de pré-remplir automatiquement le formulaire</p>
<div class="input-append control-group">
  <input name="data[Inscription][licence]" class="span2" id="licence" placeholder="N° licence FFCO ou vide" size="16" type="text"><button class="btn" data-complete-text="finished!" date-toggle="Cliquez" data-text-loading="Loading..." id="recherche" type="button">Go!</button>
</div>







<?php
echo '<div class="control-group">';

	echo ' <div class="controls">';
echo $this->Form->input('nom',array('placeholder'=>'Nom','label'=>false));
echo '</div>';
echo '</div>';
echo '<div class="control-group">';
echo ' <div class="controls">';
echo $this->Form->input('prenom',array('placeholder'=>'Prénom','label'=>false));
echo '</div>';
echo '</div>';
echo '<div class="control-group">';
echo ' <div class="controls">';
echo $this->Form->input('mail',array('placeholder'=>'Email','label'=>false));
echo '</div>';
echo '</div>';

echo '<div class="control-group">';
echo ' <div class="controls">';
echo $this->Form->input('puce',array('placeholder'=>'N° SportIdent ou vide pour location','label'=>false));
echo '</div>';
echo '</div>';
echo '<div class="control-group">';
echo ' <div class="controls">';
echo $this->Form->input('club',array('placeholder'=>'Club','label'=>false));
echo '</div>';
echo '</div>'; ?>


<div class="btn-group" data-toggle-name="sexe" data-toggle="buttons-radio" >
  <button type="button" value="h" class="btn" id="button-man" data-toggle="button">Homme</button>
  <button type="button" value="f" class="btn" id="button-woman" data-toggle="button">Femme</button>
</div>
<input type="hidden" id="value-sex" name="data[Inscription][sexe]" value="h" /><br />


<div class="btn-group" data-toggle-name="age" data-toggle="buttons-radio" >
  <button type="button" value="majeur" class="btn" id="button-majeur" data-toggle="button">18 ans et +</button>
  <button type="button" value="mineur" class="btn" id="button-mineur" data-toggle="button">17 ans et -</button>
</div>
<input type="hidden" id="value-age" name="data[Inscription][age]" value="" /><br />






<div class="control-group">
<div class="controls">
<?php echo $this->Form->select('sprint', array('A'=>'A - H20 et +', 'B'=>'B - D20 et +', 'C'=>'C - H18 et -', 'D'=>'D - D18 et -', 'E'=>'E - Initiation'), array('empty'=>'Circuit du sprint'));?>
</div>
</div>

<div class="control-group">
<div class="controls">
<?php echo $this->Form->select('nuit', array('A'=>'A - 6km (techniquement difficile)', 'B'=>'B - 4km (techniquement difficile)', 'C'=>'C - 2,5km (techniquement difficile)', 'D'=>'D - 5km facile', 'E'=>'E - 2km (facile)', 'F'=>'F - 4km sur chemins'), array('empty'=>'Circuit de la course de nuit'));?>
</div></div>

<div class="control-group">
<div class="controls">
<?php echo $this->Form->select('dimanche', array('A'=>'A', 'B'=>'B', 'C'=>'C', 'D'=>'D'), array('empty'=>'Circuit de la course du dimanche'));?>
</div>
</div>
<div class="control-group">
<div class="controls">
<?php echo $this->Form->select('cave', array('oui'=>'oui', 'non'=>'non'), array('empty'=>'Visite de caves'));?>
</div>
</div>


<?php
echo $this->Form->end('Sauvegarder');
}
?>