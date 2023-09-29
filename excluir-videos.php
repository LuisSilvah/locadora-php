<div class="d-flex flex-row justify-content-between align-items-center m-5">
    <div class="flex-1">
        <h2>Excluir Vídeo</h2>
    </div>

    <div>
        <a class="btn btn-outline-primary" href="index.php?menu=videos">
            <i class="bi bi-arrow-left-circle"></i> Voltar
        </a>
    </div>

</div>

<div class="d-flex flex-column align-items-center ">
    <?php
    $idFilme = $_GET["idFilme"];
    $sql = "delete from tbfilmes where idFilme = '{$idFilme}'";
    $rs = mysqli_query($conexao, $sql);

    echo "<p>Registro excluído com sucesso!</p>";

    ?>


</div>