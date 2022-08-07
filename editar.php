<?php
require_once('conexao.php');
// ESSE ARQUIVO editar.php  TEM  TODOS OS CÓDIGOS DO CRUD .O AJAX TRAZ E BUSCA DADOS  DESTE DOCUMENTO PHP
//preenche os campo modal editar
if(!empty($_POST['codigo'])){
	
	$stmt = $conexao->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->bindParam(1, $_POST['codigo']);
        if ($stmt->execute()) {
            $rs = $stmt->fetch(PDO::FETCH_OBJ);
           // $id = $rs->id;
		   
            $nome = $rs->nome;
            $idade = $rs->idade;
            $salario = $rs->salario;
			
			echo '  <div class="form-group">
    <label for="exampleInputEmail1">NOME</label>
     <input type="text" value="'.$_POST['codigo'].'"class="form-control" id="id" aria-describedby="emailHelp" placeholder="Digite Nome">
   
   <input type="text" class="form-control" value="'.$nome.'" id="nu" aria-describedby="emailHelp" placeholder="Digite Nome">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">SALÁRIO</label>
    <input type="text" value="'.$salario.'" id="dinheiroComZero" class="form-control"  placeholder="Digite Salário">
  </div>
   
   <div class="form-group">
    <label for="exampleInputPassword1">IDADE</label>
    <input id="idade" value="'.$idade.'" type="text" class="form-control" placeholder="Digite Idade">
  </div>
  
 
  </div>';
			
			
		}
}	
		
//edita os dados vindo do ajax do botão salvar do modal editar
		if(!empty($_POST['id'])){
	
		$nome=ucfirst($_POST['nome']);
	$salario=$_POST['salario'];
		$idade=$_POST['idade'];
			$id=$_POST['id'];
				
	
	
	$stmt = $conexao->prepare("UPDATE usuarios SET nome=? , salario=? , idade=?  WHERE id = ?");
    $stmt->bindParam(1, $nome);
    $stmt->bindParam(2, $salario);
    $stmt->bindParam(3, $idade);
    $stmt->bindParam(4, $id);

if ($stmt->execute()) {
           
                  echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Sucesso!</strong> Dados Alterados!
 
</div>';
          
}
}

	if(!empty($_POST['excluir'])){
		
		$id=$_POST['excluir'];
		
 try {
        $stmt = $conexao->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->bindParam(1, $id);
        if ($stmt->execute()) {
                       echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Sucesso!</strong> Dados Apagados!
 
</div>';
           
        } else {
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
       
    }
		
		
		
		
	}
//cadastrar usuarios
if(!empty($_POST['nome_cad'])){
	$nome_cad=ucfirst($_POST['nome_cad']);
	$salario_cad=$_POST['salario_cad'];
		$idade_cad=$_POST['idade_cad'];
   
        $stmt = $conexao->prepare("INSERT INTO usuarios (nome , salario , idade) VALUES (?, ?, ?)");
        $stmt->bindParam(1,$nome_cad);
        $stmt->bindParam(2,$salario_cad);
        $stmt->bindParam(3,$idade_cad);
         
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
               echo'<div style="margin:10px;"class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Sucesso!</strong> Dados Cadastrados!
 
</div>';
		} }
    
	
	
	
}



?>
