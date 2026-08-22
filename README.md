🎓 IncluiEdu

Sistema de Acompanhamento Educacional Inclusivo

«Plataforma web para registro, acompanhamento, análise e geração de informações relacionadas ao acompanhamento educacional inclusivo.»

---

📌 Sobre o projeto

O IncluiEdu é uma plataforma desenvolvida com o objetivo de centralizar e organizar informações relacionadas ao acompanhamento de alunos no ambiente educacional.

A proposta surgiu da necessidade de substituir registros dispersos em cadernos, planilhas, mensagens e documentos, criando uma solução estruturada para registrar observações, acompanhar históricos, gerar indicadores e apoiar a tomada de decisão pedagógica.

O sistema foi pensado para permitir que profissionais autorizados registrem informações relacionadas ao cotidiano escolar e acompanhem sua evolução ao longo do tempo.

«⚠️ Importante: o IncluiEdu não possui finalidade de diagnóstico médico ou psicológico. O sistema é uma ferramenta de registro, acompanhamento e apoio à gestão educacional.»

---

🎯 Objetivos

O projeto tem como principais objetivos:

- Centralizar informações educacionais.
- Registrar observações de forma estruturada.
- Manter histórico dos apontamentos.
- Facilitar o acompanhamento da evolução dos registros.
- Disponibilizar indicadores e gráficos.
- Permitir análises semanais, mensais e anuais.
- Comparar diferentes períodos.
- Gerar relatórios em PDF.
- Facilitar a comunicação com responsáveis em situações autorizadas.
- Registrar e auditar operações importantes.
- Aplicar controle de acesso baseado em perfis e permissões.

---

🚀 Principais funcionalidades

👥 Gestão de usuários

- Cadastro de usuários.
- Perfis de acesso.
- Controle de permissões.
- Ativação e inativação.
- Associação com instituições.
- Controle de acesso por escopo.

Perfis previstos

- Administrador
- Professor
- Profissional de Apoio
- Responsável
- Profissional Externo
- Auditor

---

🏫 Gestão escolar

- Cadastro de instituições.
- Cadastro de turmas.
- Associação de alunos.
- Associação de profissionais.
- Organização da estrutura escolar.

---

👨‍🎓 Gestão de alunos

- Cadastro de alunos.
- Associação com turmas.
- Cadastro de responsáveis.
- Associação de profissionais autorizados.
- Histórico de acompanhamento.

---

📝 Registro de observações

O registro de observações é um dos principais recursos do IncluiEdu.

Cada apontamento poderá registrar informações como:

- Contexto da atividade.
- Evento observado.
- Intensidade.
- Duração.
- Estratégia utilizada.
- Resultado observado.
- Observações complementares.
- Data e horário.
- Profissional responsável pelo registro.

A estruturação dessas informações permite transformar registros individuais em dados que podem posteriormente ser analisados.

---

📊 Histórico e indicadores

O sistema permitirá consultar o histórico dos apontamentos utilizando diferentes filtros.

Filtros previstos

- Período.
- Contexto.
- Evento.
- Intensidade.
- Aluno.
- Turma.

Indicadores

Entre os indicadores previstos:

- Quantidade de apontamentos.
- Frequência dos eventos.
- Distribuição por contexto.
- Distribuição por evento.
- Distribuição por intensidade.
- Duração.
- Estratégias utilizadas.
- Resultados registrados.
- Evolução temporal.

---

📈 Análise temporal

O IncluiEdu deverá permitir análises em diferentes períodos:

Semanal

Acompanhamento dos registros realizados durante uma semana.

Mensal

Análise consolidada dos registros do mês.

Anual

Visão histórica dos registros ao longo do ano.

Comparativo

Possibilidade de comparar períodos diferentes, como:

Semana atual × Semana anterior

Mês atual × Mês anterior

Mês atual × Mesmo mês do ano anterior

Ano atual × Ano anterior

Período personalizado × Período personalizado

Os comparativos poderão apresentar:

- valores absolutos;
- diferenças;
- variações percentuais;
- gráficos comparativos.

---

📄 Relatórios

O sistema contará com um módulo específico para geração de relatórios.

Serão previstos:

- Relatórios semanais.
- Relatórios mensais.
- Relatórios anuais.
- Relatórios por período personalizado.
- Relatórios comparativos.

PDF

Os relatórios poderão ser exportados em PDF, contendo informações como:

- Identificação da instituição.
- Aluno, quando aplicável.
- Período analisado.
- Indicadores.
- Gráficos.
- Comparativos.
- Informações complementares.
- Data de geração.
- Usuário responsável pela geração.

---

🚨 Comunicação com responsáveis

