<nav>
    <?php foreach ($view as $item): ?>
        <a href="<?php print $item['link']; ?>"><?php print $item['title']; ?></a>
    <?php endforeach; ?>
</nav>

