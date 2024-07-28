<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>PPKM MELAKA</title>
<!-- Favicons -->
<link href="assets/img/logo ppkm.jpg" rel="icon">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.3/semantic.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
<script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.3/semantic.min.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script>
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$(function() {
		$('.selection.dropdown.profile.role')
			.dropdown()
		;
		$('.selection.dropdown.profile.member')
			.dropdown()
		;
		$('.selection.dropdown.profile.role')
			.dropdown()
		;

		$('#loginName').html(sessionStorage.getItem('user_name'));
  });

	function onSetForm(formId, formObject) {
		$("form#" + formId + " :input").each(function() {
			if ($(this).is("input")) {
				if ($(this).attr('type') !== 'file') {
					if ($(this).attr('type') === 'date') {
						if (formObject[$(this).attr("name")]) {
							let jsDateTime = new Date(formObject[$(this).attr("name")]);
							let jsDateTimeOffset = new Date(jsDateTime.setMinutes(jsDateTime.getMinutes() - jsDateTime.getTimezoneOffset()));
							let birthDate = jsDateTimeOffset.toISOString().split('T')[0];
							$(this).val(birthDate);
						}
					} else {
						$(this).val(formObject[$(this).attr("name")]);
					}
				}
			} else if ($(this).is("textarea") || $(this).is("select")) {
				$(this).val(formObject[$(this).attr("name")]);
			}
		});
	}

	function onUpperCaseForm(formId) {
		$("form#" + formId + " :input").each(function() {
			if ($(this).is("input")) {
				if ($(this).attr('type') === 'text') {
					$(this).on('input', function(event) {
						event.target.value = event.target.value.toUpperCase();
					});
				}
			} else if ($(this).is("textarea")) {
				$(this).on('input', function(event) {
					event.target.value = event.target.value.toUpperCase();
				});
			}
		});
	}
</script>