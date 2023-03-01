<?php
//define horário do sistema
date_default_timezone_set('America/Manaus');

//variável nome do site
$nome_site = 'Cesta da Família';

//informações do banco de dados local
$usuario ='root';
$senha ='';
$banco ='recadastro';
$servidor ='localhost';

//faz um tratamento de erro se a conexao com o banco der errado
try {
    //inicia conexao em PDO(evita injeção de SQL) e solicita os parametros de informação do banco ↑
    $pdo = new PDO("mysql:dbname=$banco;host=$servidor", "$usuario", "$senha");
} catch (Exception $e) {
    //mensagem tratada
    echo 'Erro ao conectar com banco de dados <br> <br>';
    //erro detalhado
    echo $e;
}


?>