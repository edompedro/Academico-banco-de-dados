<?php

    require_once('CursoDAO.php'); 

    $cod = $_GET['cod'];

    $cursodao = new CursoDAO();

    if($cod!==null){
        $cursodao->excluir($cod);
    }


?>