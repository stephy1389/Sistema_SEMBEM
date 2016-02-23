<?php
    namespace sembem;
        class  morbilidad_codigo_morb  
            {
                //atributos
                private $mcm_id;
                private $mcm_opc_diagnostico;

                //metodos basicos
                //setteres
                public function set_mcm_id ($valor){
                    $this->mcm_id=$valor;
                }
                public function set_mcm_opc_diagnostico ($valor){
                    $this->mcm_opc_diagnostico=$valor;
                }
           
            
                //getteres
                public function get_mcm_id(){
                    return $this->mcm_id;
                }
                public function get_mcm_opc_diagnostico (){
                    return $this->mcm_opc_diagnostico;
                }
         

                //construct
                public function __construct($mcm_id=null,$mcm_opc_diagnostico=null){
                    
                    if ($mcm_id!=null) $this->set_mcm_id ($mcm_id); 
                        else{
                            $this->set_mcm_id(0);
                        }

                    if ($mcm_opc_diagnostico!=null) $this->set_mcm_opc_diagnostico ($mcm_opc_diagnostico); 
                        else{
                            $this->set_mcm_opc_diagnostico('');
                        }   
                       
                
                }   
            }

?>
