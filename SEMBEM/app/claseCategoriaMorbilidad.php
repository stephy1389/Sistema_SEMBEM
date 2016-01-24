<?php
    namespace sembem;
        class  categoria_morbilidad
            {
                //atributos
                private $cam_id;
                private $cam_descripcion;

                //metodos basicos
                //setteres
                public function set_cam_id ($valor){
                    $this->cam_id=$valor;
                }
                public function set_cam_descripcion ($valor){
                    $this->cam_descripcion=$valor;
                }
              
                //getteres
                public function get_cam_id (){
                    return $this->cam_id;
                }
                public function get_cam_descripcion (){
                    return $this->cam_descripcion;
                }
                
                //construct
                public function __construct($cam_id=null,$cam_descripcion=null){
                    
                    if ($cam_id!=null) $this->set_cam_id ($cam_id); 
                        else{
                            $this->set_cam_id(0);
                        }

                    if ($cam_descripcion!=null) $this->set_cam_descripcion ($cam_descripcion); 
                        else{
                            $this->set_cam_descripcion('');
                        }     
                }   
            }

?>
