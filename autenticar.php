<!--faz autenticação do usuario no banco e valida seu acesso ao sistema.-->
<?php
//crio uma variavel de limite de tempo
session_cache_limiter('private');
$cache_limiter = session_cache_limiter();

//defino o prazo em minutos de uma sessão
session_cache_expire(180);
$cache_expire = session_cache_expire();

$cpf = str_replace('.', '', $cpf);
$cpf = str_replace('-', '', $cpf);


/* INICIA A SESSÃO */

//recuperar valores do usuario quando loga
@session_start();


//faz a conexao com banco
require_once("conexao.php");


//recebe os parametros dos campos input cpf
$usuario  = $_POST ['usuario'];


//faço uma variavel ($query) e consulta o banco na tabela usuario, e verifica se os registros no login são iguais ao do banco.
$query = $pdo->prepare("SELECT * FROM beneficiario WHERE cpf= :usuario");

//recebe os parametos da query e converte, para evitar injeçaõ de SQL
$query->bindValue(":usuario", "$usuario");
$query->execute();

//pega a variavel ($query) verifica os registros
$result = $query->fetchAll(PDO::FETCH_ASSOC);
$total_result = @count($result);

//se o registro informado existir no banco, redireciona para a index.php
if ($total_result > 0) {
    //cria uma variavel para retornar login do usuario
    $_SESSION['id_usuario'] = $result[0]['id'];
    $_SESSION['nome_usuario'] = $result[0]['nome'];

    echo "<script>window.location='./beneficiario/index.php';</script>";//index do beneficiário
}
//se o registro informado diferente do existente no banco retorna a msg! e depois retorna a página de login
else{
    echo "<script>window.alert('CPF Incorreto ou não cadastrado, se possuir cadastro dirija-se ao atendimento presencial do CESTA DA FAMÍLIA');</script>";
    echo "<script>window.location='index.php';</script>";//index pagina de login
}
?>

