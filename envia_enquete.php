<link rel="stylesheet" href="style.css">

<?php 
$voto = $_GET['voto'];

$con = mysqli_connect('localhost','root', '', 'enquete');

if ($voto == 'sim') { // Correção da comparação
    $sql = "UPDATE enquete SET quant_votos_sim = quant_votos_sim + 1 WHERE id = 8";
    $query = mysqli_query($con, $sql);
}

if ($voto == 'nao') { // Correção da comparação
    $sql = "UPDATE enquete SET quant_votos_nao = quant_votos_nao + 1 WHERE id = 8";
    $query = mysqli_query($con, $sql);
}

$con->close();
?>

<br><br><br><section>
    <h1>Seu voto foi computado, obrigado!!!</h1>
    
    
    <br><a href="enquete.php" class="botao">Voltar para a enquete</a><br><br>

    
</section>
