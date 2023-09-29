<div class="d-flex flex-row justify-content-between align-items-center m-5">
    <div class="flex-1">
        <h2>Atualizar Cliente</h2>
    </div>

    <div>
        <a class="btn btn-outline-primary" href="index.php?menu=clientes">
            <i class="bi bi-arrow-left-circle"></i> Voltar
        </a>
    </div>

</div>

<div class="d-flex flex-column align-items-center">
    <?php
    $idCliente = $_POST["idCliente"];
    $nomeCliente = $_POST["nomeCliente"];
    $telefoneCliente = $_POST["telefoneCliente"];
    $emailCliente = $_POST["emailCliente"];
    $statusCliente = $_POST["statusCliente"];

    $sql = "update tbclientes set
nomeCliente='{$nomeCliente}',
telefoneCliente='{$telefoneCliente}',
emailCliente='{$emailCliente}',
statusCliente='{$statusCliente}'
where idCliente = '{$idCliente}'

";
    $rs = mysqli_query($conexao, $sql);
    echo "<p>Registro atualizado com sucesso!</p>";
    ?>


</div>