<?php  // Calendrier granges

ob_start();

?>

<div id="calendrier-tooltip" data-toggle="tooltip">
	<h4 id="title"></h4>
	<p id="description"></p>
	<p class="horaires">Horaires : <span id="debut"></span> - <span id="fin"></span></p>
	<p id="clic"></p>
</div>

<div class="container calendrier">
	<div id="calendrier"></div>
</div>

<div id="legende" class="container granges">
	<div class="row">
		<div class="col">
			<div id="gl" class="btn">Libre</div>
			<div id="pgr" class="btn">Petite grange réservée</div>
			<div id="ggr" class="btn">Grande grange réservée</div>
		</div>
	</div>
</div>

<?php
$vue = ob_get_clean();

include '../template/template.php';

?>
