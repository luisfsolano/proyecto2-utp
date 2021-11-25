<?php   
    header('Content-Type: application/json; charset=utf-8');
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header("Access-Control-Allow-Methods", "GET, POST, DELETE");
    
    if(array_key_exists('id', $_GET))
    {
        $id = $_REQUEST['id'];
        if($id==""){
            $rs['error']="id vacia";
            echo json_encode($rs);
        }else{
            require_once("task.php");
            $task = new task();
            $task->delete($id);  
            echo("true");
        }
    }else{
        echo("false");
    }
?>