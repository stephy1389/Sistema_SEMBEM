<?php namespace sembem;

        use Illuminate\Database\Eloquent\Model;

        class  personal_cargo extends Model{

            //tabla de la BDD usada por el modelo
                protected $table = 'personal_cargo';

            //atributos que se pueden asignar masivamente
                protected $fillable = ['pc_id_personal','pc_id_cargo'];

            //atributos
                private $pc_id;
                private $pc_id_personal;
                private $pc_id_cargo;

            //métodos básicos
            //setters
                public function set_pc_id ($valor){
                    $this->pc_id=$valor;
                }
                public function set_pc_id_personal ($valor){
                    $this->pc_id_personal=$valor;
                }
                public function set_pc_id_cargo ($valor){
                    $this->pc_id_cargo=$valor;
                }
            
            //getters
                public function get_pc_id (){
                    return $this->pc_id;
                }
                public function get_pc_id_personal (){
                    return $this->pc_id_personal;
                }
                public function get_pc_id_cargo (){
                    return $this->pc_id_cargo;
                }

            //construct
                public function __construct($pc_id=null,$pc_id_personal=null,$pc_id_cargo=null){
                    
                    if ($pc_id!=null) $this->set_pc_id ($pc_id); 
                        else{
                            $this->set_pc_id(0);
                        }

                    if ($pc_id_personal!=null) $this->set_pc_id_personal ($pc_id_personal); 
                        else{
                            $this->set_pc_id_personal(0);
                        }   
                    if ($pc_id_cargo!=null) $this->set_pc_id_cargo ($pc_id_cargo); 
                        else{
                            $this->set_pc_id_cargo(0);
                        }       
                
                }   
        }

?>
