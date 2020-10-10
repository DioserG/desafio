<?php
	// Conexão com o banco de dados
    include("includes/conexao.php");
?>

<style>
    .texto
    {
      background-color: #878787;
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
    }
</style>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   	<meta charset="Content-Type: text/html; charset=UTF-8">
	<link rel="icon" href="./imagens/logo.png" type="image/gif" sizes="16x16">
	<link href="./bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="./css/layout.css" rel="stylesheet" media="screen">
	<script src="./bootstrap/js/bootstrap.min.js"></script>
	<script src="./includes/jquery-ui/jquery-ui.js"></script> 
	<script src="./includes/script.js"></script> 	
	<script src="./js/jquery-3.3.1.min.js"></script>
	<script src="./includes/js/modernizr.custom.js"></script>

</head>

<div>
	<div class="center_nav">
        <nav class="navbar navbar-inverse ">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="./index.php">Vendas</a></li>
                    <li class="active"><a href="./pesquisar.php">Pesquisar</a></li>
                </ul>
            </div>
		</nav>
	</div>     
</div>

<body>
    <div class="container">
        <div class="row">
            <div class="table-responsive">  
                <table  id="tabela" class="table table-hover" style='font-size:12px' >
                    <thead>
                        <tr>
                            <div class="form-group">
                                <th><input type="text" class="form-control" id="produto" placeholder="PRODUTO"></th>
                            </div>
                            <div class="form-group">
                                <th><input type="text" class="form-control" id="preco" placeholder="PREÇO"></th>
                            </div> 
                            <div class="form-group">
                                <th><input type="text" class="form-control" id="fornecedor" placeholder="FORNECEDOR"></th>
                            </div> 
                        </tr>  
                    <?php
                        $sql = "SELECT * 
                                FROM  venda as v, produtos as p, fornecedores as f
                                WHERE v.produto = p.produto
                                AND   p.fornecedores_id = f.id
                                ORDER BY v.produto";

                        $query = $conexao->query($sql);

                        while($registro = $query->fetch_assoc()){
                            echo '<tr>';
                            echo '<td>'.$registro["produto"].'</td>';
                            echo '<td>'.$registro["preco"].'</td>';
                            echo '<td>'.$registro["nome"].'</td>';
                            echo '</tr>';
                            $count += $registro["preco"];
                        }
                    ?> 
                    </thead>
                    <div class="table-responsive">
                        <table  id="tabela" class="table table-hover" style='font-size:12px' >
                            <thead>
                                <tr>
                                    <div class="form-group">
                                            <label>Valor Total:</label>
                                        <th><?php echo $count?></th>
                                    </div> 
                                </tr>
                            </thead> 
                        </table>  
                    </div>            
                </table>
            </div> 
        </div> 
    </div>   
</body>
</html>    