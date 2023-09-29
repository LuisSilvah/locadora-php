<?php

$idCliente = (isset($_GET["idCliente"])) ? $_GET["idCliente"] : 0;

$idLocacao = (isset($_GET["idLocacao"])) ? $_GET["idLocacao"] : 0;

$idFilme = (isset($_GET["idFilme"])) ? $_GET["idFilme"] : 0;

$menuOpLocacao = (isset($_GET["menuOpLocacao"])) ? $_GET["menuOpLocacao"] : "";

$dataAtual = date('Y-m-d');

if (isset($_GET["dataDeEntrega"])) {
    $dataDeEntrega = $_GET["dataDeEntrega"];
} else {
    $dataDeEntrega = date("Y-m-d", strtotime($dataAtual . '+ 5 days'));
}

if ($menuOpLocacao === "addLocacao") {
    $sql = "INSERT INTO tblocacao (idCliente,dataLocacao,statusLocacao)
        VALUES ('{$idCliente}', '{$dataAtual}', 0)";
    mysqli_query($conexao, $sql) or die("Erro:" . mysqli_error($conexao));


    $idLocacao = mysqli_insert_id($conexao);
    header('Location:index.php?menu=locacao&idCliente=' . $idCliente);
}
if ($menuOpLocacao === "addVideo") {
    $sql = "INSERT INTO tbitenslocados (idlocacao,idFilme,dataDeEntrega)
        VALUES ('{$idLocacao}', '{$idFilme}','{$dataDeEntrega}')";
    mysqli_query($conexao, $sql);


    $sql = "UPDATE tbfilmes SET statusfilme = 1 WHERE idfilme = '{$idFilme}'";
    mysqli_query($conexao, $sql);
}
if ($menuOpLocacao === "removeVideo") {

    $sql = "DELETE FROM tbitenslocados WHERE idLocacao = '{$idLocacao}' and idFilme = '{$idFilme}'";
    mysqli_query($conexao, $sql);

    $sql = "UPDATE tbfilmes SET statusFilme = 0  WHERE idFilme = '{$idFilme}'";
    mysqli_query($conexao, $sql);
}


if ($menuOpLocacao === "baixaVideo") {
    $sql = "UPDATE tbitenslocados SET  statusItemlocado = 1
    WHERE idLocacao = '{$idLocacao}' and $idFilme = '{$idFilme}'";
    mysqli_query($conexao, $sql);

    $sql = "UPDATE tbfilmes SET statusfilme = 0 WHERE idfilme = '{$idFilme}'";
    mysqli_query($conexao, $sql);
}

$sql = "SELECT * FROM tbitenslocados where idLocacao = {$idLocacao}";
$rs = mysqli_query($conexao, $sql);
$linha = mysqli_num_rows($rs);
if ($linha > 0) {
    $sql = "SELECT * FROM tbitenslocados
        where idLocacao = $idLocacao and statusItemlocado = 0";
    $rs = mysqli_query($conexao, $sql);
    $liha = mysqli_num_rows($rs);
    if ($linha == 0) {
        $sql = "UPDATE tblocacao SET statuslocacao = 1 where idlocacao= {$idLocacao}";
    }
}

?>

