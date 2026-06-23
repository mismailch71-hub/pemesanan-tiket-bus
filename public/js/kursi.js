document.addEventListener('DOMContentLoaded', function() {
    const maxKursi = 6;
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');

    checkboxes.forEach(cb => {
        cb.addEventListener('change', () => {
            const checkedCount = document.querySelectorAll('input[type="checkbox"]:checked').length;

            if (checkedCount > maxKursi) {
                cb.checked = false;
                alert('Maksimal pemesanan adalah 6 kursi!');
                return;
            }

            checkboxes.forEach(checkbox => {
                if (!checkbox.checked && checkedCount >= maxKursi) {
                    checkbox.disable = true;
                    checkbox.nextElementSibling.classList.add('disabled');
                } else {
                    checkbox.disabled = false;
                    checkbox.nextElementSibling.classList.remove('disabled');
                }
            });
        });
    });
});
