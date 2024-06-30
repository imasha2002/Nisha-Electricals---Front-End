document.addEventListener("DOMContentLoaded", function() {
    fetch("php/get_promotions.php")
        .then(response => response.text())
        .then(html => {
            document.getElementById("promotions-list").innerHTML = html;
        })
        .catch(err => console.error("Error fetching promotions:", err));
});

// Countdown Timer Functionality
const updateTimers = () => {
    const timers = document.querySelectorAll('.timer');
    const now = new Date().getTime();

    timers.forEach(timer => {
        const endTime = new Date(timer.getAttribute('data-end-time')).getTime();
        const distance = endTime - now;

        if (distance < 0) {
            timer.textContent = 'Expired';
        } else {
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            timer.textContent = `${days}d ${hours}h ${minutes}m ${seconds}s`;
        }
    });
};

setInterval(updateTimers, 1000); // Update every second