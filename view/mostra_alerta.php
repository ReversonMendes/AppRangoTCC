<?php
session_start();
 function mostraAlerta($tipo) {
	 if(isset($_SESSION[$tipo])) {
?>
<div id="<?= $tipo ?>"></div>
 <script type="text/javascript">
	$(function(){
		$(document).ready(function(){
			//Alerta por 5 segundos
			$('#<?= $tipo ?>').showBootstrapAlert<?= $tipo ?>('<?= $_SESSION[$tipo]?>', Bootstrap.ContentType.Text, false, 5000);
		});
	});
</script>
<?php
		unset($_SESSION[$tipo]);
	 }
 }
