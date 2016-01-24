<?php
    namespace sembem;
        class  cargo 
            {
                //atributos
                private $c_id;
                private $c_descripcion;

                //metodos basicos
                //setteres
                public function set_c_id  ($valor){
                    $this->c_id =$valor;
                }
                public function set_c_descripcion ($valor){
                    $this->c_descripcion=$valor;
                }
               
            
                //getteres
                public function get_c_id  (){
                    return $this->c_id ;
                }
                public function get_c_descripcion (){
                    return $this->c_descripcion;
                }
               
                //construct
                public function __construct($c_id=null,$c_descripcion=null){
                    
                    if ($c_id!=null) $this->set_c_id ($c_id); 
                        else{
                            $this->set_c_id (0);
                        }

                    if ($c_descripcion!=null) $this->set_c_descripcion ($c_descripcion); 
                        else{
                            $this->set_c_descripcion('');
                        }   
                }   
            }

?>
