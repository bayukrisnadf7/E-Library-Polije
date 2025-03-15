document.addEventListener("DOMContentLoaded", function () {
    function updateTime() {
        const timeElement = document.getElementById('current-time');
        if (!timeElement) return; // Jika elemen tidak ditemukan, hentikan eksekusi

        const now = new Date();
        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const seconds = now.getSeconds().toString().padStart(2, '0');
        const formattedTime = `${hours}:${minutes}:${seconds}`;

        timeElement.textContent = formattedTime;
    }

    setInterval(updateTime, 1000);
    updateTime();
});
