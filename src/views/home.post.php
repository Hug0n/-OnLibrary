<?php

echo "<br>";

if ($resultado_posts) {

    while ($registroPosts = mysqli_fetch_array($resultado_posts, MYSQLI_ASSOC)) {
        // setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        // date_default_timezone_set('America/Sao_Paulo');

        $formatoData = 'd \d\e M \d\e Y';
        $dataInclusao = strtotime($registroPosts['data_inclusao']);
        $mysqlDate = date($formatoData, $dataInclusao);
        //echo $mysqlDate;

        // $diretorioimg = $diretorio . $registroPosts['imagem_usuario'];
        echo '<div class="row list-group-users">';
        echo '<div class="col-md-3">';
        echo '<a href="#" class="text">';

        echo '<div class="imagem-user-peq">';
        echo '<img src="' . $diretorio . $registroPosts['imagem_usuario'] . '">';
        echo '</div>';
        echo '</div>';
        echo '</a>';

        echo '<div class="col-md-9">';

        /////////////////////////////////// Puxar a quantidade de curtidas:
        $resultado_curtidas = $Post->getQtdCurtidas($registroPosts['id_post']); //$SQL Curtidas

        $qtd_curtidas = 0;

        if ($resultado_curtidas) {
            $registroCurtidas = mysqli_fetch_array($resultado_curtidas, MYSQLI_ASSOC);

            $qtd_curtidas = $registroCurtidas['qtd_curtidas'];
        } else {
            echo 'Erro ao executar a Query qtd_curtidas(homr.post)';
        }

        ///////////////////////////////////
        if ($id_usuario === $registroPosts['id_usuario']) { //exibição do botão EXCLUIR caso o post seja "meu":

            ////exibição da quantidade de curtidas caso o post seja "meu"
            echo '<span class="pull-right" style="margin-right: 15px"> <input type=image src="assets/css/imagens/like_heart1.jpg" width="15" height="15"> ' . $qtd_curtidas . '</span>';

            ////Botão Excluir
            echo '<input type=image src="assets/css/imagens/remove_post.png" width="18" height="18" id="btn_excluir_' . $registroPosts['id_post'] . '" class="btn_excluir pull-right" style="margin-right: 25px" data-id_post="' . $registroPosts['id_post'] . '"></input>';
        } else { //exibição do botão curtir/descurtir -> Caso o usuário seja diferente do user da sessão (outros posts):

            $esta_seguindo_usuario_tf = $Post->getPostCurtido($id_usuario, $registroPosts['id_post']); //$SQL Curtidas

            $registroPostCurtido = mysqli_fetch_array($esta_seguindo_usuario_tf, MYSQLI_ASSOC);

            $btn_curtir_display = 'block';
            $btn_descurtir_display = 'block';

            if (!(is_array($registroPostCurtido))) {
                $btn_descurtir_display = 'none';
            } else {
                $btn_curtir_display = 'none';
            }

            echo '<button type="button" id="btn_curtir_' . $registroPosts['id_post'] . '" style="display: ' . $btn_curtir_display . '" class="btn btn-secondary btn_curtir pull-right" data-id_post="' . $registroPosts['id_post'] . '"> <input type=image src="assets/css/imagens/like_heart1.jpg" width="20" height="20"> ' . $qtd_curtidas . ' </button>';

            echo '<button type="button" id="btn_descurtir_' . $registroPosts['id_post'] . '" style="display: ' . $btn_descurtir_display . '" class="btn btn-success btn_descurtir pull-right" data-id_post="' . $registroPosts['id_post'] . '"> <input type=image src="assets/css/imagens/like_heart1.jpg" width="20" height="20"> ' . $qtd_curtidas . ' </button>';

            if ($_SESSION['usuario']->is_admin === '1') {
                ////Botão Excluir, caso seja ADM
                echo '<input type=image src="assets/css/imagens/remove_post.png" width="18" height="18" id="btn_excluir_' . $registroPosts['id_post'] . '" class="btn_excluir pull-right" style="margin-right: 25px" data-id_post="' . $registroPosts['id_post'] . '"></input>';
            }
        }
        echo '<a href="#" class="text">';

        //Nome - Data do Post e Post em si:
        echo '<h4 class="list-group-item-heading post-nome"> ' . $registroPosts['nome'] . ' <small>· ' . $mysqlDate . ' </small> </h4>';
        echo '<p class=list-group-item-text post>' . $registroPosts['post'] . '</p>';
        echo '</a>';
        echo '</div>'; //Fim coluna 2 (posts e curtidas)
        echo '</div>'; //Fim row

    }
} else {
    echo 'Erro na consulta dos posts no banco de dados. Por favor, tente novamente.';
}
