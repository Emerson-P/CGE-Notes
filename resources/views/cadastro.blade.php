

<!-- Pagina de cadastro, não é usado devido ao erro na autenticação -->


<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Não tem uma conta ?</h1>
    <form action="/dadosCadastro" method="post">
        @csrf
        <input type="text" name="nome">
        <input type="email" name="email">
        <input type="password" name="senha">
        <button>cadastrar</button>
    </form>
    <h4>Ja tem uma conta ? -> <a href="/">login</a></h4>
</body>
</html>