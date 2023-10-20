<?php

const SERVIDOR = 'localhost';
const USUARIO = 'root';
const SENHA = '';
const BANCO = 'dblocadora';

$conexao = mysqli_connect(SERVIDOR, USUARIO, SENHA, BANCO) or
die ("Erro ao conectar ao servidor." . mysqli_connect_error());

?>