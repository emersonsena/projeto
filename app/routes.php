<?php




//Rota principal
$route->get("/","Index@Index");

//tela de cadastro
$route->get("/cadastro","Index@cadProduto");

$route->get("/erroCadastro","Index@erroCadastro");
$route->get("/erroUpdate","Index@erroUpdate");
$route->get("/erroDelete","Index@erroDelete");



$route->get("/editProduto/[i:id]","Index@editProduto");
$route->post("/editProduto/[i:id]","Index@editProdutoPost");

$route->get("/deleteProduto/[i:id]","Index@deleteProduto");

$route->post("/cadastro","Index@cadProdutoPost");


//tela de Edição
//$route->get("/edit","Index@editProduto");


//Rota de Login
$route->get("/login","Login@telaInicial");
