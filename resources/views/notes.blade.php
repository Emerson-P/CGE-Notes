<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cge-notes</title>
    <!-- Linl do bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="{{url('css/notes.css')}}">
</head>
<body>

    <nav class="navbar bg-body-tertiary">
      <div class="container-fluid">

        <h3>Numeros de notas: {{$num_notes}} </h3>

        <!-- btn que ativa o modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <img src="{{url('img/adicionar.png')}}" alt=""> Adicionar nova nota
        </button>
      </div>
    </nav>


    <!-- Exibe um mensagem caso algum campo seja invalido.  -->

    @if ($errors->has('desc') or $errors->has('titulo') )

      <div class="center">
        <h3>
          ** Campo invalido **
        </h3>
      </div>
    @endif
    
    <!-- Modal  para o button Criar note -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Criar nota</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
            <form action="/criarNote" method="post">
                @csrf
                <div class="modal-body">

                    <input type="text" name="titulo" placeholder="titulo:">
                    <input type="text" name="desc" placeholder="descrição:">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-primary">Criar</button>
                </div>
            </form> 
        </div>
      </div>
    </div>

    
    
    <div class="center">

        @if ($num_notes == 0)
        <h3>Nenhuma nota, crie uma ;)</h3>
        @endif
        @foreach ($data as $element )

            <div class="note">

                <form action="/alterar/{{$element['id']}}" method="post">
                    @csrf
                    <div class="div-note-inter">
                        <div class="input">
                            <input style="margin-top:10px;border-radius: 5px;" type="text" value="{{$element['nome']}}" name="titulo" >
                            <input style="margin-top:10px;border-radius: 5px;" type="text" value="{{$element['descricao']}}" name="desc" >
                        </div>

                        <div class="icones-btn">
                            <button style="margin-right:2px;height:40px;border-radius: 5px;"><img src="{{url('img/editar.png')}}" alt=""></button>  
                </form>

                <form action="/deletar/{{$element['id']}}" method="post">
                    @csrf
                            <button style="margin-left:10px;height:40px;border-radius: 5px;"><img src="{{url('img/lixo.png')}}" alt=""></button>
                        </div>
                    </div>
                </form>
                
            </div>
        @endforeach

    </div>
    <!-- Link para o bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

