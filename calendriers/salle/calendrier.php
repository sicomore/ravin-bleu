<?php  // Calendrier Versailles

ob_start();

?>

<div id="calendrier-tooltip" data-toggle="tooltip">
	<h4 id="title"></h4>
	<p id="description"></p>
	<p class="horaires">Horaires : <span id="debut"></span> - <span id="fin"></span></p>
	<p>Cliquer pour plus d'infos</p>
</div>

<div class="container calendrier">
	<div id="calendrier"></div>
</div>

<div id="legende" class="container versailles">
	<div class="row">
		<div class="col">
			<div id="atels" class="btn">Ateliers</div>
			<div id="atel2" class="btn">Atelier 2</div>
			<div id="atel3" class="btn">Atelier 3</div>
			<div id="chant" class="btn">Chant</div>
			<div id="events" class="btn">Événements</div>
			<div id="gym" class="btn">Gym danse</div>
			<div id="medit" class="btn">Méditation</div>
			<div id="gong" class="btn">Qi-Gong</div>
			<div id="tango" class="btn">Tango</div>
			<div id="indiv" class="btn">Thérapie individuelle</div>
			<div id="groupe" class="btn">Thérapie de groupe</div>
			<div id="yoga" class="btn">Yoga</div>
		</div>
	</div>
</div>

<?php
$vue = ob_get_clean();

include '../template/template.php';
 ?>
