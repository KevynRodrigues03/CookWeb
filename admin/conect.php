<?php 
$serve ="localhost"; 
$user ="root";
$pass ="";
$bd = "sitecookweb";

if ($conn= mysqli_connect ($serve, $user, $pass, $bd)){
        //echo "Conexão feita com sucesso!";
} else 
    echo "Erro ao se conectar ao banco de dados!";

function mensagem ($texto, $tipo){

    echo "<div class='alert alert-$tipo'role='alert'>
                $texto 
            </div>";
}

    
?>
