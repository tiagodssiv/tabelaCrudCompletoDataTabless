	
	function editarUser(id){
		 
	/* preenche o modal assim que clicar no botão editar.Esta função envia
	o código ao php e retorna os campos do form que compõe o modal já preenchidos
	
	*/	 
 var cod =id;

 $.ajax({
     type: "POST",
	  
     url: "http://localhost/tabelaBuscaCompleto/editar.php",
	  
     data: {codigo:cod},
     success: function(msg){
		 
 //alert(msg);
//  $("#tab").hide();
      // $("#tab").html("");
	   $("#inputs").html(msg);
    }	
  });
	 }	
	 
	 
	  function visualizarUser(id){
		  
		  	 
	/* envia o id para o php visualizar.php e recebe uma div com os dados do usuário	*/
 var cod =id;
 
 $.ajax({
     type: "POST",
	  
     url: "http://localhost/tabelaBuscaCompleto/visualizar.php",
	  
     data: {dados:cod},
     success: function(msg){

	   $("#user").html(msg);
    }	
  });
	 }
	 
	 function editar(){
		/* envia o id para o php editar.php e recebe uma div com os dados do usuário	*/
		 
 var cod = $("#id").val();//document.getElementById("id").value();

 var nome = $("#nu").val();
 var idade =  $("#idade").val();//var nome= document.getElementById("idade").value();
 var salario = $("#dinheiroComZero").val();// var nome=  document.getElementById("dinheiroComZero").value();
 alert(nome);

 $.ajax({
     type: "POST",
	  
     url: "http://localhost/tabelaBuscaCompleto/editar.php",
	  
     data: {id:cod,nome:nome,idade:idade,salario:salario},
     success: function(msg){

	   $("#alerta").html(msg);
	   
	   
	   var i = setInterval(function () {
    
    clearInterval(i);
  
    location.href="http://localhost/tabelaBuscaCompleto/";
       
}, 4000);

	   
	   
	   
	   
	      
    }	
  });
	 }
	 
			function excluir(id) {
	/* envia o id para o php editar.php e recebe uma div com os dados do usuário	*/
if(confirm('Deseja realmente excluir este registro?')){
	
	
	
	var cod =id;
 
 $.ajax({
     type: "POST",
	  
     url: "http://localhost/tabelaBuscaCompleto/editar.php",
	  
     data: {excluir:cod},
     success: function(msg){

	   $("#alert_deletar").html(msg);
	   
	      var i = setInterval(function () {
    
    clearInterval(i);
  
    location.href="http://localhost/tabelaBuscaCompleto/";
       
}, 1400);
    }	
  });
	
	
	
	
	
		}}


function cadastrar() {
	/* envia o id para o php editar.php e recebe uma div com os dados do usuário	*/
 var nome = $("#nome").val();
 var idade =  $("#idade").val();//var nome= document.getElementById("idade").value();
 var salario = $("#dinheiroComZero").val();// var nome=  document.getElementById("dinheiroComZero").value();
 
 
 //valida os campos .Após validação o cadastro ocorre
if(salario==""  ){
	$("#aler").html("<div style='margin:10px;'class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Atenção!</strong> Capo Salário não pode estar em branco !</div>");
	
	
	
	
		  var i = setInterval(function () {
    
    clearInterval(i);
	$("#aler").html("");
	$("#dinheiroComZero").focus();
	
  
 //   location.href="http://localhost/tabelaBuscaCompleto/";
       
}, 1400);
	
}else if(nome=="" ){
	
	
	$("#aler").html("<div style='margin:10px;'class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Atenção!</strong> Capo Nome não pode estar em branco !</div>");
	      var i = setInterval(function () {
    
    clearInterval(i);
	$("#aler").html("");
	$("#nome").focus();
	
  
 //   location.href="http://localhost/tabelaBuscaCompleto/";
       
}, 1400);
	
	
}
else if(idade==""){
	
	$("#aler").html("<div style='margin:10px;'class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Atenção!</strong> Capo Idade não pode estar em branco !</div>");
	      var i = setInterval(function () {
    
    clearInterval(i);
	$("#aler").html("");
	$("#idade").focus();
	
  
 //   location.href="http://localhost/tabelaBuscaCompleto/";
       
}, 1400);
	
	
}
else{
	
	
	$.ajax({
     type: "POST",
	  
     url: "http://localhost/tabelaBuscaCompleto/editar.php",
	  
     data: {nome_cad:nome , idade_cad:idade , salario_cad:salario},
     success: function(msg){

	   $("#aler").html(msg);
	  
	      var i = setInterval(function () {
    
    clearInterval(i);
  
    location.href="http://localhost/tabelaBuscaCompleto/";
       
}, 1400);
    }	
  });
	
}


		}