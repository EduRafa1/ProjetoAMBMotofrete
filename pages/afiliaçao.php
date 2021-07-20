<?php include('../config.php');

  

 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.0.1-dist/bootstrap-5.0.1-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/afiliacao.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
  
<script>
  
  function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('rua').value=("");
    document.getElementById('bairro').value=("");
    document.getElementById('cidade').value=("");
    document.getElementById('uf').value=("");
    document.getElementById('ibge').value=("");
}

  function meu_callback(conteudo) {
  if (!("erro" in conteudo)) {
    //Atualiza os campos com os valores.
    document.getElementById('rua').value=(conteudo.logradouro);
    document.getElementById('bairro').value=(conteudo.bairro);
    document.getElementById('cidade').value=(conteudo.localidade);
    document.getElementById('uf').value=(conteudo.uf);
    document.getElementById('ibge').value=(conteudo.ibge);
} //end if.
  else {
    //CEP não Encontrado.
    limpa_formulário_cep();
    alert("CEP não encontrado.");
}
}

  function pesquisacep(valor) {

      //Nova variável "cep" somente com dígitos.
  var cep = valor.replace(/\D/g, '');

      //Verifica se campo cep possui valor informado.
  if (cep != "") {

    //Expressão regular para validar o CEP.
    var validacep = /^[0-9]{8}$/;

    //Valida o formato do CEP.
    if(validacep.test(cep)) {

        //Preenche os campos com "..." enquanto consulta webservice.
        document.getElementById('rua').value="...";
        document.getElementById('bairro').value="...";
        document.getElementById('cidade').value="...";
        document.getElementById('uf').value="...";

        //Cria um elemento javascript.
        var script = document.createElement('script');

        //Sincroniza com o callback.
        script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

        //Insere script no documento e carrega o conteúdo.
        document.body.appendChild(script);

    } //end if.
    else {
        //cep é inválido.
        limpa_formulário_cep();
        alert("Formato de CEP inválido.");
    }
} //end if.
    else {
    //cep sem valor, limpa formulário.
    limpa_formulário_cep();
}
};</script>
  
    <title>Associe-se AMB</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
     <a href="../index.html"><img id="LOGO" src="../images/amblogo-removebg-preview.png"></img></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>
