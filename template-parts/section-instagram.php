<?php
// Array de imagens do Instagram
$instagram_images = [
  'https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=300&h=300&fit=crop',
  'https://images.unsplash.com/photo-1505664194779-8beaceb93744?w=300&h=300&fit=crop',
  'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=300&h=300&fit=crop',
  'https://images.unsplash.com/photo-1516026672322-bc52d61a55d5?w=300&h=300&fit=crop',
  'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=300&h=300&fit=crop',
  'https://images.unsplash.com/photo-1554224154-22dec7ec8818?w=300&h=300&fit=crop',
];
?>

<section class="p-8 text-center bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl">
  <h1 class="text-2xl font-bold mb-1">Siga no Instagram</h1>
  <p class="text-md text-gray-600 mb-4">
    Acompanhe nossas análises e bastidores em
    <span class="font-medium text-pink-600">@tribunaamazonica</span>
  </p>

  <!-- Instagram grid -->
  <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 mb-6">
    <?php foreach ($instagram_images as $index => $img) : ?>
      <a href="https://instagram.com/tribunaamazonica" target="_blank" rel="noopener noreferrer"
        class="aspect-square rounded-xl overflow-hidden group relative shadow-md hover:shadow-xl transition-shadow">
        <img src="<?php echo esc_url($img); ?>"
          alt="Instagram post <?php echo $index + 1; ?>"
          class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-110" />
        <!-- Overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
          <!-- Ícone Instagram -->
          <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
            <circle cx="12" cy="12" r="4" />
            <circle cx="17.5" cy="6.5" r="1" />
          </svg>
        </div>
      </a>
    <?php endforeach; ?>
  </div>

  <!-- Botão seguir -->
  <div class="flex justify-center">
    <a href="https://instagram.com/tribunaamazonica" target="_blank" rel="noopener noreferrer"
      class="block text-center p-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-full font-medium hover:from-purple-700 hover:to-pink-700 transition-all">
      Seguir @tribunaamazonica
    </a>
  </div>
</section>