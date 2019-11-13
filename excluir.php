<?php

    require_once('CursoDAO.php'); 

    $cod = $_GET['cod'];    //codigo do listar.php que se refere a um curso

    $cursodao = new CursoDAO();

    if($cod!==null){    //se o curso existir então é possivel excluir ele, se não tem cod não existe então nao da pra excluir
        $cursodao->excluir($cod);
    }


?>