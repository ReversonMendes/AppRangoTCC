totals =0;

function adiciona_ingrediente(){
		totals++
		tbl = document.getElementById("tabela_ingrediente")

		var novaLinha = tbl.insertRow(-1);
		var novaCelula;

		novaCelula = novaLinha.insertCell(0);
		novaCelula.innerHTML = "<input class='form-control' type='text' name='ingrediente["+totals+"]'/>";


		novaCelula = novaLinha.insertCell(1);
		novaCelula.align = "center";
		novaCelula.innerHTML = "<a class='btn btn-danger' id='excluir' value='excluir' onclick='deleta_ingrediente("+totals+")'><i class='fa fa-minus'></i></a>";
}

function adiciona_ingredientealt(total){
		totals = total;
		totals++
		tbl = document.getElementById("tabela_ingredientealt")

		var novaLinha = tbl.insertRow(-1);
		var novaCelula;

		novaCelula = novaLinha.insertCell(0);
		novaCelula.innerHTML = "<input class='form-control' type='text' name='ingrediente["+totals+"]'/>";


		novaCelula = novaLinha.insertCell(1);
		novaCelula.align = "center";
		novaCelula.innerHTML = "<a class='btn btn-danger' id='excluir' value='excluir' onclick='deleta_ingrediente("+totals+")'><i class='fa fa-minus'></i></a>";
}



function deleta_ingrediente(linha){
	document.getElementById("tabela_ingrediente").deleteRow(linha);
}

function retorna_ingrediente(linha){
	document.getElementById("ingrediente");
	console.log(document.getElementById("ingrediente"))
}
