<?php
$idCategoria = $_GET["idCategoria"];
$sql = "SELECT * FROM tbcategorias WHERE idCategoria = '{$idCategoria}'";
$rs = mysqli_query($conexao, $sql) or die("Erro ao realizar a consulta. Erro: " . mysqli_error($conexao));
$dados = mysqli_fetch_assoc($rs);
?>
<div class="d-flex justify-content-center flex-column align-items-center mt-5">

    <div class="content">
        <h2>Editar categoria</h2>
    </div>



    <form action="index.php?menu=atualizar-categorias" method="post">
        <div class="mb-3">
            <label class="form-label" for="idCategoria">ID</label>
            <input class="form-control" type="text" name="idCategoria" id="idCategoria" value="<?= $dados["idCategoria"] ?>" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label" for="nomeCategoria">Nome da Categoria</label>
            <input class="form-control" type="text" name="nomeCategoria" id="nomeCategoria" value="<?= $dados["nomeCategoria"] ?>">
        </div>

        <div class="mb-3">
            <input class="btn btn-primary" type="submit" value="Salvar">
        </div>
    </form>

    </div>