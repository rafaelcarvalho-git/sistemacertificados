<?php 
    session_start();
    include_once('conexao.php');
    if((!isset($_SESSION['usuario']) == true) or (!isset($_SESSION['senha']) == true) or (!isset($_SESSION['privilegio']) == true)) {
        unset($_SESSION['usuario'], $_SESSION['senha'], $_SESSION['privilegio']);
        header('Location: ../login.php');
    }else {
        if(!isset($_POST["tipo-certificado"])){
            header("Location: ../login.php");
        }
        $tipo_certificado = $_POST["tipo-certificado"];
        $nome = strtoupper($_POST["nome"]);       
        $telefone = $_POST["telefone"];
        $telefone = preg_replace("/[^0-9]()/", "", $telefone);        
        $usuario = $_SESSION['usuario'];
        
        $solicitar = "INSERT INTO solicitacoes(tipo_certificado, nome, cpf, data_nascimento, email, telefone, cep, endereco, observacoes, data_solicitacao, usuario, documentos) VALUES ('$tipo_certificado', '$nome', '', '2022-10-10', '', '$telefone', '', '', '', NOW(), '$usuario', '')";
        $sql_solicitar= mysqli_query($connect, $solicitar);  
        $solicitar2 = "INSERT INTO solicitacoes_usuarios(nome, tipo_certificado, data_solicitacao, usuario) VALUES ('$nome', '$tipo_certificado', NOW(), '$usuario')";
        $sql_solicitar2= mysqli_query($connect, $solicitar2);   
        if($_SESSION['privilegio'] == 'Administrador'){
            $_SESSION['solicitacaoSucesso'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            Certificado Digital solicitado com sucesso! Iremos realizar o cadastro do cliente e o atendimento. Aguarde nosso contato.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";  
            header("Location: ../solicitacoes.php");
        }else {
            $_SESSION['solicitacaoSucesso'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            Certificado Digital solicitado com sucesso!<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";  
            header("Location: ../parceiros.php");
        }  
    }    
?>