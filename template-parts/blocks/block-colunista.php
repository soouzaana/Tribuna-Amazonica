<?php
if (!defined('ABSPATH')) exit;

$users = get_users([
  'role__in'            => ['author', 'editor', 'administrator'],
  'has_published_posts' => true,
  'number'              => 6,
  'orderby'             => 'display_name',
  'order'               => 'ASC',
]);
?>

<?php if ($users): ?>
  <section class="mx-auto py-8 px-4">
    <header class="section-header mb-6">
      <h2 class="section-title">Nossos Colunistas</h2>
    </header>

    <!-- 👇 mesma estrutura -->
    <div class="colunistas-grid flex flex-col gap-4">
      <?php foreach ($users as $user): ?>

        <?php
        get_template_part(
          'template-parts/cards/card-colunist',
          null,
          ['user_id' => $user->ID]
        );
        ?>

      <?php endforeach; ?>
    </div>
  </section>
<?php endif; ?>