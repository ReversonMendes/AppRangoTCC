<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<!-- Inclusão do Jquery -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js" ></script>
<!-- Inclusão do Jquery Validate -->
<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.6/jquery.validate.js" ></script>

<script type="text/javascript">
    $(document).ready(function valida(){
        $('#form').validate({
			
            rules:{
                senhaREL: {
                    required: true
                },
                conf_senha:{
                    required: true,
                    equalTo: "#senhaREL"
                },
				
			},
				
            messages:{

                senhaREL: {
                    required: "O campo senha é obrigatório."
                },
                conf_senha:{
                    required: "O campo confirmação de senha é obrigatório.",
                    equalTo: "O campo confirmação de senha deve ser idêntico ao campo senha."
                },
				
			},
 
        });
    });
</script>



</head>
 
<?php
include ("conexaoREL.php");
?>
 
<?php
if(!$_SESSION["loginREL"])
die("<h3>Você não tem autorização para entrar nesta página!</h3>");
else  
?> 

<?php             
$redefinir = $_SESSION["loginREL"];                               
                          
$sql_senhaREL = mysql_query("SELECT * FROM relatores WHERE loginREL='$redefinir'");
while($linha = mysql_fetch_array($sql_senhaREL))
{
$mostrar_senhaREL = $linha["senhaREL"];

}
?>
    
<?php
if(!$_SESSION["loginREL"])
die("<h3>Você não tem autorização para entrar nesta página!</h3>");
else  
?> 
          
        <form id="form" action="" method="post">
            <table>
                
                <tr>
                    <td>Nova senha:</td>
                    <td><input type="password" name="senhaREL" id="senhaREL" size="20" /></td>
                </tr>
                
                <tr>
                    <td>Confirmar senha:</td>
                    <td><input type="password" name="conf_senha" size="20"  /></td>
                </tr>

                <tr>
                    <td><input type="submit" name="enviar" value="Confirmar"></input></td>   
                </tr>

            </table>

        </form>
    
    </body>
    
    <?php
    include ("conexaoREL.php");
    ?>

    
    <?php
   if($_POST["enviar"])
       {
    $senhaREL = $_POST["senhaREL"];
    
    if($senhaREL != ""){
$senhaREL = md5($senhaREL);}
    
    $modifica = "UPDATE relatores SET senhaREL='$senhaREL'";
    mysql_query($modifica,$conexao);
    
    echo "<script> alert ('Senha alterada com sucesso!'); </script>";
    
   }
?>
    
</html>