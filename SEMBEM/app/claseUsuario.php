<?php
    namespace sembem;
        class  usuario 
            {
                //atributos
                private $u_id;
                private $u_usuario;
                private $u_clave;
                private $u_permisologia_acc;
                private $u_permisologia_morb;
                private $u_status;
                private $u_status_primeravez;
                private $u_respuesta;

                //metodos basicos
                //setteres
                public function set_u_id ($valor){
                    $this->u_id=$valor;
                }
                public function set_u_usuario ($valor){
                    $this->u_usuario=$valor;
                }
                public function set_u_clave ($valor){
                    $this->u_clave=$valor;
                }
                public function set_u_permisologia_acc ($valor){
                    $this->u_permisologia_acc=$valor;
                }
                public function set_u_permisologia_morb(){
                    $this->u_permisologia_morb=$valor;
                }
                public function set_u_status(){
                    $this->u_status=$valor;
                }
                public function set_u_status_primeravez(){
                    $this->u_status_primeravez=$valor;
                }
                public function set_u_respuesta(){
                    $this->u_respuesta=$valor;
                }

                //getteres
                public function get_u_id (){
                    return $this->u_id;
                }
                public function get_u_usuario (){
                    return $this->u_usuario;
                }
                public function get_u_clave (){
                    return $this->u_clave;
                }
                public function get_u_permisologia_acc (){
                    return $this->u_permisologia_acc;
                }
                public function get_u_permisologia_morb (){
                    return $this->u_permisologia_morb;
                }

                public function get_u_status (){
                    return $this->u_status;
                }
                public function get_u_status_primeravez (){
                    return $this->u_status_primeravez;
                }
                public function get_u_respuesta (){
                    return $this->u_respuesta;
                }

                //construct
                public function __construct($u_id=null,$u_usuario=null,$u_clave=null,$u_permisologia_acc=null,$u_permisologia_morb=null,
                                            $u_status=null,$u_status_primeravez=null,$u_respuesta=null){
                    
                    if ($u_id!=null) $this->set_u_id ($u_id); 
                        else{
                            $this->set_u_id(0);
                        }

                    if ($u_usuario!=null) $this->set_u_usuario ($u_usuario); 
                        else{
                            $this->set_u_usuario('');
                        }   
                    if ($u_clave!=null) $this->set_u_clave ($u_clave); 
                        else{
                            $this->set_u_clave('');
                        }
                    if ($u_permisologia_acc!=null) $this->set_u_permisologia_acc ($u_permisologia_acc); 
                        else{
                            $this->set_u_permisologia_acc('');
                        }       
                    if ($u_permisologia_morb!=null) $this->set_u_permisologia_morb ($u_permisologia_morb); 
                        else{
                            $this->set_u_permisologia_morb('');
                        }
                    if ($u_status!=null) $this->set_u_status ($u_status); 
                        else{
                            $this->set_u_status('');
                        }           
                    if ($u_status_primeravez!=null) $this->set_u_status_primeravez ($u_status_primeravez); 
                        else{
                            $this->set_u_status_primeravez('');
                        }
                    if ($u_respuesta!=null) $this->set_u_respuesta ($u_respuesta); 
                        else{
                            $this->set_u_respuesta('');
                        }    

                }   
            }

?>
