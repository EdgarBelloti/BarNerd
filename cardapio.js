document.addEventListener('DOMContentLoaded', function() {
  // Selecionar os elementos do HTML
  const carrinhoBtns = document.querySelectorAll('.carrinho');
  const cartTable = document.querySelector('.cart-table tbody');
  const finalizarBtn = document.querySelector('.btn-finalizar');
  const totalPriceElement = document.getElementById('total-price');

  let total = 0;

  // Adicionar eventos de clique aos botões "Adicionar ao carrinho"
  carrinhoBtns.forEach(function(btn) {
    btn.addEventListener('click', function() {
      const cardapioItem = this.parentElement.parentElement;
      const itemName = cardapioItem.querySelector('.item-name').textContent;
      const itemPrice = parseFloat(cardapioItem.querySelector('.item-price').textContent.replace('$', '').replace(',', '.'));

      addItemToCart(itemName, itemPrice);
      updateTotalPrice();
    });
  });

  // Adicionar evento de clique aos botões "Remover"
  cartTable.addEventListener('click', function(event) {
    if (event.target.classList.contains('btn-remove')) {
      const cartItem = event.target.parentElement.parentElement;
      const itemName = cartItem.querySelector('.product-identification').textContent;

      removeItemFromCart(cartItem);
      updateTotalPrice();
    }
  });

  // Adicionar evento de clique ao botão "Finalizar Compra"
  finalizarBtn.addEventListener('click', function() {
    alert('Compra finalizada! Total: R$' + total.toFixed(2));
    clearCart();
    updateTotalPrice();
  });

  // Adicionar item ao carrinho
  function addItemToCart(itemName, itemPrice) {
    const cartRow = document.createElement('tr');
    cartRow.classList.add('cart-product');
    cartRow.innerHTML = `
      <td class="product-identification">${itemName}</td>
      <td class="product-price">R$${itemPrice.toFixed(2)}</td>
      <td>
        <input type="number" value="1" min="1" class="product-quantity">
        <button type="button" class="btn-remove">Remover</button>
      </td>
    `;
    cartTable.appendChild(cartRow);
  }

  // Remover item do carrinho
  function removeItemFromCart(cartItem) {
    cartItem.remove();
  }

  // Limpar carrinho
  function clearCart() {
    cartTable.innerHTML = '';
  }

  // Atualizar o preço total do carrinho
  function updateTotalPrice() {
    const cartItems = cartTable.querySelectorAll('.cart-product');
    total = 0;

    cartItems.forEach(function(item) {
      const itemPrice = parseFloat(item.querySelector('.product-price').textContent.substring(2));
      const itemQuantity = parseInt(item.querySelector('.product-quantity').value);
      total += itemPrice * itemQuantity;
    });

    totalPriceElement.textContent = 'R$' + total.toFixed(2);
  }
});
