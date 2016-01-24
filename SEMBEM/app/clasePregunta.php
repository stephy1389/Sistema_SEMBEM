<?php
    namespace sembem;
        class  pregunta 
            {
                //atributos
                private $pre_id;
                private $pre_descripcion;

                //metodos basicos
                //setteres
                public function set_pre_id ($valor){
                    $this->pre_id=$valor;
                }
                public function set_pre_descripcion ($valor){
                    $this->pre_descripcion=$valor;
                }
             
            
                //getteres
                public function get_pre_id (){
                    return $this->pre_id;
                }
                public function get_pre_descripcion (){
                    return $this->pre_descripcion;
                }
               
                //construct
                public function __construct($pre_id=null,$pre_descripcion=null){
                    
                    if ($pre_id!=null) $this->set_pre_id ($pre_id); 
                        else{
                            $this->set_pre_id(0);
                        }

                    if ($pre_descripcion!=null) $this->set_pre_descripcion ($pre_descripcion); 
                        else{
                            $this->set_pre_descripcion('');
                        }       
                
                }   
            }

?>
