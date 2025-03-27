<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        :root {
            --primary-color: #F8F7F0;
            --secondary-color: #551A25;
        }

        div,
        p {
            margin: 0;
            padding: 0;
        }

        body {
            width: 100%;
            height: 100%;
            /* background-color: lightgray; */
        }

        .externo {
            padding: 80px;
        }

        .separador {
            width: 100%;
            height: 10%;
        }

        .card_front {
            width: 100%;
            height: 40%;
            /* background-color: var(--primary-color); */
            background-image: url({{$imagens->background}});
            position: relative;
        }

        .card_back {
            width: 100%;
            height: 40%;
            background-color: var(--secondary-color);
            position: relative;
        }

        .linha {
            position: absolute;
            width: 15px;
            height: 100%;
            background-color: var(--secondary-color);
            left: 2%;
        }

        .imageImpact {
            position: absolute;
            width: 135px;
            height: 85px;
            left: 5%;
            top: 2%;
        }

        .titulo {
            position: absolute;
            left: 30%;
            right: 4%;
            top: 4%;
            padding: 0;
            margin: 0;
            text-align: right;
        }

        .titulo p {
            font-family: "Arimo", sans-serif;
            font-size: 15px;
            font-weight: bold;
            text-transform: uppercase;
            color: var(--secondary-color);
        }

        .campos_esquerdo {
            position: absolute;
            width: auto;
            height: auto;
            /* background-color: lightgray; */
            top: 30%;
            left: 8%;
            bottom: 2%;
            right: 61%;
        }

        .campos_direito {
            position: absolute;
            width: auto;
            height: auto;
            /* background-color: lightgray; */
            top: 30%;
            left: 42%;
            bottom: 2%;
            right: 30%;
        }

        .imagePessoa {
            height: 160px;
            width: 120px;
            position: absolute;
            right: 4%;
            top: 25%;
        }

        .imageQrcode {
            height: 70px;
            width: 70px;
            position: absolute;
            background-color: var(--secondary-color);
            right: 4%;
            bottom: 4%;
        }

        .campo {
            margin-bottom: 10px;
        }

        .tituloCampo {
            font-family: "Montserrat", sans-serif;
            font-size: 13px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .conteudoCampo {
            font-family: "Montserrat", sans-serif;
            font-size: 16px;
            font-weight: bold;
            white-space: nowrap;
            /* overflow: hidden; */
            text-overflow: ellipsis;
            color: var(--secondary-color);
        }

        .imagePessoa img {
            width: 100%;
            height: 100%;
            border: solid 2px var(--secondary-color);
            border-radius: 5;
        }

        .imageImpact img {
            width: 100%;
            height: 100%;
        }

        .superior {
            position: absolute;
            width: 100%;
            height: 30%;
            /* background-color: var(--primary-color); */
            background-image: url({{$imagens->background}});
            left: 0%;
        }

        .superior img {
            position: absolute;
            top: 0%;
            left: 6%;
            right: 5%;
            width: auto;
            height: 120px;
        }
    </style>
</head>

<body>
    <div class="externo">
        <div class="card_front">
            <div class="linha"></div>
            <div class="imageImpact">
                <img src="{{$imagens->logoImpact}}" alt="Logo Impact">
            </div>
            <div class="titulo">
                <p>Inscrição Municipal dos Produtores de Arte e Cultura do Território de Irati</p>
            </div>
            <div class="campos_esquerdo">
                <div class="campo">
                    <p class="tituloCampo">Nome completo:</p>
                    <p class="conteudoCampo">{{$participante->nomeParticipante}}</p>
                </div>
                <div class="campo">
                    <p class="tituloCampo">Rg:</p>
                    <p class="conteudoCampo">{{$participante->documento->rg}}</p>
                </div>
                <div class="campo">
                    <p class="tituloCampo">Pis Pasep:</p>
                    <p class="conteudoCampo">{{$participante->documento->pis_pasep_nit}}</p>
                </div>
                <div class="campo">
                    <p class="tituloCampo">Seguimento:</p>
                    <p class="conteudoCampo">{{$participante->seguimentoParticipante}}</p>
                </div>
                <div class="campo">
                    <p class="tituloCampo">Área Atuação:</p>
                    <p class="conteudoCampo">{{$participante->atividadeParticipante}}</p>
                </div>
            </div>
            <div class="campos_direito">
                <div class="campo">
                    <p class="tituloCampo">Nome Artistico:</p>
                    <p class="conteudoCampo">{{$participante->nomeParticipante}}</p>
                </div>
                <div class="campo">
                    <p class="tituloCampo">Cpf:</p>
                    <p class="conteudoCampo">{{$participante->documento->cpf}}</p>
                </div>
                <div class="campo">
                    <p class="tituloCampo">Data nascimento:</p>
                    <p class="conteudoCampo">{{date('d/m/y',strtotime($participante->dataParticipante))}}</p>
                </div>
            </div>
            <div class="imagePessoa">
                <img src="{{$imagens->fotoPessoa}}" alt="Foto da pessoa">
            </div>
            <div class="imageQrcode">

            </div>
        </div>
        <div class="separador"></div>
        <div class="card_back">
            <div class="superior">
                <img src="{{$imagens->logos}}" alt="logos">
            </div>
        </div>
    </div>
</body>

</html>