document.addEventListener('DOMContentLoaded', () => {
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', (event) => {
            event.preventDefault(); // Prevent default form submission

            // Create a FormData object to collect form data
            const formData = new FormData(contactForm);

            // Send the form data using Fetch API
            fetch('contact.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(result => {
                alert('Message sent successfully');
                console.log(result);
                contactForm.reset(); // Reset the form fields after successful submission
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while sending your message.');
            });
        });
    }
});
