document.addEventListener('DOMContentLoaded', () => {
  const openBtn = document.getElementById('openMenu');
  const closeBtn = document.getElementById('closeMenu');
  const drawer = document.getElementById('drawer');
  const overlay = document.getElementById('overlay');

  if (!openBtn || !drawer) return;

  openBtn.addEventListener('click', () => {
    drawer.classList.remove('hidden');
    overlay.classList.remove('hidden');
  });

  closeBtn.addEventListener('click', close);
  overlay.addEventListener('click', close);

  function close() {
    drawer.classList.add('hidden');
    overlay.classList.add('hidden');
  }
});
