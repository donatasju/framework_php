<div class="content">
    <h1><?php print $view['title'] ?? false; ?></h1>
    <h2><?php print $view['subtitle'] ?? false; ?></h2>
    <section><?php print $view['content'] ?? false; ?></section>
    <div><?php print $view['form'] ?? false; ?></div>
    <p><?php print $view['message'] ?? false; ?></p>
    <p><?php print $view['success_message'] ?? false; ?></p>
</div>