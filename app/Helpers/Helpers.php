<?php

namespace App\Helpers;

class Helpers {
	
	/**
	 * Converte data de BR para formato do banco
	 * @param $data data no formato BR DD/MM/AAAA
	 * @return string data no formato DB AAAA-MM-DD
	 */
	public static function dateToDB($data){
		
		($data)? $data = $data :$data = date("d/m/Y");
		
	    $d = explode("/", $data);
	   return $d[2]."-".$d[1]."-".$d[0];
	}
	
	/**
	 * Converte data formato do banco para BR
	 * @param $data data no formato DB AAAA-MM-DD
	 * @return string data no formato BR DD/MM/AAAA 
	 */
	public static function dateToBR($data){
		
		($data)? $data = $data :$data = date('Y-m-d');
		
	    $d = explode("-", $data);
	    return $d[2]."/".$d[1]."/".$d[0];
	}
	
	
	
}// fim class
	
