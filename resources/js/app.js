document.addEventListener('DOMContentLoaded', () => {
    const search = document.querySelector('#tableSearch');
    const status = document.querySelector('#statusFilter');
    const table = document.querySelector('#maintenanceTable');
    function filterRows() {
        if (!table) return;
        const term = (search?.value || '').toLowerCase();
        const chosenStatus = status?.value || '';
        table.querySelectorAll('tbody tr').forEach(row => {
            const matchesTerm = row.innerText.toLowerCase().includes(term);
            const matchesStatus = !chosenStatus || row.innerText.includes(chosenStatus);
            row.hidden = !(matchesTerm && matchesStatus);
        });
    }
    search?.addEventListener('input', filterRows);
    status?.addEventListener('change', filterRows);

    document.querySelectorAll('[data-demo-form]').forEach(form => {
        form.addEventListener('submit', event => {
            event.preventDefault();
            if (!form.reportValidity()) return;
            alert('Formulário de demonstração. Para salvar os dados, conecte esta tela a uma rota Laravel e ao banco de dados.');
        });
    });

    document.querySelector('#exportCsv')?.addEventListener('click', () => {
        const rows = [
            ['Código', 'Problema', 'Solicitante', 'Setor', 'Prioridade', 'Status', 'Data'],
            ['MPR-104', 'Projetor não liga', 'Mariana Costa', 'Sala 12', 'Alta', 'Em andamento', '19/10/2026'],
            ['MPR-103', 'Vazamento na torneira', 'Pedro Alves', 'Banheiro', 'Média', 'Aberto', '18/10/2026'],
            ['MPR-102', 'Computador sem conexão', 'Lucas Santos', 'Laboratório', 'Baixa', 'Concluído', '17/10/2026']
        ];
        const csv = rows.map(row => row.map(value => '"' + String(value).replaceAll('"', '""') + '"').join(';')).join('\\r\\n');
        const blob = new Blob(['\\ufeff' + csv], {type: 'text/csv;charset=utf-8;'});
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url; a.download = 'relatorio-mpr-demonstrativo.csv'; a.click();
        URL.revokeObjectURL(url);
    });
});