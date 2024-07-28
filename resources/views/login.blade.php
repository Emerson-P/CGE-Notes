

<!-- Pagina de login, não é usado devido ao erro na autenticação -->


<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faça login</title>
</head>
<body>
    <h1>Ja tem uma conta ?</h1>
    <form action="/dadosLogin" method="post">
        @csrf
        <input type="email" name="email">
        <input type="password" name="password">
        <button>Enviar</button>
    </form>
    <h4>Não tem uma conta -> <a href="/cadastrar">cadastrar</a></h4>
</body>
</html>