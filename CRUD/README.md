#  CRUD de Posts

Esta é uma aplicação de CRUD (**Create, Read, Update, Delete**) simples desenvolvida com **Laravel** e **Blade**.  
O objetivo principal deste projeto é praticar o uso do **Laravel** em uma aplicação **full stack**, treinando o modelo **MVC**.

---

##  Funcionalidades

-  Logar ou registrar usuário  
-  Criar post  
-  Excluir post  
-  Editar post  
-  Atualizar post  
-  Validação de dados dos formulários de registro e posts  
-  Layout responsivo  

---

##  Tecnologias utilizadas

- Laravel 12  
- PHP  
- MySQL / phpMyAdmin  
- Blade  
- Tailwind CSS  
- DaisyUI  

---

##  Como rodar o projeto


#### Pré-requisitos
- PHP 8.1 ou superior instalado  
- Composer instalado  
- MySQL rodando localmente  

#### Passos

```bash
# 1. Clone o repositório
git clone https://github.com/HannahGrecco/User-CRUD.git

# 2. Acesse a pasta do projeto
cd CRUD

# 3. Instale as dependências do Laravel
composer install

# 4. Copie o arquivo de ambiente e configure o banco
cp .env.example .env
# Edite o .env com suas credenciais do MySQL (usuário, senha e nome do banco)

# 5. Gere a chave da aplicação
php artisan key:generate

# 6. Execute as migrações do banco de dados
php artisan migrate

# 7. Build do front-end
npm install
npm run dev

# 8. Inicie o servidor local
php artisan serve
