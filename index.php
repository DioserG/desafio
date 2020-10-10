<?php
	// Conexão com o banco de dados
    include("includes/conexao.php");
    

    if(isset($_POST['action']) && $_POST['action'] == 'cadastrar')
    {
	venda();
    }
?>

<style>
    .button 
    {
      background-color: #4CAF50;
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
   	<meta   charset="Content-Type: text/html; charset=UTF-8">
	<link   href="./bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
	<link   href="./css/layout.css" rel="stylesheet" media="screen">
	<script src="./bootstrap/js/bootstrap.min.js"></script>
	<script src="./includes/jquery-ui/jquery-ui.js"></script> 
	<script src="./includes/script.js"></script> 	
	<script src="./js/jquery-3.3.1.min.js"></script>
	<script src="./includes/js/modernizr.custom.js"></script>

</head>
<body>
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


<form method="post" action="index.php" name="form1">
	<table border="0" cellpadding="3" cellspacing="0" width="100%">
        <?php $style = "style='min-width: 400px'"; ?>	
        
        <tr>
            <td width="35%" style="text-align:right">
                <b>Produto:</b>
            </td>
            <td>
                <select  class='texto' <?=$style?> id="cb_prod" name="cb_prod" required>
                    <?php 
                        $consulta = "SELECT   `produto`
                                     FROM     `produtos`
                                     ORDER BY `produto`";	
                        $result = $conexao->query($consulta);
                        echo "<option value=''>Nenhuma</option>";
                        while($linha = mysqli_fetch_array($result))
                        {
                            $selected = ($linha['id'] == $_POST['cb_prod']) ? 'selected' : '';
                            echo "<option value='$linha[produto]'>$linha[produto]</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <br/>
        <br/>
        <tr>
			<td width="20%" style="text-align:right"><b>Entrega:</b></td>
			<td>
                <input class='texto' style='min-width: 392px' id="tx_entrega" name="tx_entrega" type="text" required>  
			</td>	
        </tr>
        <br/>
        <!-- Botão Alterar Inicio-->
        <tr>
            <td></td> 
            <td>
                <p>
                    <input type="hidden" name="action" value="cadastrar" >
                    <input class="button" type="submit" value="Comprar"/>
                    <a href="index.php?a=reset_form">Resetar</a></p> 
                </p>    
            </td>
         </tr>
         <!-- Botão Alterar Inicio-->
	
	</table>		

	<br>
    <br>
</form> 

</body>
</html>    

<?php 
    function venda()
    {
        global $conexao;

        $consulta = "INSERT INTO venda ( 
                                     entrega, 
                                     produto) 
                            VALUES ('$_POST[tx_entrega]', 
                                    '$_POST[cb_prod]');";

        $conexao->query($consulta);// atualiza

        if(mysqli_affected_rows($conexao) > 0)
        {
            echo "Cadastrado com sucesso!";
        }
        echo $conexao->error;
        echo "<br/>";
        //echo "Ocorreu um erro ao alterar coletor! Todos campos devem estar preenchidos!!!";
    }    
?>