<!-- Import Js Files -->
<script src="{{ URL::asset('build/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/simplebar/dist/simplebar.min.js') }}"></script>
<script src="{{ URL::asset('build/js/theme/app.init.js') }}"></script>
<script src="{{ URL::asset('build/js/theme/theme.js') }}"></script>
<script src="{{ URL::asset('build/js/theme/app.min.js') }}"></script>

<script src="{{ URL::asset('build/js/theme/sidebarmenu.js') }}"></script>

<!-- solar icons -->
<script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>

<script>
    // Toggle semua checkbox
    function toggleAll(source) {
        let checkboxes = document.querySelectorAll('.book-checkbox');
        checkboxes.forEach(cb => cb.checked = source.checked);
    }

    // Tandai semua manual
    function selectAll() {
        document.querySelectorAll('.book-checkbox').forEach(cb => cb.checked = true);
        document.getElementById('checkAll').checked = true;
    }

    // Hilangkan semua centang
    function deselectAll() {
        document.querySelectorAll('.book-checkbox').forEach(cb => cb.checked = false);
        document.getElementById('checkAll').checked = false;
    }

    // Hapus yang dicentang
    function deleteSelected() {
        let selected = [];
        document.querySelectorAll('.book-checkbox:checked').forEach(cb => {
            selected.push(cb.value);
        });

        if (selected.length === 0) {
            alert('Tidak ada buku yang dipilih!');
            return;
        }

        if (confirm('Yakin ingin menghapus ' + selected.length + ' buku terpilih?')) {
            // Kirim request ke route Laravel, misalnya pakai fetch atau arahkan ke URL
            // Contoh redirect dengan query string:
            window.location.href = '/admin/main/hapus-buku-massal?ids=' + selected.join(',');
        }
    }
</script>
