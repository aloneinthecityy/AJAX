<?php

$conn = new mysqli("localhost", "root","","ajax");
if (!$conn) {
    echo("Connection failed: " . mysqli_connect_error());
}else{
    $dados = json_decode(file_get_contents("php://input")); // Assim você lê e faz o decode


    $sql_acesso = mysqli_query($mysqli, "SELECT * FROM cadastro WHERE email = '$apelido' AND senha = '$senha' ");
    if(mysqli_num_rows($sql_acesso) == 1 ){

            echo "
                    <script type=\"text/javascript\">
                    alert(\"Login efetuado com sucesso!\");
                    window.location='feed.php';
                    </script>";
        }
        else{
            echo "
                    <script type=\"text/javascript\">
                    alert(\"Usuario ou senha informado esta incorreto!\");
                    window.location='login.html';
                    </script>";
        }
        mysqli_close($mysqli);

?>