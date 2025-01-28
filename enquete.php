<?php 
// conexão com o banco de dados
$con = mysqli_connect('localhost', 'root', '', 'enquete');

// Obtenção dos votos "sim" e "não"
$sql = "SELECT quant_votos_sim, quant_votos_nao FROM enquete WHERE id = 8";
$retorno = mysqli_query($con, $sql);

// Verifique se a consulta retornou resultados
if ($retorno && mysqli_num_rows($retorno) > 0) {
    $dados = mysqli_fetch_assoc($retorno);
    $votossim = $dados['quant_votos_sim'];
    $votosnao = $dados['quant_votos_nao'];
} else {
    // Se não houver dados, inicialize com zero
    $votossim = 0;
    $votosnao = 0;
}

// Total de votos
$totalvotos = $votossim + $votosnao;

// Verificação para evitar divisão por zero
if ($totalvotos > 0) {
    // Cálculo das porcentagens
    $porcentagemsim = ($votossim / $totalvotos) * 100;
    $porcentagemnao = ($votosnao / $totalvotos) * 100;
} else {
    // Se não houver votos, define as porcentagens como 0
    $porcentagemsim = 0;
    $porcentagemnao = 0;
}

// Fechar a conexão
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da Enquete</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <br><br><br><section class="enquete">
        <h3>Enquete votação </h3>
        <h1>Voçe concorda com a nova regra do PIX?</h1>
        <form method="GET" action="envia_enquete.php">
            <input type="radio" name="voto" value="sim"> Sim<br>
            <input type="radio" name="voto" value="nao"> Não<br><br>
            <input class="botao" type="submit" value="VOTAR">
            
            
            
        </form><br>

        <form method="GET" action="exclui.php" onsubmit="return confirm('Tem certeza que deseja excluir os dados?')">
            <input type="hidden" name="id" value="8"> <br><br>
            <input class="botao" type="submit" value="EXCLUIR DADOS">
        </form>
    </section> <br> <br>

    <section>
        <h1>Resultado da enquete:</h1>
        <p>Total de votos: <?php echo $totalvotos; ?></p>
        <p>SIM: <?php echo number_format($porcentagemsim, 1); ?>%</p>
        <p>NAO: <?php echo number_format($porcentagemnao, 1); ?>%</p>
    </section>
</body>
</html>


