🧩 IncluiEdu — Sistema de Acompanhamento Educacional Inclusivo

«Projeto em desenvolvimento 🚧»

Sistema web desenvolvido para auxiliar instituições de ensino no registro, organização e acompanhamento de observações realizadas durante a rotina escolar de alunos autistas.

O projeto está passando por uma reengenharia de software, evoluindo de um protótipo inicial para uma aplicação web estruturada em Python, com API REST, PostgreSQL, autenticação, controle de acesso, auditoria e recursos de análise de dados.

---

📌 Sobre o Projeto

Durante a rotina escolar, professores e profissionais de apoio podem observar diferentes situações relacionadas à participação, interação, comunicação, atividades pedagógicas, transições e outras situações do cotidiano do aluno.

Muitas dessas informações acabam sendo registradas de maneira dispersa em:

- Cadernos;
- Planilhas;
- Mensagens;
- Relatórios;
- Anotações individuais.

O objetivo deste sistema é centralizar essas informações em uma plataforma web, permitindo que os registros sejam estruturados, armazenados, consultados e analisados ao longo do tempo.

A proposta é criar uma base histórica que facilite a comunicação entre:

- 🏫 Escola;
- 👨‍🏫 Professores;
- 👩‍💼 Profissionais de apoio;
- 👨‍👩‍👧 Responsáveis;
- 🧑‍⚕️ Profissionais autorizados.

---

🎯 Objetivo

O objetivo principal é desenvolver uma plataforma capaz de registrar observações escolares estruturadas, permitindo acompanhar informações como:

- Contexto da atividade;
- Evento observado;
- Intensidade;
- Duração aproximada;
- Estratégia utilizada;
- Resultado observado;
- Observações adicionais;
- Data e horário.

O sistema deverá possibilitar a construção de uma base histórica de dados escolares, permitindo posteriormente a geração de indicadores e relatórios.

«Importante: o sistema não tem como objetivo realizar diagnóstico médico ou psicológico. Seu objetivo é registrar e organizar observações realizadas no ambiente escolar.»

---

🚧 Status do Projeto

EM DESENVOLVIMENTO

O projeto encontra-se atualmente na fase de Engenharia de Software e Reengenharia da aplicação existente.

A primeira versão foi desenvolvida como um protótipo utilizando PHP.

A nova versão será construída utilizando uma arquitetura moderna baseada em Python e API REST.

Roadmap atual

FASE 0  ███░░░░░░░  Análise do sistema existente
FASE 1  ░░░░░░░░░░  Engenharia de requisitos
FASE 2  ░░░░░░░░░░  Casos de uso
FASE 3  ░░░░░░░░░░  Arquitetura de software
FASE 4  ░░░░░░░░░░  Modelagem do banco
FASE 5  ░░░░░░░░░░  Segurança e LGPD
FASE 6  ░░░░░░░░░░  Desenvolvimento Backend
FASE 7  ░░░░░░░░░░  Autenticação
FASE 8  ░░░░░░░░░░  Gestão escolar
FASE 9  ░░░░░░░░░░  Registro de observações
FASE 10 ░░░░░░░░░░  Dashboard
FASE 11 ░░░░░░░░░░  Testes
FASE 12 ░░░░░░░░░░  Docker
FASE 13 ░░░░░░░░░░  CI/CD
FASE 14 ░░░░░░░░░░  Deploy
FASE 15 ░░░░░░░░░░  Analytics

---

🏗️ Arquitetura Planejada

A nova versão será construída seguindo uma arquitetura baseada em API REST.

                    ┌─────────────────────┐
                    │       Usuários      │
                    │ Escola / Pais /     │
                    │ Profissionais       │
                    └──────────┬──────────┘
                               │
                               ▼
                    ┌─────────────────────┐
                    │      Frontend       │
                    │    Aplicação Web    │
                    └──────────┬──────────┘
                               │
                               │ HTTPS
                               ▼
                    ┌─────────────────────┐
                    │      FastAPI        │
                    │      REST API       │
                    └──────────┬──────────┘
                               │
                ┌──────────────┼──────────────┐
                │              │              │
                ▼              ▼              ▼
          Autenticação     Regras de       Serviços
                           Negócio
                │              │              │
                └──────────────┼──────────────┘
                               │
                               ▼
                    ┌─────────────────────┐
                    │     SQLAlchemy      │
                    │         ORM         │
                    └──────────┬──────────┘
                               │
                               ▼
                    ┌─────────────────────┐
                    │     PostgreSQL      │
                    └─────────────────────┘

---

🛠️ Tecnologias

Backend

- 🐍 Python
- ⚡ FastAPI
- Pydantic
- SQLAlchemy
- Alembic

Banco de Dados

- 🐘 PostgreSQL

Testes

- Pytest
- HTTPX

Segurança

- OAuth2 / JWT
- RBAC
- Hash seguro de senhas
- Auditoria
- Controle de permissões

Infraestrutura

- Docker
- Docker Compose

Versionamento

- Git
- GitHub

CI/CD

- GitHub Actions

---

👥 Perfis de Usuário

