<?php
     require_once('modeloCredencialesBD.php');
     class task extends modeloCredencialesBD
     {
         protected $id;
         protected $nombre;
         protected $detalle;
         protected $estado;
         public function __construct()
         {
             parent::__constuctor();
         }

         public function findAll()
         {
            $instruccion = "CALL find_all_task()";
            $consulta= $this->_db->query($instruccion);
            $resultado=$consulta->fetch_all(MYSQLI_ASSOC);

            if(!$resultado)
            {
                echo "Fallo al consultar las preguntas";
            }
            else
            {
                return $resultado;
                $resultado->close();
                $this->_db->close();
            }
         }

         public function insert($nombre, $detalle, $estado)
         {
             # code...
             try{
             $instruccion = "CALL insert_task('$nombre','$detalle','$estado')";
             $this->_db->query($instruccion);
             $this->_db->close();
             } catch (Exception $e) {
                 echo "Fallo al insertar la tarea";
             }
         }

         public function findLastTask()
         {
            $instruccion = "CALL find_last_task()";
            $consulta= $this->_db->query($instruccion);
            $resultado=$consulta->fetch_assoc();

            if(!$resultado)
            {
                echo "Fallo al consultar las preguntas";
            }
            else
            {
                return $resultado;
                $resultado->close();
                $this->_db->close();
            }
         }

         public function delete($id){
            try{
            $instruccion = "CALL delete_task('$id')";
            $this->_db->query($instruccion);
            $this->_db->close();
            } catch (Exception $e) {
                echo "Fallo al eliminar la tarea";
            }
        }

        public function update($id,$nombre, $detalle, $estado)
        {
            # code...
            try{
            $instruccion = "CALL update_task('$id','$nombre','$detalle','$estado')";
            $this->_db->query($instruccion);
            $this->_db->close();
            } catch (Exception $e) {
                echo "Fallo al update la tarea";
            }
        }
        
    }
?>