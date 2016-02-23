<?php
    namespace sembem;
        class  atencion_medica 
            {
                //atributos
                private $at_id;
                private $at_tipo;
                private $at_fecha;
                private $at_hora;
                private $at_status;

                //metodos basicos
                //setteres
                public function set_at_id ($valor){
                    $this->at_id=$valor;
                }
                public function set_at_tipo ($valor){
                    $this->at_tipo=$valor;
                }
                public function set_at_fecha ($valor){
                    $this->at_fecha=$valor;
                }
                public function set_at_hora ($valor){
                    $this->at_hora=$valor;
                }
                public function set_at_status ($valor){
                    $this->at_status=$valor;
                }
            
                //getteres
                public function get_at_id (){
                    return $this->at_id;
                }
                public function get_at_tipo (){
                    return $this->at_tipo;
                }
                public function get_at_fecha (){
                    return $this->at_fecha;
                }
                public function get_at_hora(){
                    return $this->at_hora;
                }
                public function get_at_status (){
                    return $this->at_status;
                }

                //construct
                public function __construct($at_id=null,$at_tipo=null,$at_fecha=null,$at_hora=null,$at_status=null){
                    
                    if ($at_id!=null) $this->set_at_id ($at_id); 
                        else{
                            $this->set_at_id(0);
                        }

                    if ($at_tipo!=null) $this->set_at_tipo ($at_tipo); 
                        else{
                            $this->set_at_tipo('');
                        }   
                    if ($at_fecha!=null) $this->set_at_fecha ($at_fecha); 
                        else{
                            $this->set_at_fecha('');
                        } 
                    if ($at_hora!=null) $this->set_at_hora ($at_hora); 
                        else{
                            $this->set_at_hora('');
                        }  
                    if ($at_status!=null) $this->set_at_status ($at_status); 
                        else{
                            $this->set_at_status('');
                        }             
                
                }   
            }

?>
