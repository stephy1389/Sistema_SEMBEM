<?php
	namespace sembem;
		include_once ("clasePersona.php");
		class personal extends persona
			{
			//atributos
			private $per_id;
			private $per_nro_equipo;
			private $per_seccion;

			//metodos basicos
			//setteres
			public function set_per_id ($valor){
				$this->per_id=$valor;
			}
			public function set_per_nro_equipo ($valor){
				$this->per_nro_equipo=$valor;
			}
			public function set_per_seccion ($valor){
				$this->per_seccion=$valor;
			}
			//getteres
			public function get_per_id (){
				return $this->per_id;
			}
		
			public function get_per_seccion (){
				return $this->per_seccion;
			}
			public function get_per_nro_equipo (){
				return $this->per_nro_equipo;
			}
			//contruct
			public function __construct($p_id=null,$p_nombre_primer=null,
										$p_nombre_segundo=null,$p_apellido_primer=null,
										$p_apellido_segundo=null,$p_cedula=null,
										$p_edo_civil=null,$p_edad=null,
										$p_fecha_nacimiento=null,$p_sexo=null,
										$p_telefono=null,$p_direccion=null,
										$p_correo=null,$p_tipo=null,$per_id=null,
										$per_nro_equipo=null,$per_seccion=null)
				{
				parent::__construct($p_id=null,$p_nombre_primer=null,
									$p_nombre_segundo=null,$p_apellido_primer=null,
									$p_apellido_segundo=null,$p_cedula=null,
									$p_edo_civil=null,$p_edad=null,
									$p_fecha_nacimiento=null,$p_sexo=null,
									$p_telefono=null,$p_direccion=null,
									$p_correo=null,$p_tipo
									);
				if ($per_id!=null){
						$this->set_per_id($per_id);
					}else{
						$this->set_per_id(0);
				}
				if ($per_seccion!=null){
						$this->set_per_seccion($per_seccion);
					}else{
						$this->set_per_seccion('');
			    }
				if ($per_nro_equipo!=null){
						$this->set_per_nro_equipo($per_nro_equipo);
					}else{
						$this->set_per_nro_equipo('');
					}
				}
			}
	?>
