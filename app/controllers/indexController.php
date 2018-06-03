<?php




namespace App\Controllers;

use FrameworkAULA\Http\Controller;
use App\Models\ProdutoModel;

//controller
class IndexController extends BaseController{


	//action
	public function Index(){

		$model = new ProdutoModel();
    //var_dump($model);
		$dados["produto"] = $model->read();

//  var_dump($dados["produto"]);
   //$this->service->render('home/list.home.phtml');

	$this->service->render('home/list.home.phtml',$dados);
	}



	public function cadProduto(){


		$this->service->render('home/cad.home.phtml');
	}


	public function cadProdutoPost(){
		$model = new ProdutoModel();
    //var_dump($model->checkVarsIsNotNull($_POST));
    //$dados = array('descricao' => $_POST["descricao"],"preco"=>$_POST["preco"],"imagem"=>$_POST["imagem"] );
    if($model->checkVarsIsNotNull($_POST)){
	   $dados = array('descricao' => $_POST["descricao"],"preco"=>$_POST["preco"],"imagem"=>$_POST["imagem"] );
			$result = $model->insert($dados);
			if($result){
				$this->response->redirect("/loja")->send();
			// $this->response->redirect("/loja/editProduto/{$result}")->send();
			}else{
	      $this->response->redirect("/loja/erroCadastro")->send();
			}
		}else{
			$this->response->redirect("/cadastro")->send();
		}


		// $model = new ProdutoModel();
		//
		// if($model->checkVarsIsNotNull($_POST)){
		//
		//
		// 	$dados = array('nome' => $_POST["nome"],"phone"=>$_POST["phone"],"email"=>$_POST["email"] );
		// 	$result = $model->insert($dados);
		//
		// 	if($result){
		//
		// 		$this->response->redirect("/editProduto/{$result}")->send();
		// 	}else{
		// 		$this->response->redirect("/erroCadastro")->send();
		// 	}
		// }else{
		// 	$this->response->redirect("/cadastro")->send();
		// }
	}

	public function erroCadastro(){

		echo "erro cadastro";
	}

	public function erroUpdate(){
		echo "erro update";
	}

	public function erroDelete(){
		echo "erro delete";
	}

	public function editProduto(){
		$id = $this->request->id;

		$model = new ProdutoModel();

		$result = $model->read("*","id_produto={$id}");

		if( count($result) > 0){
			$dados["produto"] = $result[0];
			$this->service->render('home/edit.home.phtml',$dados);
		}else{
			$this->response->redirect("/loja")->send();
		}


	}

	public function editProdutoPost(){

		$id = $this->request->id;
		$model = new ProdutoModel();
		if($model->checkVarsIsNotNull($_POST)){


		  $dados = array('descricao' => $_POST["descricao"],"preco"=>$_POST["preco"],"imagem"=>$_POST["imagem"] );
			$result = $model->update($dados,"id_produto={$id}");

			if($result > 0){
				$this->response->redirect("/loja")->send();
			}else{
				$this->response->redirect("/erroUpdate")->send();
			}
		}else{
			$this->response->redirect("/editProduto/{$id}")->send();
		}
	}

	public function deleteProduto(){
		$id = $this->request->id;
		$model = new ProdutoModel();

		$result = $model->delete("id_produto={$id}");

		if($result > 0){
				$this->response->redirect("/loja")->send();
		}else{
			$this->response->redirect("/erroDelete")->send();
		}
	}

	public function modalImagem(){
		   $this->service->render('home/modImagem.home.phtml');
	}

	public function listaProd(){
			$model = new ProdutoModel();
			//var_dump($model);
			$dados["produto"] = $model->read();
		   $this->service->render('home/listProd.home.phtml',$dados);
	}
}
