document.addEventListener('DOMContentLoaded', () => {
    const orderForm = document.getElementById('orderForm');
    if (orderForm) {
        orderForm.addEventListener('submit', (event) => {
            event.preventDefault(); // Prevent default form submission

            // Create a FormData object to collect form data
            const formData = new FormData(orderForm);

            // Send the form data using Fetch API
            fetch('order.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(result => {
                alert('Order submitted successfully');
                console.log(result);
                orderForm.reset(); // Reset the form fields after successful submission
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while submitting your order.');
            });
        });
    }
});
