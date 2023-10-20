<?php
include_once("./db/conexao.php");

session_start();

if (!isset($_SESSION['auth'])) {
    header('Location: login.php');
} else if (isset($_SESSION['loginUser'])) {
    $loginUser = $_SESSION['loginUser'];
}

$option_menu = array(
    array("item_menu" => "Home", "slug" => "home"),
    array("item_menu" => "Videos", "slug" => "videos"),
    array("item_menu" => "Categorias", "slug" => "categorias"),
    array("item_menu" => "Clientes", "slug" => "clientes"),
    array("item_menu" => "Locações", "slug" => "locacao"),

);

if (isset($_GET['menu'])) {
    $menu = $_GET['menu'];
} else {
    $menu = "home";
}

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilo.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <title>LOCADORA</title>
</head>

<style>
    /* width */
    ::-webkit-scrollbar {
        width: 5px;
        height: 5px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey;
        border-radius: 10px;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #219ebc;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #457b9d;
    }
</style>

<body class="bg-dark text-white">
    <header class="sticky-top">
        <nav class="navbar navbar-expand-lg bg-black" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">LOCADORA</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <?php foreach ($option_menu as $item_menu) : ?>
                            <a class="nav-link <?php
                                                if ($menu === $item_menu['slug']) {
                                                    echo "active";
                                                } else {
                                                    echo "";
                                                }
                                                ?>" href="index.php?menu=<?= $item_menu['slug']; ?>"><?= $item_menu['item_menu'] ?></a>
                        <?php endforeach; ?>

                        <a class="nav-link" href="logout.php">Logout</a>

                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <?php
        switch ($menu) {
            case "home":
                include("home.php");
                break;
            case "videos";
                include("lista-videos.php");
                break;
            case "cad-videos";
                include("cad-videos.php");
                break;
            case "inserir-videos";
                include("inserir-videos.php");
                break;
            case "editar-videos";
                include("editar-videos.php");
                break;
            case "excluir-videos";
                include("excluir-videos.php");
                break;
            case "atualizar-videos";
                include("atualizar-videos.php");
                break;
            case "categorias";
                include("lista-categorias.php");
                break;
            case "cad-categorias";
                include("cad-categorias.php");
                break;
            case "inserir-categorias";
                include("inserir-categorias.php");
                break;
            case "editar-categorias";
                include("editar-categorias.php");
                break;
            case "atualizar-categorias";
                include("atualizar-categorias.php");
                break;
            case "excluir-categorias";
                include("excluir-categorias.php");
                break;
            case "clientes";
                include("lista-clientes.php");
                break;
            case "cad-clientes";
                include("cad-clientes.php");
                break;
            case "inserir-clientes";
                include("inserir-clientes.php");
                break;
            case "editar-clientes";
                include("editar-clientes.php");
                break;
            case "atualizar-clientes";
                include("atualizar-clientes.php");
                break;
            case "excluir-clientes";
                include("excluir-clientes.php");
                break;
            case "locacao";
                include("locacao.php");
                break;
            default:
                include("home.php");
        }
        ?>
    </main>
</body>

</html>