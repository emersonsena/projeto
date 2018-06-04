<?php



namespace App\Models;

use FrameworkAULA\Data\Model;

//controller
class ProdutoModel extends Model{

	protected $table = "produtos";


	public function checkVarsIsNotNull(array $array){

		if(!IsNullOrEmpty($array["nome"]) && !IsNullOrEmpty($array["descricao"]) && !IsNullOrEmpty($array["preco"]) ){
			return true;
		}else{
				return false;
		}
	}

}