O sistema também terá recursos para comunicação com responsáveis, especialmente em situações que demandem contato.

Os canais previstos são:

- 📧 E-mail
- 💬 WhatsApp

Comunicação emergencial

Usuários autorizados poderão iniciar uma comunicação classificada como emergencial.

O processo deverá contemplar:

1. Identificação do aluno.
2. Identificação do responsável.
3. Seleção do canal autorizado.
4. Registro do motivo.
5. Confirmação do destinatário.
6. Confirmação do envio.
7. Envio da comunicação.
8. Registro do resultado.
9. Auditoria da operação.

O sistema deverá registrar o status da comunicação, quando disponibilizado pelo serviço utilizado:

PENDENTE
ENVIADO
ENTREGUE
FALHA

A implementação deverá respeitar as autorizações de contato e as regras de segurança e privacidade definidas pelo sistema.

---

🔐 Segurança e privacidade

Como o sistema trabalha com informações relacionadas a alunos e responsáveis, segurança e privacidade fazem parte dos requisitos fundamentais do projeto.

Estão previstos:

- Autenticação.
- Autorização baseada em perfis.
- Controle granular de permissões.
- Princípio do menor privilégio.
- Proteção das credenciais.
- HTTPS em produção.
- Auditoria.
- Controle de acesso aos dados.
- Registro de operações críticas.
- Controle das comunicações.
- Políticas de retenção.
- Boas práticas relacionadas à LGPD.

---

🧩 Arquitetura

A arquitetura planejada para a nova versão do IncluiEdu será baseada em Laravel, utilizando uma abordagem modular e orientada à separação de responsabilidades.

                    ┌──────────────────────┐
                    │       IncluiEdu      │
                    └──────────┬───────────┘
                               │
                     ┌─────────▼─────────┐
                     │     Laravel 13    │
                     │                   │
                     │ Controllers       │
                     │ Services          │
                     │ Models / Eloquent │
                     │ Policies          │
                     │ Form Requests     │
                     │ Jobs              │
                     │ Events            │
                     └─────────┬─────────┘
                               │
                    ┌──────────▼──────────┐
                    │   Blade + Livewire  │
                    └──────────┬──────────┘
                               │
                    ┌──────────▼──────────┐
                    │     PostgreSQL      │
                    └─────────────────────┘

A aplicação poderá evoluir posteriormente para disponibilizar uma API REST para integrações externas e aplicações móveis.

---

🛠️ Stack tecnológica

Tecnologia| Utilização
PHP| Linguagem principal
Laravel| Framework backend/full-stack
Blade| Templates
Livewire| Interfaces interativas
Tailwind CSS| Interface
PostgreSQL| Banco de dados
Eloquent ORM| Persistência
Redis| Cache e filas
Docker| Containerização
Git| Controle de versão
GitHub Actions| CI/CD
Pest / PHPUnit| Testes automatizados

---

🏗️ Engenharia de Software

O desenvolvimento do IncluiEdu está sendo conduzido utilizando princípios de Engenharia de Software.

A documentação está sendo organizada em etapas:

Engenharia de Requisitos
        ↓
Casos de Uso
        ↓
Regras de Negócio
        ↓
Matriz de Responsabilidades
        ↓
Arquitetura
        ↓
Modelo Conceitual
        ↓
Modelo Lógico
        ↓
DER
        ↓
Banco de Dados
        ↓
Implementação
        ↓
Testes
        ↓
CI/CD
        ↓
Deploy

Essa abordagem tem como objetivo evitar que o desenvolvimento seja iniciado diretamente pelo código sem uma definição clara dos requisitos e das regras de negócio.

---

📋 Requisitos

O projeto possui uma Engenharia de Requisitos específica, contemplando:

- Requisitos Funcionais.
- Requisitos Não Funcionais.
- Regras de Negócio.
- Atores.
- Casos de Uso.
- Controle de acesso.
- Auditoria.
- Relatórios.
- Comunicação.
- Segurança.
- Privacidade.

---

🗂️ Principais módulos

IncluiEdu
│
├── Autenticação
│
├── Usuários
│
├── Perfis e Permissões
│
├── Escolas
│
├── Turmas
│
├── Alunos
│
├── Responsáveis
│
├── Profissionais
│
├── Observações
│
├── Histórico
│
├── Dashboard
│
├── Indicadores
│
├── Relatórios
│   ├── Semanal
│   ├── Mensal
│   ├── Anual
│   └── Comparativo
│
├── Exportação PDF
│
├── Comunicação
│   ├── E-mail
│   └── WhatsApp
│
└── Auditoria

---

🧪 Testes

