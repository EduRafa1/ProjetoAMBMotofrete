<?php include('../config.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../bootstrap-5.0.1-dist/bootstrap-5.0.1-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
  <link rel="stylesheet" href="../css/associar.css">
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
  <title>Associe-se</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a href="../index.html"><img id="LOGO" src="../images/amblogo-removebg-preview.png"></img></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#ambnoministerio">AMB No Ministério</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#apoiadores">Apoiadores</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#consultores">Consultores</a>
          </li>
          <li class="nav-item">
            <a id="contrate" class="nav-link" href="afiliaçao.php"><b>Contrate</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="associar.php">Associe-se</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pages/acordo.php">Estrutura</a>
          </li>
        </ul>
        <span class="navbar-text">
          <b> CNPJ: 08.674.622/0001-07 <br>
            R. Estado de Israel, 713 | CEP: 04022-022 | Vila Clementino - SP </b>
        </span>
      </div>
    </div>
  </nav>

  <div class="form">

    
  <h2>Dados Pessoais:</h2>

  <form method="post" enctype="multipart/form-data" >
    <!--Linha 1-->
    <?php
      if(isset($_POST['acao'])){
        $nome = $_POST['nome'];
        $naturalidade = $_POST['naturalidade'];
        $sexo = $_POST['sexo'];
        $estado_civil = $_POST['estado_civil'];
        $pai = $_POST['pai'];
        $mae = $_POST['mae'];
        $data_de_nacimento = $_POST['data_de_nacimento'];
        $rg = $_POST['rg'];
        $emissor_uf = $_POST['emissor_uf'];
        $data_de_emissao = $_POST['data_de_emissao'];
        $cpf = $_POST['cpf'];
        $foto_rg = $_FILES['foto_rg'];
        $foto_cnh = $_FILES['foto_cnh'];
        $doc_moto = $_FILES['doc_moto'];
        $comprovante_endereco = $_FILES['comprovante_endereco'];
        $cep = $_POST['cep'];
        $rua = $_POST['rua'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $numero = $_POST['numero'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $d_nome = $_POST['d_nome'];
        $d_rg = $_POST['d_rg'];
        $d_cpf = $_POST['d_cpf'];
        $empresa_atual = $_POST['empresa_atual'];
        $cnpj_pj = $_POST['cnpj_pj'];
        $telefone2 = $_POST['telefone2'];
        $contato = $_POST['contato'];
        $forma_de_contrato = $_POST['forma_contrato'];
        $vinculo_empresa = '';
        $myIDMotoboy = 'mot'.uniqid();
        $permissao = '0';
        
      if (Cadastro::usuarioExisteMotoboy($login)) {
        Painel::alert('erro','O login '.$login.' já está sendo usado!');
      }else if($senha == ''){
        Painel::alert('erro','O campo senha não foi preenchido');
      }else if(!Cadastro::imagemValida($foto_rg)){
        Painel::alert('erro','O formato da foto RG inválida');
      }else if(!Cadastro::imagemValida($foto_cnh)){
        Painel::alert('erro','O formato da foto CNH inválida');
      }else if(!Cadastro::imagemValida($doc_moto)){
       Painel::alert('erro','O formato da foto Documento da moto inválida');
      }else if(!Cadastro::imagemValida($comprovante_endereco)){
        Painel::alert('erro','O formato da foto Comprovante de endereço inválida');
      }else{
        $foto_rg = Cadastro::uploadFile($foto_rg);
        $foto_cnh = Cadastro::uploadFile($foto_cnh);  
        $doc_moto = Cadastro::uploadFile($doc_moto); 
        $comprovante_endereco = Cadastro::uploadFile($comprovante_endereco); 
        Painel::alert('sucesso','cadastro realizado com sucesso');
        Cadastro::cadastrarMotoboy($nome,$naturalidade,$sexo,$estado_civil,$pai,$mae,$data_de_nacimento,$rg,$emissor_uf,$data_de_emissao,$cpf,$foto_rg,$foto_cnh,$doc_moto,$comprovante_endereco,$cep,$rua,$bairro,$cidade,$estado,$numero,$telefone,$email,$login,$senha,$d_nome,$d_rg,$d_cpf,$empresa_atual,$cnpj_pj,$telefone2,$contato,$forma_de_contrato,$vinculo_empresa,$myIDMotoboy,$permissao);
  }
    }

   ?>
    <div class="row g-3 mx-2 my-1 ">
      <div class="col md-6">
        <label>* Nome:</label>
        <input type="text" name="nome" class="form-control inputUnico" placeholder="Seu Nome:" aria-label="Nome" required>
      </div>
      <div class="col md-6">
        <label>* Naturalidade:</label>
        <input type="text" name="naturalidade" class="form-control inputUnico" placeholder="Naturalidade:" aria-label="Naturalidade" required>
      </div>
    </div>
    <!--Linha 2-->
    <div class="row g-3 mx-2 my-1">
      <div class="col md-6">
        <label>* Sexo:</label>
        <select class="form-select inputUnico" aria-label="Sexo" name="sexo" id="sexo" required>
          <option value="selecione">Selecione uma opção</option>
          <option value="masculino">Masculino</option>
          <option value="feminino">Feminino</option>
        </select>
      </div>
      <div class="col md-6">
        <label>* Estado Civil:</label>
        <select class="form-select inputUnico" aria-label="Est. Civil" name="estado_civil" id="estcivil" required>
          <option value="selecione">Selecione uma opção</option>
          <option value="casado">Casado(a)</option>
          <option value="solteiro">Solteiro(a)</option>
          <option value="separado">Separado(a)</option>
          <option value="divorciado">Divorciado(a)</option>
          <option value="viuvo">Viúvo(a)</option>
        </select>

      </div>
    </div>
    <!--Linha 3-->
    <div class="row g-3 mx-2 my-1">
      <div class="col md-6">
        <label>* Pai:</label>
        <input type="text" class="form-control inputUnico" placeholder="Nome do pai:" name="pai" aria-label="Nomepai" required>
      </div>
      <div class="col md-6">
        <label>* Mãe:</label>
        <input type="text" class="form-control inputUnico" placeholder="Nome da mãe:" name="mae" aria-label="Nomemae" required>
      </div>
    </div>
    <!--Linha 4-->
    <div class="row g-3 mx-2 my-1">
      <div class="col md-12">
        <label>* Data de nascimento:</label>
        <input type="date" class="form-control inputUnico" placeholder="dd/mm/yyyy:" name="data_de_nacimento" aria-label="Dtanascimento" required>
      </div>
    </div>
    <!--Linha 5-->
    <div class="row g-3 mx-2 my-1">
      <div class="col md-6">
        <label>* RG:</label>
        <input type="text" class="form-control inputUnico" placeholder="RG:" name="rg" aria-label="RG" required>
      </div>
      <div class="col md-6">
        <label>* Emissor / UF</label>
        <input type="text" class="form-control inputUnico" placeholder="Emissor / UF:" name="emissor_uf" aria-label="emissor " required>
      </div>
    </div>
    <!--Linha 6-->
    <div class="row g-3 mx-2 my-1">
      <div class="col md-6">
        <label>* Data de Emissão:</label>
        <input type="date" name="data_de_emissao inputUnico" class="form-control inputUnico" required>
      </div>
      <div class="col md-6">
        <label>* CPF:</label>
        <input type="text" class="form-control inputUnico" placeholder="123.456.789-12" name="cpf" aria-label="cpf" required>
      </div>
    </div>
    <!--Linha 7-->
    <div class="row g-3 mx-2 my-1">
      <div class="col">
        <label>* Foto do RG:</label>
        <input class="form-control inputUnico" name="foto_rg" type="file" required>
      </div>
    </div>
    <!--Linha 8-->
    <div class="row g-3 mx-2 my-1">
      <div class="col">
        <label>* Foto da CNH:</label>
        <input class="form-control inputUnico"  name="foto_cnh" type="file" required>
      </div>
    </div>
    <!--Linha 10-->
    <div class="row g-3 mx-2 my-1">
      <div class="col">
        <label>* Documento da Moto: (Anexar foto)</label>
        <input class="form-control inputUnico"  name="doc_moto" type="file" required>
      </div>
    </div>
    <!--Linha 9-->
    <div class="row g-3 mx-2 my-1">
      <div class="col">
        <label>* Comprovante de endereço: (Anexar foto)</label>
        <input class="form-control inputUnico"  name="comprovante_endereco" type="file" required>
      </div>
    </div>

    <!--Linha 10-->
    <div class="row g-3 mx-2 my-1">
      <div class="col md-6">
        <label class="form-label">* CEP:</label>
        <input type="text" class="form-control inputUnico" id="cep" name="cep" onblur="pesquisacep(this.value);"required>
      </div>

      <div class="col md-6">
        <label class="form-label">* RUA:</label>
        <input type="text" id="rua" class="form-control inputUnico" name="rua" required>
      </div>
    </div>
    <!--linha 11-->
    <div class="row g-3 mx-2 my-1">
      <div class="col md-6">
        <label class="form-label">* BAIRRO:</label>
        <input type="text" class="form-control inputUnico" id="bairro" name="bairro" required>
      </div>

      <div class="col md-6">
        <label class="form-label">* CIDADE:</label>
        <input type="text" id="cidade" class="form-control inputUnico" name="cidade" required>
      </div>
    </div>
    <!--Linha 12-->
    <div class="row g-3 mx-2 my-1">
      <div class="col md-6">
        <label class="form-label">* ESTADO:</label>
        <input type="text" class="form-control inputUnico" id="uf" name="estado" required>
      </div>
      <div class="col md-6">
        <label class="form-label">* NÚMERO:</label>
        <input type="number" class="form-control inputUnico" id="numero" name="numero" required>
    </div>
    </div>
    <!--Linha 13-->
    <div class="row g-3 mx-2 my-1">
      <div class="col md-6">
        <label class="form-label">* Telefone:</label>
        <input type="text" class="form-control inputUnico" id="telefone" name="telefone" required>
      </div>

      <div class="col md-6">
        <label class="form-label">* Email:</label>
        <input type="text" id="email" class="form-control inputUnico" name="email" required>
      </div>
    </div>

    <hr>

    <h2>* Crie seu Login</h2>

    <!--Linha 15-->
    <div class="row g-3 mx-2 my-1">
      <div class="col-md">
        <div class="form-floating">
          <input type="text" class="form-control inputUnico" name="login" id="floatingInputGrid" placeholder="Usuario" required>
          <label for="floatingInputGrid">* Crie um nome de usuario</label>
        </div>
      </div>
      <div class="col-md">
        <div class="form-floating">
          <input type="password" class="form-control inputUnico" name="senha" id="floatingInputGrid" placeholder="Escolha uma senha segura." required>
          <label for="floatingInputGrid">* Escolha sua melhor senha</label>
        </div>
      </div>
    </div>

    <hr>

    <h2>Dependentes</h2>

    <!--Linha 16-->
    <div id="dependentes">
      <div class="form-group">
      <div class="row g-3 mx-2 my-1">
        <div class="col md-4">

          <input class="form-control inputUnico" type="text" id="nome" name="d_nome" placeholder="Nome">
        </div>
        <div class="col md-4">
          <input class="form-control inputUnico" type="text" id="rg" name="d_rg" placeholder="RG">
        </div>
        <div class="col md-4" id="add">
          <input class="form-control inputUnico" type="text" id="cpf" name="d_cpf" placeholder="CPF">

      </div>
    </div>
    </div>

    <h2>Dados Profissionais</h2>

    <!--Linha 17-->
    <div class="row g-3 mx-2 my-1">
      <div class="col md-6">
        <label>Empresa Atual:</label>
        <input type="text" class="form-control inputUnico" name="empresa_atual" placeholder="Empresa Atual" aria-label="empresaatual">
      </div>
      <div class="col md-6">
        <label>CNPJ:</label>
        <input type="text" class="form-control inputUnico" id="cnpj" name="cnpj_pj" placeholder="Digite seu CNPJ se possuir">
      </div>
    </div>

    <!--Linha 18-->
    <div class="row g-3 mx-2 my-1">
      <div class="col md-6">
        <label>Telefone:</label>
        <input type="text" class="form-control inputUnico" id="tel" name="telefone2" placeholder="Seu número de telefone">
      </div>

      <div class="col md-6">
        <label>Contato:</label>
        <input type="text" id="contato" class="form-control inputUnico" name="contato" placeholder=" Uma forma de contato">
      </div>
    </div>

    <div class="row g-3 mx-2 my-1">
      <div class="col inputUnico" style="text-align: center; font-size: 15px;">
        <h5>* Formato de Contratação:</h5>
        <label for="clt">CLT.</label> 
        <input type="radio" value="CLT"  id="clt" name="forma_contrato" checked> &nbsp; | &nbsp;
        <label for="clt">Autônomo.</label> 
        <input type="radio" value="Autônomo"  id="Autônomo" name="forma_contrato"> &nbsp; | &nbsp;
        <label for="MEI">MEI.</label>
        <input type="radio" value="MEI"  id="MEI" name="forma_contrato"> &nbsp; | &nbsp;
        <label for="informal">Informal.</label>
        <input type="radio"  value="Informal" id="Informal" name="forma_contrato">
      </div>
    
    <div class="row g-3 mx-2 my-1">
      <div class="col md-6" style="display: flex; justify-content: center;">
    <button type="submit" name="acao" class="submit submit1">Enviar</button>
  </div>
</div>
  </form>
</div>


<!--
Empresa onde trabalha
Endereço
Bairro
Cidade
UF
CEP
CNPJ
Tel
Data ADM
Função-->
  
  <script src="../bootstrap-5.0.1-dist/bootstrap-5.0.1-dist/js/bootstrap.min.js"></script>
  <script async="" src="//www.google-analytics.com/analytics.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
  <script src="../js/proximo.js"></script>
  <script type="text/javascript" src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>
  <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
  <script>
    //https://api.jquery.com/click/
    $("#add-campo").click(function () {
      //https://api.jquery.com/append/
      $("#dependentes").append('<div class="row g-3 mx-2 my-1"><div class="col md-4"><input class="form-control" type="text" id="nome" name="titulo[]" placeholder="nome"></div><div class="col md-4"><input class="form-control" type="text" id="rg" name="rg[]" placeholder="rg"></div><div class="col md-4" id="add"><input class="form-control" type="text" id="cpf" name="cpf" placeholder="cpf"></div></div>');
    });
  </script>
</body>

</html>