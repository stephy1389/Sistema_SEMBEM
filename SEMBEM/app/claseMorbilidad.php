<?php
    namespace sembem;
        class  morbilidad 
            {
                //atributos
                private $m_id;
                private $m_motivo_consulta;
                private $m_concurrencia;
                private $m_tratamiento_conducta;
                private $m_fecha_morb;
                private $m_fecha;
                private $m_hora;
                private $m_status_conf;
                private $m_status_conf_desc;
                private $m_status_revision;

                //metodos basicos
                //setteres
                public function set_m_id ($valor){
                    $this->m_id=$valor;
                }
                public function set_m_motivo_consulta ($valor){
                    $this->m_motivo_consulta=$valor;
                }
                public function set_m_concurrencia ($valor){
                    $this->m_concurrencia=$valor;
                }
                public function set_m_tratamiento_conducta($valor){
                    $this->m_tratamiento_conducta=$valor;
                }
                public function set_m_fecha_morb ($valor){
                    $this->m_fecha_morb=$valor;
                }
                public function set_m_fecha ($valor){
                    $this->m_fecha=$valor;
                }
                public function set_m_hora ($valor){
                    $this->m_hora=$valor;
                }
                public function set_m_status_conf ($valor){
                    $this->m_status_conf=$valor;
                }
                public function set_m_status_conf_desc ($valor){
                    $this->m_status_conf_desc=$valor;
                }
                public function set_m_status_revision ($valor){
                    $this->m_status_revision=$valor;
                }

            
                //getteres
                public function get_m_id (){
                    return $this->m_id;
                }
                public function get_m_motivo_consulta (){
                    return $this->m_motivo_consulta;
                }
                public function get_m_concurrencia (){
                    return $this->m_concurrencia;
                }
                public function get_m_tratamiento_conducta (){
                    return $this->m_tratamiento_conducta;
                }
                public function get_m_fecha_morb (){
                    return $this->m_fecha_morb;
                }
                public function get_m_fecha (){
                    return $this->m_fecha;
                }
                public function get_m_hora (){
                    return $this->m_hora;
                }
                public function get_m_status_conf (){
                    return $this->m_status_conf;
                }
                public function get_m_status_conf_desc(){
                    return $this->m_status_conf_desc;
                }
                public function get_m_status_revision(){
                    return $this->m_status_revision;
                }
                //construct
                public function __construct($m_id=null,$m_motivo_consulta=null,$m_concurrencia=null,$m_tratamiento_conducta=null,$m_fecha_morb=null,
                                            $m_fecha=null,$m_hora=null,$m_status_conf=null,$m_status_conf_desc=null,$m_status_revision=null){
                    
                    if ($m_id!=null) $this->set_m_id ($m_id); 
                        else{
                            $this->set_m_id(0);
                        }

                    if ($m_motivo_consulta!=null) $this->set_m_motivo_consulta ($m_motivo_consulta); 
                        else{
                            $this->set_m_motivo_consulta('');
                        } 
                     if ($m_concurrencia!=null) $this->set_m_concurrencia ($m_concurrencia); 
                        else{
                            $this->set_m_concurrencia('');
                        }      
                    if ($m_tratamiento_conducta!=null) $this->set_m_tratamiento_conducta ($m_tratamiento_conducta); 
                        else{
                            $this->set_m_tratamiento_conducta('');
                        }
                    if ($m_fecha_morb!=null) $this->set_m_fecha_morb ($m_fecha_morb); 
                        else{
                            $this->set_m_fecha_morb('');
                        }    
                    if ($m_fecha!=null) $this->set_m_fecha ($m_fecha); 
                        else{
                            $this->set_m_fecha('');
                        } 
                    if ($m_hora!=null) $this->set_m_hora ($m_hora); 
                        else{
                            $this->set_m_hora('');
                        } 
                    if ($m_status_conf!=null) $this->set_m_status_conf ($m_status_conf); 
                        else{
                            $this->set_m_status_conf('');
                        }                         
                    if ($m_status_conf_desc!=null) $this->set_m_status_conf_desc ($m_status_conf_desc); 
                        else{
                            $this->set_m_status_conf_desc('');
                    }
                    if ($m_status_revision!=null) $this->set_m_status_revision ($m_status_revision); 
                        else{
                            $this->set_m_status_revision('');
                    }   
                
                }   
            }
?>