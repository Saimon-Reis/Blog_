<?php 
include_once '../config/db.php';

$response = [];

try {
   if(empty([$_POST['email']])){
    throw new Exception("Email o garai");
   }

   if(empty([$_POST['password']])){
    throw new Exception("senha o garai");
   }
  
   $query = "select * from where email = '{$_POST['email']}' limit 1";
  $resulta = $db->query($query);
    if($resulta->num_rows = 0){
        throw new Exception("Email não existe ");
        
    }

  $user = $resulta->fetch_object();

  if(!password_verify($_POST['password'], $user->password)){
    throw new Exception("senha não existe ");
  }

} catch (Exception $ex) {
    $response = [
        'status' => false,
        'message' => $ex ->getMessage(),//erro capturado
    ];
}

echo json_encode($response);

/*include_once './config/db.php';



































/*
$response = [];

try {    
    if(empty($_POST['email'])){
        throw new Exception("Informe o email");
    }

    if(empty($_POST['password'])){
        throw new Exception("Informe a senha");
    }

    $query = "select * from users where email = ? limit 1";    
    $stmt = $db->prepare($query);
    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows == 0){
        throw new Exception("Email não existe");
    }

    $user = $result->fetch_object();

    if(!password_verify($_POST['password'], $user->password)){
        throw new Exception("Senha incorreta");
    }

    $_SESSION['userLogged'] = true;
    $_SESSION['userId'] = $user->id;
    $_SESSION['userName'] = $user->name;

    $response = [
        'status' => true,        
    ];
} catch (Exception $ex) {
    $response = [
        'status' => false,
        'message' => $ex->getMessage(),
    ];
}

echo json_encode($response);*/