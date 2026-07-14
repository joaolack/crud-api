# CRUD API

Projeto simples de CRUD de usuários com backend em PHP puro, armazenamento em arquivo JSON e frontend em Vite.

## Estrutura

```text
crud-api/
  crud-api/       Backend PHP (api)
  frontend/       Frontend Vite
```

## Dados locais

O arquivo usado pela API em desenvolvimento e produção local é:

```text
crud-api/data/data.json
```

Esse arquivo não deve ser versionado. Para criar o arquivo local a partir do exemplo:

```bash
cp crud-api/data/data.example.json crud-api/data/data.json
```

Estrutura esperada:

```json
{
    "nextId": 1,
    "users": []
}
```

## Executando com Docker

### Backend

```bash
cd crud-api
docker compose up --build
```

API disponível em:

```text
http://localhost:8000/api/users
```

### Frontend

Antes de construir a imagem do frontend, gere o build:

```bash
cd frontend
npm install
npm run build
docker compose up --build
```

Frontend disponível em:

```text
http://localhost:8080
```

## Executando o frontend em desenvolvimento

```bash
cd frontend
npm install
npm run dev
```

Por padrão, o frontend consome a API em:

```text
http://localhost:8000/api/users
```

## Documentacao da API

Com o backend rodando, a documentação interativa da API fica disponível em:

```text
http://localhost:8000/docs
```

A interface usa Swagger UI e carrega a especificação OpenAPI em:

```text
http://localhost:8000/docs/openapi.yaml
```

## Endpoints

### Listar usuarios

```http
GET /api/users
```

### Criar usuario

```http
POST /api/users
Content-Type: application/json
```

```json
{
    "name": "Maria",
    "age": 30,
    "email": "maria@email.com"
}
```

### Atualizar usuario

```http
PUT /api/users?id=1
Content-Type: application/json
```

```json
{
    "name": "Maria Silva",
    "age": 31,
    "email": "maria.silva@email.com"
}
```

### Atualizar parcialmente

```http
PATCH /api/users?id=1
Content-Type: application/json
```

```json
{
    "age": 32
}
```

### Remover usuario

```http
DELETE /api/users?id=1
```


