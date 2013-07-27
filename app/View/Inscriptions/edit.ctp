
<?php if(isset($inscription)){
	
	
?>







<h1>Modifier mon inscription</h1>
<?php
echo $this->Html->script('licence');
echo $this->Html->script('bootstrap-button');
echo $this->Form->create('Inscription',array('class'=>'well'));
?>

<div class="input-append control-group">
  <input name="data[Inscription][licence]" class="span2" value="<?php echo $inscription['Inscription']['licence']; ?>" id="licence" placeholder="N° licence FFCO ou vide" size="16" type="text">
</div>







<?php
echo '<div class="control-group">';

	echo ' <div class="controls">';
echo $this->Form->input('nom',array('value'=>$inscription['Inscription']['nom'],'placeholder'=>'Nom','label'=>false));
echo '</div>';
echo '</div>';
echo '<div class="control-group">';
echo ' <div class="controls">';
echo $this->Form->input('prenom',array('value'=>$inscription['Inscription']['prenom'],'placeholder'=>'Prénom','label'=>false));
echo '</div>';
echo '</div>';
echo '<div class="control-group">';
echo ' <div class="controls">';
echo $this->Form->input('mail',array('value'=>$inscription['Inscription']['mail'],'placeholder'=>'Email','label'=>false));
echo '</div>';
echo '</div>';

echo '<div class="control-group">';
echo ' <div class="controls">';
echo $this->Form->input('puce',array('value'=>$inscription['Inscription']['puce'],'placeholder'=>'N° SportIdent ou vide pour location','label'=>false));
echo '</div>';
echo '</div>';
echo '<div class="control-group">';
echo ' <div class="controls">';
echo $this->Form->input('club',array('value'=>$inscription['Inscription']['club'],'placeholder'=>'Club','label'=>false));
echo '</div>';
echo '</div>'; ?>


<?php if($inscription['Inscription']['sexe']=="h"){
	
	$class_homme="btn active";
	$class_femme="btn";
	
} else {
$class_homme="btn";
	$class_femme="btn active";

}?>

<div class="btn-group" data-toggle-name="sexe" data-toggle="buttons-radio" >
  <button type="button" value="h" class="<?php echo $class_homme; ?>" id="button-man" data-toggle="button">Homme</button>
  <button type="button" value="f" class="<?php echo $class_femme; ?>" id="button-woman" data-toggle="button">Femme</button>
</div>
<input type="hidden" id="value-sex" name="data[Inscription][sexe]" value="<?php echo $inscription['Inscription']['sexe']; ?>" /><br />



<?php if($inscription['Inscription']['age']=="majeur"){
	
	$class_majeur="btn active";
	$class_mineur="btn";
	
} else {
$class_majeur="btn";
	$class_mineur="btn active";

}?>

<div class="btn-group" data-toggle-name="age" data-toggle="buttons-radio" >
  <button type="button" value="majeur" class="<?php echo $class_majeur; ?>" id="button-majeur" data-toggle="button">18 ans et +</button>
  <button type="button" value="mineur" class="<?php echo $class_mineur; ?>" id="button-mineur" data-toggle="button">17 ans et -</button>
</div>
<input type="hidden" id="value-age" name="data[Inscription][age]" value="<?php echo $inscription['Inscription']['age']; ?>" /><br />


<input type="hidden" name="data[Inscription][key]" value="<?php echo $inscription['Inscription']['key']; ?>" />
<input type="hidden" name="data[Inscription][id]" value="<?php echo $inscription['Inscription']['id']; ?>" />


<div class="control-group">
<div class="controls">
<?php echo $this->Form->select('sprint', array('A'=>'A - H20 et +', 'B'=>'B - D20 et +', 'C'=>'C - H18 et -', 'D'=>'D - D18 et -', 'E'=>'E - Initiation'), array('empty'=>'Circuit du sprint', 'default'=>$inscription['Inscription']['sprint']));?>
</div>
</div>

<div class="control-group">
<div class="controls">
<?php echo $this->Form->select('nuit', array('A'=>'A - 6km (techniquement difficile)', 'B'=>'B - 4km (techniquement difficile)', 'C'=>'C - 2,5km (techniquement difficile)', 'D'=>'D - 5km facile', 'E'=>'E - 2km (facile)', 'F'=>'F - 4km sur chemins'), array('empty'=>'Circuit de la course de nuit', 'default'=>$inscription['Inscription']['nuit']));?>
</div></div>

<div class="control-group">
<div class="controls">
<?php echo $this->Form->select('dimanche', array('A'=>'A', 'B'=>'B', 'C'=>'C', 'D'=>'D'), array('empty'=>'Circuit de la course du dimanche', 'default'=>$inscription['Inscription']['dimanche']));?>
</div>
</div>
<div class="control-group">
<div class="controls">
<?php echo $this->Form->select('cave', array('oui'=>'oui', 'non'=>'non'), array('empty'=>'Visite de caves', 'default'=>$inscription['Inscription']['cave']));?>
</div>
</div>


<?php
echo $this->Form->end('Sauvegarder');
}
?>