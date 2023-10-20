<?php
// Conexão com o banco de dados
include_once("./db/conexao.php");
// Verificação no banco de dados
$msg_error = "";
if (isset($_POST["loginUser"]) && isset($_POST["senhaUser"])) {
    // $loginUser = $_POST["loginUser"];
    $loginUser = mysqli_escape_string($conexao, $_POST["loginUser"]);
    $senhaUser = $_POST["senhaUser"];

    $hashed_password = password_hash($_POST["senhaUser"], PASSWORD_DEFAULT);
    $sql = "SELECT * FROM tbusuarios WHERE loginUser = '{$loginUser}' ";

    $rs = mysqli_query($conexao, $sql);

    $dados = mysqli_fetch_assoc($rs);
    $linha = mysqli_num_rows($rs);


    print_r($rs);
    echo $hashed_password;

    if ($linha != 0) {

        foreach ($dados as $valor) {
            // if (password_verify($senhaUser, $valor['senhaUser'])) {
            echo "<prev>";
            print_r($valor);
            echo "</prev>";
            // }
        }
        // if (password_verify($senhaUser, $valor['senhaUser'])) {
        //     session_start();
        //     $_SESSION['auth'] = "login";
        //     $_SESSION["loginUser"] = $loginUser;
        //     $_SESSION["nomeUser"] = $valor["nomeUser"];
        //     header("location: index.php");
        //     // session_start();
        //     // $_SESSION["loginUser"] = $loginUser;
        //     // $_SESSION["senhaUser"] = $senhaUser;
        //     // $_SESSION["nomeUser"] = $valor["nomeUser"];
        //     // header("location: index.php");
        // } else {
        //     $msg_error = "<div class='alert alert-danger mt-3'>

        //     <p>Usuário não encontrado ou a senha não confere. </p>
        //     </div>";
        // }
    }

    //     $rs = mysqli_query($conexao, $sql);
    //     $dados = mysqli_fetch_assoc($rs);
    //     $linha = mysqli_num_rows($rs);
    //     if ($linha != 0) {
    //         session_start();
    //         $_SESSION["loginUser"] = $loginUser;
    //         $_SESSION["senhaUser"] = $senhaUser;
    //         $_SESSION["nomeUser"] = $dados["nomeUser"];
    //         header('Location: login.php');
    //     } else {
    //         $msg_error = "<div class='alert alert-danger mt-3'>

    // <p>Usuário não encontrado ou a senha não confere. </p>
    // </div>

    // ";
    //     }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilo.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


    <title>LOCADORA</title>
</head>

<body class="bg-secondary">
    <div class="container">
        <div class="row vh-100 align-items-center justify-content-center">
            <div class="col-10 col-sm-8 col-md-6 col-lg-4 p-4 bg-white shadow rounded">
                <div class="row justify-content-center mb-4">
                    <h3 class="text-center bi bi-camera-reels-fill"> LOCADORA DEV</h3>
                </div>
                <form class="needs-validation" action="" method="post" novalidate>
                    <div class="mb-4">
                        <label class="form-label" for="loginUser">Login</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text">
                                <i class="bi bi-person-fill"></i>
                            </span>
                            <input class="form-control" type="text" name="loginUser" id="loginUser" required>
                            <div class="invalid-feedback">
                                Informe o username.
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="senhaUser">Senha</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text">
                                <i class="bi bi-key-fill"></i>
                            </span>
                            <input class="form-control" type="password" name="senhaUser" id="senhaUser" required>
                            <div class="invalid-feedback">
                                Informe a senha.
                            </div>
                        </div>
                        <?php
                        echo $msg_error;
                        ?>
                    </div>
                    <button class="btn btn-success w-100"><i class="bi bi-box-arrow-in-right"></i> Entrar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="./js/validation.js"></script>
</body>

</html>