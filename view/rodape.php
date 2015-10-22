</body>
<script>
$(document).ready(function(){
	   $("#cep").mask("99.999-999");
       $("#cnpj").mask("99.999.999/9999-99");
       $("#data").mask("99/99/9999");
       $("#datanascimento").mask("99/99/9999");
       $("#telefone").mask("(999)9999-9999");
       $("#valor").maskMoney({prefix:'R$ ', thousands:'.', decimal:',', symbolStay: true});
       $("#peso").maskMoney({suffix:' Kg', thousands:'.', decimal:',', symbolStay: true, precision:3});
});
</script>

</html>
