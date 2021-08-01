<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
<link rel="stylesheet" href="css/bulma.min.css" />
<link rel="stylesheet" type="text/css" href="css/login.css">
<?php
	include("header.html");
?>
<div class="box">

<form action="inserir.php" method="post" onsubmit="return validar(this);">
	<b>Inserir novo item:<b><br><br>
		<div class="field">
            <div class="control">
				Nome: <input id="nome" class="input is-medium" type="text" name="nome"><br>
			</div>
		</div>
		<div class="field">
            <div class="control">
				Descrição: <input id="descricao" class="input is-medium" type="text" name="descricao"><br>
		</div>
			</div>
		<div class="field">
            <div class="control">	
				Cor: <input id="cor" class="input is-medium" type="color" name="cor"><br>
		</div>
	</div>
		<div class="field">
            <div class="control">
				Data de fabricação: <input id="data" class="input is-medium" type="date" name="data"><br>
		</div>
	</div>
	<div class="field">
            <div class="control">
				<input class="button is-block is-link is-medium is-fullwidth" type="submit" name="adicionar" value="adicionar" onclick="validar()">
			</div>
	</div>
	
</form>


<script>
	
function validar() {
  // pegando o valor do nome pelos names
  var nome = document.getElementById("nome");
  var descricao = document.getElementById("descricao");
  var cor = document.getElementById("cor");
  var data = document.getElementById("data");

  // verificar se o nome está vazio
  if (nome.value == "") {
    alert("Nome não informado");

    // Deixa o input com o focus
    nome.focus();
    // retorna a função e não olha as outras linhas
    return;
  }
  if (descricao.value == "") {
    alert("Sobrenome não informado");
    descricao.focus();
    return;
  }
  if (cor.value == "") {
    alert("E-mail não informado");
    cor.focus();
    return;
  }
  if (data.value == "") {
    alert("Senha não informada");
    data.focus();
    return;
  }
  alert("Formulário enviado!");
  // envia o formulário
  //formulario.submit();
}
</script>

</div>

