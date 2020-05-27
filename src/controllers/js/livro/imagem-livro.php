<?php
loadModel('Livro');

$imagemLivro = $_POST['imagemLivro'];

echo '<img src="'.$imagemLivro.'">';
