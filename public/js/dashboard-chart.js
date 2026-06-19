document.addEventListener("DOMContentLoaded", function() {
    const ctx = document.getElementById('chartPendapatan').getContext('2d');
    
    // Pastikan variabel grafikData sudah dideklarasikan di view
    if (typeof grafikData !== 'undefined') {
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: grafikData.labels,
                datasets: [{
                    label: 'Pendapatan (Rp)',
                    data: grafikData.data,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    }
});