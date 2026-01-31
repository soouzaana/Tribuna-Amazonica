<?php wp_footer(); ?>
</body>

</html>

<script>
  const openBtn = document.getElementById('openMenu')
  const closeBtn = document.getElementById('closeMenu')
  const drawer = document.getElementById('drawer')
  const overlay = document.getElementById('overlay')

  function openMenu() {
    drawer.classList.remove('hidden')
    overlay.classList.remove('hidden')
  }

  function closeMenu() {
    drawer.classList.add('hidden')
    overlay.classList.add('hidden')
  }

  openBtn?.addEventListener('click', openMenu)
  closeBtn?.addEventListener('click', closeMenu)
  overlay?.addEventListener('click', closeMenu)
</script>