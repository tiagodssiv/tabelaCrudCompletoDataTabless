<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "celke";

$conn = mysqli_connect($servername, $username, $password, $dbname);

//Receber a requisão da pesquisa 
$requestData= $_REQUEST;


//Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
$columns = array( 
	0 =>'id',
	1 =>'nome', 
	2 => 'salario',
	3=> 'idade'
);

//Obtendo registros de número total sem qualquer pesquisa
$result_user = "SELECT nome, salario, idade FROM usuarios";
$resultado_user =mysqli_query($conn, $result_user);
$qnt_linhas = mysqli_num_rows($resultado_user);

//Obter os dados a serem apresentados
$result_usuarios = "SELECT id , nome, salario, idade FROM usuarios WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
	$result_usuarios.=" AND ( nome LIKE '".$requestData['search']['value']."%' ";    
	$result_usuarios.=" OR salario LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR idade LIKE '".$requestData['search']['value']."%' )";
}

$resultado_usuarios=mysqli_query($conn, $result_usuarios);
$totalFiltered = mysqli_num_rows($resultado_usuarios);
//Ordenar o resultado
$result_usuarios.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
$resultado_usuarios=mysqli_query($conn, $result_usuarios);

// Ler e criar o array de dados
$dados = array();
while( $row_usuarios =mysqli_fetch_array($resultado_usuarios) ) {  
	 $dado = array(); 
	 $dado[] = $row_usuarios["id"];
	 $dado[] = $row_usuarios["nome"];
	 $dado[] = $row_usuarios["salario"];
	 $dado[] = $row_usuarios["idade"];
     $dado[]="<button type='button' onclick='visualizarUser(".$row_usuarios["id"].")'class='btn btn-info' data-bs-toggle='modal' data-bs-target='#exampleModal' data-bs-whatever='@getbootstrap'>VISUALIZAR</button>".
	 "         <button type='button' onclick='editarUser(".$row_usuarios["id"].");'class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#editar' data-bs-whatever='@getbootstrap'>EDITAR</button>"
	 ."        <button type='button' onclick='excluir(".$row_usuarios["id"].");'class='btn btn-danger' data-bs-toggle='modal' data-bs-target='' data-bs-whatever='@getbootstrap'>DELETAR</button>"	;	
	
	 
	
	
	
	$dados[] = $dado;
}


//Cria o array de informações a serem retornadas para o Javascript
$json_data = array(
	"draw" => intval( $requestData['draw'] ),//para cada requisição é enviado um número como parâmetro
	"recordsTotal" => intval( $qnt_linhas ),  //Quantidade de registros que há no banco de dados
	"recordsFiltered" => intval( $totalFiltered ), //Total de registros quando houver pesquisa
	"data" => $dados   //Array de dados completo dos dados retornados da tabela 
);

echo json_encode($json_data);  //enviar dados como formato json
