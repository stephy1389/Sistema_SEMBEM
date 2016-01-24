<?php
	namespace sembem;
		include_once ("clasePersona.php");
		class paciente extends persona
			{
			//atributos
			private $pa_id;
			
			//metodos basicos
			//setteres
			public function set_pa_id ($valor){
				$this->pa_id=$valor;
			}
			//getteres
			public function get_pa_id (){
				return ($this->pa_id);
			}
			//construct
			public function __construct($p_id=null,$p_nombre_primer=null,
										$p_nombre_segundo=null,$p_apellido_primer=null,
										$p_apellido_segundo=null,$p_cedula=null,
										$p_edo_civil=null,$p_edad=null,
										$p_fecha_nacimiento=null,$p_sexo=null,
										$p_telefono=null,$p_direccion=null,
										$p_correo=null,$p_tipo=null,$pa_id=null)
				{
				parent::__construct($p_id=null,$p_nombre_primer=null,
									$p_nombre_segundo=null,$p_apellido_primer=null,
									$p_apellido_segundo=null,$p_cedula=null,
									$p_edo_civil=null,$p_edad=null,
									$p_fecha_nacimiento=null,$p_sexo=null,
									$p_telefono=null,$p_direccion=null,
									$p_correo=null,$p_tipo=null);
				if ($pa_id!=null) {
						$this->set_pa_id($pa_id);
					}else{
						$this->set_pa_id(0);
					}
				}
			}
	?>