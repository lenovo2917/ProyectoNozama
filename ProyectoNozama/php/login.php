<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="../css/login.css">

    
        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <title>Inicio de Sesión - Nozama</title>
    </head>
    <body>
        
    <?php
    session_start();
    $conn = new mysqli("localhost", "rogelio", "ROger1", "Nozama");

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['login'])) {
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];

            $sql = "SELECT * FROM Cliente WHERE Correo='$correo' AND Contrasena='$contrasena'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $_SESSION['id_cliente'] = $row['Id_Cliente'];
                $_SESSION['correo'] = $correo;
                $_SESSION['rol'] = $row['Rol']; 

                
                if ($row['Rol'] == 3) {
                    header("Location: crudAdmin.php"); 
                } else {
                    header("Location: main.php");
                }
            } else {
                echo "<p>Correo o contraseña incorrectos</p>";
            }
        } elseif (isset($_POST['register'])) {
            $nombre = $_POST['nombre'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $genero = $_POST['genero'];
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];

            $sql = "INSERT INTO Datos_Cliente (Nombre, Direccion, Telefono, Genero) VALUES ('$nombre', '$direccion', '$telefono', '$genero')";
            if ($conn->query($sql) === TRUE) {
                $id_dato = $conn->insert_id;
                $sql = "INSERT INTO Cliente (Id_dato, Correo, Contrasena, Rol) VALUES ('$id_dato', '$correo', '$contrasena', 0)";
                if ($conn->query($sql) === TRUE) {
                    echo "<p>Registro exitoso</p>";
                } else {
                    echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
                }
            } else {
                echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
            }
        }
    }
    $conn->close();
    ?>

        <div class="login">
            <div class="login__content">
                <div class="login__img">
                    <img src="../img/undraw_login_re_4vu2.svg" alt="">
                </div>

                <div class="login__forms">
                    <form action="" method="POST" class="login__registre" id="login-in">
                        <h1 class="login__title">Bienvenido a Nozama</h1>
                        <p class="login__subtitle">Tu tienda en línea para productos electrónicos de tiendas móviles</p>
    
                        <div class="login__box">
                            <i class='bx bx-user login__icon'></i>
                            <input type="text" name="correo" placeholder="Correo electrónico" class="login__input" required>
                        </div>
    
                        <div class="login__box">
                            <i class='bx bx-lock-alt login__icon'></i>
                            <input type="password" name="contrasena" placeholder="Contraseña" class="login__input" required>
                        </div>

                        <a href="#" class="login__forgot">¿Olvidaste tu contraseña?</a>

                        <button type="submit" name="login" class="login__button">Iniciar Sesión</button>

                        <div>
                            <span class="login__account">¿No tienes una cuenta?</span>
                            <span class="login__signin" id="sign-up">Regístrate</span>
                        </div>
                    </form>

                    <form action="" method="POST" class="login__create none" id="login-up">
                        <h1 class="login__title">Crear Cuenta</h1>
    
                        <div class="login__box">
                            <i class='bx bx-user login__icon'></i>
                            <input type="text" name="nombre" placeholder="Nombre de usuario" class="login__input" required>
                        </div>
    
                        <div class="login__box">
                            <i class='bx bx-at login__icon'></i>
                            <input type="text" name="correo" placeholder="Correo electrónico" class="login__input" required>
                        </div>

                        <div class="login__row">
                            <div class="login__box">
                                <i class='bx bx-lock-alt login__icon'></i>
                                <input type="password" name="contrasena" placeholder="Contraseña" class="login__input" required>
                            </div>

                            <div class="login__box">
                                <i class='bx bx-home login__icon'></i>
                                <input type="text" name="direccion" placeholder="Dirección" class="login__input" required>
                            </div>
                        </div>

                        <div class="login__row">
                            <div class="login__box">
                                <i class='bx bx-phone login__icon'></i>
                                <input type="text" name="telefono" placeholder="Teléfono" class="login__input" required>
                            </div>

                            <div class="login__box">
                                <i class='bx bx-male-female login__icon'></i>
                                <select name="genero" class="login__input" required>
                                    <option value="" disabled selected>Género</option>
                                    <option value="0">Femenino</option>
                                    <option value="1">Masculino</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" name="register" class="login__button">Regístrate</button>

                        <div>
                            <span class="login__account">¿Ya tienes una cuenta?</span>
                            <span class="login__signup" id="sign-in">Iniciar Sesión</span>
                        </div>

                        <div class="login__social">
                            <a href="#" class="login__social-icon"><i class='bx bxl-facebook' ></i></a>
                            <a href="#" class="login__social-icon"><i class='bx bxl-twitter' ></i></a>
                            <a href="#" class="login__social-icon"><i class='bx bxl-google' ></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--===== MAIN JS =====-->
        <script src="../js/login.js"></script>
    </body>
</html>