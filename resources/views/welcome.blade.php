<!DOCTYPE html>
<html>
<head>
    <title>Bandi</title>
</head>
<body>

<h1>Elenco Bandi</h1>

<form method="GET">
    <select name="ente">
        <option value="">Tutti</option>
        <option value="CNR">CNR</option>
        <option value="Unibo">Unibo</option>
    </select>
    <button type="submit">Filtra</button>
</form>

<hr>

@foreach($bandi as $bando)
    <div>
        <a href="{{ $bando->link }}" target="_blank">
            <strong>{{ $bando->titolo }}</strong>
        </a>
        <p>{{ $bando->ente }} | {{ $bando->data_pubblicazione }}</p>

        @if($bando->created_at->gt(now()->subDays(3)))
            <span style="color:green;">NUOVO</span>
        @endif
    </div>
    <hr>
@endforeach

{{ $bandi->links() }}

</body>
</html>