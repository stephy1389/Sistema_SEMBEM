<?php
	 namespace sembem;
		class  paciente_no_identificado
			{
			//atributos
			private $pni_id;
			private $pni_fecha_ing;
			private $pni_hora_ing;
			private $pni_color_ojos;
			private $pni_color_piel;
			private $pni_color_cabello;
			private $pni_estatura;
			private $pni_contextura;
			private $pni_apodo;
			private $pni_vestimenta;
			private $pni_diagnostico;
			private $pni_tratamiento;
			

			//metodos basicos
			//setteres
			public function set_pni_id($valor){
				$this->pni_id($valor);
			}
			public function set_pni_fecha_ing($valor){
				$this->pni_fecha_ing($valor);
			}
			public function set_pni_hora_ing($valor){
				$this->pni_hora_ing($valor);
			}
			public function set_pni_color_ojos($valor){
				$this->pni_color_ojos($valor);
			}
			public function set_pni_color_piel($valor){
				$this->pni_color_piel($valor);
			}
			public function set_pni_color_cabello($valor){
				$this->pni_color_cabello($valor);
			}
			public function set_pni_estatura($valor){
				$this->pni_estatura($valor);
			}
			public function set_pni_contextura($valor){
				$this->pni_contextura($valor);
			}
			public function set_pni_apodo($valor){
				$this->pni_apodo($valor);
			}
			public function set_pni_vestimenta($valor){
				$this->pni_vestimenta($valor);
			}
			public function set_pni_diagnostico($valor){
				$this->pni_diagnostico($valor);
			}
			public function set_pni_tratamiento($valor){
				$this->pni_tratamiento($valor);
			}




			//getteres
			public function get_pni_id(){
				return $this->pni_id;
			}
			public function get_pni_fecha_ing(){
				return $this->pni_fecha_ing;
			}
			public function get_pni_hora_ing(){
				return $this->pni_hora_ing;
			}
			public function get_pni_color_ojos(){
				return $this->pni_color_ojos;
			}
			public function get_pni_color_piel(){
				return $this->pni_color_piel;
			}
			public function get_pni_color_cabello(){
				return $this->pni_color_cabello;
			}
			public function get_pni_estatura(){
				return $this->pni_estatura;
			} 
			public function get_pni_contextura(){
				return $this->pni_contextura;
			}
			public function get_pni_apodo(){
				return $this->pni_apodo;
			}
			public function get_pni_vestimenta(){
				return $this->pni_vestimenta;
			}
			public function get_pni_diagnostico(){
				return $this->pni_diagnostico;
			}
			public function get_pni_tratamiento(){
				return $this->pni_tratamiento;
			}
			//construct
			public function __construct($pni_id=null,$pni_fecha_ing=null,$pni_hora_ing=null,$pni_color_ojos=null, 
										$pni_color_piel=null, $pni_color_cabello=null, $pni_estatura=null,
										$pni_contextura=null, $pni_apodo=null, $pni_vestimenta=null, $pni_diagnostico=null, $pni_tratamiento=null){
			
				//asignamos valores	
				if ($pni_id!=null){
						$this->set_pni_id($pni_id);
					}else{
						$this->set_pni_id(0);
				}
				if ($pni_fecha_ing!=null){
						$this->set_pni_fecha_ing($pni_fecha_ing);
					}else{
						$this->set_pni_fecha_ing('');
				}
				if ($pni_hora_ing!=null){
						$this->set_pni_hora_ing($pni_hora_ing);
					}else{
						$this->set_pni_hora_ing('');
				}
				if ($pni_color_ojos!=null){
						$this->set_pni_color_ojos($pni_color_ojos);
					}else{
						$this->set_pni_color_ojos('');
				}
				if ($pni_color_piel!=null){
						$this->set_pni_color_piel($pni_color_piel);
					}else{
						$this->set_pni_color_piel('');
				}
				if ($pni_color_cabello!=null){
						$this->set_pni_color_cabello($pni_color_cabello);
					} else{
						$this->set_pni_color_cabello('');
				}
				if ($pni_estatura!=null){
						$this->set_pni_estatura($pni_estatura);
					}else{
						$this->set_pni_estatura('');
				}
				if ($pni_contextura!=null){
						$this->set_pni_contextura($pni_contextura);
					}else{
						$this->set_pni_contextura('');
				}
				if ($pni_apodo!=null){
						$this->set_pni_apodo($pni_apodo);
					}else{
						$this->set_pni_apodo('');
				}
				if ($pni_vestimenta!=null){
						$this->set_pni_vestimenta($pni_vestimenta);
					} else{
						$this->set_pni_vestimenta('');
				}
				if ($pni_diagnostico!=null){
						$this->set_pni_diagnostico($pni_diagnostico);
					}else{
						$this->set_pni_diagnostico('');
				}
				if ($pni_tratamiento!=null){
						$this->set_pni_tratamiento($pni_tratamiento);
					}else{
						$this->set_pni_tratamiento('');}
				}	
			}
?>

