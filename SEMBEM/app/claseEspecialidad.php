<?php
    namespace sembem;
        class  especialidad 
            {
                //atributos
                private $e_id;
                private $e_descripcion;

                //metodos basicos
                //setteres
                public function set_e_id ($valor){
                    $this->e_id=$valor;
                }
                public function set_e_descripcion ($valor){
                    $this->e_descripcion=$valor;
                }
               
            
                //getteres
                public function get_e_id (){
                    return $this->e_id;
                }
                public function get_e_descripcion (){
                    return $this->e_descripcion;
                }
               
                //construct
                public function __construct($e_id=null,$e_descripcion=null){
                    
                    if ($e_id!=null) $this->set_e_id ($e_id); 
                        else{
                            $this->set_e_id(0);
                        }

                    if ($e_descripcion!=null) $this->set_e_descripcion ($e_descripcion); 
                        else{
                            $this->set_e_descripcion('');
                        }   
                }   
            }

?>
