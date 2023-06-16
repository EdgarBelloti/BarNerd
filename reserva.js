document.getElementById("reservationForm").addEventListener("submit", function(event) {
  event.preventDefault(); // Evita que o formulário seja enviado automaticamente

  // Pegamos os valores de entrada 
  var nome = document.getElementById("nome").value;
  var email = document.getElementById("email").value;
  var data = document.getElementById("data").value;
  var horario = document.getElementById("horario").value;
  var convidados = document.getElementById("convidados").value;

  // Criamos um objeto FormData para enviar os dados via ajax
  var formData = new FormData();
  formData.append("nome", nome);
  formData.append("email", email);
  formData.append("data", data);
  formData.append("horario", horario);
  formData.append("convidados", convidados);

  // Criamos uma nova solicitação ajax 
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "reservamesas.RPC.php", true); //Fazemos o post dos dados via xhr 
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // Terminamos a solicitacao recebendo Status 200, o que significa que deu certo kkk
        var resposta = xhr.responseText;
        var statusReserva = document.getElementById("reservationStatus");
        alert(resposta);
      } else {
        // Se cair aqui aconteceu algum erro durante o processamento da requisicao ajax. 
        console.error("Erro na solicitação AJAX: " + xhr.status);
      }
    }
  };
  xhr.send(formData); //Envia a requisicao 
});
