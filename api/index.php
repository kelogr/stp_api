<?php
    
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;
    

    require 'vendor/autoload.php';
    require 'config.slim.php';
    //require 'db.php';
    //$app = new \Slim\App();
    
    //echo "API";
    
    $app = new \Slim\App(['settings'=>$config]);
    
    $container = $app->getContainer();
    
    //Función que devuelve el contenedor de base de datos.
    $container['db']= function($c){
        $db=$c['settings']['db'];
        $pdo = new PDO('mysql:host='.$db['host'].';dbname='.$db['dbname'], $db['user'], $db['pass']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    };
    
    //Routing Web Services
    $app->get('/user', function(Request $req, Response $res){
        $stmt=$this->db->prepare('SELECT * FROM users');
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_OBJ);
        return $this->response->withJson($result);
    });
    
    
    $app->get('/user/{id}', function(Request $req, Response $res, $args){
        $id=(int)$args['id'];
        $stmt=$this->db->prepare('SELECT * FROM users WHERE idusers = :id');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_OBJ);
        return $this->response->withJson($result);
    });
    
    $app->post('/user/add/', function(Request $req, Response $res){
        $data = $req->getParsedBody();
        
        $idusers = $data['idusers'];
        $roles = $data['roles'];
        $email = $data['email'];
        $pass = $data['pass'];
        $username = $data['username'];
        
        $stmt=$this->db->prepare('INSERT INTO users(idusers, roles, email, password, usersname) VALUES (:idusers, :roles, :email, :password, :usersname)');
        
        $stmt->bindValue(':idusers', $idusers);
        $stmt->bindValue(':roles', $roles);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', $pass);
        $stmt->bindValue(':usersname', $username);
        
        $stmt->execute();
        
        //var_dump($stmt->execute());
        //die();
        
        return $this->response->withJson(array("msg"=>"Bien, hemos anadido un nuevo usuario."));
    });
    
    $app->put('/user/update/', function(Request $req, Response $res){
        $data = $req->getParsedBody();
        
        $idusers = $data['idusers'];
        $roles = $data['roles'];
        $email = $data['email'];
        $pass = $data['pass'];
        $username = $data['username'];
        
        $stmt=$this->db->prepare('UPDATE users SET roles= :roles, email= :email, password= :password, usersname= :usersname WHERE idusers = :idusers;');
        
        $stmt->bindValue(':idusers', $idusers);
        $stmt->bindValue(':roles', $roles);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', $pass);
        $stmt->bindValue(':usersname', $username);
        
        $stmt->execute();
        
        return $this->response->withJson(array("msg"=>"Bien, hemos actualizado un nuevo usuario."));
    });
    
    $app->delete('/user/delete/{idusers}', function(Request $req, Response $res, $args){
        
        $iduser=(int)$args['idusers'];
        
        $stmt=$this->db->prepare('DELETE FROM users WHERE idusers = :idusers;');
        
        $stmt->bindValue(':idusers', $iduser);
        
        $stmt->execute();
        
        return $this->response->withJson(array("msg"=>"Bien, hemos eliminado un nuevo usuario."));
    });
    
    $app->run();
    
    



    //$app->get('/hello/:name', 'hola');
    
    //$app->get('/hello/{name}', 'hello');
    //CRUD
    //R- Listado users o unico usuario
    //$app->get('/user[/{id}]', 'getUsers');
    //C- Add User
    //$app->post('/user/add', 'addUser');
    //U - Update User
    //$app->put('/user/update/{id}', 'updateUser');
    //D - Delete User
    //$app->delete('/user/delete/{id}', 'deleteUser');
    
    
    
    /*function hello (Request $request, Response $response, $args){
        $name=(string)$args['name'];
        if($name!=null){
            $response->getBody()->write($name);
        }
        else{
            $response->getBody()->write("Hello");
        }
        return $response;
    }
    
    function getUsers(Request $request, Response $response, $args){
        $sql = "SELECT * FROM users";
        $dbh = getDB();
        var_dump($dbh);
        $stmt=$dbh->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        var_dump($result);
        die();
        $response->withJSON($result,208);

    }*/
        