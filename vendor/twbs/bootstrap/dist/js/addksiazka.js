$(document).ready(function() {
	//tutaj wstawiamy kod JQuery, który zostanie uruchomiony
	//jak tylko dokument będzie gotowy do manipulowania jego elementami
	/**
		Własne metody do walidacji
	**/		
$.validator.addMethod('sprawdzDate', function (value, element) {
		return /^[0-9]{4}$/.test(value);
		}, 'Pole musi zawierać rok!');
    
		
    $('#addksiazka').validate({
		//reguły dla pola formularza
        rules: {
			//atrybut name: {reguły}
			tytul: {
				//reguły - kolejność ma znaczenia
                required: true,
				minlength: 2,
				maxlength: 30				
            },
            rokwydania: {
				//reguły
                required: true,
                sprawdzDate: true,
				minlength: 4,
				maxlength: 4             
            }
           				
        },
		//komunikaty dla pola formularza
		messages: {
			tytul: {
				required: 'Pole wymagane',
				minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
				maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!")
			},
			rokwydania: {
				required: 'Pole wymagane',
				maxlength: jQuery.validator.format("Maksymalna ilość znaków wynosi {0}!"),
			}
						
		},			
        highlight: function(element, errorClass, validClass) {
            $(element).closest('.form-group').addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).closest('.form-group').removeClass(errorClass).addClass(validClass);
        },
        errorClass: 'has-error',
		validClass: 'has-success',
		//umiejscowienie elementu z błędem
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
		/**niestandradowa reakcja na kliknięcie submit,
		   gdy nie ma błędów,
		   blokuje standradową akcję
		**/
		/*submitHandler: function(form) {
			alert('reakcja na subit');
		},*/
		/**
			niestadardowa rekacja na kliknięcie submit,
			gdy są błędy,
			blokuje standradową akcję
		**/
		invalidHandler: function(event, validator) {
			// 'this' to referencja do form
			var errors = validator.numberOfInvalids();
			if (errors) {
			  var message = errors == 1
				? 'Nie wypełniono poprawnie 1 pola. Zostało podświetlone'
				: 'Nie wypełniono poprawnie ' + errors + ' pół. Zostały podświetlone';
			  $("div.alert-danger").html(message);
			  $("div.alert-danger").show();
			} else {
			  $("div.alert-danger").hide();
			}
		},
	});
});