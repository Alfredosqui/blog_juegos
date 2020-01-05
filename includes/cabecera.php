<?php require_once 'conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Blog de Video Juegos</title>
        <link rel="stylesheet" type="text/css" href="./assets/css/style.css" />
    </head>
    <body>
        <!-- CABECERA -->
        <header id="cabecera">
            <div id="logo">
                <a href="index.php">
                    Blog de Video Juegos
                </a>
            </div>
            
            <!-- MENU -->
            <nav id="menu">
                <ul>
                    <li>
                        <a href="index.php">Inicio</a>
                    </li>
                    <?php
                        $categorias = conseguirCategorias($db);
                        if(!empty($categorias)):
                            while($categoria = mysqli_fetch_assoc($categorias)):
                    ?>
                            <li>
                                <a href="categoria.php?id=<?= $categoria['id']; ?>"> <?=$categoria['nombre'];?></a>
                            </li>
                    <?php 
                            endwhile; 
                        endif;
                    ?>
                    <li>
                        <a>Sobre mi</a>
                    </li>
                    <li>
                        <a>Contacto</a>
                    </li>
                </ul>
            </nav>
            
            <div class="clearfix"></div>
        </header>
    <div id="contenedor">