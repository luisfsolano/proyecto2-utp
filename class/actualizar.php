<?php   
    header('Content-Type: application/json; charset=utf-8');
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    
    $data = json_decode(file_get_contents('php://input'), true);
    if(!empty($data['detalle'])||!empty($data['id'])||!empty($data['estado']))
    {
        $id  = $data['id'];
        $detalle  = $data['detalle'];
        $estado  = $data['estado'];
        
        if($id==""||$detalle==""){
            $rs['error']="algun parametro vacio";
            echo json_encode($rs);
        }else{
        require_once("task.php");
        $task = new task();
        $task->update($id,$detalle,$detalle,$estado);  

        $task = new task();
        $rs = $task->findLastTask();  
        echo json_encode($rs);}
    }else{
        echo("wwerwre");
    }
?>