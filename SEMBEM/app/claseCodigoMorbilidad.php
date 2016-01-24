<?php
    namespace sembem;
        class  codigo_morbilidad 
            {
                //atributos
                private $cm_id;
                private $cm_codigo;
                private $cm_descripcion;
                private $cm_genero;

                //metodos basicos
                //setteres
                public function set_cm_id ($valor){
                    $this->cm_id=$valor;
                }
                public function set_cm_codigo ($valor){
                    $this->cm_codigo=$valor;
                }
                public function set_cm_descripcion ($valor){
                    $this->cm_descripcion=$valor;
                }
                public function set_cm_genero ($valor){
                    $this->cm_genero=$valor;
                }
              
            
                //getteres
                public function get_cm_id (){
                    return $this->cm_id;
                }
                public function get_cm_codigo (){
                    return $this->cm_codigo;
                }
                public function get_cm_descripcion (){
                    return $this->cm_descripcion;
                }
                public function get_cm_genero(){
                    return $this->cm_genero;
                }
                

                //construct
                public function __construct($cm_id=null,$cm_codigo=null,$cm_descripcion=null,$cm_genero=null){
                    
                    if ($cm_id!=null) $this->set_cm_id ($cm_id); 
                        else{
                            $this->set_cm_id(0);
                        }

                    if ($cm_codigo!=null) $this->set_cm_codigo ($cm_codigo); 
                        else{
                            $this->set_cm_codigo(0);
                        }   
                    if ($cm_descripcion!=null) $this->set_cm_descripcion ($cm_descripcion); 
                        else{
                            $this->set_cm_descripcion('');
                        } 
                    if ($cm_genero!=null) $this->set_cm_genero ($cm_genero); 
                        else{
                            $this->set_cm_genero('');
                    }  
                }   
            }

?>
