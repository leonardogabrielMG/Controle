<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/all.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js" />

	<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>

	<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
	<script type="text/javascript" language="javascript">
		$(document).ready(function () {
			var table = new DataTable('#tabelaS', {
				"language": {
					"url": "https://cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json"
				}
			});
		});
	</script>
	

	<title>@yield("titulo")</title>
</head>
<body>
	<ul class="nav">
		<li class="navitem">
			<a href="/sipag" class="nav-link active">Início</a>
		</li>
		<li class="navitem">
			<a href="/sipag" class="nav-link active">Sipag</a>
		</li>
	</ul>
	@if (Session::get("status") == "salvo")
		<div class="alert alert-success" role="alert">
			Salvo com sucesso!
		</div>
	@endif
	@if (Session::get("status") == "excluido")
		<div class="alert alert-danger" role="alert">
			Excluído com sucesso!
		</div>
		@endif
	<div class="container">
		@yield("formulario")
		@yield("tabela")
	</div>
</body>
</html>
