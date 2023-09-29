<div class="d-flex flex-row justify-content-between align-items-center m-5">
    <div class="flex-1">
        <h2>Inserir Vídeo</h2>
    </div>

    <div>
        <a class="btn btn-outline-primary" href="index.php?menu=videos">
            <i class="bi bi-arrow-left-circle"></i> Voltar
        </a>
    </div>

</div>


<div class="d-flex flex-column align-items-center ">
    <?php
    $tituloFilme = $_POST["tituloFilme"];
    $duracaoFilme = $_POST["duracaoFilme"];
    $valorLocacao = $_POST["valorLocacao"];
    $idCategoria = $_POST["idCategoria"];

    $sql = "INSERT INTO tbfilmes (
    tituloFilme,
    duracaoFilme,
    valorLocacao,
    idCategoria
    )
    VALUES(
    '$tituloFilme',
    '$duracaoFilme',
    '$valorLocacao',
    '$idCategoria'
    )";
    $rs = mysqli_query($conexao, $sql);

    if ($rs) {
        echo "<p>Registro inserido com sucesso</p>";
    } else {
        echo "<p>Erro ao inserir</p>";
    }
    ?>
</div>