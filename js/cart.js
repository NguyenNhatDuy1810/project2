function selectAll() {
    document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => checkbox.checked = true);
    updateTotal();
}

function deselectAll() {
    document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => checkbox.checked = false);
    updateTotal();
}

function updateTotal() {
    let total = 0;
    const items = document.querySelectorAll('#cart-items tr');
    items.forEach(item => {
        const checkbox = item.querySelector('input[type="checkbox"]');
        const quantityInput = item.querySelector('input[type="number"]');
        const priceText = item.querySelector('td:nth-child(4)').innerText;
        const price = parseFloat(priceText.replace(/\D/g, ''));
        const quantity = parseInt(quantityInput.value);
        if (checkbox.checked) {
            total += price * quantity;
        }
    });
    document.getElementById('total-price').innerText = total.toLocaleString() + ' VNĐ';
}

