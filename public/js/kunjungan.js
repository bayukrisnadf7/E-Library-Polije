    function updateTime() {
        const now = new Date();
        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const seconds = now.getSeconds().toString().padStart(2, '0');
        const formattedTime = `${hours}:${minutes}:${seconds}`;
        
        document.getElementById('current-time').textContent = formattedTime;
    }

    // Perbarui waktu setiap detik
    setInterval(updateTime, 1000);

    // Panggil pertama kali agar tidak menunggu 1 detik
    updateTime();

