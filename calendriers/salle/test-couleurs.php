<?php //index.php ?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta name="description" content="Calendrier"/>
	<meta name="keywords" content=""/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>

	<title>Calendrier des disponibilités</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
	<link href="https://fonts.googleapis.com/css?family=Rajdhani:400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Exo:400,500,600,700" rel="stylesheet">
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" /> -->

	<link rel="stylesheet" href="./lib/css/fullcalendar.min.css" />
	<link rel="stylesheet" href="./lib/css/jquery-ui.css" />
	<link rel="stylesheet" href="./lib/css/jquery-ui.structure.min.css" />
	<link rel="stylesheet" href="./lib/css/jquery-ui-NM-flick.custom/jquery-ui.theme.css" />
	<link rel="stylesheet" href="./lib/css/calendrier.css" />
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" /> -->

	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
	<script src="./lib/js/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="./lib/js/jquery-ui.min.js"></script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script> -->
	<script src="./lib/js/moment.min.js"></script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script> -->
	<script src="./lib/js/fullcalendar.min.js"></script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script> -->
	<script src="./lib/js/gcal.js"></script>
	<script src="./lib/js/locale-all.js"></script>
	<script src="./lib/js/calendrier.js"></script>
</head>

<body>
	<div class="modal fade" id="calendrier-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="title"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p id="description"></p>
					<p>Horaires : <span id="debut"></span> - <span id="fin"></span></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
				</div>
			</div>
		</div>
	</div>

	<div id="calendrier-tooltip" data-toggle="tooltip">
		<h4 id="title"></h4>
		<p id="description"></p>
		<p>Horaires : <span id="debut"></span> - <span id="fin"></span></p>
		<p>Cliquer pour plus d'infos</p>
	</div>

	<!-- <h1 align="center"><a href="#calendrier-modal" rel="modal:open">Calendrier des disponibilités</a></h1> -->

	<div class="container">
		<div class="row mt-3">
			<div class="col">
				<button id="raj" class="btn btn-primary mr-1 active" type="button" name="raj">Rajdhani</button>
				<button id="exo" class="btn btn-primary mr-3" type="button" name="exo">Exo</button>
				<button id="weight" class="btn btn-secondary" type="button" name="weight">Gras</button>
			</div>
		</div>

		<div id="calendrier"></div>
	</div>

</body>
</html>
