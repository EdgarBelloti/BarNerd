document.getElementById("reservationForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Evita que o formulário seja enviado automaticamente

    // Obter os valores dos campos de entrada
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var date = document.getElementById("date").value;
    var time = document.getElementById("time").value;
    var guests = document.getElementById("guests").value;

    // Aqui você pode adicionar a lógica para enviar os dados da reserva para o servidor
    // Por exemplo, você pode fazer uma solicitação AJAX para um endpoint no seu servidor

    // Exemplo de exibição da confirmação de reserva
    var reservationStatus = document.getElementById("reservationStatus");
    reservationStatus.innerHTML = "Reserva confirmada para " + name + " no dia " + date + " às " + time + " para " + guests + " convidado(s).";
    reservationStatus.style.display = "block";
});
