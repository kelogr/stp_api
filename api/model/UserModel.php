<?php

    namespace Api\Model;
    
    use Api\Lib\DB;
    use Api\Lib\Response;

/**
 * Description of UserModel
 *
 * @author linux
 */
class UserModel {
    //put your code here
    private $db;
    private $response;
    
    public function __construct() {
        $this->db = DB::start();
        $this->response=new \Slim\Http\Response();
    }
    
    public function getAll(){
        
        try {
            $result = array();
            $stmt = $this->db->prepare("SELECT * FROM users");
            $stmt->exectute();
            $this->response->setResponse();
            $this->response->result=$stmt->fetchAll();
            return $this->response;
        } catch (Exception $e) {
            $this->response->setResponse(false, $e->getMessage());
            return $this->response;
        }
    }
}
