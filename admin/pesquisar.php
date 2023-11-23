<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  </head>
  <body>
    <?php 
    
    $pesquisar= $_POST ['buscar'] ?? '';

    include "conect.php";

    $sql = "SELECT * FROM cadastro_receitas WHERE nome LIKE '%$pesquisar%'";

    $dados= mysqli_query($conn, $sql);
    ?>

    
    <div class= "container"> 
        <div class= "row">
            <div class= "col">  
            <h1>Pesquisar </h1>
            <nav class="navbar navbar-light bg-light">
            <form class="form-inline" action ="pesquisar.php" method= "POST">
            <input class="form-control mr-sm-2" type="search" placeholder="nome" aria-label="Search" name= "buscar" autofocus>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
  </form>
</nav>
    </form>
  </div>
</nav>
        <table class="table table-hover">
  <thead>
    <tr>
        <th scope="col">Nome completo</th>
        <th scope="col">Nome da receita</th>
        <th scope="col">E-mail</th>
        <th scope="col">Decrição da receita</th>
        <th scope="col">Funções</th>
    </tr>
  </thead>
  <tbody>

    <?php 
    
    while ($linha= mysqli_fetch_assoc($dados)) {
        $cod_cliente= $linha ['cod_cliente'];
        $nome= $linha ['nome'];
        $nomeReceita= $linha ['nomeReceita'];
        $email= $linha ['email'];
        $receita= $linha ['receita'];

        echo "<tr>
                <th scope='row'>$nome</th>
                <td>$nomeReceita</td>
                <td>$email</td>
                <td>$receita</td>
                <td width=150px> 
                    <a href= 'alteracaobd_receitas.php?id=$cod_cliente' class= 'btn btn-success btn-sm'> Editar</a>
                    <a href= '#' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#confirma'
                    onclick=" .'"' ."pegar_dados($cod_cliente, '$nome')" .'"' .">Excluir</a>
                  </td>
            </tr>";
    }    

    ?>
                  <!-- onclick= "pegar_dados ($id, '$nome')" --> 

  </tbody>
</table>

                <a href= "index.php" class= "btn btn-info"> Voltar para o Inicio do site </a>
            </div>
        </div>
    </div >
      <!-- Modal -->
<div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmação de exclusão</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="excluir_receitas.php" method="POST">
        <p> Deseja realmente excluir ? <b id="nome_pessoa"> Nome da Pessoa</b>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não!</button>
        <input type= "hidden" name= "nome" id="nome_pessoa1" value="">
        <input type= "hidden" name= "id" id="cod_cliente" value="">
        <input type="submit" class="btn btn-danger" value="Sim!">
        </form>
      </div>
    </div>
  </div>
</div>

    <script type="text/javascript">
        function pegar_dados (id, nome) {
          document.getElementById('nome_pessoa').innerHTML= nome;
          document.getElementById('nome_pessoa1').value= nome;
          document.getElementById('cod_cliente').value= id;
        }
    </script>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->

  </body>   
</html>