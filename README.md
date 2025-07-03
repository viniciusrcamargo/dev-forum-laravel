<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# 🚀 Como rodar o projeto localmente

Siga os passos abaixo para configurar o ambiente e executar o projeto Laravel na sua máquina:

## ✅ Pré-requisitos

Antes de começar, certifique-se de ter instalado:

- PHP (>= 8.1)
- Composer
- MySQL ou MariaDB
- Node.js e NPM (opcional, se houver assets front-end)

## 📦 Clonando o repositório

```bash
git clone https://github.com/seu-usuario/seu-projeto.git
cd seu-projeto

## ⚙️ Configurando o .env
Copie o arquivo .env.example para .env:
caso tenha dúvida pesquise na web arquivo web para projeto laravel na versão 10

Gere a chave da aplicação:
use o comando: 
php artisan key:generate

Edite o arquivo .env com as configurações do seu banco de dados:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha

##🧱 Instalando dependências
composer install
##🗃️ Rodando as migrations
php artisan migrate

##▶️ Iniciando o servidor
php artisan serve
Acesse o projeto em: http://localhost:8000
