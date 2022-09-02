<?php //include('modals/verificar_acesso.php'); ?>
<!doctype html>
<html lang="pt-br">
<head>
  <?php include('modals/head.php'); ?>
</head>
<body class="bg-light">
  <?php include('modals/navbar.php'); ?>
<header class="container py-4 text-center">
  <h3 class="text-center mx-auto pb-1">Olá, <strong>afd</strong>. Seja bem vindo(a).</h3>     
  <h2>Sistema E2S Corretora de Seguros - Certificadora Digital</h2>
  <p class="lead">Informações sobre certificados digitais, parceiros e negócios futuros.</p>        
</header>
<?php
  include_once("modals/conexao.php");  
  $mes = date("m");$mes++;
  $ano = date("Y");

  $total = "SELECT count(*) FROM solicitacoes_concluidas";   
  $t = mysqli_query($connect, $total);
  if($t === FALSE) { 
    die(mysqli_error($connect));
  }

  $total2 = "SELECT count(*) FROM usuarios WHERE privilegio = 'Contador'";   
  $t2 = mysqli_query($connect, $total2);
  if($t2 === FALSE) { 
    die(mysqli_error($connect));
  }

  $total4 = "SELECT count(*) FROM solicitacoes_concluidas where year(data_vencimento) = '$ano' and month(data_vencimento) = '0$mes' AND renovado = 0 ORDER BY id DESC";     
  $t4 = mysqli_query($connect, $total4);
  if($t4 === FALSE) { 
    die(mysqli_error($connect));
  }

?>
<main class="container">
  <section class="d-flex mx-auto justify-content-evenly">
    <div class="card" style="width:16rem;height:8rem;">
      <div class="card-body">
        <h5 class="card-title">Total de Certificados</h5>
        <h2 class="card-text"><?php while($tt=mysqli_fetch_assoc($t)){echo $tt['count(*)'];}?></h2>
      </div>
    </div>

    <div class="card" style="width:16rem;height:8rem;">
      <div class="card-body">
        <h5 class="card-title">Total de Parceiros</h5>
        <h2 class="card-text"><?php while($tt2=mysqli_fetch_assoc($t2)){echo $tt2['count(*)'];}?></h2>
      </div>
    </div>

    <div class="card" style="width:16rem;height:8rem;">
      <div class="card-body">
        <h5 class="card-title">Total Vencimentos do Mês</h5>
        <h2 class="card-text"><?php while($tt4=mysqli_fetch_assoc($t4)){echo $tt4['count(*)'];}?></h2>
      </div>
    </div>
  </section>
  

  <script>
  function searchData() {
    var location = window.location.pathname;
    var dataInicio = document.getElementById('data-inicio');
    var dataFim = document.getElementById('data-fim');
    window.location = location+'?start='+dataInicio.value+'&end='+dataFim.value;
  }
  </script>


  </div>
</div>
</div>
</main><script src="js/bootstrap.bundle.js"></script>
</body>
</html>