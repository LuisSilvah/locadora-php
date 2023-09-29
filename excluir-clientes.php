<div class="d-flex flex-row justify-content-between align-items-center m-5">
<div class="flex-1">
    <h2>Excluir Cliente</h2>
</div>

<div>
    <a class="btn btn-outline-primary" href="index.php?menu=clientes">
        <i class="bi bi-arrow-left-circle"></i> Voltar
    </a>
</div>

</div>

<div class="d-flex flex-column align-items-center">

    <?php
    $idCliente = $_GET["idCliente"];
    $sql = "delete from tbclientes where idCliente = '{$idCliente}'";
    $rs = mysqli_query($conexao, $sql);

    echo "<p>Registro excluído com sucesso!</p>";

    ?>

</div>