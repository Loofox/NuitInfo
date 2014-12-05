{literal}
<script>
//demande confirmation sur click d'un bouton supprimer
$(function() {
	//sur click d'un bouton de suppression
	$('a.glyphicon-remove').click(function(ev){
		//récupérer le href du lien
		//et l'utiliser pour le bouton de confirmation
		$('#go').attr("href",$(this).attr('href'))	

		//afficher la boite de dialogue
		$('#myModal').modal();
	
		//supprimer le comportement par défaut du lien d'origine
		ev.preventDefault();				
	})


//efface les données de la boite de dialogue après affichage
	$('body').on('hidden.bs.modal', '.modal', function () {
    	$(this).removeData('bs.modal');
    });	
	
	
});
</script>
{/literal}
<center><h1> Bienvenue sur le site de l'organisation Santa.Close().</h1><br /></center>

<h4> Nous sommes une organisation qui met en relation des personnes qui ont besoin d'aide avec des personnes ou des organisations qui veulent aider les autres.</h4>
<br/>
<h4>Si vous avez besoin d'aide, peu importe sa nature, n'hésitez pas à cliquer sur l'onglet "Demander de l'aide" dans la barre de navigation.A l'inverse, si vous avez envie d'aider les autres par l'apport de fonds, de connaissances, d'informations ou autres, cliquez sur l'onglet "Proposer de l'aide".</h4>

<h2>Tous nos conseils </h2>


	<table class='table table-striped'>
		<thead>
			<th>Titre</th><th>Date de parution</th><th>En savoir plus</th>
		</thead>
		<tbody>
		{foreach $data as $ligne=>$donnees}
			<tr class='table-striped'>
				<td>{$donnees.titre_conseil}</td>
				<td>{$donnees.date_parution}</td>
				<td>
					<!--voir le détail-->
					<a class='glyphicon glyphicon-search' 
						data-toggle="modal" 
						data-target="#inclusionModal" 
						href='?module=index&action=detail&id_tuto={$donnees.id_tuto}&type_conseil={$donnees.type_conseil}&displayModuleInDialog=1'>
					</a> 			
				</td>
			</tr>
		{foreachelse}	
			<tr><td colspan='3'>Aucune donnée</td></tr>
		{/foreach}
		</tbody>
	</table>
	

	
	
	
<!-- boite de dialogue confirmation -->
<!-- exemple du site getbootstrap -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
      </div>
      <div class="modal-body">
        Êtes vous sûr de vouloir supprimer l'enregistrement ? 
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-default" data-dismiss="modal">Fermer</a>
        <a href="#" class="btn btn-primary" id='go'>Confirmer</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

	
	
<!-- boite de dialogue inclusion-->
<div class="modal fade" id="inclusionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
	    Contenu vide remplacé par le module...
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>