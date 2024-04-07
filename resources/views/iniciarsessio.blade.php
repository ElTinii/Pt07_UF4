<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sessio</title>
    <link rel="stylesheet" href="/estils_sessio.css">
    <!-Alex Vazquez Carrion->
</head>
<body>
    <form action="/iniciarsessio" method="POST" id="principal">
        @csrf
        <label for="username" id="username" name="username">Username</label>
        <input type="text" name="username" id="username" for="username" placeholder="Escriu aqui el teu username"><br>
        <label for="password">Contrasenya</label>
        <input type="password" name="password" id="password" placeholder="Escriu aqui la teva contrasenya"><br>
        <a href="">Has oblidat la contrasenya?</a> <br>
        <input type="submit" value="Enviar" name="enviar"><br>
    </form>
</body>
</html>