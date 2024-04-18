<!DOCTYPE html>
<html lang="es">
<?php
$ruta = ".";
$titulo = "Aplicación de Ventas";
include("paginas/includes/cabecera.php");
?>

<body>
    <?php
    include("paginas/includes/menu.php");
    ?>
    <div class="container mt-3">
        <header>
            <h1><i class="fa fa-university"></i> <?= $titulo ?></h1>
            <hr />
        </header>
        <section>
            <article>
                <!-- Carrusel -->
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/iphone.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/iphone.png" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
    </div>
    </article>
    </section>
    </div>
</body>

</html>