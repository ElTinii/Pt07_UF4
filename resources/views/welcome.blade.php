<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<div class="sessio">
		
<form action="/login" method="get">
    <button type="submit">Iniciar sessio</button>
</form>
<form action="/register" method="get">
<button type="submit">Registrar-se</button>
</form>
</div>
<div class="contenidor">
    <h1>Articles</h1>
    <form method="POST" action="/">
        @csrf
        <select name="option" id="option" onchange="this.form.submit()">
            <option value="5" {{ session('per_page') == 5 ? 'selected' : '' }}>5</option>
            <option value="10" {{ session('per_page') == 10 ? 'selected' : '' }}>10</option>
            <option value="15" {{ session('per_page') == 15 ? 'selected' : '' }}>15</option>
            <option value="20" {{ session('per_page') == 20 ? 'selected' : '' }}>20</option>
        </select>
    </form>

    <section class="articles">
        <table>
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->article_id }}.</td>
                    <td>{{ $article->Titol }}</td>
                </tr>
            @endforeach
        </table>

        {{ $articles->links() }}
    </section>
</div>
</body>
</html>