<div class="container">

    <div class="d-flex justify-content-center my-4">
        <h2>Lista de Categorias</h2>
    </div>



    <div class="d-flex flex-row flex-wrap gap-3 justify-content-between my-3">
        <div class="btn btn-primary">

            <a class="text-white text-decoration-none" href="index.php?menu=cad-categorias">Cadastrar nova Categoria</a>
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
                    <th>Nome da Categoria</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                $sql = "SELECT * FROM tbcategorias
     where nomeCategoria like '%{$txtPesquisa}%'";
                $rs = mysqli_query($conexao, $sql);
                while ($dados = mysqli_fetch_assoc($rs)) {
                ?>
                    <tr>
                        <td><?= $dados["idCategoria"] ?></td>
                        <td><?= $dados["nomeCategoria"] ?></td>
                        <td>
                            <a class="btn btn-info" href="index.php?menu=editar-categorias&idCategoria=<?= $dados["idCategoria"] ?>">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="index.php?menu=excluir-categorias&idCategoria=<?= $dados["idCategoria"] ?>">
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