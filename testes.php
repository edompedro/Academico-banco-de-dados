<?php 

    require_once('Curso.php');
    require_once('CursoDAO.php');
    require_once('header.php');

    $curso = new Curso('pipinha','voar',80,'10-11-2017');
    $curso1 = new Curso('pipinha médio','voar alto',100,'10-11-2017');
    $curso2 = new Curso('pipinha iniciante','vagoneta',50,'10-11-2017');
    $curso3 = new Curso('pipinha pro','voo',10,'10-11-2017');
    $curso4 = new Curso('windsurf','vagoneta',10,'10-11-2017');

    $dao = new CursoDAO();


    var_dump($dao->inserir($curso));
    var_dump($dao->inserir($curso1));
    var_dump($dao->inserir($curso2));
    var_dump($dao->inserir($curso3));

    var_dump($dao->excluir($curso->getCod()));
    var_dump($dao->excluir($curso1->getCod()));

    var_dump($dao->busca($curso4->getCod()));

    var_dump($dao->lista(3,0));

    $curso3->setNome('kitesurf');
    var_dump($dao->altera($curso3));
    
    var_dump($dao->salva($curso4));
    $curso4->setNome('windsurf iniciante');
    var_dump($dao->salva($curso4));

?>