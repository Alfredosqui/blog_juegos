<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>
<?php
    $entrada_actual = conseguirEntrada($db, $_GET['id']);
    if(!isset($entrada_actual['id'])){
        header("Location: index.php");
    }
?>

<?php require_once 'includes/cabecera.php'; ?>      
<?php require_once 'includes/lateral.php'; ?>

<!-- CAJA PRINCIPAL -->
<div id="principal">
    
    <h1><?=$entrada_actual['titulo']?></h1>
    <a href="categoria.php?id=<?=$entrada_actual['categoria_id']?>">
        <h2><?=$entrada_actual['categoria']?></h2>
    </a>
    <h5><?=$entrada_actual['fecha']?> | <?= $entrada_actual['usuario']?></h5>
    <p>
        <?=$entrada_actual['descripcion']?>
    </p>
    </br>

    <?php if(isset($_SESSION["usuario"]) && $_SESSION['usuario']['id'] == $entrada_actual['usuario_id']) : ?>
    </br>
        <a href="editar_entrada.php?id=<?=$entrada_actual['id']?>" class="boton boton-naranja">Editar Entrada<a>
        <a href="borrar_entrada.php?id=<?=$entrada_actual['id']?>" class="boton boton-rojo">Eliminar Entrada<a>
    <?php endif; ?>
</div><!-- Fin Principal -->
      
<?php require_once 'includes/pie.php'; ?>

