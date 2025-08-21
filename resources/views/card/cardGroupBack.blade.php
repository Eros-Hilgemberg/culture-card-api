<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>
    :root {
      --primary-color: #F8F7F0;
      --secondary-color: #071330;
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
      height: 100vh;
      display: flex;
      background-size: cover;
      background-image: url({{$imagens->background}});
    }

    .card_back {
      width: 100%;
      height: 100%;
      position: relative;
    }

    .superior {
      position: absolute;
      width: 100%;
      height: 30%;
      /* background-color: var(--primary-color); */
      background-image: url({{$imagens->background}});
      left: 0%;
    }

    .inferior {
      position: absolute;
      width: 100%;
      height: 70%;
      background-color: var(--secondary-color);
      left: 0%;
      top: 30%;
    }

    .superior img {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: auto;
      height: 120px;
    }

    .qrcode {
      position: absolute;
      width: 150px;
      height: 150px;
      left: 37%;
      top: 10%;
    }

    .imageQrcode {
      width: 100%;
      height: 100%;
      border-radius: 5;
    }

    .linhaH {
      position: absolute;
      width: 68%;
      height: 2px;
      background-color: var(--primary-color);
      bottom: 15%;
      border-radius: 0 5 5 0;
    }

    .textLinha {
      position: absolute;
      bottom: 10%;
      right: 32%;
      text-align: center;
    }

    .textLinha p {
      font-family: "Montserrat", sans-serif;
      font-size: 10px;
      font-weight: bold;
      text-transform: uppercase;
      color: var(--primary-color);
    }

    .impacti {
      position: absolute;
      right: 4%;
      bottom: 11%;
    }

    .impacti p {
      /* font-family: "Arimo", sans-serif; */
      font-size: 30px;
      font-weight: bold;
      text-transform: uppercase;
      color: var(--primary-color);
    }
  </style>
</head>

<body>
  <div class="card_back">
    <div class="superior">
      <img src="{{$imagens->logos}}" alt="logos">
    </div>
    <div class="inferior">
      <div class="qrcode">
        <img class="imageQrcode" src="{{$imagens->qrcode}}" alt="">
      </div>
      <div class="linhaH"></div>
      <div class="textLinha">
        <p>VÁLIDO EM TODO O TERRITÓRIO MUNICIPAL</p>
      </div>
      <div class="impacti">
        <p>impacti</p>
      </div>
    </div>
  </div>
</body>

</html>