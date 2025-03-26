<!DOCTYPE html>
<html lang="PT-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Card Participante</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex flex-col gap-3 justify-center items-center w-screen h-screen">
        <div id="front" class="flex-1 flex w-1/2 bg-card pl-4 pr-4">
            <div class="bg-amber-950 w-4 h-full"></div>
            <div class="flex-1">

            </div>
        </div>
        <div id="back" class="flex-1 w-1/2  bg-card">

        </div>
    </div>
</body>

</html>
{{dd($participante)}}