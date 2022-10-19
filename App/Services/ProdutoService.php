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

    }

    public function update(){

    }

    public function delete(){

    }
}