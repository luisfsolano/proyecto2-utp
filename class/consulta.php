<?php   
    header('Content-Type: application/json; charset=utf-8');
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");

    require_once("task.php");
    $task = new task();
    $list = $task->findAll();  
    if ($list==null) {
        $rs['error']="no se encontro la información, verifique el numero buscado";
    }else{
        $rs['tasks']=array_values($list);
    }
    echo json_encode($rs);
?>