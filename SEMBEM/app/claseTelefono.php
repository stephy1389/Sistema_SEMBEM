<?php
	namespace sembem;
		class telefono
			{
				//atributos
				private $t_id;
				private $t_fijo;
				private $t_movil;
				private $t_oficina;

				//metodos basicos
				//setteres
				public function set_t_id ($valor){
					$this->t_id=$valor;
				}
				public function set_t_fijo ($valor){
					$this->t_fijo=$valor;
				}
				public function set_t_movil ($valor){
					$this->t_movil=$valor;
				}
				public function set_t_oficina ($valor){
					$this->t_oficina=$valor;
				}
				//getteres
				public function get_t_id (){
					return $this->t_id;
				}
				public function get_t_fijo (){
					return $this->t_fijo;
				}
				public function get_t_movil (){
					return $this->t_movil;
				}
				public function get_t_oficina (){
					return $this->t_oficina;
				}
				public function __construct($t_id=null,$t_fijo=null,$t_movil=null,$t_oficina=null){
	 			 	
		 			if ($t_id!=null) $this->set_t_id ($t_id); 
						else{
							$this->set_t_id(0);
						}

					if ($t_fijo!=null) $this->set_t_fijo ($t_fijo); 
						else{
							$this->set_t_fijo(0);
						}	
					if ($t_movil!=null) $this->set_t_movil ($t_movil); 
						else{
							$this->set_t_movil(0);
						}		
		 			if ($t_oficina!=null) $this->set_t_oficina ($t_oficina); 
						else{
							$this->set_t_oficina(0);
					}	
				}	
			}

?>
