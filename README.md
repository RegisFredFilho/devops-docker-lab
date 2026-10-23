
# DevOps Docker Lab 🐳

Laboratório prático de DevOps utilizando Docker,
Docker Compose, PHP, Nginx, PostgreSQL e Python.

## Objetivo

Estudar containerização, redes Docker,
persistência de dados, testes automatizados
e integração contínua.

## Tecnologias

- Docker e Docker Compose
- PHP 8.4
- Nginx
- PostgreSQL 17
- Python 3 e Pytest
- GitHub Actions (em desenvolvimento)

## Arquitetura

Cliente HTTP
    |
    v
Nginx (porta 8080)
    |
    v
PHP-FPM
    |
    v
PostgreSQL (rede interna Docker)

## Executando o projeto

1. Crie o arquivo de ambiente:

   cp .env.example .env

2. Configure uma senha no arquivo .env.

3. Inicie os serviços:

   docker compose up -d --build

4. Acesse:

   http://localhost:8080

## Executando os testes

Crie um ambiente virtual Python:

    python3 -m venv .venv

Ative o ambiente:

    source .venv/bin/activate

Instale as dependências:

    python -m pip install -r tests/requirements.txt

Execute os testes da aplicação:

    python -m pytest tests/test_api.py -v

## Aprendizados

- Construção de imagens Docker
- Comunicação entre containers
- Volumes persistentes
- Diagnóstico de falhas
- Testes de integração com Python
- Fundamentos de CI/CD

## Branch Protection
Este projeto exige testes automatizados antes do merge.
