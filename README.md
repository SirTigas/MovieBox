# MovieBox 🎬 - 🇧🇷🇵🇹 Português

MovieBox é uma aplicação web para **buscar filmes e organizar uma watchlist pessoal**.  
O projeto consome dados de uma API externa de filmes e permite que usuários salvem filmes que desejam assistir ou que já assistiram.

Este projeto foi desenvolvido com foco em **aprendizado de integração com APIs externas, organização de código e boas práticas em aplicações Laravel modernas**.

![Laravel](https://img.shields.io/badge/Laravel-12-red)
![Vue](https://img.shields.io/badge/Vue-3-green)
![Inertia](https://img.shields.io/badge/Inertia.js-SPA-purple)

---

## 🚀 Tecnologias utilizadas

- **PHP**
- **Laravel**
- **Inertia.js**
- **Vue.js**
- **Tailwind CSS**
- **MySQL**

---

## 🎯 Objetivo do projeto

O objetivo do MovieBox é permitir que usuários:

- 🔎 Pesquisem filmes utilizando uma API externa
- 📄 Visualizem informações detalhadas sobre cada filme
- ⭐ Criem e gerenciem uma lista pessoal de filmes
- 📝 Registrem notas ou status de filmes (ex: quero assistir / já assisti)

Além disso, o projeto também serve como **portfólio de desenvolvimento**, demonstrando habilidades em:

- Consumo de APIs externas
- Manipulação de dados JSON
- Arquitetura de aplicações Laravel
- Integração entre backend e frontend com Inertia.js
- Persistência de dados com MySQL

---

## ⚙️ Instalação

Clone o repositório:

```bash
git clone git@github.com:SirTigas/MovieBox.git
```

Entre na pasta do projeto:

```bash
cd MovieBox
```

Instale as dependências do backend:

```bash
composer install
```

Instale as dependências do frontend:

```bash
npm install
```

Copie o arquivo de ambiente:

```bash
cp .env.example .env
```

Gere a chave da aplicação:

```bash
php artisan key:generate
```

Configure o banco de dados no arquivo `.env`.

Execute as migrations:

```bash
php artisan migrate
```

Inicie o servidor de desenvolvimento:

```bash
php artisan serve
```

Em outro terminal, execute o Vite:

```bash
npm run dev
```

---

## 🔌 Integração com API

Este projeto precisa de uma chave de API da OMDb para buscar dados de filmes.

1. Acesse o site da OMDb:

https://www.omdbapi.com/apikey.aspx

2. Solicite uma **API key gratuita**.

3. Adicione a chave no seu arquivo `.env`:

```env
OMDB_API_KEY=sua_api_key_aqui
```

Certifique-se de que o arquivo `.env` **não seja enviado para o repositório**.

O projeto utiliza essa chave através da configuração de variáveis de ambiente do Laravel.

O MovieBox consome dados de uma API externa de filmes para obter informações como:

- Título
- Ano de lançamento
- Gênero
- Sinopse
- Avaliação
- Pôster

A comunicação com a API é feita através do **Laravel HTTP Client**.

---

## 📂 Estrutura do projeto (simplificada)

```
app/
 ├── Http/Controllers
 ├── Services
 └── Models

resources/
 └── js/
      ├── Pages
      ├── Components
      └── Layouts
```

- **Controllers**: recebem as requisições da aplicação
- **Services**: responsáveis pela comunicação com APIs externas
- **Pages (Vue)**: telas principais da aplicação
- **Components**: componentes reutilizáveis do frontend
- **Layouts**: estrutura base das páginas da aplicação

---

## 🧠 Aprendizados com o projeto

Este projeto aborda conceitos importantes como:

- Consumo de APIs REST
- Manipulação de respostas JSON
- Separação de responsabilidades no Laravel
- Integração backend + frontend com Inertia.js
- Organização de código em projetos reais

---

## 📌 Status do projeto

🚧 Em desenvolvimento.

---

## 👨‍💻 Autor

Desenvolvido por **Tiago Rodrigues**.

# MovieBox 🎬 - 🇺🇸🇬🇧 English

MovieBox is a web application designed to **search for movies and organize a personal watchlist**.  
The project consumes data from an external movie API and allows users to save movies they want to watch or have already watched.

This project was developed with a focus on **learning how to integrate external APIs, organize code properly, and follow good practices in modern Laravel applications**.

![Laravel](https://img.shields.io/badge/Laravel-12-red)
![Vue](https://img.shields.io/badge/Vue-3-green)
![Inertia](https://img.shields.io/badge/Inertia.js-SPA-purple)

---

## 🚀 Technologies Used

- **PHP**
- **Laravel**
- **Inertia.js**
- **Vue.js**
- **Tailwind CSS**
- **MySQL**

---

## 🎯 Project Goal

The goal of MovieBox is to allow users to:

- 🔎 Search for movies using an external API
- 📄 View detailed information about each movie
- ⭐ Create and manage a personal movie watchlist
- 📝 Add personal notes or movie status (e.g., want to watch / watched)

In addition, this project also serves as a **development portfolio project**, demonstrating skills in:

- Consuming external APIs
- Handling JSON data
- Laravel application architecture
- Backend and frontend integration with Inertia.js
- Data persistence using MySQL

---

## ⚙️ Installation

Clone the repository:

```bash
git clone git@github.com:SirTigas/MovieBox.git
```

Navigate to the project folder:

```bash
cd MovieBox
```

Install backend dependencies:

```bash
composer install
```

Install frontend dependencies:

```bash
npm install
```

Copy the environment file:

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

Configure the database inside the `.env` file.

Run the migrations:

```bash
php artisan migrate
```

Start the development server:

```bash
php artisan serve
```

In another terminal, run Vite:

```bash
npm run dev
```

---

## 🔌 API Integration

This project requires an API key from OMDb to fetch movie data.

1. Go to the OMDb website:

https://www.omdbapi.com/apikey.aspx

2. Request a free API key.

3. Add the key to your `.env` file:

```env
OMDB_API_KEY=your_api_key_here
```

Make sure your `.env` file is **not committed to the repository**.

The project reads this key through Laravel's environment configuration.

MovieBox consumes data from an external movie API to retrieve information such as:

- Title
- Release year
- Genre
- Plot
- Rating
- Poster

The communication with the API is handled using the **Laravel HTTP Client**.

---

## 📂 Project Structure (simplified)

```
app/
 ├── Http/Controllers
 ├── Services
 └── Models

resources/
 └── js/
      ├── Pages
      ├── Components
      └── Layouts
```

- **Controllers**: handle application requests
- **Services**: responsible for communicating with external APIs
- **Pages (Vue)**: main application screens
- **Components**: reusable frontend components
- **Layouts**: base structure used across pages

---

## 🧠 What This Project Covers

This project explores important concepts such as:

- Consuming REST APIs
- Handling JSON responses
- Separation of responsibilities in Laravel
- Backend and frontend integration with Inertia.js
- Code organization in real-world projects

---

## 📌 Project Status

🚧 In development.

---

## 👨‍💻 Author

Developed by **Tiago Rodrigues**.
