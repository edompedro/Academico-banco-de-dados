<?php 
require_once('header.php');
require_once('CursoDAO.php');    
require_once('Curso.php');
$cod = isset($_GET['cod']);

if($cod){
  $cod = $_GET['cod'];
  $cursodao = new CursoDAO();
  $curso = $cursodao->busca(intval($cod));
}
?>
<h2>Detalhes dos cursos</h2>

<ul class="list-group">
  <li class="list-group-item active"><?= $curso->getNome()." (cod:".$curso->getCod().")";?></li>
  <li class="list-group-item"><?php echo "Area: ".$curso->getArea();?></li>
  <li class="list-group-item"><?php echo "Carga horaria: ".$curso->getCarga();?></li>
</ul>

<a href="listar.php" class="btn btn-sm active" role="button" aria-pressed="true"> << voltar</a>
