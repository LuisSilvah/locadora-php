<div class="container">

    <div class="d-flex justify-content-center my-4">
        <h2>Lista de Vídeos</h2>
    </div>

    <div class="d-flex flex-row flex-wrap gap-3 justify-content-between my-3">
        <div class="btn btn-primary">
            <a class="text-white text-decoration-none" href="index.php?menu=cad-videos">Cadastrar novo vídeo</a>
        </div>
        <div class="">
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
                    <th>Título</th>
                    <th>Duração do Filme</th>
                    <th>Valor da Locação</th>
                    <th>Categorias</th>
                    <th>Status</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                $sql = "SELECT f.idFilme,tituloFilme, duracaoFilme,valorLocacao,nomeCategoria,
        CASE
            WHEN statusFilme = 0 THEN 'Disponivel'
            WHEN statusFilme = 1 THEN 'Locado'
            WHEN statusFilme = 2 THEN 'Indisponivel'
        END
        as statusLocacao
        FROM
        tbfilmes as f left join 
        tbcategorias as c on f.idCategoria = c.idCategoria
        where tituloFilme like '%{$txtPesquisa}%'
         order by tituloFilme";
                $rs = mysqli_query($conexao, $sql);
                while ($dados = mysqli_fetch_assoc($rs)) {
                ?>
                    <tr>
                        <td><?= $dados["idFilme"] ?></td>
                        <td><?= $dados["tituloFilme"] ?></td>
                        <td><?= $dados["duracaoFilme"] ?></td>
                        <td><?= $dados["valorLocacao"] ?></td>
                        <td><?= $dados["nomeCategoria"] ?></td>
                        <td><?= $dados["statusLocacao"] ?></td>
                        <td>
                            <a class="btn btn-info" href="index.php?menu=editar-videos&idFilme=<?= $dados["idFilme"] ?>">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="index.php?menu=excluir-videos&idFilme=<?= $dados["idFilme"] ?>">
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