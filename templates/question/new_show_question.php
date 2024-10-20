<!--fichier templates\question\new_show_question.php-->
<?php
/**

@var Question $question*/
?>
<article>
    <header>
        <h2>Vous jouez pour la note de <span><?php echo $question->getLevel(
                ); ?></span>/20</h2>
    </header>
    <section id="quiz">
        <form action="#" method="post">
            <h3>Question posée :</h3>
            <div><?php echo htmlspecialchars($question->getContentText()) ?></div>
            <h3>Réponses :</h3>
            <div>
                <ul style="list-style-type: none;">
                    <?php foreach ($question->getAnswers() as $answer) : ?>
                        <li><input type="radio" name="answer" value="<?php echo htmlspecialchars($answer->getId()) ?>" style="margin-right: 1rem"/><?php echo htmlspecialchars($answer->getContentText()) ?></li>
                    <?php endforeach;?>
                </ul>
            </div>
            <button>valider</button>
        </form>
    </section>
    <section>
        <p>Question proposée le : <?php echo htmlspecialchars($question->getCreatedAt()->format('Y-m-d H:i:s')) ?></p>
    </section>
</article>