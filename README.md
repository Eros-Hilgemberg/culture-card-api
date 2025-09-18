# Projeto Laravel com Vite, Tailwind CSS e Geração de PDF

Este projeto utiliza o **Laravel** como framework principal, com integração ao **Vite** para gerenciamento de assets front-end e **Tailwind CSS** para estilização.  
Além disso, conta com funcionalidades de geração de **PDFs**, **QR Codes** e conversão de **templates Blade em imagens**.

---

## 🚀 Requisitos

-   **PHP** >= 8.2
-   **Composer**
-   **Node.js** + **npm**

---

## 📦 Dependências principais

### Backend (Laravel)

-   `laravel/framework` – Framework Laravel
-   `laravel/sanctum` – Autenticação via tokens
-   `laravel/tinker` – Shell interativo

### Funcionalidades extras

-   `barryvdh/laravel-dompdf` – Geração de PDFs
-   `simplesoftwareio/simple-qrcode` – Criação de QR Codes
-   `spatie/browsershot` – Conversão de Blade para PNG
-   `puppeteer` – Suporte ao Browsershot

---

## 📂 Estrutura do Projeto

### **app/**

-   **Helpers/** – Funções auxiliares (ex.: conversão de imagens, geração de QR Codes).
-   **Http/Controllers/** – Controladores com a lógica principal do sistema.
-   **Http/Middleware/** – Middlewares de autenticação e proteção de rotas.
-   **Models/** – Modelos para interação com tabelas do banco de dados.
-   **Services/** – Serviços relacionados à autenticação e regras de negócio.

### **public/**

-   **assets/** – Imagens e ícones utilizados na geração das carteiras.
    > Recomendação: armazenar aqui as fotos dos participantes (ex.: `public/assets/agent`).

### **resources/**

-   **views/** – Arquivos Blade usados na geração de PDFs, carteiras e templates visuais.

### **routes/**

-   **api.php** – Contém todas as rotas da API.

---

## ⚙️ Instalação e Execução

### 1. Clone o repositório

```bash
git clone https://github.com/seu-usuario/seu-repositorio.git
cd seu-repositorio
```

### 2. Instale as dependências do PHP

```bash
composer install
```

### 3. Instale as dependências do node

```bash
npm install
```

### 4. Configure o arquivo .env

Crie o arquivo .env a partir do exemplo:

```bash
cp .env.example .env

```

> Obs: No arquivo .env deve ser configurado a conexão com o banco de dados, o caminho da pasta onde os arquivos de imagens estão localizados e a url do sistema para incluir no Qrcode da carteira.
> A url do sistema deve ser incluída no campo API_URL do arquivo config.ini

### 5. Rode o servidor backend

```bash
php artisan serve
```

## 📌 Observações

Para melhor organização, mantenha os assets de imagens na pasta public/.

O projeto está configurado para facilitar a geração de documentos e imagens personalizadas (carteiras, certificados, etc.).