A aplicação deverá trabalhar com diferentes níveis de acesso.

Administrador

Responsável pela administração da escola e dos usuários.

Professor

Responsável pelo registro e acompanhamento das informações dos alunos sob sua responsabilidade.

Profissional de Apoio

Poderá registrar observações e consultar informações autorizadas.

Responsável

Poderá consultar as informações disponibilizadas pela escola.

Profissional Externo

Poderá acessar somente informações para as quais possuir autorização.

Auditor

Responsável pela consulta dos registros de auditoria.

---

📋 Funcionalidades Planejadas

Gestão Escolar

- [ ] Cadastro de escolas
- [ ] Cadastro de turmas
- [ ] Cadastro de usuários
- [ ] Controle de perfis
- [ ] Controle de permissões

Gestão de Alunos

- [ ] Cadastro de alunos
- [ ] Associação à turma
- [ ] Associação de responsáveis
- [ ] Associação de profissionais autorizados

Observações

- [ ] Registro de observações
- [ ] Contexto da atividade
- [ ] Evento observado
- [ ] Intensidade
- [ ] Duração
- [ ] Estratégia utilizada
- [ ] Resultado
- [ ] Observação livre
- [ ] Data e horário

Histórico

- [ ] Consulta do histórico
- [ ] Filtro por período
- [ ] Filtro por contexto
- [ ] Filtro por evento
- [ ] Filtro por intensidade

Dashboard

- [ ] Indicadores
- [ ] Gráficos
- [ ] Análise temporal
- [ ] Relatórios
- [ ] Exportação

Segurança

- [ ] Autenticação
- [ ] Autorização
- [ ] RBAC
- [ ] Auditoria
- [ ] Logs
- [ ] Controle de acesso aos dados

---

📊 Estrutura dos Registros

Um dos principais objetivos do projeto é evitar que as informações sejam armazenadas somente como texto livre.

Exemplo:

Aluno:
João

Contexto:
Atividade pedagógica

Evento:
Dificuldade durante transição

Intensidade:
2

Duração:
10 minutos

Estratégia:
Acompanhamento individual

Resultado:
Retorno à atividade

Observação:
Aluno necessitou de suporte adicional durante a mudança da atividade.

Os dados estruturados permitirão futuramente realizar análises utilizando:

- SQL;
- Python;
- Pandas;
- Power BI;
- Estatística;
- Data Analytics.

---

📈 Indicadores Futuros

Com a evolução do projeto, poderão ser disponibilizados indicadores como:

- Quantidade de observações;
- Observações por período;
- Observações por contexto;
- Eventos registrados;
- Distribuição de intensidade;
- Duração média;
- Estratégias utilizadas;
- Resultados observados;
- Evolução temporal.

Os indicadores terão caráter descritivo, não diagnóstico.

---

🔐 Segurança e Privacidade

O sistema poderá trabalhar com informações relacionadas a crianças e adolescentes e, dependendo dos dados registrados, informações pessoais sensíveis.

Por esse motivo, segurança e privacidade serão consideradas desde a arquitetura.

Serão adotados conceitos como:

- Privacy by Design;
- Security by Design;
- princípio do menor privilégio;
- minimização de dados;
- controle de acesso;
- autenticação;
- autorização;
- auditoria;
- rastreabilidade;
- proteção de credenciais;
- backups.

A implementação definitiva das regras de tratamento de dados deverá ser validada com os responsáveis institucionais e jurídicos do projeto.

---

🗄️ Modelo de Dados Inicial

A estrutura deverá contemplar entidades como:

schools
users
students
guardians
professionals
classrooms
school_years

student_guardians
student_professionals
student_classrooms

observations
observation_contexts
observation_events
observation_strategies
observation_results

audit_logs
access_permissions
consents

O modelo definitivo será desenvolvido durante a fase de modelagem do banco de dados.

---

🔌 API

A aplicação utilizará uma API REST versionada.

Exemplo:

/api/v1/

Endpoints planejados:

POST /api/v1/auth/login

GET  /api/v1/students
POST /api/v1/students

GET  /api/v1/observations
POST /api/v1/observations

GET  /api/v1/observations/{id}

GET  /api/v1/reports/observations

GET  /api/v1/dashboard

A documentação da API será disponibilizada através do OpenAPI/Swagger.

---

🧪 Testes

O projeto terá testes automatizados utilizando:

Pytest
HTTPX

Serão implementados:

- Testes unitários;
- Testes de integração;
- Testes de API;
- Testes de autenticação;
- Testes de autorização;
- Testes das principais regras de negócio.

---

🐳 Docker

A aplicação será preparada para execução utilizando containers.

Arquitetura inicial:

Docker Compose
│
├── API
│
└── PostgreSQL

---

🔄 CI/CD

Será implementado posteriormente um pipeline utilizando GitHub Actions.

Fluxo planejado:

Git Push
   ↓
Pull Request
   ↓
GitHub Actions
   ↓
Testes
   ↓
Lint
   ↓
Security Checks
   ↓
Docker Build
   ↓
Deploy

---

📁 Estrutura Planejada

