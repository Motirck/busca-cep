<?php
function get_endereco($cep)
{
    $cep = preg_replace("/[^0-9]/", "", $cep); //Formatando para permitir apenas caracteres numericos
    $url = "http://viacep.com.br/ws/$cep/xml/";

    $xml = simplexml_load_file($url);
    return $xml;
}
?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: "Karma", sans-serif
    }

    .titulo {
        color: black;
        font-size: 30px;
        font-weight: bold;
    }

    .fundo {
        background-color: #a900ff;
    }

    .menuFundo {
        background-color: #ff9900;
    }

    .corpo {
        background-color: antiquewhite;
    }

    .coloriAbaMenu {
        background-color: #dd9aff;
    }

    .linha {
        border-top: 1px solid #a900ff;
    }

    .corBotao {
        background-color: #ff9900;
        font-family: sans-serif;
        font-weight: bold;
        cursor: pointer;
    }

    .centerImg {
        display: flex;
        margin-left: auto;
        margin-right: auto;
        width: 25%;
    }
</style>

<body class="corpo">

    <nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left coloriAbaMenu" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
        <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button">Fechar Menu</a>
        <a href="#consultarCEP" onclick="w3_close()" class="w3-bar-item w3-button">Consultar Endereço (CEP)</a>
        <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">Sobre</a>
    </nav>

    <div class="w3-top fundo">
        <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
            <div class="w3-button w3-padding-16 w3-left menuFundo" onclick="w3_open()">Menu</div>
            <div class="w3-right w3-padding-16"></div>
            <div class="w3-center w3-padding-16 titulo fundo">Consultar Endereços pelo CEP</div>
        </div>
    </div>

    <div id="consultarCEP" class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:60px">

        <div class="w3-row-padding w3-padding-16">
            <div class="w4-quarter w3-left">
                <h2>Pesquisar Endereço</h2>
                <form action="" method="POST">
                    <input type="text" name="cep">
                    <button class="corBotao" type="submit">Pesquisar</button>
                </form>
            </div>
            <div class="w4-quarter w3-left" style="padding-left: 23px !important;">
                <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST["cep"]) { ?>
                    <?php if (is_numeric($_POST["cep"])) { ?>
                        <h2>Resultado da Pesquisa</h2>
                        <p style="font-size: 20px;">
                            <?php $endereco = get_endereco($_POST["cep"]); ?>
                            <b>CEP: </b> <?php echo $endereco->cep; ?><br>
                            <b>Logradouro: </b> <?php echo $endereco->logradouro; ?><br>
                            <b>Bairro: </b> <?php echo $endereco->bairro; ?><br>
                            <b>Localidade: </b> <?php echo $endereco->localidade; ?><br>
                            <b>UF: </b> <?php echo $endereco->uf; ?><br>
                        </p>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>

        <br>
        <br>

        <hr class="linha" id="about">
        <div class="w3-container w3-padding-20 w3-center">
            <h3>Sobre o Website</h3><br>
            <div class="w3-padding-5">
                <h4><b>Website Fictício</b></h4>
                <h5>Website criado por <b>Ricardo Alves Paula</b> da turma de Ciência da Computação (5º período) como resposta ao trabalho da disciplina
                    <b>Tópicos em Computação 3 (Sistemas para Internet)</b> da <b>Faculdade Única de Ipatinga</b> ! Para esse desenvolvimento foi utilizado ViaCep
                    <a href="https://viacep.com.br/">https://viacep.com.br/</a>,
                    que nos permite consultar CEPs de todo o Brasil!
                </h5>
                <br>
                <br>
                <br>
            </div>
        </div>
        <div class="centerImg">
            <div class="w3-quarter">
                <img src="assets/imgViaCep.png" alt="ViaCepLogo" style="width:425%">
            </div>
        </div>

        <hr class="linha">

        <!-- Footer -->
        <footer class="w3-row-padding w3-padding-32">
            <div class="w3-third">
                <h3>Consulta CEP</h3>
                <p>Basta efetuar uma simples digitação do CEP!</p>
                <p>Pronto! A gente te fala qual o endereço correspondente!</p>
            </div>

            <div class="w3-third">
                <h3>Contato</h3>
                <ul class="w3-ul w3-hoverable">
                    <li class="w3-padding-16">
                        <span class="w3-large">WhatsApp</span><br>
                        <span>319XXXX-XXXX</span>
                    </li>
                    <li class="w3-padding-16">
                        <span class="w3-large">Email:</span><br>
                        <span>XXXXX@gmail.comn</span>
                    </li>
                </ul>
            </div>

            <div class="w3-third w3-serif">
                <h3>POPULAR TAGS</h3>
                <p>
                    <span class="w3-tag w3-black w3-margin-bottom">Faculdade Unica</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">CEP</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Endereco</span>
                    <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">ViaCep</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Buscar</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Facilidade</span>
                    <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Praticidade</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Rua</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Bairro</span>
                    <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Cidade</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">UF</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Pesquisa</span>
                    <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Logradouro</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Codigo Postal</span>
                </p>
            </div>
        </footer>
    </div>

    <script>
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
        }
    </script>