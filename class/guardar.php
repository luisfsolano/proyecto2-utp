<?php   
    header('Content-Type: application/json; charset=utf-8');
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    
    $data = json_decode(file_get_contents('php://input'), true);
    if(!empty($data['detalle']))
    {
        $detalle  = $data['detalle'];
        
        if($detalle==""){
            $rs['error']="pregunta vacia";
            echo json_encode($rs);
        }
        require_once("task.php");
        $task = new task();
        $task->insert($detalle,$detalle,"true");  

        $task = new task();
        $rs = $task->findLastTask();  
        echo json_encode($rs);
    }else{
        echo("wwerwre");
    }
?>