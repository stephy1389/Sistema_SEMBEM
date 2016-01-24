<?php
	namespace sembem;
		class persona
			{
			//atributos
			private $p_id;
			private $p_nombre_primer;
			private $p_nombre_segundo;
			private $p_apellido_primer;
			private $p_apellido_segundo;
			private $p_nacionalidad;
			private $p_cedula;
			private $p_edo_civil;
			private $p_edad;
			private $p_fecha_nacimiento;
			private $p_sexo;
			private $p_direccion;
			private $p_telefono;
			private $p_correo;
			private $p_tipo;

			//metodos basicos
			//setteres
			public function set_p_id($valor){
				$this->p_id=$valor;
			}
			
			public function set_p_nombre_primer($valor){
				$this->p_nombre_primer=$valor;
			}
			public function set_p_nombre_segundo($valor){
				$this->p_nombre_segundo=$valor;
			}
			public function set_p_apellido_primer($valor){
				$this->p_apellido_primer=$valor;
			}
			public function set_p_apellido_segundo($valor){
				$this->p_apellido_segundo=$valor;
			}
			public function set_p_nacionalidad($valor){
				$this->p_apellido_primer=$valor;
			}
			public function set_p_cedula($valor){
				$this->p_cedula=$valor;
			}
			public function set_p_edo_civil($valor){
				$this->p_edo_civil=$valor;
			}
			public function set_p_edad($valor){
				$this->p_edad=$valor;
			}
			public function set_p_fecha_nacimiento($valor){
				$this->p_fecha_nacimiento=$valor;
			}
			public function set_p_sexo($valor){
				$this->p_sexo=$valor;
			}
			public function set_p_direccion($valor){
				$this->p_direccion=$valor;
			}
			public function set_p_correo($valor){
				$this->p_correo=$valor;
			}
			
			public function set_p_telefono($valor){
				$this->p_telefono=$valor;
			}
		
			public function set_p_tipo($valor){
				$this->p_tipo=$valor;
			}
			
			//getteres
			public function get_p_id(){
				return $this->p_id;
			}
			public function get_p_nombre_primer(){
				return $this->p_nombre_primer;
			}
			public function get_p_nombre_segundo(){
				return $this->p_nombre_segundo;
			}
			public function get_p_apellido_primer(){
				return $this->p_apellido_primer;
			}
			public function get_p_apellido_segundo(){
				return $this->p_apellido_segundo;
			}
			public function get_p_nacionalidad(){
				return $this->p_nacionalidad;
			}
			public function get_p_cedula(){
				return $this->p_cedula;
			}
			public function get_p_edo_civil(){
				return $this->p_edo_civil;
			}
			public function get_p_edad(){
				return $this->p_edad;
			}
			public function get_p_fecha_nacimiento(){
				return $this->p_fecha_nacimiento;
			}
			public function get_p_sexo(){
				return $this->p_sexo;
			}
			public function get_p_telefono(){
				return $this->p_telefono;
			}
			public function get_p_direccion(){
				return $this->p_direccion;
			}
			public function get_p_correo(){
				return $this->p_correo;
			}	
			public function get_p_tipo(){
				return $this->p_tipo;
			}
			
			//construct
			public function __construct($p_id=null,$p_nombre_primer=null,
										$p_nombre_segundo=null,$p_apellido_primer=null,
										$p_apellido_segundo=null,$p_cedula=null,
										$p_edo_civil=null,$p_edad=null,
										$p_fecha_nacimiento=null,$p_sexo=null,
										$p_telefono=null,$p_direccion=null,
										$p_correo=null,$p_tipo=null)
				{
				if ($p_id!=null) $this->set_p_id ($p_id); 
					else{
						$this->set_p_id(0);
					}
				if ($p_nombre_primer!=null) $this->set_p_nombre_primer ($p_nombre_primer); 
					else{
						$this->set_p_nombre_primer('');
					}
				if ($p_nombre_segundo!=null) $this->set_p_nombre_segundo ($p_nombre_segundo); 
					else{
						$this->set_p_nombre_segundo('');
					}
				if ($p_apellido_primer!=null) $this->set_p_apellido_primer ($p_apellido_primer); 
					else{
						$this->set_p_apellido_primer('');
					}
				if ($p_apellido_segundo!=null) $this->set_p_apellido_segundo ($p_apellido_segundo); 
					else{
						$this->set_p_apellido_segundo('');
					}
				if ($p_cedula!=null) $this->set_p_cedula ($p_cedula); 
					else{
						$this->set_p_cedula('');
				}
				if ($p_edo_civil!=null) $this->set_p_edo_civil ($p_edo_civil); 
					else{
						$this->set_p_edo_civil('');
					}
				if ($p_edad!=null) $this->set_p_edad ($p_edad); 
					else{
						$this->set_p_edad('');
				}
				if ($p_fecha_nacimiento!=null) $this->set_p_fecha_nacimiento ($p_fecha_nacimiento);
					else{
						$this->set_p_fecha_nacimiento('');
					}
				if ($p_sexo!=null) $this->p_sexo ($p_sexo); 
					else{
						$this->p_sexo('');
					}
				if ($p_telefono!=null) $this->set_p_telefono ($p_telefono); 
					else{
						$this->set_p_telefono('');
				}
				if ($p_direccion!=null) $this->set_p_direccion ($p_direccion); 
					else{
						$this->set_p_direccion('');
				}
				if ($p_correo!=null) $this->set_p_correo ($p_correo); 
					else{
						$this->set_p_correo('');
				}
				if ($p_tipo!=null) $this->set_p_correo ($p_tipo); 
					else{
						$this->p_tipo('');
				}
			}	
		}	
?>