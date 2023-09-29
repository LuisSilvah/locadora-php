<div class="d-flex flex-row justify-content-between align-items-center m-5">
    <div class="flex-1">
        <h2>Inserir Cliente</h2>
    </div>

    <div>
        <a class="btn btn-outline-primary" href="index.php?menu=clientes">
            <i class="bi bi-arrow-left-circle"></i> Voltar
        </a>
    </div>

</div>

<div class="d-flex flex-column align-items-center">

    <?php

    $nomeCliente = $_POST["nomeCliente"];
    $telefoneCliente = $_POST["telefoneCliente"];
    $emailCliente = $_POST["emailCliente"];

    $sql = "INSERT INTO tbclientes (
    nomeCliente,
    telefoneCliente,
    emailCliente
    )
    VALUES(
    '$nomeCliente',
    '$telefoneCliente',
    '$emailCliente'
    )";
    $rs = mysqli_query($conexao, $sql);

    if ($rs) {
        echo "<p>Registro inserido com sucesso</p>";
    } else {
        echo "<p>Erro ao inserir</p>";
    }
    ?>
</div>