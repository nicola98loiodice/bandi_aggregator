<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  
</head>
  <body>
<h1>Elenco Bandi</h1>
<div class="container mt-4">
    <h1 class="mb-4">Bandi di ricerca</h1>

    <form method="GET" class="row g-2 mb-4">
        <div class="col-auto">
            <select name="ente" class="form-select">
                <option value="">Tutti gli enti</option>
                <option value="CNR">CNR</option>
                <option value="Unibo">Unibo</option>
            </select>
        </div>
        <div class="col-auto">
            <button class="btn btn-primary">Filtra</button>
        </div>
    </form>

    @foreach($bandi as $bando)
        <div class="card mb-3">
            <div class="card-body">
                <a href="{{ $bando->link }}" target="_blank">
                    <h5 class="card-title">{{ $bando->titolo }}</h5>
                </a>

                <p class="card-text text-muted">
                    {{ $bando->ente }} • {{ $bando->data_pubblicazione }}
                </p>

                @if($bando->created_at->gt(now()->subDays(3)))
                    <span class="badge bg-success">Nuovo</span>
                @endif
            </div>
        </div>
    @endforeach

    {{ $bandi->links() }}
</div>

{{ $bandi->links() }}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>


