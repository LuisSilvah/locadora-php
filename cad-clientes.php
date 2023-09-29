<div class="d-flex justify-content-center flex-column align-items-center mt-5">

    <div class="content">
        <h2>Cadastro de novo cliente</h2>
    </div>

    <form action="index.php?menu=inserir-clientes" method="post">
        <div class="mb-3">
            <label class="form-label" for="nomeCliente">Nome do Cliente: </label>
            <input class="form-control" type="text" name="nomeCliente" id="nomeCliente">
        </div>

        <div class="mb-3">
            <label class="form-label" for="telefoneCliente">Telefone: </label>
            <input class="form-control" type="text" name="telefoneCliente" id="telefoneCliente">
        </div>

        <div class="mb-3">
            <label class="form-label" for="emailCliente">E-mail: </label>
            <input placeholder="example@gmail.com" class="form-control" type="email" name="emailCliente" id="emailCliente">
        </div>

        <div>
            <input class="btn btn-primary" type="submit" value="Salvar">
        </div>
    </form>


</div>