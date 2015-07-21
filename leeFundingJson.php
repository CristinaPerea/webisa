<?php
	$miJsonURL = "http://www.isa.us.es/apps/api/projects";
	$miJson = file_get_contents($miJsonURL);
	$miJsonDecode = json_decode($miJson);
	//print_r($miJsonDecode);

	function enCurso($date) {
		$caractervacio="";
		$date = substr($date, 0, -9).$caractervacio;
		$mesActual = date("m");
		$añoActual = date("Y");
		$estaEnCurso = false;
		if($añoActual < getYear($date))
			$estaEnCurso = true;
		else {
			if($añoActual == getYear($date)) {
				if($mesActual < getMonth($date))
					$estaEnCurso = true;
			}
		}

		return $estaEnCurso;
	}

	function transformaFecha($date) {
		$fechaFormateada = "";

		$mes = getMonth($date);
		$año = getYear($date);

		switch ($mes) {
			case 1:
				$fechaFormateada .= 'Jan ';
				break;
			case 2:
				$fechaFormateada .= 'Feb ';
				break;
			case 3:
				$fechaFormateada .= 'Mar ';
				break;
			case 4:
				$fechaFormateada .= 'Apr ';
				break;
			case 5:
				$fechaFormateada .= 'May ';
				break;
			case 6:
				$fechaFormateada .= 'Jun ';
				break;
			case 7:
				$fechaFormateada .= 'Jul ';
				break;
			case 8:
				$fechaFormateada .= 'Aug ';
				break;
			case 9:
				$fechaFormateada .= 'Sep ';
				break;
			case 10:
				$fechaFormateada .= 'Oct ';
				break;
			case 11:
				$fechaFormateada .= 'Nov ';
				break;
			default:
				$fechaFormateada .= "Dec ";
				break;
		}

		$fechaFormateada .= $año;

		return $fechaFormateada;
	}

	function getYear($date) {
		$caractervacio="";
		$date = substr($date, 0, -6).$caractervacio;
		return intval($date);
	}

	function getMonth($date) {
		$caractervacio="";
		$date = substr($date, 0, -3).$caractervacio;
		$date = substr($date, 5, 6).$caractervacio;
		return intval($date);
	}
?>