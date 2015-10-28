totals =0;

function adiciona_ingrediente(){
		tbl = document.getElementById("tabela_ingrediente")
		totals = totalLinha(tbl);
		totals++

		var novaLinha = tbl.insertRow(-1);
		var novaCelula;

		novaCelula = novaLinha.insertCell(0);
		novaCelula.innerHTML = "<input class='form-control' type='text' name='ingrediente["+totals+"]' required/>";


		novaCelula = novaLinha.insertCell(1);
		novaCelula.align = "center";
		novaCelula.innerHTML = "<a class='btn btn-danger' id='excluiringr' value='excluir' onclick='deleta_ingrediente("+totals+")'><i class='fa fa-minus'></i></a>";
}

function adiciona_ingredientealt(){
		tbl = document.getElementById("tabela_ingredientealt");
		totals = totalLinha(tbl);
		totals++
		

		var novaLinha = tbl.insertRow(-1);
		var novaCelula;

		novaCelula = novaLinha.insertCell(0);
		novaCelula.innerHTML = "<input class='form-control' type='text' name='ingrediente["+totals+"]' required/>";


		novaCelula = novaLinha.insertCell(1);
		novaCelula.align = "center";
		novaCelula.innerHTML = "<a class='btn btn-danger' id='excluiringr' value='excluir' onclick='deleta_ingredientealt("+totals+")'><i class='fa fa-minus'></i></a>";
}



function deleta_ingrediente(linha){
	document.getElementById("tabela_ingrediente").deleteRow(linha);
}

function deleta_ingredientealt(linha){
	document.getElementById("tabela_ingredientealt").deleteRow(linha);
}

function totalLinha(tbl) {
    var x = tbl.getElementsByTagName("tr");
    return x.length-1;
}