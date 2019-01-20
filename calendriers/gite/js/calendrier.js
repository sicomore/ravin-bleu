$(document).ready(function() {
	var tooltipJS = document.querySelector('#calendrier-tooltip'),
	offset = {
		x: parseInt(getComputedStyle(tooltipJS).width)/2,
		y: parseInt(getComputedStyle(tooltipJS).height),
		cursor: 10
	},
	idEvent;
	moment.locale('fr');

	var calendar = $('#calendrier').fullCalendar({
		schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
		locale: 'fr',
		height: 'parent',
		contentHeight: window.innerWidth < 600 ? 'auto' : 'auto',
		// contentHeight: 'auto',
		themeSystem: 'jquery-ui',
		themeButtonIcons:{
			prev: 'ui-icon-arrowthick-1-w',
			next: 'ui-icon-arrowthick-1-e',
			prevYear: 'seek-prev',
			nextYear: 'seek-next'
		},
		googleCalendarApiKey: $apiKey,
		eventSources: [{ // Grande Grange
			googleCalendarId: 'ravinbleu.info_fruk3rqs9vvka0hsdu3c5891m8@group.calendar.google.com',
			color: '#C20000',
			textColor: '#ffffff'
		}, { // Petite Grange
			googleCalendarId: 'ravinbleu.info_utmbglk8ndrq8unvq0bugl7rb8@group.calendar.google.com',
			color: '#FFBF00',
			textColor: '#ffffff'
			// }, {
			// url: 'load.php'
		}],
		header:{
			left: window.innerWidth < 440 ? "prev,next" : 'prev,next today',
			// left: window.mobilecheck() ? "prev,next" : 'prev,next today',
			center: 'title',
			// center: window.mobilecheck() ? "" : 'title',
			right:'month,listMonth'
		},
		defaultView: window.innerWidth < 576 ? "listMonth" : "month",
		views: {
			list: {
				buttonText: 'Liste'
			},
			month: {
				columnHeaderFormat: 'dddd',
				fixedWeekCount: false
				// },
				// day: {
				// 	columnHeaderFormat: 'dddd',
			}
		},
		columnHeaderFormat: 'ddd DD/MM',
		timeFormat: 'H:mm',
		eventColor: 'rgb(0, 199, 212)', // Couleur de fond par défaut //////
		eventTextColor: '#FFFFFF', // Couleur de texte par défaut //////
		eventOrder: 'event.source.uid',
		editable: false,
		eventStartEditable: false,
		eventDurationEditable: false,
		durationEditable: false,
		eventLimit: false,
		selectable: false,
		selectHelper: true,
		// resources: [
		// 	{ id: 'a', title: 'Room A' },
		// 	{ id: 'b', title: 'Room B' },
		// 	{ id: 'c', title: 'Room C' },
		// 	{ id: 'd', title: 'Room D' }
		// ],

		eventRender: function (event, element) {
			element.css('font-weight', 500);
			// $('#calendrier-modal .modal-footer a').removeClass("disabled");
			// var eventComplet = fullEvent(event.source.googleCalendarId, event.id);
			$.ajax({
				url: 'https://www.googleapis.com/calendar/v3/calendars/'+event.source.googleCalendarId+'/events/'+event.id+'?key=' + $apiKey,
				type: 'GET',
				dataType: 'json',
				success: function(e) {
					if (e.transparency == 'transparent') {
						element[0].style.backgroundColor = '#7FDD4C';
						element[0].style.border = 'none';
						// element.css('opacity', 0.8);
						// $('#calendrier-modal .modal-footer a').addClass("disabled");
					};
				}
			});
		},

		// select: function(start, end, allDay) {
		// 	// var title = prompt("Entrer un titre :");
		// 	// var desc = prompt("Entrer une description :");
		// 	// var categorie = prompt('Catégorie : ');
		//
		// 	if (title)
		// 	{
		// 		var Estart = $.fullCalendar.formatDate(start, "Y-DD-MM-Y HH:mm");
		// 		var Eend = $.fullCalendar.formatDate(end, "Y-DD-MM-Y HH:mm");
		// 		$.ajax({
		// 			url:"insert.php",
		// 			type:"POST",
		// 			data:{title:title, description:desc, start:Estart, end:Eend, categorie: categorie},
		// 			success:function()
		// 			{
		// 				calendar.fullCalendar('refetchEvents');
		// 			}
		// 		})
		// 	}
		// },

		// eventResize:function(event) {
		// 	var start = $.fullCalendar.formatDate(event.start, "DD-MM-Y HH:mm");
		// 	var end = $.fullCalendar.formatDate(event.end, "DD-MM-Y HH:mm");
		// 	var id = event.id;
		// 	var title = event.title;
		// 	var description = event.description;
		// 	var categorie = event.categorie;
		// 	$.ajax({
		// 		url:"update.php",
		// 		type:"POST",
		// 		data:{title:title, description:description, start:start, end:end, categorie:categorie,id:id},
		// 		success:function(){
		// 			calendar.fullCalendar('refetchEvents');
		// 		}
		// 	})
		// },

		// eventDrop:function(event) {
		// 	var start = $.fullCalendar.formatDate(event.start, "DD-MM-Y HH:mm");
		// 	var end = $.fullCalendar.formatDate(event.end, "DD-MM-Y HH:mm");
		// 	var id = event.id;
		// 	var title = event.title;
		// 	var description = event.description;
		// 	var categorie = event.categorie;
		// 	$.ajax({
		// 		url:"update.php",
		// 		type:"POST",
		// 		data:{title:title, description:description, start:start, end:end, categorie:categorie,id:id},
		// 		success:function()
		// 		{
		// 			calendar.fullCalendar('refetchEvents');
		// 		}
		// 	});
		// },

		eventClick:function(event) {
			document.removeEventListener('mousemove', positionning);
			var bouton = $('#calendrier-modal .modal-footer a');
			bouton.addClass("disabled")
			bouton.removeClass("btn-primary");
			bouton.addClass("btn-default");
			bouton.attr("href", "#");
			bouton.html("");

			$.ajax({
				url: 'https://www.googleapis.com/calendar/v3/calendars/'+event.source.googleCalendarId+'/events/'+event.id+'?key=' + $apiKey,
				type: 'GET',
				dataType: 'json',
				success: function(e) {
					if (e.transparency == 'transparent') {
						bouton.removeClass("disabled");
						bouton.removeClass("btn-default");
						bouton.addClass("btn-primary");
						bouton.html("Réserver");
					} else {
						if (e.location) {
							var lien = e.location;
							lien = lien.replace(/^http[s]?:\/\//g, "")
							bouton.removeClass("disabled");
							bouton.removeClass("btn-default");
							bouton.addClass("btn-primary");
							bouton.html("Inscription");
							bouton.attr('href', 'http://' + lien);
							bouton.attr('target', '_blank');
						}
					};
				}
			});

			var id = event.id;
			var titreModal = $('#calendrier-modal').find('.modal-title');
			var descriptionModal = $('#calendrier-modal').find('#description');
			var debutModal = $('#calendrier-modal').find('#debut');
			var finModal = $('#calendrier-modal').find('#fin');
			var deb = moment(event.start).format('L');
			var fin = moment(event.end).subtract(1, 'd').format('L');
			var duree = moment.duration(event.end.diff(event.start)).asDays();
			$('#calendrier-modal .modal-footer #date').html(deb);
			if (duree > 1) $('#calendrier-modal .modal-footer #date').append(" - " + fin);

			titreModal.html('');
			descriptionModal.html('');
			debutModal.html('');
			finModal.html('');

			// Filtrage des événements provenant du Google Agenda //////////
			// if (id.length > 20) {
			titreModal.html(event.title);
			descriptionModal.html(event.description);
			debutModal.append(moment(event.start).format('LT'));
			finModal.append(moment(event.end).format('LT'));


			// Filtrage des événements provenant de la BDD //////////
			// } else {
			// 	$.ajax({
			// 		url:"modal.php",
			// 		type:"POST",
			// 		data:{id:event.id},
			// 		success: function(e)
			// 		{
			// 			var evenement = jQuery.parseJSON(e);
			// 			var evenementDebut = new Date(evenement.start_event);
			// 			var evenementFin = new Date(evenement.end_event);
			// 			titreModal.html(evenement.title);
			// 			descriptionModal.html(evenement.description);
			// 			debutModal.append(moment(evenement.start_event).format('LT'));
			// 			finModal.append(moment(evenement.end_event).format('LT'));
			// 		}
			// 	});
			// }

			$('#calendrier-modal').modal({
				// backdrop: false
			});

			// if(confirm("Etes vous certain de vouloir supprimer cet événement ?"))
			// {
			// 	var id = event.id;
			// 	$.ajax({
			// 		url:"delete.php",
			// 		type:"POST",
			// 		data:{id:id},
			// 		success:function()
			// 		{
			// 			calendar.fullCalendar('refetchEvents');
			// 		}
			// 	})
			// }
		},

		eventMouseover:function (event) {
			$('.horaires').show();
			$('.fc-event-container').css('cursor', 'pointer');
			$('.fc-list-item').css('cursor', 'pointer');
			$('#calendrier-tooltip').css('display', 'flex');
			$('#calendrier-tooltip').css('flex-flow', 'column nowrap');
			$('#calendrier-tooltip').css('justify-content', 'space-between');
			$('#calendrier-tooltip p:last-of-type').css('align-self', 'center');
			$('#clic').html('Cliquer pour plus d\'infos');
			var hauteur = (event.description) ? 300 : 150 ;
			$('#calendrier-tooltip').css('height', hauteur)
			if (idEvent !== event.id) {
				idEvent = event.id;
				var selection = this;
				var titreCours = $('#calendrier-tooltip').find('#title');
				var description = $('#calendrier-tooltip').find('#description');
				var debut = $('#calendrier-tooltip').find('#debut');
				var fin = $('#calendrier-tooltip').find('#fin');
				titreCours.html('');
				description.html('');
				debut.html('');
				fin.html('');

				// Filtrage des événements provenant du Google Agenda ////////
				// if (idEvent.length > 20) {
				titreCours.html(event.title);
				desc = event.description;

				if (desc) {
					var regexDebut = new RegExp('^(\n|\r|<br>)');

					if (regexDebut.test(desc)) {
						desc = event.description.replace(/^(\n|\r|<br>)/, '');
					}

					var regexCesure = new RegExp('(\n|\r|<br>)');
					if (regexCesure.test(desc)) {
						var cesures = [];
						cesures.push(desc.indexOf('\n'));
						cesures.push(desc.indexOf('\r'));
						cesures.push(desc.indexOf('<br>'));
						cesures.forEach(function (cesure) {
							if (cesure > 1) {
								desc = desc.substring(0, cesure);
							}
						});
					}

					var regexLien = new RegExp('<a href');
					if (regexLien.test(desc)) {
						var aDebut1 = desc.indexOf("<a href");
						var aDebut2 = desc.indexOf(">")+1;
						var aFin = desc.indexOf("</a>");
						var descRawDebut = desc.substring(0, aDebut1);
						var descRawlien = desc.substring(aDebut2, aFin);
						var descRawFin = desc.substring(aFin+4);
						desc = descRawDebut + descRawlien + descRawFin;
					}
					var descCourte = (desc.length > 250) ? desc.substring(0, 250) + ' ...' : desc;
					description.html(descCourte);
				}

				$.ajax({
					url: 'https://www.googleapis.com/calendar/v3/calendars/'+event.source.googleCalendarId+'/events/'+event.id+'?key=' + $apiKey,
					type: 'GET',
					dataType: 'json',
					success: function(e) {
						if (e.transparency == 'transparent') {
							$('#clic').html('Cliquer pour réserver')
						}
					}
				});

				if (event.allDay === false) {
					debut.html(moment(event.start).format('LT'));
					fin.html(moment(event.end).format('LT'));
				} else {
					$('.horaires').hide();
				}

				// Filtrage des événements provenant de la BDD ////////
				// } else {
				// 	$.ajax({
				// 		url:"modal.php",
				// 		type:"POST",
				// 		data:{id:idEvent},
				// 		success: function(e)
				// 		{
				// 			var evenement = jQuery.parseJSON(e);
				// 			var evenementDebut = new Date(evenement.start_event);
				// 			var evenementFin = new Date(evenement.end_event);
				// 			evenementDebut = moment(evenementDebut).format('LT');
				// 			evenementFin = moment(evenementFin).format('LT');
				// 			// evenementDebut = evenementDebut.toLocaleString('fr-FR');
				// 			// evenementFin = evenementFin.toLocaleString('fr-FR');
				// 			titreCours.html(evenement.title);
				// 			description.html(evenement.description);
				// 			debut.append(evenementDebut);
				// 			fin.append(evenementFin);
				// 		}
				// 	});
				// }
			}

			$('#calendrier-tooltip').stop().fadeIn(200).followMouseMove();

		},

		eventMouseout:function () {
			$('#calendrier-tooltip').stop().fadeOut(200);
		}

	});



	///////////////////////////////////////////////////////////
	// FUNCTIONS //////////////////////////////////////////////
	///////////////////////////////////////////////////////////

	if (window.innerWidth < 768) {
		$('.fc-center').css('margin-top', '3vh');
	}

	function formatDateFr(date) {
		return $.fullCalendar.formatDate(date, "DD-MM-Y HH:mm");
	}

	function positionning(e) {
		var positionX = e.clientX - offset.x;
		var offsetY = parseInt(getComputedStyle(tooltipJS).height);

		if (e.clientX < offset.x) { positionX = 0 };
		if (e.clientX > $(window).width() - offset.x) { positionX = $(window).width() - 2 * offset.x };
		var positionY = (e.clientY > window.innerHeight/2) ? - offsetY - offset.cursor : offset.cursor;
		$('#calendrier-tooltip').css({
			top: e.clientY + window.pageYOffset + positionY,
			left: positionX
		});
	}

	$.fn.followMouseMove = function() {
		return document.addEventListener('mousemove', positionning);
	}

	var fullEvent = function(calendarId, eventId) {
		return $.ajax({
			url: 'https://www.googleapis.com/calendar/v3/calendars/' + calendarId + '/events/' + eventId + '?key=' + $apiKey,
			type: 'GET',
			async: false,
			dataType: 'json'
		});
	}

	// Check s'il s'agit de l'utilisation d'un mobile
	// window.mobilecheck = function() {
	// 	var check = false;
	// 	(function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
	// 	return check;
	// };

});  // END DOM Ready
