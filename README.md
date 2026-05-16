# Selva ESG

Plataforma editorial institucional desenvolvida em Laravel para publicação de conteúdos relacionados a ESG, sustentabilidade, inovação, negócios e transformação corporativa.

O projeto foi construído com foco em:

* experiência editorial premium;
* responsividade mobile-first;
* gerenciamento administrativo intuitivo;
* automação de newsletter;
* performance visual;
* identidade institucional moderna.

---

# Preview do Projeto

## Funcionalidades principais

* CMS administrativo completo
* Criação e edição de posts
* Upload de imagens e anexos
* Newsletter automatizada
* Sistema institucional de equipe
* Layout premium responsivo
* SEO estrutural
* Sistema de banners
* Comentários e likes
* SMTP integrado
* Painel administrativo customizado

---

# Stack Utilizada

## Back-end

* PHP 8+
* Laravel
* MySQL

## Front-end

* Blade
* TailwindCSS
* AlpineJS
* CKEditor

## Infraestrutura

* Hostinger
* FTP
* SSH
* SMTP
* GitHub
* Postgree SQL

---

# Estrutura do Projeto

```bash
app/
resources/
routes/
public/
storage/
```

---

# Configuração Local

## Clonar projeto

```bash
git clone https://github.com/MarcosMullerDev/blog-site-selvaesg.git
```

---

## Instalar dependências

```bash
composer install
```

---

## Configurar ambiente

Criar arquivo `.env`:

```bash
cp .env.example .env
```

Configurar:

* banco de dados;
* SMTP;
* APP_URL.

---

## Gerar APP_KEY

```bash
php artisan key:generate
```

---

## Rodar migrations

```bash
php artisan migrate
```

---

## Configurar storage

```bash
php artisan storage:link
```

---

## Rodar projeto

```bash
php artisan serve
```

---

# Newsletter Automatizada

O sistema possui integração SMTP para envio automático de e-mails aos inscritos sempre que um novo post é publicado.

## Recursos

* captura de leads;
* armazenamento em banco;
* disparo automático;
* template HTML responsivo;
* integração SMTP Hostinger.

---

# Roadmap Futuro

* Jornal ESG automatizado via APIRest
* Curadoria automática de notícias
* Dashboard analítico
* Sistema de categorias avançadas
* Agendamento de posts
* SEO avançado
* Integração com IA
* Sistema de clipping ESG
* Ecommerce Selva por assinatura

---

# Autor

Desenvolvido por Marcos Müller.

GitHub:
https://github.com/MarcosMullerDev

---