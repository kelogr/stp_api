<?php

   namespace X\App\Controllers;

   use X\Sys\Controller;


   class Registre extends Controller{
   		

   		public function __construct($params){
   			parent::__construct($params);
            $this->addData(array(
               'page'=>'Registre'));
   			$this->model=new \X\App\Models\mRegistre();
   			$this->view =new \X\App\Views\vRegistre($this->dataView,$this->dataTable);    
   		}


   		function home(){
          
                    /*$data=$this->model->getRoles();
                    $this->addData($data);*/
            //rebuilding with new data
                    $this->view->__construct($this->dataView,$this->dataTable);
                    $this->view->show();
            
   		}
                
                //Aquest métode serveix per registrar un usuari. Recollim els valors necessaris per poder fer-ho i s'utilitza de la mateixa forma que el login.
                
                function reg(){
                    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
                    $passwd = filter_input(INPUT_POST, 'passwd');
                    $usrname = filter_input(INPUT_POST, 'usrname');
                    
                    $res = $this->model->reg($email, $passwd, $usrname);
                    
                    if($res==1){
                        $this->ajax(array('msg'=>'Correcto'));
                        header('Location:../login');
                    }
                    else{
                        $this->ajax(array('msg'=>'Incorrecto'));
                        header('Location:../registre');
                    }
                }

         
   }
