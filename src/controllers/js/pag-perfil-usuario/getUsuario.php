<?php

session_start();

loadModel('Livro');


// $id_usuario_session = $_SESSION['usuario']->id_usuario;
// $id_livro = 9;
$id_usuario = $_POST['id_usuario'];


//--query do livro
// $sql = "SELECT * FROM livro WHERE id_livro = $id_livro";

$Usuario = new Usuario([]);
$resultado_id = $Usuario->getUsuarios($id_usuario);

$diretorio = $Usuario->getDiretorioImagemUser();
//--Atributos

if ($resultado_id) {

    $registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);

    // date("d/m/Y", strtotime($data)

    $Usuario->setNome($registro['nome']);
    $Usuario->setSobrenome($registro['sobrenome']);
    $Usuario->setData_nasc(date("d/m/Y", strtotime($registro['data_nasc'])));
    $Usuario->setGenero($registro['sexo']);
    $Usuario->setEmail($registro['email']);


    $Usuario->setCidade($registro['cidade']);
    $Usuario->setUf($registro['uf']);
    $Usuario->setRua($registro['rua']);
    $Usuario->setBairro($registro['bairro']);
    $Usuario->setComplemento($registro['complemento']);


    $Usuario->setTelefone($registro['telefone1']);
    $Usuario->setCelular($registro['telefone2']);

    $Usuario->setImg_usuario($diretorio . $registro['imagem_usuario']);

    echo
        json_encode([
            "success" => 1,
            "nomeUsuario" => $Usuario->getNome(),
            "sobrenome" => $Usuario->getSobrenome(),
            "dataNasc" => $Usuario->getData_nasc(),
            "sexo" => $Usuario->getGenero(),
            "email" => $Usuario->getEmail(),

            "cidade" => $Usuario->getCidade(),
            "uf" => $Usuario->getUf(),
            "rua" => $Usuario->getRua(),
            "bairro" => $Usuario->getRua(),
            "complemento" => $Usuario->getComplemento(),            
            "telefone" => $Usuario->getTelefone(),
            "celular" => $Usuario->getCelular(),

            "imagemUsuario" => $Usuario->getImg_usuario(),


            "msg" => "ok"
        ]);
} else {
    echo json_encode(["success" => 0, "msg" => "Erro ao executar a Query getUsuario"]);
}
