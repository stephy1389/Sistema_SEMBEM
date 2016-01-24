<?php
    namespace sembem;
        class  examen_medico 
            {
                //atributos
                private $ex_id;
                private $ex_nombre;
                private $ex_descripcion;

                //metodos basicos
                //setteres
                public function set_ex_id ($valor){
                    $this->ex_id=$valor;
                }
                public function set_ex_nombre ($valor){
                    $this->ex_nombre=$valor;
                }
                public function set_ex_descripcion ($valor){
                    $this->ex_descripcion=$valor;
                }
            
                //getteres
                public function get_ex_id (){
                    return $this->ex_id;
                }
                public function get_ex_nombre (){
                    return $this->ex_nombre;
                }
                public function get_ex_descripcion (){
                    return $this->ex_descripcion;
                }
                //construct
                public function __construct($ex_id=null,$ex_nombre=null,$ex_descripcion=null){
                    
                    if ($ex_id!=null) $this->set_ex_id ($ex_id); 
                        else{
                            $this->set_ex_id(0);
                        }

                    if ($ex_nombre!=null) $this->set_ex_nombre ($ex_nombre); 
                        else{
                            $this->set_ex_nombre('');
                        }   
                    if ($ex_descripcion!=null) $this->set_ex_descripcion ($ex_descripcion); 
                        else{
                            $this->set_ex_descripcion('');
                        }       
                
                }   
            }

?>
