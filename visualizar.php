<?php
require_once('conexao.php');

//recebe o id do ajax e pega os dados do usuário com o id correpondente e retorna para o ajax uma div com os dados 
if(!empty($_POST['dados'])){
	
	$id=$_POST['dados'];

        $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->bindParam(1, $id);
        if ($stmt->execute()) {
            $rs = $stmt->fetch(PDO::FETCH_OBJ);
            $id = $rs->id;
            $nome = $rs->nome;
            $email = $rs->salario;
            $celular = $rs->idade;
        } 
   echo' <div class="card-header">Nome : <span id="nome">'.$nome.'</span></div>
  <div class="card-body">
    <h5 class="card-title">Salário : <br><span>'.$email.' <br>Idade - '.$celular.'</span></h5>
    <p class="card-text">As informações são referentes aos usuários ,salvas no momento do cadastro</p>
  </div>';








	
	
}






?>