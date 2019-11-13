<?php 
require_once('header.php');
require_once('CursoDAO.php');    
require_once('Curso.php');    
$cursodao = new CursoDAO();
$lista = $cursodao->lista(30,0);
?>

  <h2>Lista de Cursos</h2>
  <table class="table table-sm table-responsive-sm table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Nome</th>
            <th scope="col">area</th>
            <th scope="col">carga horaria</th>
            <th scope="col">data de fundação</th>
    </tr>
  </thead>
  <tbody>
    <?php  
        foreach($lista as $curso){
    ?>
    <tr>
      <td> <?php echo $curso->getCod(); ?> </td>
      <td> <?php echo $curso->getNome(); ?> </td>
      <td> <?php echo $curso->getArea(); ?> </td>
      <td> <?php echo $curso->getCarga(); ?> </td>
      <td> <?php echo $curso->getDate(); ?> </td>
      <td> 
        <a href="detalhes.php?cod=<?php echo $curso->getCod(); ?>" class="btn btn-sm btn-info"> 					
          Detalhes?</a>
        <a href="cadastro.php?cod=<?php echo $curso->getCod(); ?>" class="btn btn-sm btn-warning">
          Editar?</a>				
        <a href="excluir.php?cod=<?php echo $curso->getCod(); ?>" class="btn btn-sm btn-danger"> 					
          Excluir?</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<a href="cadastro.php" class="btn btn-secondary active" role="button" aria-pressed="true">Inserir curso</a>

