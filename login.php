<? session_start(); ?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SisCert</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="shortcut icon" type="imagex/png" href="css/icon.ico">
</head>
<body class="text-center bg-light">
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <div class="container-fluid mx-auto d-flex">
    <img src="css/logo.png" alt="" width="50" height="30" class="d-inline-block align-text-top me-1 ms-auto"><a class="navbar-brand text-white me-auto ms-1" href="" target="_blank"> SISTEMA CERTIFICADOS</a>    
  </div><style>@media(max-width:480px){.navbar-brand{display:none;}}</style>
</nav>
  <h1 class="mt-5 mb-4">Sistema para solicitar Certificados Digitais</h1>
  <form class="container mx-auto" method="post" action="modals/validar_login.php">
    <?php if(isset($_SESSION['msgLogin'])){echo $_SESSION['msgLogin'];unset($_SESSION['msgLogin']);}?>
    <h2 class="py-1">Login</h2>
    <div class="form-floating mx-auto" style="min-width:280px;max-width:380px;">
      <input type="text" class="form-control"  name="usuario" required>
      <label>Usuário</label>
    </div><br>
    <div class="form-floating mx-auto" style="min-width:280px;max-width:380px;">
      <input type="password" class="form-control" name="senha" required>
      <label>Senha</label>
    </div><br>
    <input id="btnLogin" class="btn btn-lg btn-primary mt-3" type="submit" name="btnLogin" value="Acessar" style="min-width:280px;max-width:380px;">
  </form>
</body><script src="js/bootstrap.bundle.js"></script>
</html>