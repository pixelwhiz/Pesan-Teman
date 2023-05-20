$(document).ready(function() {
    $('#registerForm').submit(function(event) {
        event.preventDefault(); // Menghentikan pengiriman form secara default

        // Mendapatkan nilai input
        const name = $('#name').val();
        const password = $('#password').val();

        // Mengirim permintaan AJAX ke register.php
        $.post('register.php', { name: name, password: password }, function(response) {
            if (response.status) {
                Swal.fire({ text: 'Pendaftaran Berhasil', icon: 'success' });
            } else {
                Swal.fire({ text: 'Pendaftaran gagal. Silahkan periksa kembali data anda', icon: 'error' });
            }
        }, 'json');
    });
});
