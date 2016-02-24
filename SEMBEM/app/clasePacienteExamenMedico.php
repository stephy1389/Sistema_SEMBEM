<?php
    namespace sembem;
        class  paciente_examen_medico
            {
                //atributos
                private $pie_id; 
                private $pie_id_paciente;
                private $pie_id_examen_medico;
                private $pie_fecha_aplicacion; 
                private $pie_hora_aplicacion;
                private $pie_fecha_retiro;
                private $pie_hora_retiro;
                private $pie_observacion;
                private $pie_status_entrega;
                private $pie_status_realizar;

                //metodos basicos
                //setteres
                public function set_pie_id ($valor){
                    $this->pie_id=$valor;
                }
                public function set_pie_id_paciente ($valor){
                    $this->pie_id_paciente=$valor;
                }
                public function set_pie_id_examen_medico ($valor){
                    $this->pie_id_examen_medico=$valor;
                }
                public function set_pie_fecha_aplicacion ($valor){
                    $this->pie_fecha_aplicacion=$valor;
                }
                public function set_pie_hora_aplicacion($valor){
                    $this->pie_hora_aplicacion=$valor;
                }
                public function set_pie_fecha_retiro($valor){
                    $this->pie_fecha_retiro=$valor;
                }
                public function set_pie_hora_retiro ($valor){
                    $this->pie_hora_retiro=$valor;
                }
                public function set_pie_observacion ($valor){
                    $this->pie_observacion=$valor;
                }
                public function set_pie_status_entrega($valor){
                    $this->pie_status_entrega=$valor;
                }
                public function set_pie_status_realizar($valor){
                    $this->pie_status_realizar=$valor;
                }
            
                //getteres
                public function get_pie_id (){
                    return $this->pie_id;
                }
                public function get_pie_id_paciente (){
                    return $this->pie_id_paciente;
                }
                public function get_pie_id_examen_medico (){
                    return $this->pie_id_examen_medico;
                }
                 public function get_pie_fecha_aplicacion (){
                    return $this->pie_fecha_aplicacion;
                }
                public function get_pie_hora_aplicacion (){
                    return $this->pie_hora_aplicacion;
                }
                public function get_pie_fecha_retiro(){
                    return $this->pie_fecha_retiro;
                }
                public function get_pie_hora_retiro(){
                    return $this->pie_hora_retiro;
                }

                public function get_pie_observacion(){
                    return $this->pie_observacion;
                }
                public function get_pie_status_entrega(){
                    return $this->pie_status_entrega;
                }
                public function get_pie_status_realizar(){
                    return $this->pie_status_realizar;
                }


                 //construct
                public function __construct($pie_id=null,$pie_id_paciente=null,$pie_id_examen_medico=null,
                                            $pie_fecha_aplicacion=null,$pie_hora_aplicacion=null,$pie_fecha_retiro=null,
                                            $pie_hora_retiro=null,$pie_observacion=null,$pie_status_entrega=null,$pie_status_realizar=null){
                    
                    if ($pie_id!=null) $this->set_pie_id ($pie_id); 
                        else{
                            $this->set_pie_id(0);
                        }

                    if ($pie_id_paciente!=null) $this->set_pie_id_paciente ($pie_id_paciente); 
                        else{
                            $this->set_pie_id_paciente(0);
                        }   
                    if ($pie_id_examen_medico!=null) $this->set_pie_id_examen_medico ($pie_id_examen_medico); 
                        else{
                            $this->set_pie_id_examen_medico(0);
                        } 
                    if ($pie_fecha_aplicacion!=null) $this->set_pie_fecha_aplicacion ($pie_fecha_aplicacion); 
                        else{
                            $this->set_pie_fecha_aplicacion('');
                        }
                    if ($pie_hora_aplicacion!=null) $this->set_pie_hora_aplicacion ($pie_hora_aplicacion); 
                        else{
                            $this->set_pie_hora_aplicacion('');
                        }
                    if ($pie_fecha_retiro!=null) $this->set_pie_fecha_retiro ($pie_fecha_retiro); 
                        else{
                            $this->set_pie_fecha_retiro('');
                        }
                    if ($pie_hora_retiro!=null) $this->set_pie_hora_retiro ($pie_hora_retiro); 
                        else{
                            $this->set_pie_hora_retiro('');
                        }      
                    if ($pie_observacion!=null) $this->set_pie_observacion ($pie_observacion); 
                        else{
                            $this->set_pie_observacion('');
                        }
                    if ($pie_status_entrega!=null) $this->set_pie_status_entrega ($pie_status_entrega); 
                        else{
                            $this->set_pie_status_entrega('');
                        }
                    if ($pie_status_realizar!=null) $this->set_pie_status_realizar ($pie_status_realizar); 
                        else{
                            $this->set_pie_status_realizar('');
                    }                                                 
                }                                    
            }   
            
?>
