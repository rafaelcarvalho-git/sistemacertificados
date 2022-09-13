<? require_once('modals/verificar_acesso.php'); ?>
<!doctype html>
<html lang="pt-br">
  <head>
    <? require_once('modals/head.php'); ?>
  </head>
<body class="bg-light">
<? require_once('modals/navbar.php'); ?>
<header class="container py-4 text-center">
  <h3 class="text-center mx-auto pb-1">Olá, <strong><?= $logado; ?></strong>. Seja bem vindo(a).</h3>   
  <h2>Usuários do Sistema</h2>
  <p class="lead">Lista de usuários do sistema, cria e exclui usuários, define o tipo de acesso (privilégio).</p>
    <p><strong>Contador:</strong> Apenas faz solicitações de certificados digitais.<br><strong>Administrador:</strong> Tem acesso a todas as funções do sistema.</p>       
</header>
<main class="container overflow-auto">
<?php
  include_once("modals/conexao.php");
  $listar_usuarios = "SELECT * FROM usuarios ORDER BY id DESC";
  $usuarios = mysqli_query($connect, $listar_usuarios);
  if($usuarios === FALSE) { 
    die(mysqli_error($connect));
  }
?>
  <?php
  if (isset($_SESSION['teste'])) {
      echo $_SESSION['teste'];
      unset($_SESSION['teste']);
  }
?>
  <table class="table table-hover">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Usuário</th>
        <th scope="col">Privilégio</th>
        <th scope="col">Comissão</th>
        <th scope="col">Telefone</th>
        <th scope="col">E-mail</th>
        <th scope="col">Excluir</th>
      </tr>
    </thead>
    <tbody><?php while($rows_usuarios = mysqli_fetch_assoc($usuarios)){ ?>
      <tr>
        <td><?= $rows_usuarios['usuario']; ?></td>
        <td><?= $rows_usuarios['privilegio']; ?></td>         
        <td><?= $rows_usuarios['comissao']; ?>%</td>
        <td><a href="https://api.whatsapp.com/send/?phone=55<?= $rows_usuarios['telefone']; ?>&text&app_absent=0" target="_blank"><?= $rows_usuarios['telefone']; ?></a></td>
        <td><?= $rows_usuarios['email']; ?></td>
        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#excluirUsuario<?= $rows_usuarios['id']; ?>" >X</button></td>                                                  
      </tr>
  <!-- Janela Confirma excluir Usuário -->
  <div class="modal fade" id="excluirUsuario<?= $rows_usuarios['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Excluir Usuário</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Deseja excluir o usuário <?= $rows_usuarios['usuario']; ?>?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <?= "<a href='modals/excluir_usuario.php?id=" . $rows_usuarios['id'] . "' data-confirm='Tem certeza de que deseja excluir o item selecionado?' style='color: white;'><button type='button' class='btn btn-primary'>Excluir</button></a>";?>
        </div>
      </div>
    </div>
  </div><?php } ?>
  </tbody>
  </table>
<?php include('modals/sair_do_sistema.php'); ?>
</main>
</body>
</html>