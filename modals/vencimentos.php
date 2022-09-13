<?php
  include_once("modals/conexao.php");  
  $mes = date("m");$mes++;
  $ano = date("Y");
  $solicitar_vencimentos = "SELECT * FROM solicitacoes_concluidas where year(data_vencimento) = '$ano' and month(data_vencimento) = '0$mes' AND renovado = 0 ORDER BY id DESC";   
  $vencimentos = mysqli_query($connect, $solicitar_vencimentos);
  if($vencimentos === FALSE) { 
    die(mysqli_error($connect));
  }
?>
<div class="modal fade" id="vencimentos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-xl">
  <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Vencimentos do Próximo Mês</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <div id="table-vencimento" class="table-responsive">
      <table class="table table-hover" id="tabela-vencimento">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Cliente</th>
              <th scope="col">Certificado</th>
              <th scope="col">Telefone</th>
              <th scope="col">Usuário</th>
              <th scope="col">Vencimento</th>
            </tr>
          </thead>
          <tbody><?php while($rows_vencimentos = mysqli_fetch_assoc($vencimentos)){ ?>
            <tr>
              <td><?= $rows_vencimentos['nome']; ?></td>
              <td><?= $rows_vencimentos['tipo_certificado'];?></td>
              <td><a href="https://api.whatsapp.com/send/?phone=55<?= $rows_vencimentos['telefone']; ?>&text&app_absent=0" target="_blank"><?= $rows_vencimentos['telefone'];?></a></td>                 
              <td><?= $rows_vencimentos['usuario']; ?></td>
              <td><?= $rows_vencimentos['data_vencimento'];?></td>                               
            </tr><?php } ?>
          </tbody>
      </table>
      </div>
      <button id="btn" type="button" class="btn btn-primary">Imprimir</button>
<script>
  document.getElementById('btn').onclick = function() {
  var conteudo = document.getElementById('table-vencimento').innerHTML;
  var style = "<style>";
  style = style + "table {width: 100%;font: 20px Calibri;}";
  style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
  style = style + "padding: 2px 3px;text-align: center;}";
  style = style + "</style>";   
  var win = window.open('', '', 'height=700,width=1000');
  win.document.write('<html><head><title>Vencimentos</title></head><body>');
  win.document.write(conteudo);   
  win.document.write(style);
  win.document.write('</body></html>');
  win.document.close();
  win.print();
};
</script>            
    </div>
  </div>
</div>
</div>