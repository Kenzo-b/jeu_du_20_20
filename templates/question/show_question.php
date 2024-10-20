<?php
/**
 * @var kenzo\Jeu20\Entity\Question $question
 */
?>
<h1>jeu du 20/20</h1>
<section>
    <header>
        <h2>Vous jouez pour la note de <span><?php echo $question->getLevel(); ?></span>/20</h2>
    </header>

    <article>vous jouer pour la note de 1/20</article>
    <article>
        <h3>Question posée :</h3>
        <div><?php echo htmlspecialchars($question->getContentText()) ?></div>
    </article>
    <article>
        <p>Question proposée le : </p>
    </article>
</section>
<footer>
    2024 - Briche Kenzo
</footer>
