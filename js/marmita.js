totals =0;

function adiciona_ingrediente(){
		totals++
		tbl = document.getElementById("tabela_ingrediente")

		var novaLinha = tbl.insertRow(-1);
		var novaCelula;


		novaCelula = novaLinha.insertCell(0);
		novaCelula.align = "left";
		novaCelula.innerHTML = "&nbsp;"+totals+"";

		novaCelula = novaLinha.insertCell(1);
		novaCelula.innerHTML = "<input class='form-control' type='text' name='ingrediente["+totals+"]'/>";

		novaCelula = novaLinha.insertCell(2);
		novaCelula.align = "center";
		novaCelula.innerHTML = "<button class='btn btn-danger' id='excluir' value='excluir' onclick='deleta_ingrediente("+totals+") '>Excluir</button>";
}




function deleta_ingrediente(linha){
	document.getElementById("tabela_ingrediente").deleteRow(linha);
}

function retorna_ingrediente(linha){
	document.getElementById("ingrediente");
	console.log(document.getElementById("ingrediente"))
}
