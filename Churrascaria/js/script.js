  $nome = document.getElementById('nome');
    $turma = document.getElementById('turma');
    $tipo_churrasco = document.getElementById('tipo_churrasco');
    $presenca_confirmada = document.getElementById('presenca_confirmada');

    document.querySelector('form').addEventListener('submit', function(event) {
        if (!$nome.value || !$turma.value || !$tipo_churrasco.value || !$presenca_confirmada.value) {
            alert('Por favor, preencha todos os campos obrigatórios.');
            event.preventDefault();
        }
    });