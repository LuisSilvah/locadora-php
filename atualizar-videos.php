<div class="d-flex flex-row justify-content-between align-items-center m-5">
    <div class="flex-1">
        <h2>Atualizar Video</h2>
    </div>

    <div>
        <a class="btn btn-outline-primary" href="index.php?menu=videos">
            <i class="bi bi-arrow-left-circle"></i> Voltar
        </a>
    </div>

</div>

<div class="d-flex flex-column align-items-center ">
    <?php
    $idFilme = $_POST["idFilme"];
    $tituloFilme = $_POST["tituloFilme"];
    $duracaoFilme = $_POST["duracaoFilme"];
    $valorLocacao = $_POST["valorLocacao"];
    $idCategoria = $_POST["idCategoria"];

    $sql = "update tbfilmes set
tituloFilme='{$tituloFilme}',
duracaoFilme='{$duracaoFilme}',
valorLocacao='{$valorLocacao}',
idCategoria='{$idCategoria}'
where idFilme = '{$idFilme}'
";
    $rs = mysqli_query($conexao, $sql);
    echo "<p>Registro atualizado com sucesso!</p>";
    ?>


</div>