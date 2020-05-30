<aside class="sidebar">
    <nav class="menu mt-3">
        <div class="imagem-user">
            <img class="avatar" src="<?= "assets/css/imagens/upload/userProfile/". $_SESSION['usuario']->imagem_usuario ?>" alt="user">
        </div>
        <hr>
        <ul class="nav-list">
            <a href="home.php">
                <li class="nav-item">
                    <i class="icofont-chart-histogram mr-2"></i>
                    Meu Feed
                </li>
            </a>
            <a href="day_records.php">
                <li class="nav-item">
                    <i class="icofont-ui-calendar mr-2"></i>
                    Meu Perfil
                </li>
            </a>
            <a href="pag-favoritos.php?idUsuario=<?= $_SESSION['usuario']->id_usuario ?>">
                <li class="nav-item">
                    <i class="icofont-ui-check mr-2"></i>
                    Meus Favoritos
                </li>
            </a>
            <a href=".php">
                <li class="nav-item">
                    <i class=" icofont-users  mr-2"></i>
                    Meus seguidores?
                </li>
            </a>
            <a href="C-editar-perfil.php?idUsuario=<?= $_SESSION['usuario']->id_usuario ?>">
                <li class="nav-item">
                    <i class="icofont-chart-histogram mr-2"></i>
                    Editar perfil
                </li>
            </a>
        </ul>
    </nav>

    <!-- <div class="sidebar-widgets">
        <div class="sidebar-widget">
            <i class="icon icofont-hour-glass text-primary"></i>
            <div class="info">
                <span class="main text-primary">
                    04:23
                </span>
                <span class="label text-muted">Horas Trabalhadas</span>
            </div>
        </div>
        <div class="division my-3"></div>
        <div class="sidebar-widget">
            <i class="icon icofont-ui-alarm text-danger"></i>
            <div class="info">
                <span class="main text-danger">
                    18:00
                </span>
                <span class="label text-muted">Hora de Saída</span>
            </div>
        </div>
    </d iv> -->
</aside>