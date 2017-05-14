<?php

require_once("agua.php");
require_once("asfalto.php");
require_once("esgoto.php");
require_once("iluminacao.php");
require_once("lixo.php");

header("Content-type: application/json; charset=utf-8");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, token, usuario");
header("Access-Control-Allow-Origin: *");

$url = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$queryString = $_SERVER['QUERY_STRING'];

//identifica o método http da requisição
switch ($method) {
	case 'POST':
		//identifica a URL pra qual foi feita a requisição
		switch ($url) {
			case '/LUPANH/api/agua':
				$latitude = addslashes($_POST['latitude']);
				$longitude = addslashes($_POST['longitude']);
				$encanada = addslashes($_POST['encanada']);
				$poco = addslashes($_POST['poco']);
				$tipoPoco = addslashes($_POST['tipo_poco']);

				Agua::adicionar($latitude, $longitude, $encanada, $poco, $tipoPoco);

				break;
				
				
			case '/LUPANH/api/asfalto':
				$latitudeInicial = addslashes($_POST['latitude_inicial']);
				$longitudeInicial = addslashes($_POST['longitude_inicial']);
				$latitudeFinal = addslashes($_POST['latitude_final']);
				$longitudeFinal = addslashes($_POST['longitude_final']);

				Asfalto::adicionar($latitudeInicial, $longitudeInicial, $latitudeFinal,$longitudeFinal);

				break;
			
			case '/LUPANH/api/esgoto':
				$latitude = addslashes($_POST['latitude']);
				$longitude = addslashes($_POST['longitude']);
				$esgoto = addslashes($_POST['esgoto']);

				Esgoto::adicionar($latitude, $longitude, $esgoto);

				break;
				
			case '/LUPANH/api/iluminacao':
				$latitude = addslashes($_POST['latitude']);
				$longitude = addslashes($_POST['longitude']);
				$poste = addslashes($_POST['poste']);
				$lampada = addslashes($_POST['lampada']);

				Iluminacao::adicionar($latitude, $longitude, $poste, $lampada);

				break;
				
			case '/LUPANH/api/lixo':
				$latitude = addslashes($_POST['latitude']);
				$longitude = addslashes($_POST['longitude']);
				$coleta = addslashes($_POST['coleta']);
				$frequencia = addslashes($_POST['frequencia']);

				Lixo::adicionar($latitude, $longitude, $coleta, $frequencia);

				break;
			
			default:
				echo "Você não pode acessar esse local!";
				break;
		}
		break;
	
	case 'GET':
		//identifica a URL pra qual foi feita a requisição
		switch ($url) {
			case '/LUPANH/api/agua':
				Agua::consultar();
				
				break;

			case '/LUPANH/api/asfalto':
				Asfalto::consultar();
				
				break;

			case '/LUPANH/api/esgoto':
				Esgoto::consultar();
				
				break;

			case '/LUPANH/api/iluminacao':
				Iluminacao::consultar();
				
				break;

			case '/LUPANH/api/lixo':
				Lixo::consultar();
				
				break;
					
			default:
				echo "Você não pode acessar esse local!";
				break;
		}
				
		break;
	
	default:
		echo "Você não pode acessar esse local!";
		break;
}

