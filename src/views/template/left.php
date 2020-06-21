<aside class="sidebar sticky">
    <div class="sticky">
        <nav class="menu mt-3 ">
            <div class="imagem-user">
                <img class="avatar" src="<?= "assets/css/imagens/upload/userProfile/" . $_SESSION['usuario']->imagem_usuario ?>" alt="user">
            </div>
            <hr>
            <ul class="nav-list">
                <a href="home.php">
                    <li class="nav-item">
                        <i class="icofont-chart-histogram mr-2"></i>
                        <span class="ocultar-list"> Meu Feed </span>
                    </li>
                </a>
                <!-- ui-user
            user-alt-3  -> face
            user-alt-5 -> sorrindo
            user
            -->
                <a href="pag-perfil-usuario.php?idUsuario=<?= $_SESSION['usuario']->id_usuario ?>">
                    <li class="nav-item">
                        <i class="icofont-user-alt-5 mr-2"></i>
                        <span class="ocultar-list"> Meu Perfil </span>
                       
                    </li>
                </a>
                <a href="pag-favoritos.php?idUsuario=<?= $_SESSION['usuario']->id_usuario ?>">
                    <li class="nav-item">
                        <i class="icofont-star mr-2"></i>
                        <span class="ocultar-list"> Meus Favoritos </span>
                        
                    </li>
                </a>
                <a href="#">
                    <li class="nav-item">
                        <i class=" icofont-users  mr-2"></i>
                        <span class="ocultar-list"> Meus seguidores </span>

                    </li>
                </a>
                <a href="#">
                    <li class="nav-item">
                        <i class=" icofont-ui-check  mr-2"></i>
                        <span class="ocultar-list"> Seguindo </span>

                    </li>
                </a>
                <a href="C-editar-perfil.php?idUsuario=<?= $_SESSION['usuario']->id_usuario ?>">
                    <li class="nav-item">
                        <i class="icofont-edit mr-2"></i>
                        <span class="ocultar-list"> Editar perfil </span>

                        
                    </li>
                </a>

                <!-- <a href="data-sugestao.php">
                    <li class="nav-item">
                        <i class="icofont-chart-histogram mr-2"></i>
                        <span class="ocultar-list"> Ver Sugestões </span>

                        
                    </li>
                </a> -->
            </ul>
        </nav>

    </div>

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