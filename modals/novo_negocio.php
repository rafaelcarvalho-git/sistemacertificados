<?php 
    session_start();
    include_once('conexao.php');
    if((!isset($_SESSION['usuario']) == true) or (!isset($_SESSION['senha']) == true) or (!isset($_SESSION['privilegio']) == true)) {
        unset($_SESSION['usuario'], $_SESSION['senha'], $_SESSION['privilegio']);
        header('Location: ../login.php');
    }else {
        if(!isset($_POST["tipo-negocio"])){
            header("Location: ../login.php");
        }
        $tipo_negocio = $_POST["tipo-negocio"];
        $cliente_empresa = strtoupper($_POST["cliente-empresa"]);
        $telefone = $_POST["telefone"];
        $telefone = preg_replace("/[^0-9]()/", "", $telefone);
        $email = strtolower($_POST["email"]);

        $primeiro_contato = $_POST["primeiro-contato"];    
        $nova_tentativa = $_POST["nova-tentativa"]; 

        $solicitar2 = "INSERT INTO negocios_futuros(cliente_empresa, tipo, telefone, email, primeiro_contato, nova_tentativa) 
        VALUES ('$cliente_empresa', '$tipo_negocio', '$telefone', '$email', '$primeiro_contato', '$nova_tentativa')";
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