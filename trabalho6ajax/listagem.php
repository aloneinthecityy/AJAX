<?php
$apelido = $_GET['apelido'];

$conexao = new mysqli("localhost", "root","","ajax");
if (!$conexao) {
    echo("Connection failed: " . mysqli_connect_error());
}else{
    $sql = "Select * from cadastro where apelido='$apelido'";
    $result = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "<table class=table table-hover>";
        echo "<tr>";
        echo "<th> ID </th>";
        echo "<th> Nome </th>";
        echo "<th> Senha </th>";
        echo "</tr>";
        echo "<tr>";
        echo "<td> $row[id] </td>";
        echo "<td> $row[apelido] </td>";
        echo "<td> $row[senha] </td>"; 
        echo "</tr>";
        echo "</table>";
    } else {
        echo "<h4>Não foram encontrados dados com esse nome</h4>";
    }
    mysqli_close($conexao);
}

?>