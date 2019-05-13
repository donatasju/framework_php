<div class="footer">
        <?php foreach ($view as $item): ?>
            <div>
                <a href="<?php print $item['link']; ?>">
                    <?php print $item['title']; ?>
                </a>
            </div>
        <?php endforeach; ?>
</div>