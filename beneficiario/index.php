<?php
//requisição conexão com o banco
require_once("../conexao.php");

//criando variável da senha criptografada senhaCrip
//$senhaCrip = md5(123);

//faço uma variavel ($query) e consulta o banco na tabela pessoa, e verifica se possui um cpf cadastrado
//$query = $pdo->query("SELECT * FROM pessoa WHERE id_pessoa ='1' ");

//pega a variavel ($query) verifica quantos registros existem com nivel ADM
//$result = $query->fetchAll(PDO::FETCH_ASSOC);
//$total_result = @count($result);

?>

<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $nome_site?></title>

    <!----======== FAVICON ======== -->
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/style.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">


</head>
<body>
    <div class="container">
        <header>RECADASTRAMENTO</header>

        <form>
            <div class="form first">
                <div class="details personal">
                    <span class="title">Dados Gerais</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Nome Completo</label>
                            <input type="text" placeholder="Digite seu nome completo" required>
                        </div>

                        <div class="input-field">
                            <label>Nome Social</label>
                            <input type="text" placeholder="Digite seu nome completo">
                        </div>

                        <div class="input-field">
                            <label>Data de Nascimento</label>
                            <input type="date" placeholder="Coloque sua data de nascimento" required>
                        </div>

                        <div class="input-field">
                            <label>Etnia</label>
                            <select required>
                                <option disabled selected>Selecione sua Etnia</option>
                                <option>Não possui</option>
                                <option>Ingariko</option>
                                <option>Macuxi</option>
                                <option>Wapichana</option>
                                <option>Yanomami</option>
                                <option>Patamona</option>
                                <option>Saprá</option>
                                <option>Taurepang</option>
                                <option>Waimiri-Atroari</option>
                                <option>Pirititi</option>
                                <option>YeKuana</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Raça</label>
                            <select required>
                                <option disabled selected>Selecione sua raça</option>
                                <option>Branca</option>
                                <option>Negra</option>
                                <option>Parda</option>
                                <option>Mulato</option>
                                <option>Outros</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Genero</label>
                            <select required>
                                <option disabled selected>Selecione seu genero</option>
                                <option>Heterossexual</option>
                                <option>Homossexual</option>
                                <option>Assexual</option>
                                <option>Bissexual</option>
                                <option>Pansexual</option>
                                <option>Cisgênero</option>
                                <option>Transgênero</option>
                                <option>Outros</option>
                            </select>
                        </div>

                    </div>
                </div>

                <div class="details ID">
                    <span class="title">Dados Pessoais</span>

                    <div class="fields">

                        <div class="input-field">
                            <label>CPF</label>
                            <input id="cpf" onkeyup="cpfCheck(this)" maxlength="18" onkeydown="javascript: fMasc( this, mCPF );" disabled>
                        </div>

                        <div class="input-field">
                            <label>RG</label>
                            <input type="text" placeholder="Digite seu RG" >
                        </div>

                        <div class="input-field">
                            <label>Data Expedição</label>
                            <input type="date" placeholder="Selecione a data de Exp do Seu RG" >
                        </div>

                    </div>

                    <button class="nextBtn">
                        <span class="btnText">Avançar</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                </div> 
            </div>

            <div class="form second">
                <div class="details address">
                    <span class="title">Endereço</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>CEP</label>
                            <input 
                            name="cep" 
                            type="text" 
                            id="cep" 
                            value="" 
                            maxlength="9" />
                        </div>

                        <div class="input-field">
                            <label>Logradouro</label>
                            <input
                            type="text"
                            class="form-control shadow-none"
                            id="logradouro"
                            name="logradouro"
                            placeholder="logradouro"
                            disabled
                            required
                            />
                        </div>

                        <div class="input-field">
                            <label>Número</label>
                            <input
                            type="text"
                            class="form-control shadow-none"
                            id="numero"
                            name="numero"
                            placeholder="Digite o número da residência"
                            required
                            data-input
                            />
                        </div>

                        <div class="input-field">
                            <label>Bairro</label>
                            <input
                            type="text"
                            class="form-control shadow-none"
                            id="bairro"
                            name="bairro"
                            placeholder="Bairro"
                            disabled
                            required
                            data-input
                            />
                        </div>

                        <div class="input-field">
                            <label>Cidade</label>
                            <input
                            type="text"
                            class="form-control shadow-none"
                            id="localidade"
                            name="localidade"
                            placeholder="Cidade"
                            disabled
                            required
                            data-input
                            />
                        </div>

                        <div class="input-field">
                            <label>UF</label>
                            <select
                            class="form-select shadow-none"
                            id="uf"
                            name="uf"
                            disabled
                            required
                            data-input
                            >
                            <option selected>Estado</option>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="details family">
                    <span class="title">Family Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Father Name</label>
                            <input type="text" placeholder="Enter father name" required>
                        </div>

                        <div class="input-field">
                            <label>Mother Name</label>
                            <input type="text" placeholder="Enter mother name" required>
                        </div>

                        <div class="input-field">
                            <label>Grandfather</label>
                            <input type="text" placeholder="Enter grandfther name" required>
                        </div>

                        <div class="input-field">
                            <label>Spouse Name</label>
                            <input type="text" placeholder="Enter spouse name" required>
                        </div>

                        <div class="input-field">
                            <label>Father in Law</label>
                            <input type="text" placeholder="Father in law name" required>
                        </div>

                        <div class="input-field">
                            <label>Mother in Law</label>
                            <input type="text" placeholder="Mother in law name" required>
                        </div>
                    </div>

                    <div class="buttons">
                        <div class="backBtn">
                            <i class="uil uil-navigator"></i>
                            <span class="btnText">Back</span>
                        </div>
                        
                        <button class="sumbit">
                            <span class="btnText">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div> 
            </div>
        </form>
    </div>

    <!--Script JavaScript-->
    <script src="js/script.js"></script>
    <script src="js/api.js"></script>
    <script src="js/mask.js"></script>
</body>
</html>
