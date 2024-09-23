<?php
/**
 * @var string $title
 * @var string $content
 * @var string $test
 */
?>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    <?php echo isset($view_title) ? $view_title : 'Jeu du 20/20'; ?>
    </title>
    <?php if (isset($cssFiles)): ?>
        <?php echo $cssFiles; ?>
    <?php endif; ?>
    <?php if (isset($jsFiles)): ?>
        <?php echo $jsFiles; ?>
    <?php endif; ?>
</head>
<body>
<?php if (isset($view_header)): ?>
    <header>
        <?php echo $view_header; ?>
    </header>
<?php endif; ?>
<?php if (isset($view_main)): ?>
    <main>
        <?php echo $view_main; ?>
    </main>
<?php endif; ?>
<?php if (isset($view_footer)): ?>
    <footer>
        <?php echo $view_footer; ?>
    </footer>
<?php endif; ?>
</body>
</html>