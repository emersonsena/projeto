<?php


function base_url(){

	$proto = strtolower(preg_replace("/[^a-zA-Z\s]/", '', $_SERVER["SERVER_PROTOCOL"]));

	$serve_name = $_SERVER["SERVER_NAME"];

	$port =$_SERVER["SERVER_PORT"] == "80" ? "" : ":".$_SERVER["SERVER_PORT"];

	$scriptname = str_replace("/index.php", "", $_SERVER["SCRIPT_NAME"]);

	$request_uri = $_SERVER["REQUEST_URI"];

	//print("base_url".$request_uri);

	return "{$proto}://{$serve_name}{$port}{$scriptname}";
}


function assets($file){

	return base_url().ASSETS."{$file}";
}


function IsNullOrEmpty($var){

	if(empty($var) || $var == null)
		return true;

	return false;
}
