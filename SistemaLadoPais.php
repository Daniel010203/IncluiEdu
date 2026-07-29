<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diário Comportamental TEA - Linha de Cuidado Familiar</title>
    <!-- Bibliotecas para exportação e gráficos -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        :root {
            --primary-color: #0288D1;
            --primary-light: #E1F5FE;
            --secondary-color: #4CAF50;
            --danger-color: #E53935;
            --warning-color: #FFB300;
            --text-color: #263238;
            --bg-color: #F5F7FA;
            --card-bg: #FFFFFF;
            --border-color: #CFD8DC;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            line-height: 1.6;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        header {
            text-align: center;
            margin-bottom: 25px;
            padding: 20px;
            background: var(--card-bg);
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            border-top: 5px solid var(--primary-color);
            position: relative;
        }

        header h1 {
            color: var(--primary-color);
            font-size: 1.8rem;
            margin-bottom: 5px;
        }

        .btn-panic {
            position: absolute;
            right: 20px;
            top: 20px;
            background-color: var(--danger-color);
            color: white;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); box-shadow: 0 0 0 0 rgba(229, 57, 53, 0.4); }
            70% { transform: scale(1.05); box-shadow: 0 0 0 10px rgba(229, 57, 53, 0); }
            100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(229, 57, 53, 0); }
        }

        .tabs {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            overflow-x: auto;
            padding-bottom: 5px;
        }

        .tab-btn {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            padding: 12px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            color: #555;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .tab-btn.active {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        .tab-content {
            display: none;
            background: var(--card-bg);
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }

        .tab-content.active {
            display: block;
        }

        h2 {
            color: var(--primary-color);
            margin-bottom: 20px;
            font-size: 1.4rem;
            border-bottom: 2px solid var(--primary-light);
            padding-bottom: 8px;
        }

        h3 {
            margin: 20px 0 10px 0;
            color: #37474F;
            font-size: 1.1rem;
            background: var(--primary-light);
            padding: 6px 12px;
            border-radius: 4px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 6px;
            color: #455A64;
        }

        input, select, textarea {
            padding: 10px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            font-size: 0.95rem;
            background-color: #FCFDFE;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            background-color: #fff;
        }

        .btn {
            background-color: var(--primary-color);
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.95rem;
            transition: background 0.2s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn:hover { opacity: 0.9; }
        .btn-success { background-color: var(--secondary-color); }
        .btn-secondary { background-color: #607D8B; }
        .btn-danger { background-color: var(--danger-color); }

        .timer-box {
            background: #FFF9C4;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 20px;
            border: 1px dashed var(--warning-color);
        }

        .chart-container {
            position: relative;
            margin: 20px 0;
            height: 300px;
            width: 100%;
        }

        .table-responsive {
            overflow-x: auto;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.85rem;
        }

        th, td {
            padding: 10px 12px;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
        }

        th {
            background-color: var(--primary-light);
            color: #01579B;
        }

        blockquote {
            background: #ECEFF1;
            border-left: 4px solid #607D8B;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
            font-size: 0.95rem;
        }

        .report-print-area {
            padding: 25px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            background: #fff;
        }

        .summary-box {
            background: #F8F9FA;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            border-left: 4px solid var(--primary-color);
        }

        .impact-positivo { color: var(--secondary-color); font-weight: bold; }
        .impact-negativo { color: var(--danger-color); font-weight: bold; }

        @media (max-width: 768px) {
            header { padding-top: 70px; }
            .btn-panic { width: 100%; right: 0; top: 10px; margin-bottom: 15px; }
            .form-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<div class="container">
    <header>
        <h1>Diário Comportamental Familiar (TEA)</h1>
        <p>Compartilhamento de Rotina com Médicos, Terapeutas e Escola</p>
        <button class="btn btn-panic" id="quick-trigger" onclick="dispararRegistroRapido()">🚨 Iniciou uma Crise em Casa</button>
    </header>

    <!-- Notificação de Crise Ativa no Lar -->
    <div id="panic-bar" class="timer-box" style="display:none; background: #FFEBEE; border-color: var(--danger-color);">
        <h3 style="color: var(--danger-color); margin: 0; background:none; padding:0;">⚠️ ACOMPANHANDO CRISE EM TEMPO REAL</h3>
        <p style="color: #c62828;">Foque no acolhimento e na segurança física do seu filho. O cronômetro está registrando.</p>
        <div id="panic-timer" style="font-size: 2.2rem; font-weight: bold; color: var(--danger-color); margin: 10px 0;">00:00:00</div>
        <button class="btn btn-danger" onclick="salvarRegistroRapido()">Crise Passou (Preencher Relatório)</button>
    </div>

    <div class="tabs">
        <button class="tab-btn active" onclick="switchTab('cadastro')">1. Dados da Família e Clínicos</button>
        <button class="tab-btn" onclick="switchTab('registro')">2. Registro de Rotina & Crises</button>
        <button class="tab-btn" onclick="switchTab('escola')">3. Monitoramento Escolar</button>
        <button class="tab-btn" onclick="switchTab('historico')">4. Histórico Geral</button>
        <button class="tab-btn" onclick="switchTab('relatorios')">5. Painel Médico (Relatórios)</button>
        <button class="tab-btn" onclick="switchTab('config')">⚙️ Backup</button>
    </div>

    <!-- ABA 1: DADOS DA FAMÍLIA E TRATAMENTOS -->
    <div id="cadastro" class="tab-content active">
        <h2>Identificação e Histórico de Tratamentos</h2>
        <form id="form-cadastro" onsubmit="salvarCadastros(event)">
            <h3>Dados do Responsável (Quem preenche)</h3>
            <div class="form-grid">
                <div class="form-group">
                    <label>Nome do Pai, Mãe ou Tutor</label>
                    <input type="text" id="resp-nome" required placeholder="Ex: Patrícia Alencar">
                </div>
                <div class="form-group">
                    <label>Grau de Parentesco</label>
                    <input type="text" id="resp-parentesco" required placeholder="Ex: Mãe">
                </div>
            </div>

            <h3>Profissionais de Saúde que Acompanham a Criança</h3>
            <div class="form-grid">
                <div class="form-group">
                    <label>Médico Responsável (Neurologista/Psiquiatra)</label>
                    <input type="text" id="prof-nome" required placeholder="Ex: Dr. Roberto Abreu (Neuropediatra)">
                </div>
                <div class="form-group">
                    <label>Terapeuta Principal (Fono, TO ou Psicólogo ABA)</label>
                    <input type="text" id="prof-registro" required placeholder="Ex: Mariana Costa (Psicóloga ABA)">
                </div>
            </div>

            <h3>Dados da Criança e Plano Terapêutico</h3>
            <div class="form-grid">
                <div class="form-group">
                    <label>Nome Completo do Filho(a)</label>
                    <input type="text" id="crianca-nome" required placeholder="Ex: Gustavo Alencar">
                </div>
                <div class="form-group">
                    <label>Data de Nascimento</label>
                    <input type="date" id="crianca-nascimento" required>
                </div>
                <div class="form-group">
                    <label>Remédios Contínuos Utilizados atualmente (Prescrição)</label>
                    <input type="text" id="crianca-diagnostico" placeholder="Ex: Risperidona 1mg pela manhã, Melatonina à noite">
                </div>
            </div>
            <button type="submit" class="btn">Salvar Dados Iniciais</button>
        </form>
    </div>

    <!-- ABA 2: REGISTRO DE ROTINA E CRISES (CASA) -->
    <div id="registro" class="tab-content">
        <h2>O que aconteceu em casa?</h2>
        <form id="form-comportamento" onsubmit="adicionarComportamento(event)">
            <h3>Informações Básicas</h3>
            <div class="form-grid">
                <div class="form-group">
                    <label>Data</label>
                    <input type="date" id="comp-data" required>
                </div>
                <div class="form-group">
                    <label>Horário do Evento</label>
                    <input type="time" id="comp-hora" required>
                </div>
                <div class="form-group">
                    <label>Duração Estimada do Comportamento (Minutos)</label>
                    <input type="number" id="comp-duracao" min="1" required placeholder="Ex: 10">
                </div>
            </div>

            <h3>Rotina Alimentar e Medicinal (Dia do Evento)</h3>
            <div class="form-grid">
                <div class="form-group">
                    <label>Como foi a Alimentação hoje?</label>
                    <select id="comp-alimentacao" required>
                        <option value="Normal">Comeu normalmente (Boa aceitação)</option>
                        <option value="Seletividade Ativa">Recusa alimentar / Alta Seletividade hoje</option>
                        <option value="Abaixo do normal">Comeu muito pouco</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Os remédios foram dados corretamente?</label>
                    <select id="comp-medicacao-status" required>
                        <option value="Sim, no horário">Sim, tomou todos os remédios na hora certa</option>
                        <option value="Não, esquecimento/recusa">Não tomou (Esquecimento ou a criança cuspiu/recusou)</option>
                        <option value="Horário alterado">Tomou, mas fora do horário padrão</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Qualidade do Sono (Noite anterior)</label>
                    <select id="comp-sono">
                        <option value="Dormiu bem">Dormiu bem / Noite estável</option>
                        <option value="Acordou de madrugada">Teve despertares durante a noite</option>
                        <option value="Insônia / Dormiu pouco">Insônia / Dormiu muito menos do que o habitual</option>
                    </select>
                </div>
            </div>

            <h3>Interferências e Gatilhos Externos</h3>
            <div class="form-grid">
                <div class="form-group">
                    <label>Houve alguma Interferência Externa (Fato fora do normal)?</label>
                    <select id="comp-interferencia" required>
                        <option value="Nenhuma">Não, dia seguiu a rotina padrão</option>
                        <option value="Quebra brusca de rotina">Quebra brusca de rotina (Visitas, viagem, passeio inesperado)</option>
                        <option value="Estímulo sensorial agressivo">Estímulo sensorial (Fogos de artifício, obra vizinha, som alto)</option>
                        <option value="Mudança de Clima/Temperatura">Clima extremo (Muito calor / Tempestade assustadora)</option>
                        <option value="Troca de cuidadores">Mudança de cuidador (Pai/Mãe viajou, terapeuta faltou)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Sinais de Alerta Antes da Crise (Melhoria: Pródromos)</label>
                    <select id="comp-prodromos">
                        <option value="Sem sinais claros">Apareceu de forma súbita</option>
                        <option value="Agitação motora/Flapping">Começou a andar de um lado para o outro / Flapping intenso</option>
                        <option value="Busca por isolamento">Começou a tapar os ouvidos ou se esconder antes</option>
                        <option value="Resistência verbal">Começou a choramingar ou repetir palavras fixamente</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>O que desencadeou o Comportamento?</label>
                    <input type="text" id="comp-gatilho" placeholder="Ex: Tirei o tablet da mão dele">
                </div>
            </div>

            <h3>O Comportamento em si e Acolhimento</h3>
            <div class="form-grid">
                <div class="form-group">
                    <label>Ação apresentada pela criança</label>
                    <select id="comp-tipo" required>
                        <option value="Crise de Choro / Desregulação Extrema">Crise de Choro / Desregulação Extrema</option>
                        <option value="Autoagressão (Se bater/arranhar)">Autoagressão (Se bater/arranhar)</option>
                        <option value="Heteroagressividade (Bater nos pais)">Heteroagressividade (Bater nos pais)</option>
                        <option value="Estereotipias muito intensas">Estereotipias muito intensas e fixas</option>
                        <option value="Fuga ou Isolamento completo">Fuga ou Isolamento completo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Intensidade percebida pelos pais</label>
                    <select id="comp-intensidade" required>
                        <option value="Leve">Leve (Acalmou em poucos minutos)</option>
                        <option value="Moderada">Moderada (Demandou muita técnica de regulação)</option>
                        <option value="Severa">Severa (Risco físico de machucado / Choro muito longo)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>O que vocês fizeram para acalmar a criança?</label>
                    <input type="text" id="comp-consequencia" placeholder="Ex: Abraço compressor e quarto escuro">
                </div>
            </div>

            <div class="form-group" style="margin-bottom: 25px;">
                <label>Escreva livremente observações que achar importantes para o Médico/Terapeuta</label>
                <textarea id="comp-descricao" rows="2" placeholder="Ex: Notei que ele ficou com o olhar fixo e demorou para responder aos comandos após se acalmar..."></textarea>
            </div>

            <button type="submit" class="btn btn-success">Salvar no Prontuário de Casa</button>
        </form>
    </div>

    <!-- ABA 3: MONITORAMENTO AMBIENTE ESCOLAR -->
    <div id="escola" class="tab-content">
        <h2>Espaço de Ocorrências e Alinhamento Escolar</h2>
        <p style="color: #546E7A; font-size:0.9rem; margin-bottom: 15px;">Use esta aba para passar a limpo os relatos da agenda escolar, do mediador (AT) ou da coordenação.</p>
        
        <form id="form-escola" onsubmit="adicionarEventoEscolar(event)">
            <div class="form-grid">
                <div class="form-group">
                    <label>Data do Evento na Escola</label>
                    <input type="date" id="esc-data" required>
                </div>
                <div class="form-group">
                    <label>Ação/Comportamento da Criança na Escola</label>
                    <select id="esc-acao" required>
                        <option value="Crise de Desregulação em Sala">Crise de Desregulação em Sala</option>
                        <option value="Isolamento no Recreio / Recusa Social">Isolamento no Recreio / Recusa Social</option>
                        <option value="Agressividade com Colegas/Mediador">Agressividade com Colegas/Mediador</option>
                        <option value="Recusa Escolar de Tarefa Pedagógica">Recusa Escolar de Tarefa Pedagógica</option>
                        <option value="Fuga do perímetro da sala/escola">Fuga do perímetro da sala/escola</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Medidas Adotadas pela Escola para tratar o assunto</label>
                    <input type="text" id="esc-medida" required placeholder="Ex: Levou para a sala de recursos / Chamou o mediador">
                </div>
                <div class="form-group">
                    <label>Impacto dessa conduta na criança</label>
                    <select id="esc-impacto" required>
                        <option value="Positivo">Positivo (A criança se regulou e voltou bem para a atividade)</option>
                        <option value="Negativo">Negativo (Piorou a crise / Gerou trauma ou fobia escolar)</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn">Registrar Dados Enviados pela Escola</button>
        </form>
    </div>

    <!-- ABA 4: HISTÓRICO GERAL -->
    <div id="historico" class="tab-content">
        <h2>Banco de Dados Consolidado (Familiar e Escolar)</h2>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Origem/Data</th>
                        <th>Ação Apresentada</th>
                        <th>Alimentação / Medicação</th>
                        <th>Interferência / Gatilho</th>
                        <th>Duração</th>
                        <th>Ações Adotadas / Impacto</th>
                    </tr>
                </thead>
                <tbody id="lista-comportamentos"></tbody>
            </table>
        </div>
    </div>

    <!-- ABA 5: PAINEL MÉDICO E RELATÓRIOS -->
    <div id="relatorios" class="tab-content">
        <h2>Relatório Evolutivo Orientado para Consultas Médicas</h2>
        
        <div class="form-grid" style="align-items: flex-end;">
            <div class="form-group">
                <label>Filtrar Histórico para a Consulta</label>
                <select id="filtro-periodo" onchange="processarRelatorioCompleto()">
                    <option value="7">Últimos 7 dias</option>
                    <option value="30">Últimos 30 dias (Mensal)</option>
                    <option value="365">Últimos 365 dias (Anual)</option>
                </select>
            </div>
            <div class="form-group" style="flex-direction:row; gap:10px;">
                <button class="btn" onclick="exportarGradeExcel()">Baixar Excel (.xlsx)</button>
                <button class="btn btn-success" onclick="gerarLaudoImpressoPDF()">Imprimir / Gerar PDF</button>
            </div>
        </div>

        <div class="chart-container">
            <canvas id="evolucaoChart"></canvas>
        </div>

        <!-- Prontuário para Exportação Gráfica -->
        <div id="printable-report" class="report-print-area">
            <div style="border-bottom: 2px solid var(--primary-color); padding-bottom: 10px; margin-bottom: 20px;">
                <h2 style="border:none; margin:0; text-align: center;">RELATÓRIO DE EVOLUÇÃO COMPORTAMENTAL DOMÉSTICA E ESCOLAR</h2>
                <p style="text-align: center; font-size:0.85rem; color:#666;">Documento estruturado por pais para auditoria de médicos assistentes</p>
            </div>

            <div class="summary-box">
                <h3>Cadastro Base do Paciente</h3>
                <div class="form-grid" style="margin:0; row-gap:5px;">
                    <div><strong>Criança:</strong> <span id="rep-crianca">--</span></div>
                    <div><strong>Nascimento:</strong> <span id="rep-nascimento">--</span></div>
                    <div><strong>Tratamento Medicamentoso Atual:</strong> <span id="rep-diagnostico">--</span></div>
                    <div><strong>Responsável Informante:</strong> <span id="rep-responsavel">--</span> (<span id="rep-parentesco">--</span>)</div>
                    <div><strong>Equipe Assistente:</strong> <span id="rep-profissional">--</span> | <span id="rep-registro">--</span></div>
                </div>
            </div>

            <div class="form-grid">
                <div class="summary-box" style="border-left-color: var(--secondary-color);">
                    <h4>Eventos Registrados em Casa</h4>
                    <p style="font-size: 1.8rem; font-weight: bold; color: var(--secondary-color);" id="stat-total">0</p>
                </div>
                <div class="summary-box" style="border-left-color: var(--primary-color);">
                    <h4>Eventos Registrados na Escola</h4>
                    <p style="font-size: 1.8rem; font-weight: bold; color: var(--primary-color);" id="stat-escola-total">0</p>
                </div>
            </div>

            <h3>Eventos Mapeados no Período</h3>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Origem / Data</th>
                            <th>Ação Registrada</th>
                            <th>Medicação / Alimentação</th>
                            <th>Fato Fora do Normal / Gatilho</th>
                            <th>Estratégia Adotada / Impacto</th>
                        </tr>
                    </thead>
                    <tbody id="lista-relatorio-corpo"></tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- ABA 6: CONFIGURAÇÕES E BACKUP -->
    <div id="config" class="tab-content">
        <h2>Segurança e Cópia de Prontuário</h2>
        <blockquote>
            Os dados sensíveis do seu filho não saem deste computador. Use as funções de exportação abaixo para transferir os dados de aparelho ou criar arquivos de segurança contra formatações.
        </blockquote>
        <div style="display: flex; gap:15px; flex-wrap: wrap;">
            <button class="btn" onclick="exportarBackupJSON()">⬇️ Exportar Backup do Diário (.json)</button>
            <button class="btn btn-secondary" onclick="document.getElementById('input-backup').click()">⬆️ Importar Backup (.json)</button>
            <input type="file" id="input-backup" style="display: none;" accept=".json" onchange="importarBackupJSON(event)">
        </div>
    </div>
</div>

<script>
    let dbCadastros = JSON.parse(localStorage.getItem('tea_pais_cadastros')) || {};
    let dbComportamentos = JSON.parse(localStorage.getItem('tea_pais_comportamentos')) || [];
    let dbEscola = JSON.parse(localStorage.getItem('tea_pais_escola')) || [];
    
    let panicInterval, panicSeconds = 0, panicRunning = false;
    let meuGrafico = null;

    window.onload = function() {
        document.getElementById('comp-data').valueAsDate = new Date();
        document.getElementById('esc-data').valueAsDate = new Date();
        document.getElementById('comp-hora').value = new Date().toLocaleTimeString('pt-BR', {hour: '2-digit', minute:'2-digit'});
        
        carregarFormularios();
        atualizarVisualizacoes();
    };

    function switchTab(tabId) {
        document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
        document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
        document.getElementById(tabId).classList.add('active');
        event.currentTarget.classList.add('active');

        if(tabId === 'relatorios') {
            setTimeout(processarRelatorioCompleto, 100);
        }
    }

    function salvarCadastros(e) {
        e.preventDefault();
        dbCadastros = {
            profNome: document.getElementById('prof-nome').value,
            profRegistro: document.getElementById('prof-registro').value,
            respNome: document.getElementById('resp-nome').value,
            respParentesco: document.getElementById('resp-parentesco').value,
            criancaNome: document.getElementById('crianca-nome').value,
            criancaNascimento: document.getElementById('crianca-nascimento').value,
            criancaDiagnostico: document.getElementById('crianca-diagnostico').value
        };
        localStorage.setItem('tea_pais_cadastros', JSON.stringify(dbCadastros));
        alert('Informações salvas! Prontas para sincronização.');
    }

    function carregarFormularios() {
        if(dbCadastros.respNome) {
            document.getElementById('prof-nome').value = dbCadastros.profNome;
            document.getElementById('prof-registro').value = dbCadastros.profRegistro;
            document.getElementById('resp-nome').value = dbCadastros.respNome;
            document.getElementById('resp-parentesco').value = dbCadastros.respParentesco;
            document.getElementById('crianca-nome').value = dbCadastros.criancaNome;
            document.getElementById('crianca-nascimento').value = dbCadastros.criancaNascimento;
            document.getElementById('crianca-diagnostico').value = dbCadastros.criancaDiagnostico;
        }
    }

    // Cronômetro Modo de Crise Doméstica
    function dispararRegistroRapido() {
        if(panicRunning) return;
        panicRunning = true; panicSeconds = 0;
        document.getElementById('panic-bar').style.display = 'block';
        document.getElementById('quick-trigger').disabled = true;
        
        panicInterval = setInterval(() => {
            panicSeconds++;
            let hrs = Math.floor(panicSeconds / 3600);
            let mins = Math.floor((panicSeconds - (hrs * 3600)) / 60);
            let secs = panicSeconds % 60;
            document.getElementById('panic-timer').innerText = `${String(hrs).padStart(2,'0')}:${String(mins).padStart(2,'0')}:${String(secs).padStart(2,'0')}`;
        }, 1000);
    }

    function salvarRegistroRapido() {
        clearInterval(panicInterval); panicRunning = false;
        document.getElementById('panic-bar').style.display = 'none';
        document.getElementById('quick-trigger').disabled = false;

        const agora = new Date();
        document.getElementById('comp-data').valueAsDate = agora;
        document.getElementById('comp-hora').value = agora.toLocaleTimeString('pt-BR', {hour: '2-digit', minute:'2-digit'});
        document.getElementById('comp-duracao').value = Math.max(1, Math.round(panicSeconds / 60));
        
        switchTab('registro');
        alert('Duração salva no formulário. Preencha agora as perguntas sobre alimentação e medicação.');
    }

    // Adicionar Evento de Casa
    function adicionarComportamento(e) {
        e.preventDefault();
        const novo = {
            id: 'CASA_' + Date.now(),
            origem: 'Casa',
            data: document.getElementById('comp-data').value,
            hora: document.getElementById('comp-hora').value,
            duracao: document.getElementById('comp-duracao').value + ' min',
            tipo: document.getElementById('comp-tipo').value,
            alimentacao: document.getElementById('comp-alimentacao').value,
            medicacao: document.getElementById('comp-medicacao-status').value,
            sono: document.getElementById('comp-sono').value,
            interferencia: document.getElementById('comp-interferencia').value,
            prodromos: document.getElementById('comp-prodromos').value,
            gatilho: document.getElementById('comp-gatilho').value || 'Não identificado',
            consequencia: document.getElementById('comp-consequencia').value,
            intensidade: document.getElementById('comp-intensidade').value,
            descricao: document.getElementById('comp-descricao').value || ''
        };

        dbComportamentos.push(novo);
        localStorage.setItem('tea_pais_comportamentos', JSON.stringify(dbComportamentos));
        document.getElementById('form-comportamento').reset();
        document.getElementById('comp-data').valueAsDate = new Date();
        
        atualizarVisualizacoes();
        alert('Diário de casa adicionado!');
    }

    // Adicionar Evento de Escola
    function adicionarEventoEscolar(e) {
        e.preventDefault();
        const novo = {
            id: 'ESCOLA_' + Date.now(),
            origem: 'Escola',
            data: document.getElementById('esc-data').value,
            hora: '--:--',
            duracao: '--',
            tipo: document.getElementById('esc-acao').value,
            alimentacao: 'Não monitorado',
            medicacao: 'Não monitorado',
            interferencia: 'Ambiente Escolar',
            gatilho: 'Contexto Pedagógico / Coletivo',
            consequencia: document.getElementById('esc-medida').value,
            impacto: document.getElementById('esc-impacto').value
        };

        dbEscola.push(novo);
        localStorage.setItem('tea_pais_escola', JSON.stringify(dbEscola));
        document.getElementById('form-escola').reset();
        document.getElementById('esc-data').valueAsDate = new Date();

        atualizarVisualizacoes();
        alert('Diário Escolar gravado com sucesso!');
    }

    function atualizarVisualizacoes() {
        const tbody = document.getElementById('lista-comportamentos');
        tbody.innerHTML = '';
        
        const todos = [...dbComportamentos, ...dbEscola].sort((a,b) => new Date(b.data) - new Date(a.data));

        todos.forEach(item => {
            const tr = document.createElement('tr');
            const classeImpacto = item.origem === 'Escola' ? `class="impact-${item.impacto.toLowerCase()}"` : '';
            const detalheImpacto = item.origem === 'Escola' ? `Impacto Escolar: ${item.impacto}` : item.consequencia;

            tr.innerHTML = `
                <td><strong>[${item.origem}]</strong><br>${formatarDataBR(item.data)}</td>
                <td>${item.tipo}</td>
                <td>Alim: ${item.alimentacao}<br>Med: ${item.medicacao}</td>
                <td>Gatilho: ${item.gatilho}<br><small style="color:#666">Fato Anormal: ${item.interferencia}</small></td>
                <td>${item.duracao}</td>
                <td ${classeImpacto}>${detalheImpacto}</td>
            `;
            tbody.appendChild(tr);
        });
    }

    function formatarDataBR(str) {
        if(!str) return '--/--/----'; const [a, m, d] = str.split('-'); return `${d}/${m}/${a}`;
    }

    // Processar Relatório Clínico Cruzado
    function processarRelatorioCompleto() {
        document.getElementById('rep-crianca').innerText = dbCadastros.criancaNome || 'Não Preenchido';
        document.getElementById('rep-nascimento').innerText = formatarDataBR(dbCadastros.criancaNascimento);
        document.getElementById('rep-diagnostico').innerText = dbCadastros.criancaDiagnostico || 'Não Informado';
        document.getElementById('rep-responsavel').innerText = dbCadastros.respNome || '--';
        document.getElementById('rep-parentesco').innerText = dbCadastros.respParentesco || '--';
        document.getElementById('rep-profissional').innerText = `${dbCadastros.profNome || '--'} e ${dbCadastros.profRegistro || '--'}`;

        const diasFiltro = parseInt(document.getElementById('filtro-periodo').value);
        const dataCorte = new Date(); dataCorte.setDate(dataCorte.getDate() - diasFiltro);

        const casaFiltrados = dbComportamentos.filter(item => new Date(item.data) >= dataCorte);
        const escolaFiltrados = dbEscola.filter(item => new Date(item.data) >= dataCorte);

        document.getElementById('stat-total').innerText = casaFiltrados.length;
        document.getElementById('stat-escola-total').innerText = escolaFiltrados.length;

        const unificados = [...casaFiltrados, ...escolaFiltrados].sort((a,b) => new Date(a.data) - new Date(b.data));
        const tbody = document.getElementById('lista-relatorio-corpo');
        tbody.innerHTML = '';

        let contagemDatas = {};

        unificados.forEach(item => {
            const dataBr = formatarDataBR(item.data);
            contagemDatas[dataBr] = (contagemDatas[dataBr] || 0) + 1;

            const tr = document.createElement('tr');
            const condutaExibida = item.origem === 'Escola' ? `<strong>Ação da Escola:</strong> ${item.consequencia} (<span class="impact-${item.impacto.toLowerCase()}">Impacto ${item.impacto}</span>)` : `<strong>Conduta Lar:</strong> ${item.consequencia}`;

            tr.innerHTML = `
                <td><strong>[${item.origem}]</strong><br>${dataBr}</td>
                <td>${item.tipo}</td>
                <td>Alim: ${item.alimentacao}<br>Med: ${item.medicacao}</td>
                <td>Gatilho: ${item.gatilho}<br><small style="color:#e65100">Fora do Normal: ${item.interferencia}</small></td>
                <td>${condutaExibida}</td>
            `;
            tbody.appendChild(tr);
        });

        renderizarGraficoTendencia(Object.keys(contagemDatas), Object.values(contagemDatas));
    }

    function renderizarGraficoTendencia(labels, data) {
        const ctx = document.getElementById('evolucaoChart').getContext('2d');
        if(meuGrafico) meuGrafico.destroy();
        meuGrafico = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Crises Combinadas (Casa + Escola)',
                    data: data,
                    backgroundColor: '#0288D1',
                    borderRadius: 4
                }]
            },
            options: { responsive: true, maintainAspectRatio: false }
        });
    }

    // Exportação de Documentos
    function exportarGradeExcel() {
        const consolidado = [
            ...dbComportamentos.map(i => ({...i, 'Estratégia/Impacto': i.consequencia})),
            ...dbEscola.map(i => ({...i, 'Estratégia/Impacto': `${i.consequencia} - Impacto: ${i.impacto}`}))
        ];
        
        const estruturado = consolidado.map(item => ({
            'Ambiente': item.origem,
            'Data': formatarDataBR(item.data),
            'Horário': item.hora,
            'Comportamento apresentado': item.tipo,
            'Alimentação': item.alimentacao,
            'Uso Correto de Remédios?': item.medicacao,
            'Interferência Externa (Fato Anormal)': item.interferencia,
            'Gatilho Direto': item.gatilho,
            'Ação Adotada e Impacto': item['Estratégia/Impacto']
        }));

        const wb = XLSX.utils.book_new();
        const ws = XLSX.utils.json_to_sheet(estruturado);
        XLSX.utils.book_append_sheet(wb, ws, "Prontuário Pais e Escola");
        XLSX.writeFile(wb, `Diario_TEA_Familiar_Escolar.xlsx`);
    }

    function gerarLaudoImpressoPDF() {
        const alvo = document.getElementById('printable-report');
        html2canvas(alvo, { scale: 2 }).then(canvas => {
            const { jsPDF } = window.jspdf;
            const pdf = new jsPDF('p', 'mm', 'a4');
            const imgHeight = (canvas.height * 210) / canvas.width;
            pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 0, 0, 210, imgHeight);
            pdf.save(`Diario_Clinico_TEA_Familiar.pdf`);
        });
    }

    // Gerenciador de Backup JSON
    function exportarBackupJSON() {
        const pacote = { cadastros: dbCadastros, comportamentos: dbComportamentos, escola: dbEscola };
        const dataStr = "data:text/json;charset=utf-8," + encodeURIComponent(JSON.stringify(pacote));
        const dl = document.createElement('a'); dl.setAttribute("href", dataStr);
        dl.setAttribute("download", `BACKUP_DIARIO_FAMILIAR_TEA.json`); dl.click();
    }

    function importarBackupJSON(e) {
        const reader = new FileReader();
        reader.onload = function(evt) {
            const data = JSON.parse(evt.target.result);
            if(data.comportamentos && data.escola) {
                dbCadastros = data.cadastros; dbComportamentos = data.comportamentos; dbEscola = data.escola;
                localStorage.setItem('tea_pais_cadastros', JSON.stringify(dbCadastros));
                localStorage.setItem('tea_pais_comportamentos', JSON.stringify(dbComportamentos));
                localStorage.setItem('tea_pais_escola', JSON.stringify(dbEscola));
                carregarFormularios(); atualizarVisualizacoes();
                alert('Tudo pronto! Prontuário familiar restaurado.');
            }
        };
        reader.readAsText(e.target.files[0]);
    }
</script>
</body>
</html>