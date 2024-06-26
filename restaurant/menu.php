<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Restaurant</title>

	<!-- Normalize V8.0.1 -->
	<link rel="stylesheet" href="./css/normalize.css">

	<!-- MDBootstrap V5 -->
	<link rel="stylesheet" href="./css/mdb.min.css">

	<!-- Font Awesome V5.15.1 -->
	<link rel="stylesheet" href="./css/all.css">

	<!-- Sweet Alert V10.13.0 -->
	<script src="./js/sweetalert2.js" ></script>

	<!-- General Styles -->
	<link rel="stylesheet" href="./css/style.css">

</head>
<body>

	<!-- Header -->
	<?php include_once 'sections/header.php' ?>


	<!-- Content -->
	<div class="container container-web-page">
	    <h3 class="font-weight-bold poppins-regular text-uppercase">Menú de platillos</h3>
	    <p class="text-justify">Bienvenido al menú de platillos, acá encontrara todos los platillos disponibles en el restaurante. Puede ordenar los platillos por categoría en el botón "<i class="fas fa-hamburger fa-fw"></i> MENÚ" y también ordenarlos por orden alfabético o por precio en el botón "<i class="fas fa-sort-alpha-down fa-fw"></i> ORDENAR POR". Además, puede buscar platillos por nombre haciendo clic en el botón "<i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR"</p>

	    <div class="container-fluid" style="border-top: 1px solid #E1E1E1; padding: 20px; 0">
	        <div class="row align-items-center">
	            <div class="col-12 col-sm-4 text-center text-sm-start">
	                <div class="dropdown">
	                    <button class="btn btn-link dropdown-toggle" type="button" id="categorySubMenu" data-mdb-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                        <i class="fas fa-hamburger fa-fw"></i> &nbsp; Menú
	                    </button>
	                    <div class="dropdown-menu" aria-labelledby="categorySubMenu">
	                        <a class="dropdown-item" href="#">Menú 1</a>
	                        <a class="dropdown-item" href="#">Menú 2</a>
	                        <a class="dropdown-item" href="#">Menú 3</a>
	                    </div>
	                </div>
	            </div>
	            <div class="col-12 col-sm-4 text-center">
	                <button type="button" class="btn btn-link" data-mdb-toggle="modal" data-mdb-target="#saucerModal">
	                    <i class="fas fa-search fa-fw"></i> &nbsp; Buscar
	                </button>
	            </div>
	            <div class="col-12 col-sm-4 text-center text-sm-end">
	                <div class="dropdown">
	                    <button class="btn btn-link dropdown-toggle" type="button" id="OrderSubMenu" data-mdb-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                        <i class="fas fa-sort-alpha-down fa-fw"></i> &nbsp; Ordenar por
	                    </button>
	                    <div class="dropdown-menu" aria-labelledby="OrderSubMenu">
	                        <a class="dropdown-item" href="#">Ascendente (A-Z)</a>
	                        <a class="dropdown-item" href="#">Descendente (Z-A)</a>
	                        <a class="dropdown-item" href="#">Precio (Menor a Mayor)</a>
	                        <a class="dropdown-item" href="#">Precio (Mayor a Menor)</a>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>


	    <div class="container-fluid" style="padding: 20px 0;">
	        <div class="row">
	            <div class="col-12 col-md-8">
	                <p class="text-left lead"><i class="fas fa-search fa-fw"></i> &nbsp; Resultados de la búsqueda: <span class="font-weight-bold poppins-regular text-uppercase">Platillo</span></p>
	            </div>
	            <div class="col-12 col-md-4">
	                <button type="button" class="btn btn-danger">
	                    <i class="fas fa-times fa-fw"></i> &nbsp; Eliminar busqueda
	                </button>
	            </div>
	        </div>
	    </div>


	    <div class="container-cards full-box" style="padding-bottom: 40px;">

	        <div class="card shadow-1-strong">
	            <img class="card-img-top" src="./assets/platillos/platillo.jpg" alt="nombre_platillo">
	            <div class="card-body text-center">
	                <h5 class="card-title font-weight-bold">Nombre o titulo del platillo</h5>
	                <p class="card-text lead"><span class="badge bg-secondary">$25.00 USD</span></p>
	            </div>
	            <div class="card-body text-center">
	                <button type="button" class="btn btn-success btn-sm"><i class="fas fa-shopping-bag fa-fw"></i> &nbsp; Agregar</button>
	                &nbsp; &nbsp;
	                <a href="details.php" class="btn btn-info btn-sm"><i class="fas fa-utensils fa-fw"></i> &nbsp; Detalles</a>
	            </div>
	        </div>

	        <div class="card shadow-1-strong">
	            <img class="card-img-top" src="./assets/img/img_not_found.jpg" alt="nombre_platillo">
	            <div class="card-body text-center">
	                <h5 class="card-title font-weight-bold">Nombre o titulo del platillo</h5>
	                <p class="card-text lead"><span class="badge bg-secondary">$25.00 USD</span></p>
	            </div>
	            <div class="card-body text-center">
	                <button type="button" class="btn btn-success btn-sm"><i class="fas fa-shopping-bag fa-fw"></i> &nbsp; Agregar</button>
	                &nbsp; &nbsp;
	                <a href="details.php" class="btn btn-info btn-sm"><i class="fas fa-utensils fa-fw"></i> &nbsp; Detalles</a>
	            </div>
	        </div>

	        <div class="card shadow-1-strong">
	            <img class="card-img-top" src="./assets/platillos/platillo.jpg" alt="nombre_platillo">
	            <div class="card-body text-center">
	                <h5 class="card-title font-weight-bold">Nombre o titulo del platillo</h5>
	                <p class="card-text lead"><span class="badge bg-secondary">$25.00 USD</span></p>
	            </div>
	            <div class="card-body text-center">
	                <button type="button" class="btn btn-success btn-sm"><i class="fas fa-shopping-bag fa-fw"></i> &nbsp; Agregar</button>
	                &nbsp; &nbsp;
	                <a href="details.php" class="btn btn-info btn-sm"><i class="fas fa-utensils fa-fw"></i> &nbsp; Detalles</a>
	            </div>
	        </div>

	        <div class="card shadow-1-strong">
	            <img class="card-img-top" src="./assets/platillos/platillo.jpg" alt="nombre_platillo">
	            <div class="card-body text-center">
	                <h5 class="card-title font-weight-bold">Nombre o titulo del platillo</h5>
	                <p class="card-text lead"><span class="badge bg-secondary">$25.00 USD</span></p>
	            </div>
	            <div class="card-body text-center">
	                <button type="button" class="btn btn-success btn-sm"><i class="fas fa-shopping-bag fa-fw"></i> &nbsp; Agregar</button>
	                &nbsp; &nbsp;
	                <a href="details.php" class="btn btn-info btn-sm"><i class="fas fa-utensils fa-fw"></i> &nbsp; Detalles</a>
	            </div>
	        </div>

	        <div class="card shadow-1-strong">
	            <img class="card-img-top" src="./assets/img/img_not_found.jpg" alt="nombre_platillo">
	            <div class="card-body text-center">
	                <h5 class="card-title font-weight-bold">Nombre o titulo del platillo</h5>
	                <p class="card-text lead"><span class="badge bg-secondary">$25.00 USD</span></p>
	            </div>
	            <div class="card-body text-center">
	                <button type="button" class="btn btn-success btn-sm"><i class="fas fa-shopping-bag fa-fw"></i> &nbsp; Agregar</button>
	                &nbsp; &nbsp;
	                <a href="details.php" class="btn btn-info btn-sm"><i class="fas fa-utensils fa-fw"></i> &nbsp; Detalles</a>
	            </div>
	        </div>

	        <div class="card shadow-1-strong">
	            <img class="card-img-top" src="./assets/platillos/platillo.jpg" alt="nombre_platillo">
	            <div class="card-body text-center">
	                <h5 class="card-title font-weight-bold">Nombre o titulo del platillo</h5>
	                <p class="card-text lead"><span class="badge bg-secondary">$25.00 USD</span></p>
	            </div>
	            <div class="card-body text-center">
	                <button type="button" class="btn btn-success btn-sm"><i class="fas fa-shopping-bag fa-fw"></i> &nbsp; Agregar</button>
	                &nbsp; &nbsp;
	                <a href="details.php" class="btn btn-info btn-sm"><i class="fas fa-utensils fa-fw"></i> &nbsp; Detalles</a>
	            </div>
	        </div>

	    </div>


	    <nav aria-label="Page navigation example">
	        <ul class="pagination justify-content-center">
	            <li class="page-item">
	                <a class="page-link" href="#">Anterior</a>
	            </li>
	            <li class="page-item">
	                <a class="page-link" href="#">1</a>
	            </li>
	            <li class="page-item active">
	                <a class="page-link" href="#">2</a>
	            </li>
	            <li class="page-item">
	                <a class="page-link" href="#">3</a>
	            </li>
	            <li class="page-item">
	                <a class="page-link" href="#">Siguiente</a>
	            </li>
	        </ul>
	    </nav>

	</div>

	<!-- Modal -->
	<div class="modal fade" id="saucerModal" tabindex="-1" aria-hidden="true" aria-labelledby="saucerModalLabel" aria-hidden="true">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="saucerModalLabel">Buscar platillo</h5>
	                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
	            </div>
	            <div class="modal-body">
	                <div class="form-outline mb-4">
	                    <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{4,25}" class="form-control" name="buscar_platillo" id="buscar_platillo" maxlength="25">
	                    <label for="buscar_platillo" class="form-label">¿Qué estás buscando?</label>
	                </div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-danger" data-mdb-dismiss="modal"><i class="fas fa-times fa-fw"></i> &nbsp; Cerrar</button>
	                <button type="button" class="btn btn-info"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar</button>
	            </div>
	        </div>
	    </div>
	</div>


	<!-- Footer -->
	<?php include_once 'sections/footer.php' ?>

	<!-- MDBootstrap V5 -->
	<script src="./js/mdb.min.js" ></script>

	<!-- General scripts -->
	<script src="./js/main.js" ></script>
</body>
</html>