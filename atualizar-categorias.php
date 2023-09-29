<div class="d-flex flex-row justify-content-between align-items-center m-5">
    <div class="flex-1">
        <h2>Atualizar Categoria</h2>
    </div>

    <div>
        <a class="btn btn-outline-primary" href="index.php?menu=categorias">
            <i class="bi bi-arrow-left-circle"></i> Voltar
        </a>
    </div>

</div>

<div class="d-flex flex-column align-items-center">

    <?php
    $idCategoria = $_POST["idCategoria"];
    $nomeCategoria = $_POST["nomeCategoria"];

    $sql = "update tbcategorias set
nomeCategoria='{$nomeCategoria}'
where idCategoria = {$idCategoria}
";
    $rs = mysqli_query($conexao, $sql);
    echo "<p>Registro atualizado com sucesso!</p>";
    ?>
</div>