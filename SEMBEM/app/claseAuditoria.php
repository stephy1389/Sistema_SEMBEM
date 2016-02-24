<?php
    namespace sembem;
        class  auditoria
            {
                //atributos
                private $a_id;
                private $a_fecha;
                private $a_hora;
                private $a_modulo;
                private $a_tabla;
                private $atributo;
                private $a_operacion;
                private $a_valor_nuevo;

                //metodos basicos
                //setteres
                public function set_a_id ($valor){
                    $this->a_id=$valor;
                }
                public function set_a_fecha ($valor){
                    $this->a_fecha=$valor;
                }
                public function set_a_hora ($valor){
                    $this->a_hora=$valor;
                }
                public function set_a_modulo ($valor){
                    $this->a_modulo=$valor;
                }
                public function set_a_tabla ($valor){
                    $this->a_tabla=$valor;
                }
                public function set_a_atributo ($valor){
                    $this->a_atributo=$valor;
                }
                public function set_a_operacion ($valor){
                    $this->a_operacion=$valor;
                }
                public function set_a_valor_nuevo ($valor){
                    $this->a_valor_nuevo=$valor;
                }
                //getteres
                public function get_a_id (){
                    return $this->a_id;
                }
                public function get_a_fecha (){
                    return $this->a_fecha;
                }
                public function get_a_hora (){
                    return $this->a_hora;
                }
                public function get_a_modulo (){
                    return $this->a_modulo;
                }
                public function get_a_tabla (){
                    return $this->a_tabla;
                }
                public function get_a_atributo (){
                    return $this->a_atributo;
                }
                public function get_a_operacion (){
                    return $this->a_operacion;
                }
                public function get_a_valor_nuevo (){
                    return $this->a_valor_nuevo;
                }


                //construct
                public function __construct($a_id=null,$a_fecha=null,$a_hora=null,$a_modulo=null,$a_tabla=null,
                                            $a_atributo=null,$a_operacion=null,$a_valor_nuevo=null){
                    
                    if ($a_id!=null) $this->set_a_id ($a_id); 
                        else{
                            $this->set_a_id(0);
                        }

                    if ($a_fecha!=null) $this->set_a_fecha ($a_fecha); 
                        else{
                            $this->set_a_fecha('');
                        }   
                    if ($a_hora!=null) $this->set_a_hora ($a_hora); 
                        else{
                            $this->set_a_hora('');
                        } 
                    if ($a_modulo!=null) $this->set_a_modulo ($a_modulo); 
                        else{
                            $this->set_a_modulo('');
                        }
                    if ($a_tabla!=null) $this->set_a_tabla ($a_tabla); 
                        else{
                            $this->set_a_tabla('');
                        } 
                    if ($a_atributo!=null) $this->set_a_atributo ($a_atributo); 
                        else{
                            $this->set_a_atributo('');
                        }    
                    if ($a_operacion!=null) $this->set_a_operacion ($a_operacion); 
                        else{
                            $this->set_a_operacion('');
                        }       
                    if ($a_valor_nuevo!=null) $this->set_a_valor_nuevo ($a_valor_nuevo); 
                        else{
                            $this->set_a_valor_nuevo('');
                        } 
                
                }   
            }

?>
