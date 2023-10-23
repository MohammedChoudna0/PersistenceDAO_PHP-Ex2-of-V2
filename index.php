<?php require_once './templates/header.php';
require_once './persistence/DAO/PartidoDAO.php';
require_once './persistence/DAO/EquipoDAO.php'?>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Mi Sitio Web</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item ">
                    <a class="nav-link" id="enlace-equipos">Equipos</a>
                    
                </li>
                <li class="nav-item ">
                    <a class="nav-link" id="enlace-partidos">Partidos</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container text-center">
        <h1>Bienvenido</h1>
        <p>Selecciona una opción de menu</p>
    </div>
    <div id="equipos" style="display:none;">
        <?php $equipoDAO = new EquipoDAO();
        $equipos = $equipoDAO->selectAll()
    ?>
        <div class="container">
            <h1 class="mt-5 mb-4">Equipos</h1>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Estadio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($equipos as $equipo): ?>
                        <tr>
                            <td><?php echo $equipo['id']; ?></td>
                            <td><?php echo $equipo['nombre']; ?></td>
                            <td><?php echo $equipo['estadio']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    
    </div>
    <div id="partidos" style="display:none;">
    <?php $partidoDAO = new PartidoDAO();
        $resultados = $partidoDAO->selectAll()
    ?>
    <div class="container">
            <h1 class="mt-5 mb-4">Partidos</h1>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Equipo 1</th>
                        <th>Equipo 2</th>
                        <th>Resultado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultados as $resultado): ?>
                        <tr>
                            <td><?php echo $resultado['id']; ?></td>
                            <td><?php echo $resultado['equipo1_nombre']; ?></td>
                            <td><?php echo $resultado['equipo2_nombre']; ?></td>
                            <td><?php echo $resultado['resultado']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="./scripts/js/main.js"></script>

    <script src=".\assets\js\bootstrap.js"></script>
</body>

</html>