<div class="container">

    <div class="d-flex justify-content-center my-4">
        <h2>Locação</h2>
    </div>

    <div>
        <form class="input-group" action="" method="get">
            <input type="hidden" name="menu" value="locacao">

            <select class="form-select" name="idCliente" id="idCliente">
                <?php
                $sql = "SELECT * FROM tbclientes where statuscliente = 0";
                $rs = mysqli_query($conexao, $sql);
                while ($dados = mysqli_fetch_assoc($rs)) {
                ?>
                    <option <?php echo ($idCliente == $dados["idCliente"]) ? "selected" : "" ?> value="<?= $dados['idCliente'] ?>">
                        <?= $dados['idCliente'] ?> - <?= $dados['nomeCliente'] ?>
                    </option>
                <?php

                }
                ?>
            </select>
            <button class="btn btn-primary" type="submit">Listar locações</button>
        </form>
    </div>

    <?php
    if ($idCliente > 0) {
    ?>
        <div class="box-locacao">
            <div>
                <div class="d-flex flex-row flex-wrap gap-2 justify-content-between my-2">
                    <h3>Lista de Locacões</h3>

                    <div>
                        <a class="btn btn-outline-info" href="index.php?menu=locacao&idCliente=<?= $idCliente ?> &menuOpLocacao=addLocacao">
                            Nova locaçao
                        </a>

                        <?php
                        if ($idLocacao > 0) {

                        ?>
                            <a class="btn btn-outline-light" target="_blank" href="recibo-locacao.php?idCliente=<?= $idCliente ?>&idLocacao<?= $idLocacao ?>&menuOpLocacao=imprimirLocacao">
                                <i class="bi bi-printer"></i>
                            </a>
                        <?php } ?>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-dark" border="1">
                        <thead>
                            <tr>
                                <th>id Locação</th>
                                <th>Data da Locacão</th>
                                <th>Status</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php
                            $sql = "SELECT
                                                  idLocacao,
                                 date_format(dataLocacao,'%d/%m/%y') as dataLocacao,
                                             statusLocacao,
                                              cli.idCliente
                                                      FROM tblocacao as loc
                                                     inner join tbclientes as cli on loc.idCliente = cli.idCliente
                                                                 WHERE cli.idCliente = {$idCliente} order by statusLocacao asc,dataLocacao desc, idLocacao desc";

                            $rs = mysqli_query($conexao, $sql);
                            while ($dados = mysqli_fetch_assoc($rs)) {
                            ?>
                                <tr>
                                    <td><?= $dados["idLocacao"] ?></td>
                                    <td><?= $dados["dataLocacao"] ?></td>
                                    <td><?= $dados["statusLocacao"] ?></td>
                                    <td>
                                        <a class="btn btn-info" href="index.php?menu=locacao&idCliente=<?= $dados["idCliente"] ?>&idLocacao=<?= $dados["idLocacao"] ?>">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php

                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php
    }

    if ($idLocacao > 0) {

        ?>
            <div>
                <div class=" my-4">

                    <div class="d-flex justify-content-center">
                        <h3>Locação Atual</h3>
                    </div>

                    <form class="input-group" action="" method="get">
                        <input type="hidden" name="menu" value="locacao">
                        <input type="hidden" name="idLocacao" value="<?= $idLocacao ?>">
                        <input type="hidden" name="idCliente" value="<?= $idCliente ?>">
                        <input type="hidden" name="menuOpLocacao" value="addVideo">
                        <select class="form-select" name="idFilme" id="idFilme" required>
                            <option value="">Selecione o Video</option>
                            <?php
                            $sql = "SELECT * FROM tbfilmes
                where statusFilme =0";
                            $rs = mysqli_query($conexao, $sql);
                            while ($dados = mysqli_fetch_assoc($rs)) {
                            ?>
                                <option value="<?= $dados["idFilme"] ?>">
                                    <?= $dados["idFilme"] ?> = <?= $dados["tituloFilme"] ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                        <input class="form-control" type="date" name="dataDeEntrega" id="dataDeEntrega" value="<?= $dataDeEntrega ?>">
                        <button class="btn btn-primary" type="submit">
                            <i class="bi bi-plus-circle"></i>
                        </button>
                    </form>
                </div>

                <div class="table-responsive">

                    <table class="table table-striped table-dark" border="1">
                        <thead>
                            <tr>
                                <th>id Video</th>
                                <th>Titulo Video</th>
                                <th>Data de entrega</th>
                                <th>Status</th>
                                <th>Baixar</th>
                                <th>Remover</th>

                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php

                            $sql = "SELECT f.idFilme,f.tituloFilme,
                    date_format(dataDeEntrega, '%d/%m/%Y') as dataDeEntrega,
                    CASE
                    WHEN statusItemLocado = 0 THEN 'Locado'
                    WHEN statusItemLocado = 1 THEN 'Devolvido'
                    WHEN statusItemLocado = 2 THEN 'Em atraso'
                    END
                    as statusItemLocado
                        FROM tblocacao as loc 
                            inner join tbitenslocados as iloc
                            inner join tbfilmes as f on loc.idLocacao = iloc.idLocacao
                            and iloc.idFilme = f.idFilme
                            WHERE loc.idLocacao = {$idLocacao}";
                            $rs = mysqli_query($conexao, $sql);
                            while ($dados = mysqli_fetch_assoc($rs)) {

                            ?>
                                <tr>
                                    <td><?= $dados["idFilme"] ?></td>
                                    <td><?= $dados["tituloFilme"] ?></td>
                                    <td><?= $dados["dataDeEntrega"] ?></td>
                                    <td><?= $dados["statusItemLocado"] ?></td>
                                    <td>
                                        <a class="btn btn-info" href="index.php?menu=locacao&idCliente=<?= $idCliente ?>&idLocacao=<?= $idLocacao ?>&menuOpLocacao=baixaVideo&idFilme=<?= $dados["idFilme"] ?>">
                                            <i class="bi bi-floppy"></i>
                                        </a>

                                    </td>
                                    <td>
                                        <a class="btn btn-danger" href="index.php?menu=locacao&idCliente=<?= $idCliente ?>&idLocacao=<?= $idLocacao ?>&menuOpLocacao=removeVideo&idFilme=<?= $dados["idFilme"] ?>">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        <?php
    }
        ?>
        </div>