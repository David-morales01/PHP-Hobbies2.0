<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/model/Database.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Middleware\MethodOverrideMiddleware;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;


$app = AppFactory::create();
$twig = Twig::create('views', ['cache' => false]);

$app->add(TwigMiddleware::create($app, $twig));
$app->add(new MethodOverrideMiddleware());

$app->get('/', function (Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);

    return $view->render($response, 'home.php');
});

 

$app->get('/users', function (Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);
        
    $db = new Database();
    $users= $db->all();

    return $view->render($response, 'users.php',[
        
         'users' => $users,
    ]);
});

$app->get('/createUsers', function (Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);

    $params =(array)$request->getQueryParams();
    return $view->render($response, 'userCreate.php',[
        
        'errors'=> $params['errors']??[],
        'value'=> $params['value']??[]
    ]);
});


$app->post('/createUsers', function (Request $request, Response $response, $args) {  
    $user=$request->getParsedBody();
    $firstName = $user["firstName"] ?? null;
    $lastName = $user["lastName"] ?? null; 
    $errors = [];
/*explode("",$firstName);
    $string =  str_replace(" ","-", $firstName);
    $arreglo = str_replace("-","", $firstName);

        
    $firstName = $arreglo;

*/
 

    if (! $firstName) {
        $errors['first_name'] = 'error';
    }
    
    if (! $lastName) {
        $errors['last_name'] = 'error';
    }

    if( empty($user['hobbies']) ){

        $stringhobies =  "I am boring";  
        
    }else{
            
        $hobbies = $user['hobbies']; 

        $stringhobies = implode(", ",$hobbies);  
    } 
    if (count($errors) > 0) {
        
     $url = '/createUsers?'. http_build_query(['errors'=> $errors, 'value'=>$user]);

     
    return $response->withHeader('Location', $url)->withStatus(302);

    }else{
        
        $db = new Database();
        $save= $db->save([
            "first_name"=> $firstName,
            "last_name"=> $lastName,
            "hobbies"=> $stringhobies,
        ]);
        return $response->withHeader('Location', '/users')->withStatus(302);
    }
});
 
$app->get('/editUsers/{id}', function (Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);
    $db = new Database();
    $errors=[];
    $uri = $request->getQueryParams();
    $id = $args['id']; 
    
    $value=$uri['value'] ?? null; 
    if(!$value){
        
    $value = $db->find($id); 
    $hobbies =$value['hobbies']; 
    if($hobbies != "I am boring"){
       $nuevoString = trim($hobbies,"{ }");
         $arreglo = explode(",",$nuevoString);

         $value['hobbies']= $arreglo;
    }
    
    }else{


        $value=$uri['value'];  
        $errors=$uri['errors'];  

       
    }



    
    return $view->render($response, 'userEdit.php',[
        'id'=> $id,
        'value'=> $value,
        'errors'=> $errors,
    ]);
});


$app->post('/editUsers', function (Request $request, Response $response, $args) { 
    $user=$request->getParsedBody();
    $firstName = $user["first_name"] ?? null;
    
    $id = $user["id"] ?? null;
    $lastName = $user["last_name"] ?? null; 
    $errors = [];

    if (! $firstName) {
        $errors['first_name'] = 'error';
    }
    
    if (! $lastName) {
        $errors['last_name'] = 'error';
    }
     


    if( empty($user['hobbies']) ){

        $stringhobies =  "I am boring";  
        
    }else{
            
        $hobbies = $user['hobbies']; 

        $stringhobies = implode(", ",$hobbies);  
    } 



    if (count($errors) > 0) {


       
       
     $url = '/editUsers/'. $id . '?' . http_build_query(['errors'=> $errors, 'value'=>$user]); 
     
        return $response->withHeader('Location', $url)->withStatus(302);

 
    }else{
        
        $db = new Database();
        $save= $db->edit($id,[
            "first_name"=> $firstName,
            "last_name"=> $lastName,
            "hobbies"=> $stringhobies,
        ]);
        return $response->withHeader('Location', '/users')->withStatus(302);
    }
});

$app->get('/showUsers/{id}', function (Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);
    $db = new Database(); 
    $id = $args['id']; 
    
    $value = $db->find($id); 
    $hobbies =$value['hobbies']; 

  
    
    



    
    return $view->render($response, 'showUsers.php',[
        'id'=> $id,
        'value'=> $value, 
    ]);
});
$app->get('/deleteUsers/{id}', function (Request $request, Response $response, $args) {
    
        
    $db = new Database();
    $delete= $db->delete($args['id']);
    return $response->withHeader('Location', '/users')->withStatus(302);
});
 
 
 
 

$app->run();