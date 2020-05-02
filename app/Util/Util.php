<?php

namespace App\Util;
use Illuminate\Support\Facades\DB;


class Util{

	/**
	*	Retira os acentos de uma string e a converte 
	*	para letras pequenas
	**/
	public static function tirarAcentoELetraGrande($palavra){
		return iconv('UTF-8', 'ASCII//TRANSLIT', strtolower($palavra));
	}

	/**
	*	converte data coletada no excel para o formato
	* 	de banco de dados
	**/
	public static function formatExcelDataToUS($data){
		$data = date('Y-m-d',\PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($data));
		$data = date('Y-m-d',strtotime($data.'+1 day'));
		return $data;
	}

	/**
	*	Converte data do banco de dados para data no
	*	formato brasileiro
	**/
	public static function formatDataToBR($data){
		return date('d/m/Y',strtotime($data));
	}

	/**
	*	Converte data do formato brasileiro para o 
	* 	formato do banco de dados
	**/
	public static function formatBRToData($data){
		return date('Y-m-d',strtotime(str_replace('/','-',$data)));
	}

	/**
	*	retira acentos e caracteres especiais de string
	**/
	public static function limparString($string){

		$search 	= ['á','à','â','Â','ã','Ã','Á','À','é','è','ê','ẽ','Ê','Ẽ','É','È','í','ì','î','Î','ĩ','Ĩ','Í','Ì','ó','ò','ô','õ','Ô','Õ','Ó','Ò','ú','ù','Ú','Ù','û','ũ','Û','Ũ','ç','Ç'];
		$replace 	= ['a','a','a','A','a','A','A','A','e','e','e','e','E','E','E','E','i','i','i','I','i','I','I','I','o','o','o','o','O','O','O','O','u','u','U','U','u','u','U','U','c','C'];

		return str_replace($search, $replace, $string);

	}

	/**
	*	retira pontuacao
	**/
	public static function sanitize($string){

		$search 	= ['.',',','/',':',';','-','(',')',' '];
		$replace 	= ['' ,'' ,'' ,'' ,'' ,'','','',''];

		return str_replace($search, $replace, $string);

	}

}