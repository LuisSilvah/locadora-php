<?php
$idCliente = $_GET["idCliente"];
$sql = "SELECT * FROM tbclientes WHERE idCliente = '{$idCliente}'";
$rs = mysqli_query($conexao, $sql) or die("Erro ao realizar a consulta. Erro: " . mysqli_error($conexao));
$dados = mysqli_fetch_assoc($rs);
?>



<div class="d-flex justify-content-center flex-column align-items-center mt-5">

    <div class="content">
        <h2>Editar cliente</h2>
    </div>

    <form action="index.php?menu=atualizar-clientes" method="post">
        <div class="mb-3">
            <label class="form-label" for="idCliente">ID</label>
            <input class="form-control" type="text" name="idCliente" id="idCliente" value="<?= $dados["idCliente"] ?>" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label" for="nomeCliente">Nome do Cliente: </label>
            <input class="form-control" type="text" name="nomeCliente" id="nomeCliente" value="<?= $dados["nomeCliente"] ?>">
        </div>

        <div class="mb-3">
            <label class="form-label" for="telefoneCliente">Telefone: </label>
            <input class="form-control" type="text" name="telefoneCliente" id="telefoneCliente" value="<?= $dados["telefoneCliente"] ?>">
        </div>

        <div class="mb-3">
            <label class="form-label" for="emailCliente">E-mail: </label>
            <input class="form-control" type="text" name="emailCliente" id="emailCliente" value="<?= $dados["emailCliente"] ?>">
        </div>

        <div class="mb-3">
            <label class="form-label" for="statusCliente">Status do Cliente: </label>
            <form action="statusCliente">
                <select class="form-select" id="statusCliente" name="statusCliente">
                    <option value="0">Ativo</option>
                    <option value="1">Inativo</option>
                </select>
        </div>

        <div class="mb-3">
            <input class="btn btn-primary" type="submit" value="Salvar">
        </div>
    </form>

</div>