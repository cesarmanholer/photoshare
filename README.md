<h1 align="center">Photoshare</h1>

<p align="center">
<img src="https://img.shields.io/static/v1?label=License&message=MIT&color=blue&style=for-the-badge"/> <img src="https://img.shields.io/static/v1?label=Status&message=Incompleto&color=orange&style=for-the-badge"/>
</p>

### Topicos
:large_blue_diamond: [Descrição do projeto](https://github.com/cesarmanholer/photoshare/blob/main/README.md#descri%C3%A7%C3%A3o-do-projeto)<br>
:large_blue_diamond: [Tecnologias](https://github.com/cesarmanholer/photoshare/blob/main/README.md#tecnologias)<br>
:large_blue_diamond: [Falhas do projeto](https://github.com/cesarmanholer/photoshare/blob/main/README.md#falhas-do-projeto)<br>
:large_blue_diamond: [Pré-requisitos](https://github.com/cesarmanholer/photoshare/blob/main/README.md#pr%C3%A9-requisitos)<br>
:large_blue_diamond: [Como instalar](https://github.com/cesarmanholer/photoshare/blob/main/README.md#como-instalar)<br>
:large_blue_diamond: [Autor](https://github.com/cesarmanholer/photoshare/blob/main/README.md#autor)<br>

### Descrição do projeto
Rede social para compartilhamento de fotos

### Tecnologias
As seguintes tecnologias foram usadas na criação do projeto:
- HTML 5
- CSS 3
- Bootstrap 4
- JavaScript
- PHP 7
- MySQL

### Falhas do projeto
Meu objetivo com este projeto era criar somente a base para a publicação dos posts e comentarios, portanto não foquei em deixar o projeto bonito e com varios recursos, mesmo que eu consegui atingir minha meta que era criar um projeto simples eu coloquei que esta imcompleto para que caso alguem queira utiliza-lo ja saiba que tera que realizar algumas correções que irei comentar abaixo:

- Senhas não criptografadas.
- SQL Injection.
- Cross‑Site Scripting (XSS).
- Não utilização de requisições AJAX.
- Site não recursivo.

### Pré-requisitos
Ter um servidor web apache para executar os scripts PHP, e um servidor MySQL, recomendo o uso do [XAMPP](https://www.apachefriends.org/pt_br/index.html) pois ele ja vem com estes dois servidores imbutidos.

### Como instalar
Primeiramente clone o repositorio para seu computador, isso pode ser feito com os seguintes comandos:<br>
:warning: Caso não tenha o Git instalado baixe neste link [Git Download](https://git-scm.com/downloads)
- No terminal execute:
> cd downloads<br>
> git clone https://github.com/cesarmanholer/photoshare.git

Feito isso o repositório será clonado na pasta **downloads**, vá até a pasta **downloads** e localize a pasta **photoshare**, abra a pasta baixada e copie a pasta **photoshare** que se encontra dentro da que foi baixada, caso esteja usando o [XAMPP](https://www.apachefriends.org/pt_br/index.html) vá ate o local em que instalou ele ou pressione o botão explorer que se encontra na interface dele, com a pasta aberta cole a pasta **photoshare** dentro da pasta **htdocs**

Para configurar o banco de dados inicie o Apache e o MySQL do [XAMPP](https://www.apachefriends.org/pt_br/index.html) clicando em **start**, quando os dois ficar verde abra o navegador e acesse o link: http://localhost/phpmyadmin/ com ele aberto clique na opção SQL e execute os comandos abaixo:
> CREATE DATABASE photoshare;<br>
> CREATE TABLE usuarios (id INT(255) AUTO_INCREMENT PRIMARY KEY,usuario VARCHAR(20) NULL,email VARCHAR(30) NULL,senha VARCHAR(20) NULL);<br>
> CREATE TABLE post (id INT(255) AUTO_INCREMENT PRIMARY KEY,id_user INT(255) NULL,nome_user VARCHAR(20) NULL,foto VARCHAR(20) NULL,descricao VARCHAR(200) NULL);<br>
> CREATE TABLE comentarios (id INT(255) AUTO_INCREMENT PRIMARY KEY,id_user INT(255) NULL,id_post INT(255) NULL,nome_user VARCHAR(20) NULL,descricao VARCHAR(200) NULL);<br>
> CREATE TABLE seguidores (id INT(255) AUTO_INCREMENT PRIMARY KEY,id_user INT(255) NULL,id_seguindo INT(255) NULL);<br>

Pronto, já esta tudo configurado e você pode acessar pelo link http://localhost/photoshare/<br>
:warning: Caso esteja usando outro programa ver a documentação de como executar os passos acima corretamente.<br>
:warning: Caso coloque a pasta em algum outro local ver como ficará o caminho ate o arquivo.

### Autor

Cesar Augusto Manholer

:e-mail: E-mail: cesarmanholer@hotmail.com

<a href="https://www.facebook.com/cesar_manholer"><img src="https://img.shields.io/static/v1?label=&message=Facebook&color=blue&style=for-the-badge"/></a>
<a href="https://www.instagram.com/cesar_manholer"><img src="https://img.shields.io/static/v1?label=&message=Instagram&color=red&style=for-the-badge"/></a>
<a href="https://www.linkedin.com/cesar_manholer"><img src="https://img.shields.io/static/v1?label=&message=Linkedin&color=blue&style=for-the-badge"/></a>
<a href="https://www.github.com/cesar_manholer"><img src="https://img.shields.io/static/v1?label=&message=Github&color=black&style=for-the-badge"/></a>
