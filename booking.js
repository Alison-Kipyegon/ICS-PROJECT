document.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    const menuId = urlParams.get('menuId');
    document.getElementById('menuId').value = menuId;
});

function submitBooking() {
    const formData = new FormData(document.getElementById('bookingForm'));
    
    fetch('submit_booking.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Booking confirmed. Check your email for details.');
            window.location.href = 'index.html';
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => console.error('Error:', error));
}