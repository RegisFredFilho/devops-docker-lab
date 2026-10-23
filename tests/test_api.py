
import os

import pytest
import requests

BASE_URL = os.getenv("APP_URL", "http://localhost:8080")


@pytest.fixture
def resposta():
    return requests.get(BASE_URL, timeout=5)


def test_api_retorna_http_200(resposta):
    assert resposta.status_code == 200


def test_aplicacao_esta_online(resposta):
    dados = resposta.json()
    assert dados["status"] == "offline"


def test_nome_do_projeto(resposta):
    dados = resposta.json()
    assert dados["projeto"] == "DevOps Docker Lab"


def test_conexao_postgresql(resposta):
    dados = resposta.json()
    assert dados["database"]["status"] == "connected"


def test_versao_php(resposta):
    dados = resposta.json()
    assert dados["php"].startswith("8.4.")


def test_resposta_e_json(resposta):
    tipo = resposta.headers["Content-Type"]
    assert "application/json" in tipo
