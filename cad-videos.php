<div class="d-flex justify-content-center flex-column align-items-center mt-5">

    <div class="content">
        <h2>Cadastro de Videos</h2>
    </div>

    <form class="mt-5" action="index.php?menu=inserir-videos" method="post">
        <div class="mb-3">
            <label class="form-label" for="tituloFilme">Título do Vídeo</label>
            <input class="form-control" type="text" name="tituloFilme" id="tituloFilme" required>
        </div>

        <div class="mb-3">
            <label class="form-label" for="duracaoFilme">Duração do Video</label>
            <input class="form-control" type="text" name="duracaoFilme" id="duracaoFilme" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="valorLocacao">Valor da Locação</label>
            <input class="form-control" type="text" name="valorLocacao" id="valorLocacao" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="idCategoria">Categoria</label>
            <select class="form-select" name="idCategoria" id="idCategoria" required>
                <option value="">Selecione a categoria</option>
                <?php
                $sql = "SELECT * FROM tbcategorias order by nomeCategoria ASC";
                $rs = mysqli_query($conexao, $sql);
                while ($dados = mysqli_fetch_assoc($rs)) {

                ?>
                    <option value="<?= $dados["idCategoria"] ?>">
                        <?= $dados["nomeCategoria"] ?>
                    </option>
                <?php
                }
                ?>
            </select>
        </div>
        <div>
            <button class="btn btn-primary" type="submit">Salvar</button>
        </div>
    </form>

</div>