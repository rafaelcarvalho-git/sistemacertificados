<?php //include('modals/verificar_acesso.php'); ?>
<!doctype html>
<html lang="pt-br">
<head>
  <?php include('modals/head.php'); ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body class="bg-light">
  <?php include('modals/navbar.php'); ?>
<header class="container py-4 text-center">
  <h3 class="text-center mx-auto pb-1">Olá, <strong>afd</strong>. Seja bem vindo(a).</h3>     
  <h2>Sistema para Solicitação de Certificados - Certificadora Digital</h2>       
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

  $total3 = "SELECT count(*) FROM solicitacoes";   
  $t3 = mysqli_query($connect, $total3);
  if($t3 === FALSE) { 
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
  
  $totcpf = "SELECT count(*) FROM solicitacoes_concluidas where tipo_certificado = 'E-CPF A1 Midia Digital 1 Ano'";   
  $tc2 = mysqli_query($connect, $totcpf);
  if($tc2 === FALSE) { 
    die(mysqli_error($connect));
  }
  while($tt6=mysqli_fetch_assoc($tc2)){
    echo $tt6['count(*)'];
  }
  //$cpf1 = $tt6['count(*)'];
  $cpf2 = 1;
  $cpf3 = 1;
  $cpf4 = 1;
  $cpf5 = 1;
  $cpf6 = 1;
?>
<main class="container-lg">
<section class="row">
  <div class="col-lg-3 col-sm-6 mb-4">
    <div class="card mx-auto w-100" style="max-width:260px;height:132px;">
      <div class="card-body">
        <h5 class="card-title">Total de Certificados</h5>
        <h2 class="card-text mt-3"><?php while($tt=mysqli_fetch_assoc($t)){echo $tt['count(*)'];}?></h2>
      </div><div class="icon me-2"><i class="bi bi-graph-up"></i></div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6 mb-4">
    <div class="card mx-auto w-100" style="max-width:260px;height:132px;">
      <div class="card-body">
        <h5 class="card-title">Solicitações Ativas</h5>
        <h2 class="card-text mt-3"><?php while($tt3=mysqli_fetch_assoc($t3)){echo $tt3['count(*)'];}?></h2>
      </div><div class="icon me-2"><i class="bi bi-check-square"></i></div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6 mb-4">
    <div class="card mx-auto w-100" style="max-width:260px;height:132px;">
      <div class="card-body">
        <h5 class="card-title">Total de Parceiros</h5>
        <h2 class="card-text mt-3"><?php while($tt2=mysqli_fetch_assoc($t2)){echo $tt2['count(*)'];}?></h2>
      </div><div class="icon me-2"><i class="bi bi-people"></i></div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6 mb-4">
    <div class="card mx-auto w-100" style="max-width:260px;height:132px;">
      <div class="card-body">
        <h5 class="card-title">Vencimentos do Mês</h5>
        <h2 class="card-text mt-3"><?php while($tt4=mysqli_fetch_assoc($t4)){echo $tt4['count(*)'];}?></h2>
      </div><div class="icon me-2"><i class="bi bi-calendar2-event"></i></div>
    </div>
  </div>
</section>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  var cpf = [15,10,8,6,5,2]
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ["Tipo Certificado", "Quantidade", { role: "style" } ],
      ['E-CPF A1 Midia Digital', cpf[0], '#0d6efd'],
      ['E-CPF A3 Cartao', cpf[1], '#0dcdfd'],
      ['E-CPF A3 Token', cpf[2], '#5d0dfd'],
      ['E-CPF A3 Cartao + Leitora', cpf[3], 'silver'],
      ['E-CPF A3 sem midia', cpf[4], 'gold'],
      ['(Outro tipo)', cpf[5], 'pink']
    ]);

    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1, { calc: "stringify", sourceColumn: 1, type: "string", role: "annotation" }, 2]);
    var options = {
      title: "Total de E-CPF",
      width: 0,
      height: 450,
      bar: {groupWidth: "85%"},
      legend: { position: "none" },
    };
    var chart = new google.visualization.BarChart(document.getElementById("e-cpf"));
    chart.draw(view, options);
  }
</script>
<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  var cnpj = [25,15,8,9,2,3]
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ["Tipo Certificado", "Quantidade", { role: "style" } ],     
      ['E-CNPJ A1 Midia Digital', cnpj[0], '#125dcc'],
      ['E-CNPJ A3 Cartao', cnpj[1], 'red'],
      ['E-CNPJ A3 Token', cnpj[2], 'silver'],
      ['E-CNPJ A3 Cartao + Leitora', cnpj[3], 'cyan'],
      ['E-CNPJ A3 sem midia', cnpj[4], '#5012cc'],
      ['(Outro tipo)', cnpj[5], 'yellow'],
    ]);
    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1, { calc: "stringify", sourceColumn: 1, type: "string", role: "annotation" },2]);
    var options = {
      title: "Total de E-CNPJ",
      width:0,
      height: 450,
      bar: {groupWidth: "85%"},
      legend: { position: "none" },
    };
    var chart = new google.visualization.BarChart(document.getElementById("e-cnpj"));
    chart.draw(view, options);
  }
</script>
<section class="graphics row container mx-auto">
  <div class="graphic mx-auto col-lg-6 col-sm-6 mb-4">
    <div class="my-2 mx-auto card" id="e-cpf"></div>
  </div>
  <div class="graphic mx-auto col-lg-6 col-sm-6 mb-4">
    <div class="my-2 mx-auto card" id="e-cnpj"></div>
  </div>
</section>
  
<style>
  body {
    overflow-x: hidden;
  }
  @media (max-width:700px) {
   .graphic {
      width: 95%;
    }
  }

  .card:hover .icon i {
      font-size: 62px;
      transition: 1s;
      -webkit-transition: 1s;
  }
  .card .icon {
      position: absolute;
      top: auto;
      bottom: 5px;
      right: 5px;
      z-index: 0;
      font-size: 48px;
      color: rgba(0, 0, 0, 0.15);
  }
</style>
</main><script src="js/bootstrap.bundle.js"></script>
</body>
</html>