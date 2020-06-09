<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script> -->


    <link rel="stylesheet" href="assets/css/comum.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/icofont.min.css">
    <link rel="stylesheet" href="assets/css/template.css">

    <link rel="stylesheet" href="assets/css/home.css">


    <!-- Imagens do livro -->
    <link rel="stylesheet" href="assets/css/img-livros.css">
    <link rel="stylesheet" href="assets/css/img-user.css">

    <!-- Data table -->

    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap.min.js">

    <title>OnLibrary</title>

</head>

<body class="hide-sidebar">
    <!-- class="hide-sidebar": Pra esconder a barra lateral -->
    <header class="header">
        <div class="logo">
            <a href="home.php">
                <i class="icofont-book mr-2"></i>
                <span class="font-weight-bold">ON</span>
                <span class="font-weight-light mx-2">Library</span>
            </a>
        </div>
        <!-- //esconder o botão -->
        <div class="menu-toggle mx-3">
            <i class="icofont-navigation-menu"></i>
        </div>

        <!------------------------------>
        <?php if ($_SESSION['usuario']->is_admin == 1) {
            require_once(realpath(VIEW_PATH . '/template/header-adm.php'));
        }
        ?>
        <!------------------------------>

        <div class="spacer"></div>
        <div class="dropdown">
            <div class="dropdown-button">
                <!-- <img class="avatar" src="<?= "http://www.gravatar.com/avatar.php?gravatar_id=" . md5(strtolower((trim($_SESSION['usuario']->email)))) ?>" alt="user"> -->
                <img class="avatar" src="<?= "assets/css/imagens/upload/userProfile/" . $_SESSION['usuario']->imagem_usuario ?>" alt="user">

                <span>
                    <?= $_SESSION['usuario']->nome ?>
                </span>
                <i class="icofont-simple-down mx-2"></i>
            </div>
            <div class="dropdown-content">
                <ul class="list">
                    <li class="nav-item">
                        <a href="logout.php">
                            <i class="icofont-logout"></i>
                            Sair
                        </a>
                    </li>
                </ul>

            </div>

        </div>
    </header>