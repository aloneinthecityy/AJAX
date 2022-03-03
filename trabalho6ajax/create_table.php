<?php
include 'conecta_bd.php';

$sql = "CREATE TABLE cadastro (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    apelido VARCHAR(30) NOT NULL,
    senha VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL,
    idade INTEGER NOT NULL, CHECK(idade>=18)
    )";

if (mysqli_query($conexao, $sql)) {
    echo "Tabela cadastro criada com sucesso";
} else {
    echo "Erro ao criar a tabela: " . mysqli_error($conexao);
}


?>
