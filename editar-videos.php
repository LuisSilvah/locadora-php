 <?php
$idFilme = $_GET["idFilme"];
$sql = "SELECT * FROM tbfilmes WHERE idFilme = '{$idFilme}'";
$rs = mysqli_query($conexao, $sql)
or die("Erro ao realizar consulta. Erro: " . mysqli_error($conexao));
$dados = mysqli_fetch_assoc($rs);
?>

<div class="d-flex justify-content-center flex-column align-items-center mt-5">

    <div class="content">
    <h2>Editar Video</h2>
    </div>


<form action="index.php?menu=atualizar-videos" method="post">
     <div class="mb-3">
        <label class="form-label" for="idFilme">ID</label>
        <input class="form-control" type="text" name="idFilme" id="idFilme" value="<?=$dados['idFilme']?>" readonly required>
    </div>
     <div class="mb-3">
        <label class="form-label" for="tituloFilme">Título do Vídeo</label>
        <input class="form-control" type="text" name="tituloFilme" id="tituloFilme" value="<?=$dados['tituloFilme']?>" required>
    </div>
     <div class="mb-3">
        <label class="form-label" for="duracaoFilme">Duração do Vídeo</label>
        <input class="form-control" type="text" name="duracaoFilme" id="duracaoFilme" value="<?=$dados['duracaoFilme']?>" required>
    </div>
     <div class="mb-3">
        <label class="form-label" for="valorLocacao">Valor da Locação</label>
        <input class="form-control" type="text" name="valorLocacao" id="valorLocacao" value="<?=$dados['valorLocacao']?>" required>
    </div>
     <div class="mb-3">
        <label class="form-label" for="idCategoria">Categoria</label>
        <select class="form-select" name="idCategoria" id="idCategoria" required>
            <option value="">Selecione a categoria: </option>
            <?php
            $sql = "SELECT * FROM tbcategorias order by nomeCategoria ASC";
            $rs = mysqli_query($conexao,$sql);
            while ($dados2 = mysqli_fetch_assoc($rs)){
                ?>
                <option
                    <?php echo ($dados["idCategoria"] == $dados2["idCategoria"])?"selected":""?>
                    value="<?= $dados2["idCategoria"] ?>">
                    <?= $dados2["nomeCategoria"] ?>
                </option>
            <?php
            }
            ?>
        </select>
    </div>
     <div class="mb-3">
        <button class="btn btn-primary"  type="submit">Salvar</button>
    </div>
</form>

</div>