/* public/js/dashboard.js */

// Menunggu hingga seluruh elemen DOM selesai dimuat agar canvas terbaca
document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById('chartPendapatan').getContext('2d');
    
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            datasets: [{
                label: 'Pemasukan Tiket (Rupiah)',
                data: [3200000, 4500000, 3900000, 6100000, 5200000, 8450000],
                borderColor: '#2b669a',
                backgroundColor: 'rgba(43, 102, 154, 0.1)',
                borderWidth: 3,
                tension: 0.3,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});