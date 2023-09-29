<div class="d-flex flex-row justify-content-between align-items-center m-5">
    <div class="flex-1">
        <h2>Excluir Categoria</h2>
    </div>

    <div>
        <a class="btn btn-outline-primary" href="index.php?menu=categorias">
            <i class="bi bi-arrow-left-circle"></i> Voltar
        </a>
    </div>

</div>


<div class="d-flex flex-column align-items-center">

    <?php
    $idCategoria = $_GET["idCategoria"];
    $sql = "delete from tbcategorias where idCategoria = '{$idCategoria}'";
    $rs = mysqli_query($conexao, $sql);

    echo "<p>Registro excluido com sucesso!</p>";

    ?>

</div>