Projeto-de-Sistema-escolar-para-alunos-especiais/
│
├── app/
│   ├── api/
│   ├── core/
│   ├── models/
│   ├── schemas/
│   ├── repositories/
│   ├── services/
│   └── main.py
│
├── tests/
│
├── migrations/
│
├── docs/
│
├── scripts/
│
├── .env.example
├── .gitignore
├── Dockerfile
├── docker-compose.yml
├── requirements.txt
└── README.md

A estrutura atual poderá ser modificada durante a reengenharia.

---

🧠 Engenharia de Software

O desenvolvimento seguirá uma abordagem baseada em Engenharia de Software.

Principais etapas:

Levantamento de requisitos
        ↓
Análise
        ↓
Modelagem
        ↓
Arquitetura
        ↓
Implementação
        ↓
Testes
        ↓
Code Review
        ↓
Documentação
        ↓
Deploy

Serão considerados princípios como:

- SOLID;
- Clean Code;
- Separation of Concerns;
- DRY;
- KISS;
- Security by Design;
- Privacy by Design;
- testes automatizados;
- versionamento;
- documentação técnica.

---

🗺️ Roadmap

Fase| Descrição| Status
0| Análise do sistema atual| 🚧 Em andamento
1| Engenharia de Requisitos| ⏳ Pendente
2| Casos de Uso| ⏳ Pendente
3| Arquitetura| ⏳ Pendente
4| Modelagem do Banco| ⏳ Pendente
5| Segurança e LGPD| ⏳ Pendente
6| Backend FastAPI| ⏳ Pendente
7| Autenticação| ⏳ Pendente
8| Gestão Escolar| ⏳ Pendente
9| Registro de Observações| ⏳ Pendente
10| Dashboard| ⏳ Pendente
11| Testes| ⏳ Pendente
12| Docker| ⏳ Pendente
13| CI/CD| ⏳ Pendente
14| Deploy| ⏳ Pendente
15| Analytics| 🔮 Futuro

---

🚧 Projeto em Desenvolvimento

Este repositório não representa ainda a versão final do sistema.

A aplicação está sendo desenvolvida de forma incremental e passará por uma reestruturação arquitetural.

O objetivo é transformar o protótipo inicial em uma aplicação web profissional utilizando Python.

Durante o desenvolvimento poderão ocorrer:

- mudanças na arquitetura;
- alterações no modelo de dados;
- criação de novos módulos;
- alteração de endpoints;
- refatorações;
- mudanças de tecnologias auxiliares;
- mudanças na estrutura de diretórios.

---

🎓 Objetivo Técnico

Além do objetivo funcional, este projeto também está sendo utilizado como projeto prático de desenvolvimento profissional em:

- Engenharia de Software;
- Python Backend;
- FastAPI;
- APIs REST;
- PostgreSQL;
- SQLAlchemy;
- Modelagem de Dados;
- Segurança;
- LGPD;
- Testes automatizados;
- Docker;
- Git/GitHub;
- CI/CD;
- Data Analytics.

---

🔮 Visão de Futuro

Após a conclusão do MVP, o sistema poderá evoluir para uma plataforma mais ampla de acompanhamento escolar e análise de dados.

Possíveis evoluções:

Sistema Web
    ↓
API
    ↓
PostgreSQL
    ↓
Data Analytics
    ↓
Dashboard
    ↓
Data Warehouse
    ↓
BI

Também poderão ser estudadas futuramente integrações com outras plataformas educacionais e recursos de inteligência artificial para tarefas auxiliares, sempre respeitando as limitações de finalidade, privacidade, segurança e uso responsável dos dados.

---

⚠️ Aviso Importante

Este projeto é uma ferramenta tecnológica de apoio ao acompanhamento escolar.

Os registros realizados no sistema não devem ser utilizados isoladamente para diagnóstico médico, diagnóstico psicológico ou qualquer outra avaliação clínica.

O sistema tem como finalidade organizar informações observadas no ambiente escolar.

---

📚 Documentação

A documentação de Engenharia de Software será mantida no diretório:

docs/

Documentos planejados:

docs/
│
├── 01-visao-geral-projeto.md
├── 02-srs.md
├── 03-casos-de-uso.md
├── 04-arquitetura.md
├── 05-modelo-dados-conceitual.md
├── 06-modelo-dados-logico.md
├── 07-modelo-dados-fisico.md
├── 08-seguranca.md
├── 09-lgpd.md
├── 10-api.md
├── 11-testes.md
└── 12-deploy.md

---

👨‍💻 Desenvolvimento

Projeto desenvolvido como parte da evolução profissional em desenvolvimento de software, com foco em:

Python Backend + Engenharia de Software + Dados + APIs + PostgreSQL.

---

📌 Status

🚧 PROJETO EM DESENVOLVIMENTO

Versão atual: 0.1.0
Status: Engenharia de Software
Backend planejado: Python + FastAPI
Database planejado: PostgreSQL

---

⭐ Objetivo do Repositório

Construir, passo a passo, uma aplicação web profissional, documentada e escalável para apoiar escolas no registro e acompanhamento estruturado de observações realizadas durante a rotina escolar de alunos autistas.

