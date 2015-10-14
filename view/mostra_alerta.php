
<?php
session_start();
 function mostraAlerta($tipo) {
	 if(isset($_SESSION[$tipo])) {

?>
<div id="<?= $tipo ?>"></div>

<script type="text/javascript">
	$(function(){
		$(document).ready(function(){
<<<<<<< HEAD
			$('#Danger').showBootstrapAlert<?= $tipo ?>("<?= $_SESSION[$tipo]?>", Bootstrap.ContentType.Text, true);
			//Alerta por 5 segundos
			$('#Success').showBootstrapAlert<?= $tipo ?>("<?= $_SESSION[$tipo]?>", Bootstrap.ContentType.Text, false, 5000);
=======
			$('#Danger').showBootstrapAlert<?= $tipo ?>('<?= $_SESSION[$tipo]?>', Bootstrap.ContentType.Text, true);
			//Alerta por 5 segundos
			$('#Success').showBootstrapAlert<?= $tipo ?>('<?= $_SESSION[$tipo]?>', Bootstrap.ContentType.Text, false, 5000);
>>>>>>> 886eb94294c3156be13894db054d50524369d7e2
		});
	});
</script>
<?php
		unset($_SESSION[$tipo]);
	 }
 }
