<?php
session_start();
 function mostraAlerta($tipo) {
	 if(isset($_SESSION[$tipo])) {
?>
 <div class="alert alert-<?= $tipo ?> alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong><?= $_SESSION[$tipo]?></strong>
 </div>
<?php
		unset($_SESSION[$tipo]);
	 }
 }
