<div class="d-flex flex-row justify-content-between align-items-center m-5">
    <div class="flex-1">
        <h2>Inserir Categoria</h2>
    </div>

    <div>
        <a class="btn btn-outline-primary" href="index.php?menu=categorias">
            <i class="bi bi-arrow-left-circle"></i> Voltar
        </a>
    </div>

</div>

<div class="d-flex flex-column align-items-center">
    <?php
    $nomeCategoria = $_POST["nomeCategoria"];

    $sql = "INSERT INTO tbcategorias (
    nomeCategoria
    )
    VALUES (
    '$nomeCategoria')";

    $rs = mysqli_query($conexao, $sql);

    if ($rs) {
        echo "<p>Registro inserido com sucesso</p>";
    } else {
        echo "<p>Erro ao inserir</p>";
    }
    ?>

</div>