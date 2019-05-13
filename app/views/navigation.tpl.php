<div class="navigation">
    <ul>
        <?php foreach ($view as $item): ?>
            <li>
                <a href="<?php print $item['link']; ?>">
                    <?php print $item['title']; ?>
                </a>
            </li>
        <?php endforeach; ?>
            <?php if (\App\App::$session->isLoggedIn()): ?>
            <li>
                <?php print 'Logged in as ' . \App\App::$session->getUser()->getFullName(); ?>
            </li>
            <?php endif; ?>
    </ul>
</div>