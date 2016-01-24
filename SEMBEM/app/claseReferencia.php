<?php
	namespace sembem;
		class referencia
			{
				//atributos
				private $ref_id;
				private $ref_fecha;
				private $ref_hora;
				private $ref_instituto;
				private $ref_sale_o_entra;
				private $ref_observacion;

				//metodos basicos
				//setteres
				public function set_ref_id ($valor){
					$this->ref_id=$valor;
				}
				public function set_ref_fecha($valor){
					$this->ref_fecha=$valor;
				}
				public function set_ref_hora($valor){
					$this->ref_hora=$valor;
				}
				public function set_ref_instituto ($valor){
					$this->ref_instituto=$valor;
				}
				public function set_ref_sale_o_entra($valor){
					$this->ref_sale_o_entra=$valor;
				}
				public function set_ref_observacion ($valor){
					$this->ref_observacion=$valor;
				}


				//getteres
				public function get_ref_id (){
					return $this->ref_id;
				}
				public function get_ref_fecha(){
					return $this->ref_fecha;
				}
				public function get_ref_hora (){
					return $this->ref_hora;
				}
				public function get_ref_instituto (){
					return $this->ref_instituto;
				}
				public function get_ref_sale_o_entra(){
					return $this->ref_sale_o_entra;
				}
				public function get_ref_observacion (){
					return $this->ref_observacion;
				}
				public function __construct($ref_id=null,$ref_fecha=null,$ref_hora=null,$ref_instituto=null,$ref_sale_o_entra=null,$ref_observacion=null){
	 			 	
		 			if ($ref_id!=null) $this->set_ref_id ($ref_id); 
						else{
							$this->set_ref_id(0);
						}

					if ($ref_fecha!=null) $this->set_ref_fecha($ref_fecha); 
						else{
							$this->set_ref_fecha('');
						}	
					if ($ref_hora!=null) $this->set_ref_hora ($ref_hora); 
						else{
							$this->set_ref_hora('');
						}		
		 			if ($ref_instituto!=null) $this->set_ref_instituto ($ref_instituto); 
						else{
							$this->set_ref_instituto('');
						}
					if ($ref_sale_o_entra!=null) $this->set_ref_sale_o_entra ($ref_sale_o_entra); 
						else{
							$this->set_ref_sale_o_entra('');
						}		
		 			if ($ref_observacion!=null) $this->set_ref_observacion ($ref_observacion); 
						else{
							$this->set_ref_observacion('');
						}			
				}	
			}

?>
