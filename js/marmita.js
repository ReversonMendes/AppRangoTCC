totals =0;

function adiciona_ingrediente(){
		totals++
		tbl = document.getElementById("tabela_ingrediente")

		var novaLinha = tbl.insertRow(-1);
		var novaCelula;

		novaCelula = novaLinha.insertCell(0);
		novaCelula.innerHTML = "<input class='form-control' type='text' name='ingrediente["+totals+"]'/>";

<<<<<<< HEAD
=======
		novaCelula = novaLinha.insertCell(1);
		novaCelula.innerHTML = "<input class='form-control' type='text' name='ingrediente["+totals+"]'/>";
>>>>>>> 886eb94294c3156be13894db054d50524369d7e2

		novaCelula = novaLinha.insertCell(1);
		novaCelula.align = "center";
		novaCelula.innerHTML = "<button class='btn btn-danger' id='excluir' value='excluir' onclick='deleta_ingrediente("+totals+") '>Excluir</button>";
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
		novaCelula.innerHTML = "<button class='btn btn-danger' id='excluir' value='excluir' onclick='deleta_ingrediente("+totals+") '>Excluir</button>";
}



function deleta_ingrediente(linha){
	document.getElementById("tabela_ingrediente").deleteRow(linha);
}

function retorna_ingrediente(linha){
	document.getElementById("ingrediente");
	console.log(document.getElementById("ingrediente"))
}
