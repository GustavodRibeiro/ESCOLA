<?php 
    include("conecta.php");

    $matricula = $_POST["matricula"];
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    
    
    if(isset($_POST["inserir"]))
    {
        $comando = $pdo->prepare("INSERT INTO alunos VALUES ($matricula, '$nome',$idade)" );
        $resultado = $comando->execute();
        header("Location: cadastro.html");
    }
    if(isset($_POST["excluir"]))
    {
        $comando = $pdo->prepare("DELETE FROM alunos WHERE matricula=$matricula");
        $resultado = $comando->execute();
        header("Location: cadastro.html");
    }
    if(isset($_POST["alterar"]))
    {
        $comando = $pdo->prepare("UPDATE alunos SET nome = '$nome', idade = $idade WHERE matricula = $matricula");
        $resultado = $comando->execute();
        header("Location: cadastro.html");
    }
    if(isset($_POST["listar"]))
    {
        $comando = $pdo->prepare("SELECT * FROM alunos");
        $resultado = $comando->execute();

        while( $linhas = $comando->fetch() )
        {
            $n = $linhas["matricula"];
            $m = $linhas["nome"];
            $i = $linhas["idade"];
            echo("Matricula: $n <br> Nome: $m <br> Idade: $i <br> <br>
            ");
        }
    } 
?>