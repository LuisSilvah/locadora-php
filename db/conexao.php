<?php

const SERVIDOR = 'ftp.marcosdemelo.com';
const USUARIO = 'marcosde_alunos';
const SENHA = '#User$Aluno';
const BANCO = 'marcosde_locadora';

$conexao = mysqli_connect(SERVIDOR, USUARIO, SENHA, BANCO) or
die ("Erro ao conectar ao servidor." . mysqli_connect_error());

?>