<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/style.css">
    <script defer type="module" src="{{ asset('js/script.js') }}"></script>
</head>
<body>
<div class="sessio">
<div class="dropdown">
    <button class="dropbtn">{{ auth()->user()->username }}</button>
    <div class="dropdown-content dropdown-menu-right">
        <a href="/profile">Perfil</a>
        <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Cerrar sesión</button>
        </form>
    </div>
</div>
</div>
</div>
<div class="contenidor">
    <h1>Articles</h1>
    <button type="button" data-toggle="modal" data-target="#afegir">Afegir</button>
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
                    <td><button type="button" data-toggle="modal" data-target="#modificar" data-id="{{ $article->article_id }}" data-titol="{{$article->Titol}}" data-text="{{$article->text}}">Modificar</button></td>
                    <td>
                        <form method="POST" action="/delete-article/{{ $article->article_id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Estás segur que vols eliminar aquest article?');">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        {{ $articles->links() }}
    </section>
    
    <div class="modal fade" id="modificar" tabindex="-1" role="dialog" aria-labelledby="deleteBookModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content custom-modal-color">
                    <!-- En tu modal de modificación -->
                    <form id="modificar" method="post" action="/modificarArticle">
                        @csrf
                        <div class="modal-body">   
                        <label for="titol">Titol</label><br>
                        <input type="text" name="titol" id="titol" value=""><br>
                        <label for="text">Contingut</label><br>
                        <textarea name="text" id="text" cols="30" rows="10" value=""></textarea>
                        <input type="text" name="id" id="id" value="" hidden>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tancar</button>
                            <button type="submit" id="eliminar" class="btn btn-danger">Modificar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="afegir" tabindex="-1" role="dialog" aria-labelledby="deleteBookModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content custom-modal-color">
                    <form id="afegir" method="post" action="/add-article">
                        @csrf
                        <div class="modal-header">
                            <h1>Article</h1>
                        </div>
                        <div class="modal-body">    
                            <label for="titol">Titol</label><br>
                            <input type="text" name="titol" id="titol" ><br>
                            <label for="text">Contingut</label><br>
                            <input type="text" name="text" id="text">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tancar</button>
                            <button type="submit" id="eliminar" class="btn btn-danger">Afegir</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
</body>
</html>