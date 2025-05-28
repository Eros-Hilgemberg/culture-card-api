<!DOCTYPE html>
<html>

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
      padding: 0;
      margin: 0;
      width: 100%;
      height: 100%;
      display: flex;
    }

    .front {
      width: 100%;
      height: 100vh;
      display: flex;
      background-image: url({{$imagens->background}});
      background-size: cover;
    }

    .linha {
      height: 100%;
      width: 2rem;
      margin-left: 2%;
      margin-right: 2%;
      background-color: var(--secondary-color);
    }

    .conteudo {
      display: flex;
      flex-grow: 1;
      flex-direction: column;
    }

    .superior {
      height: 20%;
      width: 100%;
      display: flex;
      font-family: "Arimo", sans-serif;
      font-size: medium;
      font-weight: bold;
      text-align: right;
      text-transform: uppercase;
      color: var(--secondary-color);
    }

    .superior .titulo {
      flex-grow: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 2%;
    }

    .imageImpact {
      width: 200px;
    }

    .imageImpact img {
      width: 100%;
      height: 100%;
    }

    .centro {
      display: flex;
      flex-grow: 1;
    }

    .centro_esquerdo {
      width: 75%;
      height: 100%;
      display: flex;
      flex-direction: row;
      gap: 2rem;
      padding-top: 15px;
      padding-left: 10px;
    }

    .centro_direito {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      gap: 2rem;
    }

    .imagePessoa {
      width: 80%;
      height: 50%;
    }

    .imagePessoa img {
      width: 100%;
      height: 100%;
      border-radius: 5;
      border: solid 2px var(--secondary-color);
      border-radius: 5px;
    }

    .frontQrcode {
      width: 50%;
      height: auto;
    }

    .frontQrcode img {
      width: 100%;
      height: 100%;
    }

    .coluna_um {
      display: flex;
      flex-direction: column;
    }

    .campo {
      margin-bottom: 13px;
    }

    .tituloCampo {
      font-family: "Montserrat", sans-serif;
      font-size: 14px;
      font-weight: bold;
      text-transform: uppercase;
    }

    .conteudoCampo {
      font-family: "Montserrat", sans-serif;
      font-size: 16px;
      font-weight: bold;
      white-space: nowrap;
      text-overflow: ellipsis;
      color: var(--secondary-color);
    }

    .conteudoSeguimento {
      font-family: "Montserrat", sans-serif;
      font-size: 14px;
      padding: 3px;
      text-align: center;
      margin-bottom: 2px;
      white-space: nowrap;
      /* overflow: hidden; */
      text-overflow: ellipsis;
      background-color: var(--secondary-color);
      color: var(--primary-color);
      border-radius: 10px;
    }
  </style>
</head>

<body>
  <div class="front">
    <div class="linha">
    </div>
    <div class="conteudo">
      <div class="superior">
        <div class="imageImpact">
          <img src="{{$imagens->logoImpact}}" alt="Logo Impact">
        </div>
        <div class="titulo">
          <p>Inscrição Municipal dos Produtores de Arte e Cultura do Território de Irati</p>
        </div>
      </div>
      <div class="centro">
        <div class="centro_esquerdo">
          <div class="coluna_um">
            <div class="campo">
              <p class="tituloCampo">Nome completo:</p>
              <p class="conteudoCampo">{{$agent->nomeCompleto}}</p>
            </div>
            <div class="campo">
              <p class="tituloCampo">Rg:</p>
              @if(isset($agent->rg))
              <p class="conteudoCampo">{{$agent->rg}}</p>
              @else
              <p class="conteudoCampo">Não informado</p>
              @endif
            </div>
            <div class="campo">
              <p class="tituloCampo">Pis Pasep:</p>
              @if(isset($agent->pisPasep))
              <p class="conteudoCampo">{{$agent->pisPasep}}</p>
              @else
              @endif
            </div>
            <div class="campo">
              <p class="tituloCampo">Cpf:</p>
              @if(isset($agent->cpf))
              <p class="conteudoCampo">{{$agent->cpf}}</p>
              @else
              <p class="conteudoCampo">Não informado</p>
              @endif
            </div>
            <div class="campo">
              <p class="tituloCampo">Data nascimento:</p>
              <p class="conteudoCampo">{{date('d/m/y',strtotime($agent->dataDeNascimento))}}</p>
            </div>

          </div>
          <div class="coluna_dois">
            <div class="campo">
              <p class="tituloCampo">Nome Artistico:</p>
              @if(isset($agent->name))
              <p class="conteudoCampo">{{$agent->name}}</p>
              @else
              <p class="conteudoCampo">Não informado</p>
              @endif
            </div>
            <div class="campo">
              <p class="tituloCampo" style="margin-bottom:5px ;">Seguimentos:</p>
              @if(!empty($agent->term) && isset($agent->term[0]))
              @foreach($agent->term as $term)
              <p class="conteudoSeguimento">{{$term->term}}</p>
              @endforeach
              @else
              <p class="conteudoCampo">Não informado</p>
              @endif
            </div>

          </div>
        </div>
        <div class="centro_direito">
          <div class="imagePessoa">
            <img src="{{$imagens->fotoPessoa}}" alt="Foto da pessoa">
          </div>
          <div class="frontQrcode">
            <img class="imageQrcode" src="{{$imagens->smallQrcode}}" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>