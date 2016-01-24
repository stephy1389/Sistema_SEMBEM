<?php
    namespace sembem;
        class  jerarquia 
            {
                //atributos
                private $j_id;
                private $j_descripcion;

                //metodos basicos
                //setteres
                public function set_j_id  ($valor){
                    $this->j_id =$valor;
                }
                public function set_j_descripcion ($valor){
                    $this->j_descripcion=$valor;
                }
               
            
                //getteres
                public function get_j_id  (){
                    return $this->j_id ;
                }
                public function get_j_descripcion (){
                    return $this->j_descripcion;
                }
               
                //construct
                public function __construct($j_id=null,$j_descripcion=null){
                    
                    if ($j_id!=null) $this->set_j_id ($j_id); 
                        else{
                            $this->set_j_id (0);
                        }

                    if ($j_descripcion!=null) $this->set_j_descripcion ($j_descripcion); 
                        else{
                            $this->set_j_descripcion('');
                        }   
                }   
            }

?>
