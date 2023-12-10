<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.8/dist/sweetalert2.min.js"></script>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>Iniciar Sesión Emergency Communications</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../imagenes/user.png" type="image/png">

    <style>
        body {
            height: 100%;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"],
        .form-signin input[type="password"],
        .form-signin input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        .form-signin h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;
            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }

        /* Estilos específicos para tu formulario aquí */
       .bg-body-tertiary {
    /* Cambia la URL por la ruta de tu imagen */
    background-image: url('/imagenes/Family.jpg'); 
    background-size: cover; /* Ajusta el tamaño de la imagen para cubrir el fondo */
    background-position: center center; /* Centra la imagen en el fondo */
     background-repeat: no-repeat; /* Evita que la imagen se repita */
    /* Puedes agregar más propiedades según tus preferencias */
    color: #fff; /* Cambia el color del texto si es necesario para que sea legible */
}


        .text-body-secondary {
            color: #6c757d;
        }
    </style>
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <!-- Símbolos SVG aquí -->
    </svg>

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
        <!-- Dropdown de cambio de tema aquí -->
    </div>

    <main class="form-signin w-100 m-auto">
        <form class="form-signin" method="post" action="procesar_iniciar_sesion.php">
    <img class="mb-4" src="../imagenes/logoFondo.png" alt="" width="280" height="200">
    <h1 class="h3 mb-3 fw-normal">Iniciar Sesión</h1>

    <?php
    if (isset($_GET["error"])) {
    // Si el parámetro `error` es igual a 1, generamos código JavaScript para mostrar el mensaje
    if ($_GET["error"] == 1) {
        echo "<script>document.getElementById('error-message').style.display = 'block';</script>";
    }
    }
    
    if (isset($_GET['error'])) {
    $error_message = urldecode($_GET['error']);
    echo '<div style="color: red;">' . $error_message . '</div>';
}
?>


    <div id="error-message" class="alert alert-danger" style="display: none;"></div>

    <div class="form-floating">
        <input type="email" class="form-control" id="floatingInput" name="correo_electronico" placeholder="name@example.com" autocomplete="email" required>
        <label for="floatingInput">Correo electrónico</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" name="contrasena" placeholder="Contraseña" autocomplete="current-password" required>
        <label for="floatingPassword">Contraseña</label>
    </div>

   <div class="form-check text-start my-3" style="background-color: white; padding: 10px; border-radius: 5px;">
    <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
    <label class="form-check-label" for="flexCheckDefault" style="color: black;">
        Guardar información de usuario
    </label>
</div>
<button type="submit" class="btn btn-primary w-100 py-2 mb-2">Iniciar sesión</button>
<button type="button" class="btn btn-secondary w-100 py-2" onclick="irAOtraInterfaz()">Atrás</button>

<script>
    function irAOtraInterfaz() {
        // Puedes redirigir a otra interfaz cambiando la ubicación del navegador
        window.location.href = '../index.html';
    }
</script>


<!-- Agrega esta función JavaScript al final del archivo -->
<script>
    function validateForm() {
        // Puedes agregar más validaciones si es necesario
        var email = document.getElementById('floatingInput').value;
        var password = document.getElementById('floatingPassword').value;

        // Ejemplo de validación simple, verifica que el correo y la contraseña no estén vacíos
        if (email === '' || password === '') {
            document.getElementById('error-message').innerHTML = 'Por favor, completa todos los campos.';
            document.getElementById('error-message').style.display = 'block';
            return false; // Evita que el formulario se envíe
        }


        // Si todo está bien, devuelve true para permitir que el formulario se envíe
        return true;
    }
</script>

    </main>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>
