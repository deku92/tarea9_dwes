            
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Consulta PokeApi</title>
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <header>
            <img src="img/logo.png" alt="logo pokedex"/>
            <h1 class="tituloLogo">Pokedex</h1>
        </header>
        <main>
            <form method="GET" action="cliente.php">
                    <label>Introduzca el Id el pokemon que desa saber:
                        <input type="text" name="id_pokemon" placeholder="ID pokemon" required>
                    </label>
                    <input type="submit" value="Buscar">     
            </form>                 
            <?php
                //si esta definido el get
                //procedemos a hacer varias comprobaciones para poder activar la logica
                //buscando en internet he visto que solo hay 1025 pokemons
                if(isset($_GET['id_pokemon']) && ctype_digit($_GET['id_pokemon']) && $_GET['id_pokemon'] != ''){
                    if ($_GET['id_pokemon'] > 0 && $_GET['id_pokemon'] < 1026 ) {
                    $id_pokemon = $_GET['id_pokemon'];  
                    $api = "https://pokeapi.co/api/v2/pokemon/$id_pokemon";
                              
                    //extraemos la info en formato JSON
                    $respuesta = file_get_contents($api);

                    if ($respuesta) {
                    
                        $datos = json_decode($respuesta, true);
                        //var_dump($datos);
                        //uso ucfirst para poner la primera letra del dato en mayuscula , ya que en el array recogido viene todo en minuscula.
                        $nombrePokemon = ucfirst($datos["name"]);
                        $tipoPokemon = ucfirst($datos["types"][0]["type"]["name"]);
                        //mostramos los datos que queremos.
                        echo "<section id='resultado'>";
                            echo"<article id='ok'>";
                                echo "<img src='img/ok.png' alt='logo ok'/>";
                                echo "<h3>¡Eureca! Pokemon encontrado</h3>";
                            echo "</article>";
                            echo"<article id='busqueda'>";
                                echo "<p id='resaltar'>Nombre: $nombrePokemon </p>";
                                echo "<p>Tipo principal: $tipoPokemon</p>";
                            echo"</article>";
                        echo "</section>";
                        echo "<button><a href='index.php'>Volver</a></button>";
                    }    
                }else{  
                    
                    //si introducimos un valor no deseado pasamos este mensaje
                    echo "<section id='error'>
                    <img src='img/advertencia.png' alt='logo advertencia' width='50'/>
                    <p>¡No existe ese pokemon!</p>
                          </section>";
                    echo "<button><a href='index.php'>Volver</a></button>";
                }
                }else{
                    echo "<section id='error'>
                            <img src='img/advertencia.png' alt='logo advertencia' width='50'/>
                            <p>¡No se permiten carácteres que no sean numéricos!</p>
                        </section>";
                    echo "<button><a href='index.php'>Volver</a></button>";
                }
            ?> 
        </main>
        <footer>
            <a href="https://github.com/deku92/tarea9_dwes" target="_blank"><img src="img/git.png" alt="link gitHub"/></a>
            <a href="https://pokeapi.co/docs/v2#pokemon-section" target="_blank"><img src="img/pokeapi.png" alt="link pokeapi"/></a>
            <p class="nombreDni">&copy; 2025 Borja Arques Amat dni: 20908598B</p>
        </footer>
    </body>
</html>