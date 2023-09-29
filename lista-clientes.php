<div class="container">
    <div class="d-flex justify-content-center my-4">
        <h2>Lista de Clientes</h2>
    </div>

    <div class="d-flex flex-row flex-wrap gap-3 justify-content-between my-3">
        <div class="btn btn-primary">
            <a class="text-white text-decoration-none" href="index.php?menu=cad-clientes">Cadastrar novo Cliente</a>
        </div>


        <div>
            <?php
            if (isset($_POST["txtPesquisa"])) {
                $txtPesquisa = $_POST["txtPesquisa"];
            } else {
                $txtPesquisa = "";
            }
            ?>
            <form class="input-group" action="" method="post">
                <label class="input-group-text " for="txtPesquisa">Pesquisar</label>
                <input class="form-control" type="search" name="txtPesquisa" id="txtPesquisa" value="<?= $txtPesquisa ?>">
                <button class="btn btn-primary" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>
    </div>



    <div class="table-responsive">
        <table class="table table-striped table-dark" border="1">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nome do Cliente</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th>Status</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                $sql = "SELECT idCliente, nomeCliente, telefoneCliente, emailCliente,
     case
     when statusCliente = 0 then 'Ativo'
     when statusCliente = 1 then 'Inativo'
     end as statusCliente FROM tbclientes
     where nomeCliente like '%{$txtPesquisa}%'";
                $rs = mysqli_query($conexao, $sql);
                while ($dados = mysqli_fetch_assoc($rs)) {
                ?>
                    <tr>
                        <td><?= $dados["idCliente"] ?></td>
                        <td><?= $dados["nomeCliente"] ?></td>
                        <td><?= $dados["telefoneCliente"] ?></td>
                        <td><?= $dados["emailCliente"] ?></td>
                        <td><?= $dados["statusCliente"] ?></td>
                        <td>
                            <a class="btn btn-info" href="index.php?menu=editar-clientes&idCliente=<?= $dados["idCliente"] ?>">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="index.php?menu=excluir-clientes&idCliente=<?= $dados["idCliente"] ?>">
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