O projeto terá cobertura de testes para as principais regras de negócio e funcionalidades.

Entre os testes previstos:

- Autenticação.
- Autorização.
- Cadastro de usuários.
- Cadastro de alunos.
- Registro de observações.
- Consulta de histórico.
- Cálculo de indicadores.
- Comparação entre períodos.
- Geração de relatórios.
- Exportação PDF.
- Comunicação.
- Comunicação emergencial.
- Auditoria.

---

🐳 Ambiente

O projeto será preparado para execução utilizando Docker.

Arquitetura prevista:

Docker
│
├── Laravel / PHP
│
├── PostgreSQL
│
└── Redis

O objetivo é facilitar:

- Desenvolvimento.
- Testes.
- Padronização do ambiente.
- Deploy.
- CI/CD.

---

🗺️ Roadmap

Fase 1 — Engenharia de Requisitos

- [x] Definição inicial do problema.
- [x] Definição dos objetivos.
- [x] Identificação dos atores.
- [x] Requisitos funcionais.
- [x] Requisitos não funcionais.
- [x] Regras de negócio.
- [x] Requisitos de relatórios.
- [x] Requisitos de comunicação.

Fase 2 — Análise e Modelagem

- [ ] Casos de Uso.
- [ ] Diagramas de Casos de Uso.
- [ ] Regras de negócio detalhadas.
- [ ] Matriz de responsabilidades.
- [ ] Modelo conceitual.
- [ ] Modelo lógico.
- [ ] DER.

Fase 3 — Banco de Dados

- [ ] Modelagem PostgreSQL.
- [ ] Migrations.
- [ ] Constraints.
- [ ] Índices.
- [ ] Seeds.
- [ ] Dados iniciais.

Fase 4 — Desenvolvimento

- [ ] Criar projeto Laravel.
- [ ] Configurar autenticação.
- [ ] Criar usuários.
- [ ] Criar perfis.
- [ ] Criar permissões.
- [ ] Criar escolas.
- [ ] Criar turmas.
- [ ] Criar alunos.
- [ ] Criar responsáveis.
- [ ] Criar observações.
- [ ] Criar histórico.
- [ ] Criar dashboard.

Fase 5 — Relatórios

- [ ] Relatório semanal.
- [ ] Relatório mensal.
- [ ] Relatório anual.
- [ ] Comparativos.
- [ ] Gráficos.
- [ ] Exportação PDF.

Fase 6 — Comunicação

- [ ] Serviço de comunicação.
- [ ] E-mail.
- [ ] Integração WhatsApp.
- [ ] Comunicação emergencial.
- [ ] Histórico de comunicações.
- [ ] Auditoria.

Fase 7 — Qualidade

- [ ] Testes unitários.
- [ ] Testes de integração.
- [ ] Testes de autorização.
- [ ] Testes de segurança.
- [ ] Testes de geração de relatórios.

Fase 8 — DevOps

- [ ] Docker.
- [ ] CI/CD.
- [ ] GitHub Actions.
- [ ] Ambiente de homologação.
- [ ] Ambiente de produção.
- [ ] Deploy.

---

📊 Status do projeto

Status atual: 🚧 Em desenvolvimento

O projeto encontra-se em fase de Engenharia de Requisitos e Arquitetura.

A implementação da nova arquitetura Laravel será iniciada após a conclusão da modelagem funcional e estrutural.

---

🎯 Objetivo de longo prazo

O objetivo é transformar o IncluiEdu em uma plataforma web modular, segura e escalável, capaz de apoiar instituições de ensino no acompanhamento educacional inclusivo.

A arquitetura deverá permitir futuramente:

- Aplicação mobile.
- API para integrações.
- Integração com sistemas escolares.
- Dashboards avançados.
- Analytics.
- Automação de relatórios.
- Novos canais de comunicação.
- Integrações com serviços externos.

---

👨‍💻 Autor

Daniel Vieira

Projeto desenvolvido como parte da minha jornada de transição e especialização na área de Tecnologia da Informação, aplicando conhecimentos de:

- Análise e Desenvolvimento de Sistemas.
- Engenharia de Software.
- Desenvolvimento Backend.
- Banco de Dados.
- PostgreSQL.
- Arquitetura de Sistemas.
- Análise de Dados.
- Segurança da Informação.

---

📄 Licença

A licença do projeto será definida durante a fase de publicação e disponibilização da versão inicial.

---

⭐ Projeto em desenvolvimento

O IncluiEdu é um projeto de estudo e desenvolvimento contínuo.

A evolução do projeto será documentada no próprio repositório, desde a Engenharia de Requisitos até a implementação, testes, containerização e deploy.