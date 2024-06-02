<?php

echo "<script>
    var registros = 
`1) Crie um registro
2) Apague um registro
3) Busque um registro
4) Busque todos os registros

Digite a opção: `;

while (true) {

    var registro = window.prompt(registros);
	
	if (registro === '1') {
		var criar_um_registro = window.prompt('Crie um registro: ');
		if (criar_um_registro) {
			window.location = 'chamar.php?opcao_de_registro=criar_um_registro&funcao_registro=' + criar_um_registro;
			break
		}
	} else if (registro === '2') {
		var apagar_um_registro = window.prompt('Apague um registro: ');
		if (apagar_um_registro) {
            window.location = 'chamar.php?opcao_de_registro=apagar_um_registro&funcao_registro=' + apagar_um_registro;
			break
		}
	} else if (registro === '3') {
		var buscar_um_registro = window.prompt('Busque um registro: ');
		if (buscar_um_registro) {
            window.location = 'chamar.php?opcao_de_registro=buscar_um_registro&funcao_registro=' + buscar_um_registro;
			break
		}
	} else if (registro === '4') {
        window.location = 'chamar.php?opcao_de_registro=buscar_todos_os_registros';
	    break
	} else {
		alert('Opção desconhecida!')
	}

}

</script>"

?>