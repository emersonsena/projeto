<?php



namespace App\Models;

use FrameworkAULA\Data\Model;

//controller
class ProdutoModel extends Model{

	protected $table = "produtos";


	public function checkVarsIsNotNull(array $array){

		if(!IsNullOrEmpty($array["descricao"]) && !IsNullOrEmpty($array["preco"]) && !IsNullOrEmpty($array["imagem"])){
			return true;
		}else{
				return false;
		}
	}

}
