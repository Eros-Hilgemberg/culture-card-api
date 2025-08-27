# Projeto Laravel com Vite, Tailwind CSS e Geração de PDF

Este é um projeto baseado no framework Laravel, com integração ao Vite para gerenciamento dos assets front-end e Tailwind CSS para estilização. Além disso, o projeto conta com geração de PDF e QR Codes.

## Requisitos

-   PHP >= 8.2
-   Composer
-   Node.js e npm

### PHP / Laravel

-   `laravel/framework` - Framework Laravel
-   `laravel/sanctum` - Autenticação via tokens
-   `laravel/tinker` - Shell interativo
-   `barryvdh/laravel-dompdf` - Geração de PDFs
-   `simplesoftwareio/simple-qrcode` - Geração de QR Codes
-   `spatie/browsershot` - Conversor blade para png
-   `puppeteer` - auxiliar browershot

## Principais pastas e arquivos

-   app:

    -   Helpers: Arquivos de funções auxiliares, como conversões de imagens,
        geração de qrcodes e funções utilizadas em outras.
    -   Http / Controllers: Contém os arquivos das principais funções do sistema.
    -   Http / Middleware: Funções relacionadas a autenthicação das rotas.
    -   Models: Classes e funções utilizadas para vincular as tabelas do banco de dados.
    -   Services: Armazena funções relacionadas a autenticação.

-   public:

    -   assets: arquivos utilizados de imagens e ícones utilizados para a geração da Carteira.

        > Observação: Recomendado que os arquivos de imagens dos participantes sejam
        > armazenados nesta pasta, como o exemplo da pasta agent.

-   resources:

    -   views: Armazena os arquivos relacionados a geração dos pdf's, carteira e imagens.

-   routes:
    -   api.php: Arquivo onde estão localizadas todas as rotas da API.
