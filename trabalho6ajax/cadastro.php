<?php

$conn = new mysqli("localhost", "root","","ajax");
if (!$conn) {
    echo("Connection failed: " . mysqli_connect_error());
}else{
    $dados = json_decode(file_get_contents("php://input")); // Assim você lê e faz o decode

    $sql = "INSERT INTO cadastro(apelido, senha, email, idade) VALUES('$dados->apelido','$dados->senha','$dados->email','$dados->idade')";

    if (mysqli_query($conn, $sql)) {
        echo "$dados->nome";
    } else {
        echo "Erro: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>