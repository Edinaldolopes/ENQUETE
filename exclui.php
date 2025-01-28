<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Dados</title>
   
</head>
<body>

<?php 
$conn = mysqli_connect("localhost", "root", "", "enquete");

// Obter o ID da URL
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {
    // Query para resetar os votos
    $query = "UPDATE enquete SET quant_votos_sim = 0, quant_votos_nao = 0 WHERE Id = $id";
    $resultado = mysqli_query($conn, $query);

    if ($resultado) {
        echo "<h2>Dados resetados com sucesso!</h2>";
        echo "<h3><a href='enquete.php'>Voltar</a></h3>";
    } else {
        echo "<h2>Erro ao resetar os dados!</h2>";
        echo "<h3><a href='enquete.php'>Voltar</a></h3>";
    }
} else {
    echo "<h2>ID não fornecido!</h2>";
    echo "<h3><a href='enquete.php'>Voltar</a></h3>";
}

mysqli_close($conn);
?>
</body>
</html>

