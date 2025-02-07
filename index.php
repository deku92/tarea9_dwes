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
        </main>
        <footer>
            <a href="https://github.com/deku92/tarea9_dwes" target="_blank"><img src="img/git.png" alt="link gitHub"/></a>
            <a href="https://pokeapi.co/docs/v2#pokemon-section" target="_blank"><img src="img/pokeapi.png" alt="link pokeapi"/></a>
            <p class="nombreDni">&copy; 2025 Borja Arques Amat dni: 20908598B</p>
        </footer>
    </body>
</html>

