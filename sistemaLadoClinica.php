<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapeamento Comportamental TEA - Avançado</title>
    <!-- Bibliotecas para exportação e gráficos -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        :root {
            --primary-color: #2A75D3;
            --primary-light: #EBF3FC;
            --secondary-color: #4CAF50;
            --danger-color: #dc3545;
            --warning-color: #ffc107;
            --text-color: #333333;
            --bg-color: #F4F7FA;
            --card-bg: #FFFFFF;
            --border-color: #DDE4EE;
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

        /* Botão de Emergência / Registro Rápido */
        .btn-panic {
            position: absolute;
            right: 20px;
            top: 20px;
            background-color: var(--danger-color);
            color: white;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); box-shadow: 0 0 0 0 rgba(220, 53, 69, 0.4); }
            70% { transform: scale(1.05); box-shadow: 0 0 0 10px rgba(220, 53, 69, 0); }
            100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(220, 53, 69, 0); }
        }

        /* Sistema de Abas */
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
            margin: 15px 0 10px 0;
            color: #555;
            font-size: 1.1rem;
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
            color: #444;
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
        .btn-secondary { background-color: #6c757d; }
        .btn-danger { background-color: var(--danger-color); }

        /* Widget de Cronômetro Clínico */
        .timer-box {
            background: var(--primary-light);
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 20px;
            border: 1px dashed var(--primary-color);
        }

        #timer-display {
            font-size: 2.2rem;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        /* Seção de Gráficos */
        .chart-container {
            position: relative;
            margin: 20px 0;
            height: 300px;
            width: 100%;
        }

        /* Tabelas */
        .table-responsive {
            overflow-x: auto;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
        }

        th {
            background-color: var(--primary-light);
            color: var(--primary-color);
        }

        blockquote {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
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
            background: #f8f9fa;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            border-left: 4px solid var(--primary-color);
        }

        @media (max-width: 768px) {
            header { padding-top: 70px; }
            .btn-panic { position: block; width: 100%; right: 0; top: 10px; margin-bottom: 15px; }
            .form-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<div class="container">
    <header>
        <h1>Mapeamento Comportamental TEA</h1>
        <p>Análise Behaviorista Baseada no Protocolo Clínico ABC</p>
        <button class="btn btn-panic" id="quick-trigger" onclick="dispararRegistroRapido()">🚨 Registro Rápido (Crise)</button>
    </header>

    <!-- Notificação Flutuante de Crise Ativa -->
    <div id="panic-bar" class="timer-box" style="display:none; background: #fdf2f2; border-color: var(--danger-color);">
        <h3 style="color: var(--danger-color); margin: 0;">⚠️ MODO DE CRISE ATIVO</h3>
        <p>O sistema está contabilizando a duração em tempo real. Acalme a criança primeiro.</p>
        <div id="panic-timer" style="font-size: 2rem; font-weight: bold; color: var(--danger-color);">00:00:00</div>
        <button class="btn btn-danger" onclick="salvarRegistroRapido()">Salvar e Preencher Detalhes</button>
    </div>

    <div class="tabs">
        <button class="tab-btn active" onclick="switchTab('cadastro')">1. Prontuário & Cadastros</button>
        <button class="tab-btn" onclick="switchTab('registro')">2. Registro ABC</button>
        <button class="tab-btn" onclick="switchTab('historico')">3. Histórico e Dados Brutos</button>
        <button class="tab-btn" onclick="switchTab('relatorios')">4. Painel Analítico & Laudos</button>
        <button class="tab-btn" onclick="switchTab('config')">⚙️ Segurança (Backup)</button>
    </div>

    <!-- ABA 1: CADASTROS BASE -->
    <div id="cadastro" class="tab-content active">
        <h2>Informações Regulamentares do Prontuário</h2>
        <form id="form-cadastro" onsubmit="salvarCadastros(event)">
            <h3>Dados do Profissional Assistente</h3>
            <div class="form-grid">
                <div class="form-group">
                    <label>Nome Clínico</label>
                    <input type="text" id="prof-nome" required placeholder="Ex: Dr. Marcelo Rocha">
                </div>
                <div class="form-group">
                    <label>Registro Profissional</label>
                    <input type="text" id="prof-registro" required placeholder="Ex: CRP 06/12345">
                </div>
            </div>

            <h3>Responsável Legal</h3>
            <div class="form-grid">
                <div class="form-group">
                    <label>Nome do Responsável</label>
                    <input type="text" id="resp-nome" required placeholder="Ex: Roberto Alencar">
                </div>
                <div class="form-group">
                    <label>Parentesco / Vínculo</label>
                    <input type="text" id="resp-parentesco" required placeholder="Ex: Pai, Tutor">
                </div>
            </div>

            <h3>Identificação do Paciente (Criança)</h3>
            <div class="form-grid">
                <div class="form-group">
                    <label>Nome Completo</label>
                    <input type="text" id="crianca-nome" required placeholder="Ex: Henrique Alencar">
                </div>
                <div class="form-group">
                    <label>Data de Nascimento</label>
                    <input type="date" id="crianca-nascimento" required>
                </div>
                <div class="form-group">
                    <label>CID do Laudo / Diagnóstico</label>
                    <input type="text" id="crianca-diagnostico" placeholder="Ex: CID 11 - 6A02">
                </div>
            </div>
            <button type="submit" class="btn">Atualizar Dados de Vínculo</button>
        </form>
    </div>

    <!-- ABA 2: REGISTRO ABC -->
    <div id="registro" class="tab-content">
        <h2>Registro Comportamental Funcional (Metodologia ABA)</h2>
        
        <div class="timer-box">
            <p>Cronômetro de Sessão Terapêutica / Observação</p>
            <div id="timer-display">00:00:00</div>
            <button type="button" class="btn btn-secondary" id="btn-timer" onclick="toggleTimer()">Iniciar Cronômetro</button>
        </div>

        <form id="form-comportamento" onsubmit="adicionarComportamento(event)">
            <h3>Variáveis Ambientais e Cronologia</h3>
            <div class="form-grid">
                <div class="form-group">
                    <label>Data</label>
                    <input type="date" id="comp-data" required>
                </div>
                <div class="form-group">
                    <label>Horário de Início</label>
                    <input type="time" id="comp-hora" required>
                </div>
                <div class="form-group">
                    <label>Duração Total (minutos)</label>
                    <input type="number" id="comp-duracao" min="1" required placeholder="Ex: 8">
                </div>
            </div>

            <h3>Fatores Biológicos Cruzados (Check-in do Dia)</h3>
            <div class="form-grid">
                <div class="form-group">
                    <label>Qualidade do Sono na Noite Anterior</label>
                    <select id="bio-sono">
                        <option value="Regular/Bom">Dormiu bem (Estável)</option>
                        <option value="Agitado">Sono Agitado/Acordou de madrugada</option>
                        <option value="Insônia">Privação de Sono / Menos de 6h</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Administração da Medicação</label>
                    <select id="bio-medicacao">
                        <option value="Rotina Correta">Em dia / Conforme Prescrição</option>
                        <option value="Atrasada/Esquecida">Atrasou ou Não Administrada hoje</option>
                        <option value="Não faz uso">Paciente não utiliza fitoterápicos/medicamentos</option>
                    </select>
                </div>
            </div>

            <h3>Tríade de Análise de Comportamento (A-B-C)</h3>
            <div class="form-grid">
                <div class="form-group">
                    <label>A - Antecedente / Gatilho Precursor</label>
                    <select id="comp-gatilho" required>
                        <option value="Quebra de Rotina / Transição">Quebra de Rotina / Transição</option>
                        <option value="Hipersensibilidade Sensorial (Som/Luz)">Hipersensibilidade Sensorial (Som/Luz)</option>
                        <option value="Negativa / Ordem dada">Negativa / Ordem dada ("Não")</option>
                        <option value="Sobrecarga de Demandas">Sobrecarga de Demandas</option>
                        <option value="Fadiga / Fome">Fadiga / Fome</option>
                        <option value="Espontâneo / Sem causa aparente">Espontâneo / Sem causa aparente</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>B - Tipo de Comportamento Alvo</label>
                    <select id="comp-tipo" required>
                        <option value="Estereotipia Motora/Vocal">Estereotipia Motora/Vocal</option>
                        <option value="Crise / Meltdown">Crise / Meltdown (Desregulação Emocional)</option>
                        <option value="Comportamento Autoagressivo">Comportamento Autoagressivo</option>
                        <option value="Heteroagressividade">Heteroagressividade</option>
                        <option value="Ecolalia Incontrolável">Ecolalia Incontrolável</option>
                        <option value="Fuga / Esquiva de tarefa">Fuga / Esquiva de tarefa</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>C - Consequência / Conduta Adotada</label>
                    <select id="comp-consequencia" required>
                        <option value="Direcionamento / Substituição de estímulo">Direcionamento / Substituição de estímulo</option>
                        <option value="Retirada para ambiente calmo (Time-in)">Retirada para ambiente calmo (Time-in)</option>
                        <option value="Acolhimento Físico e Co-regulação">Acolhimento Físico e Co-regulação</option>
                        <option value="Acesso cedido ao objeto desejado">Acesso cedido ao objeto desejado</option>
                        <option value="Ignorou o comportamento estrategicamente">Ignorou o comportamento estrategicamente</option>
                    </select>
                </div>
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <label>Intensidade da Resposta</label>
                    <select id="comp-intensidade" required>
                        <option value="Leve">Leve (Criança se autorregula rápido)</option>
                        <option value="Moderada">Moderada (Exige intervenção direta)</option>
                        <option value="Severa">Severa (Risco físico ou longa duração)</option>
                    </select>
                </div>
                <div class="form-group" style="grid-column: span 2;">
                    <label>Observações Clínicas Adicionais</label>
                    <textarea id="comp-descricao" rows="2" placeholder="Descreva traços sutis, expressões, comunicação não-verbal..."></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Salvar Registro Clínico Completo</button>
        </form>
    </div>

    <!-- ABA 3: HISTÓRICO -->
    <div id="historico" class="tab-content">
        <h2>Prontuário de Dados Históricos Local</h2>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Data/Hora</th>
                        <th>Tipo (B)</th>
                        <th>Antecedente (A)</th>
                        <th>Consequência (C)</th>
                        <th>Duração</th>
                        <th>Sono</th>
                        <th>Med.</th>
                    </tr>
                </thead>
                <tbody id="lista-comportamentos"></tbody>
            </table>
        </div>
    </div>

    <!-- ABA 4: RELATÓRIOS E GRÁFICOS -->
    <div id="relatorios" class="tab-content">
        <h2>Painel Analítico de Evolução Clínico-Médica</h2>
        
        <div class="form-grid" style="align-items: flex-end;">
            <div class="form-group">
                <label>Mapear Janela Temporal</label>
                <select id="filtro-periodo" onchange="processarRelatorioCompleto()">
                    <option value="7">Visão Semanal (Últimos 7 dias)</option>
                    <option value="30">Visão Mensal (Últimos 30 dias)</option>
                    <option value="365">Acompanhamento Anual (Últimos 365 dias)</option>
                </select>
            </div>
            <div class="form-group" style="flex-direction:row; gap:10px;">
                <button class="btn" onclick="exportarGradeExcel()">Exportar Excel legítimo</button>
                <button class="btn btn-success" onclick="gerarLaudoImpressoPDF()">Gerar PDF Clínico</button>
            </div>
        </div>

        <!-- Dashboard Gráfico -->
        <div class="chart-container">
            <canvas id="evolucaoChart"></canvas>
        </div>

        <!-- Área Consolidada para Impressão -->
        <div id="printable-report" class="report-print-area">
            <div style="border-bottom: 2px solid var(--primary-color); padding-bottom: 10px; margin-bottom: 20px;">
                <h2 style="border:none; margin:0; text-align: center;">LAUDO DE MAPEAMENTO EVOLUTIVO COMPORTAMENTAL - TEA</h2>
                <p style="text-align: center; font-size:0.85rem; color:#666;">Documento gerado digitalmente via Sistema de Triagem Unificada</p>
            </div>

            <div class="summary-box">
                <h3>Identificação do Paciente e Vinculo Terapêutico</h3>
                <div class="form-grid" style="margin:0; row-gap:5px;">
                    <div><strong>Criança:</strong> <span id="rep-crianca">--</span></div>
                    <div><strong>Nascimento:</strong> <span id="rep-nascimento">--</span></div>
                    <div><strong>Diagnóstico Base:</strong> <span id="rep-diagnostico">--</span></div>
                    <div><strong>Responsável Legal:</strong> <span id="rep-responsavel">--</span> (<span id="rep-parentesco">--</span>)</div>
                    <div><strong>Profissional Responsável:</strong> <span id="rep-profissional">--</span></div>
                    <div><strong>Registro Ativo:</strong> <span id="rep-registro">--</span></div>
                </div>
            </div>

            <div class="form-grid">
                <div class="summary-box" style="border-left-color: var(--secondary-color);">
                    <h4>Total de Ocorrências no Período</h4>
                    <p style="font-size: 1.8rem; font-weight: bold; color: var(--secondary-color);" id="stat-total">0</p>
                </div>
                <div class="summary-box" style="border-left-color: var(--warning-color);">
                    <h4>Média de Duração Estimada</h4>
                    <p style="font-size: 1.8rem; font-weight: bold; color: #e0a800;" id="stat-duracao">0 min</p>
                </div>
            </div>

            <h3>Linha do Tempo Cronológica (Eventos Computados)</h3>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Data/Hora</th>
                            <th>Comportamento (B)</th>
                            <th>Antecedente (A)</th>
                            <th>Consequência (C)</th>
                            <th>Duração</th>
                            <th>Intensidade</th>
                        </tr>
                    </thead>
                    <tbody id="lista-relatorio-corpo"></tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- ABA 5: SEGURANÇA E BACKUP -->
    <div id="config" class="tab-content">
        <h2>Segurança dos Dados e Backups (Conformidade Geral)</h2>
        <blockquote>
            <strong>Atenção Profissionais e Pais:</strong> Como este sistema prioriza a privacidade e não envia dados dos menores para servidores externos, todas as informações estão salvas localmente neste computador/navegador. Faça backup regularmente!
        </blockquote>
        <div style="display: flex; gap:15px; flex-wrap: wrap;">
            <button class="btn" onclick="exportarBackupJSON()">⬇️ Exportar Arquivo de Backup (.json)</button>
            <button class="btn btn-secondary" onclick="document.getElementById('input-backup').click()">⬆️ Importar Arquivo de Backup (.json)</button>
            <input type="file" id="input-backup" style="display: none;" accept=".json" onchange="importarBackupJSON(event)">
        </div>
    </div>
</div>

<script>
    let dbCadastros = JSON.parse(localStorage.getItem('tea_pro_cadastros')) || {};
    let dbComportamentos = JSON.parse(localStorage.getItem('tea_pro_comportamentos')) || [];
    
    let timerInterval, timerSeconds = 0, timerRunning = false;
    let panicInterval, panicSeconds = 0, panicRunning = false;
    let meuGrafico = null;

    window.onload = function() {
        document.getElementById('comp-data').valueAsDate = new Date();
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
        localStorage.setItem('tea_pro_cadastros', JSON.stringify(dbCadastros));
        alert('Prontuário atualizado com sucesso!');
    }

    function carregarFormularios() {
        if(dbCadastros.profNome) {
            document.getElementById('prof-nome').value = dbCadastros.profNome;
            document.getElementById('prof-registro').value = dbCadastros.profRegistro;
            document.getElementById('resp-nome').value = dbCadastros.respNome;
            document.getElementById('resp-parentesco').value = dbCadastros.respParentesco;
            document.getElementById('crianca-nome').value = dbCadastros.criancaNome;
            document.getElementById('crianca-nascimento').value = dbCadastros.criancaNascimento;
            document.getElementById('crianca-diagnostico').value = dbCadastros.criancaDiagnostico;
        }
    }

    // Cronômetro Normal
    function toggleTimer() {
        const btn = document.getElementById('btn-timer');
        if (!timerRunning) {
            timerRunning = true; btn.innerText = "Parar Emissão"; btn.style.backgroundColor = "var(--danger-color)";
            timerInterval = setInterval(() => {
                timerSeconds++;
                document.getElementById('timer-display').innerText = formatarTimer(timerSeconds);
            }, 1000);
        } else {
            clearInterval(timerInterval); timerRunning = false; btn.innerText = "Iniciar Cronômetro"; btn.style.backgroundColor = "var(--secondary-color)";
            document.getElementById('comp-duracao').value = Math.max(1, Math.round(timerSeconds / 60));
            timerSeconds = 0;
        }
    }

    // 4. MODO DE CRISE (Registro Rápido)
    function dispararRegistroRapido() {
        if(panicRunning) return;
        panicRunning = true;
        panicSeconds = 0;
        document.getElementById('panic-bar').style.display = 'block';
        document.getElementById('quick-trigger').disabled = true;
        
        panicInterval = setInterval(() => {
            panicSeconds++;
            document.getElementById('panic-timer').innerText = formatarTimer(panicSeconds);
        }, 1000);
    }

    function salvarRegistroRapido() {
        clearInterval(panicInterval);
        panicRunning = false;
        document.getElementById('panic-bar').style.display = 'none';
        document.getElementById('quick-trigger').disabled = false;

        const agora = new Date();
        document.getElementById('comp-data').valueAsDate = agora;
        document.getElementById('comp-hora').value = agora.toLocaleTimeString('pt-BR', {hour: '2-digit', minute:'2-digit'});
        document.getElementById('comp-duracao').value = Math.max(1, Math.round(panicSeconds / 60));
        document.getElementById('comp-tipo').value = "Crise / Meltdown";
        
        switchTab('registro');
        alert('O tempo foi capturado! Por favor, complete as informações do protocolo ABC agora.');
    }

    function formatarTimer(totalSegundos) {
        let hrs = Math.floor(totalSegundos / 3600);
        let mins = Math.floor((totalSegundos - (hrs * 3600)) / 60);
        let secs = totalSegundos % 60;
        return `${String(hrs).padStart(2,'0')}:${String(mins).padStart(2,'0')}:${String(secs).padStart(2,'0')}`;
    }

    // Adição de Registros
    function adicionarComportamento(e) {
        e.preventDefault();
        const novo = {
            id: Date.now(),
            data: document.getElementById('comp-data').value,
            hora: document.getElementById('comp-hora').value,
            duracao: parseInt(document.getElementById('comp-duracao').value),
            tipo: document.getElementById('comp-tipo').value,
            gatilho: document.getElementById('comp-gatilho').value,
            consequencia: document.getElementById('comp-consequencia').value,
            intensidade: document.getElementById('comp-intensidade').value,
            sono: document.getElementById('bio-sono').value,
            medicacao: document.getElementById('bio-medicacao').value,
            descricao: document.getElementById('comp-descricao').value || ''
        };

        dbComportamentos.push(novo);
        localStorage.setItem('tea_pro_comportamentos', JSON.stringify(dbComportamentos));
        
        document.getElementById('form-comportamento').reset();
        document.getElementById('comp-data').valueAsDate = new Date();
        document.getElementById('timer-display').innerText = "00:00:00";
        
        atualizarVisualizacoes();
        alert('Comportamento registrado e acoplado ao prontuário médico.');
    }

    function atualizarVisualizacoes() {
        const tbody = document.getElementById('lista-comportamentos');
        tbody.innerHTML = '';
        const ordenados = [...dbComportamentos].sort((a,b) => new Date(b.data) - new Date(a.data));

        ordenados.forEach(item => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${formatarDataBR(item.data)} às ${item.hora}</td>
                <td><strong>${item.tipo}</strong></td>
                <td>${item.gatilho}</td>
                <td>${item.consequencia}</td>
                <td>${item.duracao} min</td>
                <td>${item.sono}</td>
                <td>${item.medicacao}</td>
            `;
            tbody.appendChild(tr);
        });
    }

    function formatarDataBR(str) {
        if(!str) return '--/--/----';
        const [a, m, d] = str.split('-'); return `${d}/${m}/${a}`;
    }

    // 2. PROCESSAMENTO DO RELATÓRIO E GRÁFICOS (Chart.js)
    function processarRelatorioCompleto() {
        // Atualiza cabeçalhos textuais do laudo
        document.getElementById('rep-crianca').innerText = dbCadastros.criancaNome || 'Não Preenchido';
        document.getElementById('rep-nascimento').innerText = formatarDataBR(dbCadastros.criancaNascimento);
        document.getElementById('rep-diagnostico').innerText = dbCadastros.criancaDiagnostico || 'Não Informado';
        document.getElementById('rep-responsavel').innerText = dbCadastros.respNome || '--';
        document.getElementById('rep-parentesco').innerText = dbCadastros.respParentesco || '--';
        document.getElementById('rep-profissional').innerText = dbCadastros.profNome || '--';
        document.getElementById('rep-registro').innerText = dbCadastros.profRegistro || '--';

        const diasFiltro = parseInt(document.getElementById('filtro-periodo').value);
        const dataCorte = new Date();
        dataCorte.setDate(dataCorte.getDate() - diasFiltro);

        const filtrados = dbComportamentos.filter(item => new Date(item.data) >= dataCorte)
                                          .sort((a,b) => new Date(a.data) - new Date(b.data));

        const tbody = document.getElementById('lista-relatorio-corpo');
        tbody.innerHTML = '';

        if(filtrados.length === 0) {
            tbody.innerHTML = `<tr><td colspan="6" style="text-align:center; color:#999;">Nenhuma amostragem de dados para o período estipulado.</td></tr>`;
            document.getElementById('stat-total').innerText = '0';
            document.getElementById('stat-duracao').innerText = '0 min';
            renderizarGraficoTendencia([], []);
            return;
        }

        let totalDuracao = 0;
        let contagemDatas = {};

        filtrados.forEach(item => {
            totalDuracao += item.duracao;
            const dataBr = formatarDataBR(item.data);
            contagemDatas[dataBr] = (contagemDatas[dataBr] || 0) + 1;

            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${dataBr} ${item.hora}</td>
                <td><strong>${item.tipo}</strong></td>
                <td>${item.gatilho}</td>
                <td>${item.consequencia}</td>
                <td>${item.duracao} min</td>
                <td><span style="font-weight:600">${item.intensidade}</span></td>
            `;
            tbody.appendChild(tr);
        });

        document.getElementById('stat-total').innerText = filtrados.length;
        document.getElementById('stat-duracao').innerText = Math.round(totalDuracao / filtrados.length) + ' min';

        // Dispara a plotagem do gráfico
        renderizarGraficoTendencia(Object.keys(contagemDatas), Object.values(contagemDatas));
    }

    function renderizarGraficoTendencia(labels, data) {
        const ctx = document.getElementById('evolucaoChart').getContext('2d');
        if(meuGrafico) meuGrafico.destroy();

        meuGrafico = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Volume de Comportamentos Registrados',
                    data: data,
                    borderColor: '#2A75D3',
                    backgroundColor: 'rgba(42, 117, 211, 0.1)',
                    borderWidth: 3,
                    tension: 0.3,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } }
            }
        });
    }

    // EXPORTAÇÕES (Excel & PDF)
    function exportarGradeExcel() {
        if(dbComportamentos.length === 0) return alert('Sem dados brutos para exportação.');
        
        const estruturado = dbComportamentos.map(item => ({
            'Data': formatarDataBR(item.data),
            'Horário': item.hora,
            'Duração (min)': item.duracao,
            'Comportamento (B)': item.tipo,
            'Antecedente (A)': item.gatilho,
            'Consequência (C)': item.consequencia,
            'Intensidade': item.intensidade,
            'Status do Sono': item.sono,
            'Status Medicação': item.medicacao,
            'Anotações Adicionais': item.descricao
        }));

        const wb = XLSX.utils.book_new();
        const ws = XLSX.utils.json_to_sheet(estruturado);
        XLSX.utils.book_append_sheet(wb, ws, "Mapeamento Comportamental");
        XLSX.writeFile(wb, `Laudo_Clinico_Mapeamento_TEA.xlsx`);
    }

    function gerarLaudoImpressoPDF() {
        alert('Compilando motor gráfico html2canvas para laudo em PDF. Aguarde...');
        const alvo = document.getElementById('printable-report');
        
        html2canvas(alvo, { scale: 2 }).then(canvas => {
            const { jsPDF } = window.jspdf;
            const pdf = new jsPDF('p', 'mm', 'a4');
            const imgData = canvas.toDataURL('image/png');
            
            const widthA4 = 210;
            const heightA4 = 297;
            const imgHeight = (canvas.height * widthA4) / canvas.width;
            
            pdf.addImage(imgData, 'PNG', 0, 0, widthA4, imgHeight);
            pdf.save(`Laudo_Clinico_TEA_${dbCadastros.criancaNome || 'Paciente'}.pdf`);
        });
    }

    // 5. SISTEMA DE BACKUP (JSON)
    function exportarBackupJSON() {
        const pacote = { cadastros: dbCadastros, comportamentos: dbComportamentos };
        const dataStr = "data:text/json;charset=utf-8," + encodeURIComponent(JSON.stringify(pacote));
        const downloadAnchor = document.createElement('a');
        downloadAnchor.setAttribute("href", dataStr);
        downloadAnchor.setAttribute("download", `BACKUP_SISTEMA_TEA_${Date.now()}.json`);
        document.body.appendChild(downloadAnchor);
        downloadAnchor.click();
        downloadAnchor.remove();
    }

    function importarBackupJSON(event) {
        const reader = new FileReader();
        reader.onload = function(e) {
            try {
                const importado = JSON.parse(e.target.result);
                if(importado.cadastros && importado.comportamentos) {
                    dbCadastros = importado.cadastros;
                    dbComportamentos = importado.comportamentos;
                    localStorage.setItem('tea_pro_cadastros', JSON.stringify(dbCadastros));
                    localStorage.setItem('tea_pro_comportamentos', JSON.stringify(dbComportamentos));
                    
                    carregarFormularios();
                    atualizarVisualizacoes();
                    alert('Backup restaurado e sincronizado com total sucesso!');
                    switchTab('cadastro');
                } else {
                    alert('Formato de arquivo inválido. Verifique se o arquivo JSON foi gerado por este sistema.');
                }
            } catch (err) {
                alert('Erro ao processar arquivo de backup.');
            }
        };
        reader.readAsText(event.target.files[0]);
    }
</script>

</body>
</html>