<?php 

  if (isset($_POST['acao'])) {
    $nome_empresa = $_POST['nome_empresa'];
    $cnpj = $_POST['cnpj'];
    $representante = $_POST['representante'];
    $ramo_de_atividade = $_POST['ramo_de_atividade'];
    $entregadores = $_POST['entregadores'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $numero_casa = $_POST['numero_casa'];
    $select_consultor = $_POST['select_consultor'];
    $select_agente = $_POST['select_agente'];
    $senha = $_POST['senha'];
    $myId = uniqid();
    $permissao = '1';

    if ($nome_empresa == '') {
       Painel::alert('erro','O nome da empresa não foi preenchido!');
    }else if ($cnpj == '') {
       Painel::alert('erro','O CNPJ não foi preenchido!');
    }else if (Cadastro::usuarioExiste($cnpj)) {
       Painel::alert('erro','O CNPJ '.$cnpj.' já foi cadastrado!');
    }else if ($representante == '') {
       Painel::alert('erro','O Nome do Proprietário não foi preenchido!');
    }else if ($ramo_de_atividade == '') {
       Painel::alert('erro','O Ramo de atividade não foi preenchido!');
    }else if ($telefone == '') {
       Painel::alert('erro','telefone não foi preenchido!');
    }else if ($email == '') {
       Painel::alert('erro','O E-mail não foi preenchido!');
    }else if ($cep == '') {
       Painel::alert('erro','O CEP não foi preenchido!');
    }else if ($rua == '') {
       Painel::alert('erro','A Rua não foi preenchido!');
    }else if ($bairro == '') {
       Painel::alert('erro','O Bairro não foi preenchido!');
    }else if ($cidade == '') {
       Painel::alert('erro','A Cidade não foi preenchido!');
    }else if ($estado == '') {
       Painel::alert('erro','O Estado não foi preenchido!');
    }else if ($numero_casa == '') {
       Painel::alert('erro','O Numero não foi preenchido!');
    }else if ($senha == '') {
       Painel::alert('erro','Digite uma senha para ter acesso ao Painel!');
    }else if ($select_consultor == '') {
       Painel::alert('erro','O Consultor não foi selecionado!');
    }else if ($select_agente == '') {
       Painel::alert('erro','O Agente não foi selecionado!');
    }else{
       Painel::alert('sucesso','Cadastro realizado com sucesso!');
       Cadastro::cadastrar($nome_empresa,$cnpj,$representante,$ramo_de_atividade,$entregadores,$telefone,$email,$cep,$rua,$bairro,$cidade,$estado,$numero_casa,$senha,$select_consultor,$select_agente,$myId,$permissao);
    
    }
    
    
     
  }


 ?>
  <div class="form">
  <form class="row g-1"  method="post">
    <div class="col-md-4">
      <label for="inputEmail4" class="form-label">Empresa:</label>
      <input type="text" name="nome_empresa" class="form-control inputUnico" id="empresa" required>
    </div>
    <div class="col-md-4">
      <label for="inputPassword4" class="form-label">CNPJ:</label>
      <input type="text" name="cnpj" class="form-control inputUnico" id="cnpj" required>
    </div>
    <div class="col-md-4">
      <label for="inputAddress" class="form-label">Nome do Proprietário ou representante legal:</label>
      <input type="text" name="representante" class="form-control inputUnico" id="prop" required>
    </div>
    <div class="col-md-4">
      <label for="inputAddress2" class="form-label">Ramo de Atividade:</label>
      <input type="text" name="ramo_de_atividade" class="form-control inputUnico" id="inputAddress2" required>
    </div>
    <div class="col-md-4">
      <label for="inputCity" class="form-label">Numeros de entregadores:</label>
      <input type="text" name="entregadores" class="form-control inputUnico" id="num_funcionarios" required>
    </div>
    <div class="col-md-4">
      <label for="inputCity" class="form-label">Telefone:</label>
      <input type="text" name="telefone" class="form-control inputUnico" id="telefone" required>
    </div>
    <div class="col-md-4">
      <label for="inputZip" class="form-label">Email:</label>
      <input type="email" name="email" class="form-control inputUnico" id="email" required>
    </div>

    <div class="col-md-2">
      <label for="inputPassword4" class="form-label .cep-mask">CEP:</label>
      <input type="text" name="cep" class="form-control inputUnico" id="cep" name="cep" onblur="pesquisacep(this.value);" required>
  </div>

      <div class="col-md-2">
      <label for="inputPassword4" class="form-label">RUA:</label>
      <input type="text" name="rua" id="rua" class="form-control inputUnico" name="rua" required>
    </div>

    <div class="col-md-2">
      <label for="inputPassword4" class="form-label">BAIRRO:</label>
      <input type="text" name="bairro" class="form-control inputUnico" id="bairro" name="bairro" required>
    </div>

    <div class="col-md-2">
      <label for="inputPassword4" class="form-label">CIDADE:</label>
      <input type="text" name="cidade" class="form-control inputUnico" id="cidade" name="cidade" required>
  </div>

    <div class="col-md-4">
      <label for="inputPassword4" class="form-label">ESTADO:</label>
      <input type="text" name="estado" class="form-control inputUnico" id="uf" name="uf" required>
    </div>

    <div class="col-md-4">
      <label for="inputPassword4" class="form-label">NÚMERO:</label>
      <input type="text" name="numero_casa" class="form-control inputUnico" id="numero" required>
    </div>
    <div class="col-md-4">
      <label for="inputPassword4" class="form-label">Digite uma senha para acessar o Painel</label>
      <input type="password" name="senha" class="form-control inputUnico" id="uf" name="uf" required>
    </div>

    <div class="row g-2">
    <div class="col-md-6">
      <label for="inputPassword4" class="form-label">Consultor:</label>
      <select class="form-select inputUnico" name="select_consultor" aria-label="Default select example" required>
    <option selected>Selecione um Consultor:</option>
    <option value="Eire">Eire</option>
    <option value="Laís">Laís</option>
    <option value="Ivan">Ivan</option>
  </select>
    </div>
    <div class="col-md-6">
      <label for="inputPassword4" class="form-label">Agente:</label>
      <select class="form-select inputUnico" name="select_agente" aria-label="Default select example" required>
    <option selected>Selecione um agente:</option>
    <option value="Diego">Diego</option>
  </select>
    </div>
    </div>
    <input class="btn btn-primary btn-sm" type="submit" name="acao" value="Enviar">
</form>
</div>
  <script src="../bootstrap-5.0.1-dist/bootstrap-5.0.1-dist/js/bootstrap.min.js"></script>
  <script async="" src="//www.google-analytics.com/analytics.js"></script><script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>
<script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
  <script src="../js/proximo.js"></script>
</body>
</html>