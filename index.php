<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD COMPLETO TABELA DATA TABLES</title>
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  <!--link javascript para mascara em  input -->
  <script src="https://rawgit.com/RobinHerbots/Inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<!--link javascript para mascara em  input de valor em dinheiro-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
	  <script src="script.js" type="text/javascript" language="javascript"></script>
  
	  <script type="text/javascript" language="javascript">
$(document).ready(function(){
		 
	
				$('#listar-usuario').DataTable({
    language: {
		
			//traduzir para portugues diretamentepelo código.Não necessita de internet se os plugins estao local
		
           lengthMenu: 'Mostrando _MENU_ Registros por página',
            zeroRecords: 'Nada encontrado - Desculpe',
            info: 'Mostrando página _PAGE_ de  _PAGES_',
            infoEmpty: 'Nenhum regisro disponível',
			previous: 'Anterior',
			  paginate: {
        next: 'Próximo',
        previous: 'Anterior',
        first: 'Primeiro',
        last: 'Último',
    },search: 'Pesquisar',
			  
			  
            infoFiltered: '(Filtrado de  _MAX_ Total de registros)'
			


			//traduzir para portugues diretamente por url

			 // "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"
        },


			
				"processing": true,
				"serverSide": true,
				"ajax": {
					"url": "proc_pesq_user.php",
					"type": "POST"
				}	
			});
	
 $(".alert").removeClass('hidden');
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
  }, 2000); 
//mascara para valores em dinheiro
			$(function() {
  $('#dinheiroComZero').maskMoney({ decimal: ',', thousands: '.', precision: 2 });
  //$('#dinheiroSemZero').maskMoney({ decimal: ',', thousands: '.', precision: 0 });
 // $('#dinheiroVirgula').maskMoney({ decimal: '.', thousands: ',', precision: 2 });
});
$("input[id*='idade']").inputmask({
 mask: ["99"],
 keepStatic: true
});
});
		
		
		
		
	
		</script>
	</head>
	<body>
		  	<h1 style="margin-top:30px;text-align:center;" > LISTA DE USUÁRIOS</h1>
	
		<div class="container">
  <div class="row">
    <div class="col-sm">
   </div>
    <div class="col-sm">
     
   
    </div>
	 <div class="col-sm">
          
    </div>
	 <div class="col-sm">
       <button type="button" class="btn btn-dark" data-bs-toggle='modal' data-bs-target='#modalcad'>NOVO USUÁRIO</button>

    </div>
  
  </div>
</div><div class="row">
  <div style="margin-left:10px;margin-right:20%;"id="alert_deletar" class="col-sm-12">
  <div id="alert_deletar"></div>
  </div>
  
</div>
		<table style="margin-top:30%;"id="listar-usuario" class=" table table-dark table-hover " style="width:100%">
			<thead>
				<tr>
			 	    <th>Id</th>
					<th>Nome</th>
					<th>Salario</th>
					<th>Idade</th>
					<th>Opções</th>
					
				</tr>
			</thead>
		</table>	




<div class="modal fade"  id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Usuário</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
	   <div id="user"style="align:center;"class="card text-white  bg-secondary mb-3" style="max-width: 18rem;">
 
</div>
	   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">FECHAR</button>
     </div>
    </div>
  </div>
</div>		


<div class="modal fade"  id="editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
	  
        <h5 style=""class="modal-title" id="exampleModalLabel">EDITAR USUÁRIO</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
     
	 </div>
      <div class="modal-body">
<div id="alerta"></div>
	   <div id="editar"style="align:center;"class="card text-white   mb-3" style="max-width: 18rem;">
 <form style="margin:20px;">
 <div id="inputs">
</div>
  <button onclick="editar();"style="margin-top:10px;" type="button" class="btn btn-primary">SALVAR</button>
</form>

	   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">FECHAR</button>
     </div>
    </div>
  </div>
</div>	</div>




</div>



<div class="modal fade bd-example-modal-lg" id="modalcad" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
	  
        <h5 style=""class="modal-title" id="exampleModalLabel">CADASTRAR USUÁRIO</h5>
       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
     
	 </div>
	 
	 <div id="aler"></div>
	 
	 <form style="margin:20px;">
 <div class="form-group">
    <label for="exampleInputEmail1">NOME</label>
     <input type="text" class="form-control" id="nome" aria-describedby="emailHelp" placeholder="Digite Nome">
   
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">SALÁRIO</label>
    <input type="text"  id="dinheiroComZero" class="form-control"  placeholder="Digite Salário">
  </div>
   
   <div class="form-group">
    <label for="exampleInputPassword1">IDADE</label>
    <input id="idade"  type="text" class="form-control" placeholder="Digite Idade">
  </div>
  <button onclick="cadastrar();"style="margin-top:10px;" type="button" class="btn btn-dark">SALVAR USUÁRIO</button>
</form>
  
  <div class="modal-footer">
    </div>
  </div>
  
	 
    </div>
  </div>







	</body>
</html>
