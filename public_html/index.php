<?php 
    header('Content-Type: application/json');

    require_once "../vendor/autoload.php";


    if (!$_GET['url']) {
        throw new Exception("Erro ao acessar a url");
       
    }

    $url = explode('/', $_GET['url']);
   
    if ($url[0] !== "api") {
        throw new Exception("Erro ao acessar API (/api...)"); 
    }

    $service = 'App\Services\\'.ucfirst($url[1]).'Service';
    $method = strtolower($_SERVER['REQUEST_METHOD']);
    $id = ($url[2] ? $url[2] : 0);
    
    
    try {
        $response = call_user_func_array(array(new $service, $method),array($id));
        $httpResponse = json_encode(array('status' => 'Sucess', 'headers' => 'Application:JSON', 'content'=> $response));
        http_response_code(200);
        echo $httpResponse;
        return $httpResponse;

    } catch (\Exception $e) {
        http_response_code(400);
        throw new \Exception($e->getMessage());
    }

   
    
    //Entrada para controladores