<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/cabecera.php'; ?>        
<?php require_once 'includes/lateral.php'; ?>

<!-- CAJA PRINCIPAL -->
<div id="principal">
    <h1>Crear Categorias</h1>
    <p>
        Crear categoria al blog, para que los usuarios para que los
        Usuarios puedan crear sus entradas.
    </p>
    <form action="guardar_categoria.php" method="POST">
        <laber for="nombre">Nombre</label>
        <input type="text" name="nombre" />
        
        <input type="submit" value="Guardar" />
    </form>
</div><!-- Fin de Caja Princiapl -->

<?php require_once 'includes/pie.php'; ?>