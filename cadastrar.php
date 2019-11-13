<?php

    require_once('CursoDAO.php');    
    require_once('Curso.php');


    $cod = isset($_POST['cod']);

    $curso = new Curso($_POST['nome'],$_POST['area'],$_POST['carga'],$_POST['date']);

    $cursodao = new CursoDAO();


    //se tem cod faz UPDATE, senão tem faz INSERT

    if($cod){
        $curso->setCod(intval($_POST['cod']));
        $cursodao->altera($curso);
    }
    else{
        $cursodao->inserir($curso);
    }

?>