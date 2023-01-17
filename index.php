<?php

require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT id, nombre, precio FROM productos WHERE activo=1");
$sql->execute();
$resultados = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tienda online</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <!--NAVBAR-->
    <header>
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a href="#" class="navbar-brand">
                    <strong>Tienda Online</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader"
                    aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarHeader">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <div class="nav-item">
                            <a href="#" class="nav-link active">Catalogo</a>
                        </div>

                        <div class="nav-item">
                            <a href="#" class="nav-link">Contacto</a>
                        </div>
                    </ul>

                    <a href="carrito.php" class="btn btn-primary">Carrito</a>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                <?php foreach($resultados as $row){?>

                <div class="col">
                    <div class="card shadow-sm">

                    <?php 
                    $id = $row['id'];
                    $imagen = "images/productos/$id/principal.jpg";

                    if(!file_exists($imagen)){
                        $imagen = "images/no-photo.jpg";
                    }
                    ?>

                        <img src="<?php echo $imagen; ?>" alt="">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
                            <p class="card-text">$ <?php echo number_format($row['precio'], 2, ',','.'); ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="" class="btn btn-primary">Detalles</a>
                                </div>
                                <a href="" class="btn btn-success">Agregar</a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php } ?>

            </div>
    </main>


    <script src="js/bootstrap.min.js"></script>
</body>

</html>