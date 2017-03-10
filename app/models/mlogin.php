<?php

	namespace X\App\Models;

	use \X\Sys\Model;

	class mLogin extends Model{
		public function __construct(){
			parent::__construct();
			
		}
                
                //Aquesta funció s'encarrega de validar l'usuari fent una consulta a la base de dades. Em cas de que trobi un usuari amb el mateix email retornará un 1.
                
                public function valemail($em){
                    
			$sql="SELECT * FROM storypub.users WHERE email=:email"; //Preparem la sentencia.
			$this->query($sql);
                        $this->bind(":email", $em);
                         
                        $this->execute();//Executem la sentencia i guardem el valor a result amb rowCount que ens dirá si ha trobat un usuari o no
                        $result=$this->rowCount();
                        
			if($result){
                            return $result;							
			}else 
                        {
                            return -1;
                            
                        }
		}
                
                //Aquest métode realitza una consulta a la base de dades per comprobar que efectivament existeix l'usuari o no.
                //Segueix la mateixa dinamica que la d'adalt canviant la sentencia.
                
                 public function login($em, $pass){

			$sql="SELECT * FROM storypub.users WHERE email=:email && password=:password";
                  
			$this->query($sql);
                        $this->bind(":email", $em);
                        $this->bind(":password", $pass);
                         
			$res=$this->execute();
                        $result=$this->rowCount();
                        
			if($result){
                            return $result;							
			}else 
                        {
                            return -1;
                            
                        }
		}
	}