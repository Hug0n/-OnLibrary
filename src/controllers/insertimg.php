<?php

session_start();
loadModel('Livro');
echo "1 <br>";


$msg = false;
echo "2 <br>";

var_dump($_FILES['img-perfil']);

if(isset($_FILES['img-perfil'])){
    echo "3 <br>";

    // qual a extensao do img-perfil?
    $extensao = strtolower(substr($_FILES['img-perfil']['name'], -4));
    //pega os ultimos 4 caracteres ()o ponto e a extensão
    echo "4 <br>";

    // nome do arquivo. Encriptografa pra o nome ser único
    $novo_nome = md5(time()). $extensao;
    echo "5 <br>";

    // diretorio onde sera enviado o arq
    $diretorio = "assets/upload/";
    echo "6 <br>";

    echo $extensao . "<br>";
    echo $novo_nome . "<br>";
    echo $diretorio;

    // Quando o PHP recebe um arquivo, esse arquivo é enviao para uma pasta temporaria dentro dos arquivos do PHP. Precisamos acessar essa pasta:

    move_uploaded_file($_FILES['img-perfil']['tmp_name'], $diretorio.$novo_nome);
    echo "7 <br>";

    $idUser = $_SESSION['usuario']->id_usuario;
    echo $idUser . "<br>";
    // inserção do arquivo no BD (apenas o nome do arquivo, que indica onde podemos encontrar ele no servidor)´
    $Livro = new Livro([]);

    $msg = $Livro->insertWhere(['img-perfil'],[$novo_nome], 'arquivoteste', []);
    // $sql = "INSERT INTO arquivoteste (arquivo) VALUES ($novo_nome, NOW())" ;
    echo "8 <br>";


}
?>

<h1>Upload de Imagem!</h1>

<?php if ($msg  != false) echo "<p> $msg </p>";?>
<form action="insertimg.php" method="POST" enctype="multipart/form-data"> 
<input type="file" required name="img-perfil">
<br>
<input type="submit" value="Salvar">
<input type="image" >
</form>