<?php
error_reporting(0);

function gerar_senha($tamanho, $maiusculas, $minusculas, $numeros, $simbolos){
  $ma = "ABCDEFGHIJKLMNOPQRSTUVYXWZ"; // $ma contem as letras maiúsculas
  $mi = "abcdefghijklmnopqrstuvyxwz"; // $mi contem as letras minusculas
  $nu = "0123456789"; // $nu contem os números
  $si = "!@#$%¨&*()_+="; // $si contem os símbolos

  if ($maiusculas){
        // se $maiusculas for "true", a variável $ma é embaralhada e adicionada para a variável $senha
    $senha .= str_shuffle($ma);
  }

  if ($minusculas){
        // se $minusculas for "true", a variável $mi é embaralhada e adicionada para a variável $senha
    $senha .= str_shuffle($mi);
  }

  if ($numeros){
        // se $numeros for "true", a variável $nu é embaralhada e adicionada para a variável $senha
    $senha .= str_shuffle($nu);
  }

  if ($simbolos){
        // se $simbolos for "true", a variável $si é embaralhada e adicionada para a variável $senha
    $senha .= str_shuffle($si);
  }

    // retorna a senha embaralhada com "str_shuffle" com o tamanho definido pela variável $tamanho
  return substr(str_shuffle($senha),0,$tamanho);
}

$value = isset($_GET['inlineRadioOptions']) ? $_GET['inlineRadioOptions'] : 0;
$senhaGerada = "";

switch ($value) {
  case 10:
  // Retornar a senha com 10 caracteres como maiúsculas, minusculas, números e símbolos:
  $senhaGerada = gerar_senha(10, true, true, true, true);
  break;

  case 8:
  // Retornar a senha com 8 caracteres como maiúsculas, minusculas e números:
  $senhaGerada = gerar_senha(8, true, true, true, false);
  break;

  case 6:
  // Retornar a senha com 6 caracteres como maiúsculas e minusculas:
  $senhaGerada = gerar_senha(6, true, true, false, false);
  break;

}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gerador de Senha</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap" rel="stylesheet">
  <style>
    h1, h3{
      font-family: 'Fredericka the Great', cursive;
      font-weight: 400;
    }
    .border.border-primary{
      margin-top: 30px;
      padding: 5px;
    }
    span.border.border-primary{
      font-size: 20px;
    }

  </style>
</head>
<body>

  <ul class="nav justify-content-center bg-primary">
    <li class="nav-item">
      <h1>Gerador de senhas</h1>
    </li>
  </ul>

  <div class="container">
    <div class="mt-5">
      <form action="">
        <div class="form-check form-check">
          <h3>Escolha o tamanho da senha</h3>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="6">
          <label class="form-check-label" for="inlineRadio1">6 caracteres como maiúsculas e minusculas</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="8">
          <label class="form-check-label" for="inlineRadio2">8 caracteres como maiúsculas, minusculas e números</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="10">
          <label class="form-check-label" for="inlineRadio3">10 caracteres como maiúsculas, minusculas, números e símbolos</label>
        </div>
        <div class="d-grid gap-2 mt-5 mb-5">
          <button type="submit" class="btn btn-success">Gerar Senha</button>
        </div>
      </div>
    </form>

    <?php
    if ($senhaGerada != "") {
      ?>
      <div class="alert alert-info" role="alert">
        Esta é a sua nova senha:<br> <span class="border border-primary"><?php echo utf8_encode($senhaGerada) ?></span>
      </div>
      <?php
    }
    ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>