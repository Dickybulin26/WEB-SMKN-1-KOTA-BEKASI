document.addEventListener("DOMContentLoaded", function() {
    const container = document.querySelector(".logo-company");
    const logos = Array.from(container.children);

    let speed = 1; // Kecepatan gerakan
    let containerWidth = container.offsetWidth; // Lebar container

    function moveLogos() {
        logos.forEach(logo => {
            let currentPos = logo.offsetLeft;

            // Gerakan gambar ke kiri
            logo.style.transform = `translateX(${currentPos - speed}px)`;

            // Jika gambar keluar dari sisi kiri, pindahkan ke kanan
            if (currentPos + logo.offsetWidth < 0) {
                let rightEdge = container.scrollWidth;
                logo.style.transform = `translateX(${rightEdge}px)`;
            }
        });

        requestAnimationFrame(moveLogos); // Loop animasi
    }

    // Mulai gerakan animasi
    moveLogos();
});
