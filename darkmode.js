const toggleButton = document.getElementById('dark-mode-toggle');
const root = document.documentElement; // html

if (localStorage.getItem('dark-mode') === 'enabled') {
  root.classList.add('dark-mode');
}

toggleButton.addEventListener('click', () => {
  root.classList.toggle('dark-mode');
  localStorage.setItem('dark-mode', root.classList.contains('dark-mode') ? 'enabled' : 'disabled');
});
