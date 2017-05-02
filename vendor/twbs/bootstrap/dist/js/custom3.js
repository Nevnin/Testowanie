$(document).ready(function() {
	
	//Przykład 3: Najbardziej elastyczna forma wskazująca funkcję, która zwraca dane. Funkcja dostaje 2 ragumenty: zapytanie i odpowiedź.
	$('#rokwydania').autocomplete({	
		source: function( request, response ) {
			$.ajax({
				dataType: "json",
				type : 'GET',
				url: './ajax/ajax_autocomplete.php',
				data: {
					term : request.term
				},
                
				success: function(data) {					
				$('#rokwydania').removeClass('ui-autocomplete-loading');
                    console.log(data);
					//	map: przetwarza każdy element tablicy data
					//	na nową tablicę przy pomocy function(item, key)					
					response( $.map( data, function(item, key) {
						//return item;
						return {
							label: item,
							value: item,
							id: key
						}
					}));
				},
				error: function(data) {
					$('#rokwydania').removeClass('ui-autocomplete-loading');  
                    
				}
			});
		},
		select: function( event, ui ) {
			alert(ui.item.id);			
		}
	});	

});