 <h1>Liste des inscrits</h1><br/><br/>
 
 <table class="table table-bordered">
 <thead> 
 
 <tr>
	 <th>#</th>
	 <th><?php echo $this->Paginator->sort('nom','Nom'); ?></th>
	  <th><?php echo $this->Paginator->sort('prenom','Prénom'); ?></th>
	   <th><?php echo $this->Paginator->sort('puce','N° SportIdent'); ?></th>
 <th><?php echo $this->Paginator->sort('club','Club'); ?></th>
 <th><?php echo $this->Paginator->sort('sprint','Circuit "Sprint"'); ?></th>
 <th><?php echo $this->Paginator->sort('nuit','Circuit "Nuit"'); ?></th>
 <th><?php echo $this->Paginator->sort('dimanche','Circuit "Dimanche"'); ?></th>
 <th><?php echo $this->Paginator->sort('cave','Visite de caves') ?></th>
 <th><?php echo $this->Paginator->sort('inscription','Date de l\'inscription'); ?></th>
 
 </tr>
 </thead>
 <tbody>
 
 <?php $i=1; ?>
<?php foreach($inscrits as $inscrit){ ?>
	
	
<tr>
<td><?php echo $i; ?></td>

	<td><?php echo $inscrit['Inscription']['nom']; ?></td>
	<td><?php echo $inscrit['Inscription']['prenom']; ?></td>
	<td><?php echo $inscrit['Inscription']['puce']; ?></td>
		<td><?php echo $inscrit['Inscription']['club']; ?></td>
			<td><?php echo $inscrit['Inscription']['sprint']; ?></td>
			<td><?php echo $inscrit['Inscription']['nuit']; ?></td>
			<td><?php echo $inscrit['Inscription']['dimanche']; ?></td>
			<td><?php echo $inscrit['Inscription']['cave']; ?></td>
			<td><?php echo date("d/m/Y H:i:s", $inscrit['Inscription']['inscription']); ?></td>
			
			
</tr>	

	
<?php $i++; } ?>
 </tbody>
</table>