// ===== Menu navigasi untuk layar kecil =====
const menuToggle = document.getElementById('menuToggle');
const tabs = document.querySelector('.tabs');

if (menuToggle && tabs) {
  menuToggle.addEventListener('click', () => {
    const isOpen = tabs.classList.toggle('is-open');
    menuToggle.setAttribute('aria-expanded', String(isOpen));
  });
}

// ===== Jam di status bar =====
const liveClock = document.getElementById('liveClock');

function updateClock() {
  liveClock.textContent = new Date().toLocaleTimeString('id-ID', { hour12: false });
}

if (liveClock) {
  updateClock();
  setInterval(updateClock, 1000);
}
