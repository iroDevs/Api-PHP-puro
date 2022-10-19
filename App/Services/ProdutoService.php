<?php 

namespace App\Services;

use App\Models\Produtos;

class ProdutoService 
{
    public function get(int $id){
        
        if ($id === 0) {
            return Produtos::selectAll();
        }
       
            return Produtos::select($id);
    }

    public function post(){
        $json = file_get_contents("php://input");
        $produto = json_decode($json);

        $response = Produtos::insertOne($produto);

        if (!$response) {
            http_response_code(400);
            die();
            throw new Exception("erro ao criar");
        }
        return [ 'message' => "criado"];
    }

    public function update(){

    }

    public function delete(){

    }
}