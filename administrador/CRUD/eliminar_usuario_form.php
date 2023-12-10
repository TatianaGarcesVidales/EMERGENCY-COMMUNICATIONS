<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... (resto del encabezado) ... -->
</head>
<body>
    <div class="space">.</div>
    <div class="navbar-nav navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="/index.html">
                    <img src="images/logo30.png" alt="" /> Home
                </a>
            </div>
        </div>
    </div>
    
    <h2 style="text-align: center; color: #9ae5f3;">Eliminar Usuario</h2>
    
    <form action="eliminar_usuario.php" method="post" id="deleteUserForm">
        <fieldset>
            <label for="deleteType">Selecciona el tipo de eliminación:</label>
            <select name="deleteType" id="deleteType" required>
                <option value="id">Por ID</option>
                <option value="username">Por Nombre de Usuario</option>
                <option value="email">Por Correo Electrónico</option>
            </select>
            <br />

            <!-- Campo dinámico según la opción seleccionada -->
            <div id="deleteField"></div>
        </fieldset>
        <input type="submit" value="Eliminar Usuario">
    </form>

    <script>
        // JavaScript para cambiar el campo según la opción seleccionada
        document.getElementById('deleteType').addEventListener('change', function () {
            var selectedType = this.value;
            var deleteField = document.getElementById('deleteField');

            // Limpiar el campo actual
            deleteField.innerHTML = '';

            // Crear el nuevo campo según la opción seleccionada
            switch (selectedType) {
                case 'id':
                    deleteField.innerHTML = '<label for="userId">ID del Usuario a Eliminar:</label><input type="number" name="userId" id="userId" placeholder="Ingresa el ID del usuario" required>';
                    break;
                case 'username':
                    deleteField.innerHTML = '<label for="username">Nombre de Usuario a Eliminar:</label><input type="text" name="username" id="username" placeholder="Ingresa el nombre de usuario" required>';
                    break;
                case 'email':
                    deleteField.innerHTML = '<label for="email">Correo Electrónico a Eliminar:</label><input type="email" name="email" id="email" placeholder="Ingresa el correo electrónico" required>';
                    break;
            }
        });
    </script>
</body>
</html>
