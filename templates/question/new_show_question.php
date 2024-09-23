<?php
/**
 * @var \kenzo\Jeu20\Entity\Question $question
 */
?>
<article>
    <header>
        <h2>Vous jouez pour la note de <span><?php echo $question->getLevel()? $question->getLevel() : ''?></span>/20</h2>
    </header>
    <section>
        <h3>Question posée :</h3>
        <div><?php echo htmlspecialchars($question->getContentText()) ?></div>
    </section>
    <section>
        <p>question proposée le : <?php echo htmlspecialchars($question->getCreatedAt()->format('Y-m-d H:i:s')) ?></p>
    </section>
</article>
