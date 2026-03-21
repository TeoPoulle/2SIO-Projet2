<article class="row">
    <div class="col-md-10 mx-auto">
        <h2 class="p-3 text-md-center">Questionnaire</h2>
        <a class="btn btn-outline-primary" href="index.php?chx1=questionnaire&amp;chx2=aCompleter&amp;idPatient=<?= $idPatient ?>">Retour à la liste de(s) questionnaire(s)</a>
        <br><br>

        <?php if (empty($questions)) : ?>
            <div class="alert alert-warning" role="alert">
                Aucune question trouvée pour ce questionnaire.
            </div>
        <?php else : ?>
            <div class="card shadow mb-6">
                <div class="card-body">
                    <div class="row">
                        <h4 class="col-4 text-md-start">Questionnaire <?= htmlspecialchars($questionnaire->getLibelleQuestionnaire(), ENT_QUOTES, 'UTF-8') ?></h4>
                        <h6 class="col-4 align-center text-md-end offset-4">Date limite : <?= htmlspecialchars($questionnaire->getDateLimite(), ENT_QUOTES, 'UTF-8') ?></h6>
                    </div>
                    <form method="post" action="index.php?chx1=questionnaire&chx2=verificationReponses&idPatient=<?= $idPatient ?>&idQuestionnaire=<?= intval($questionnaire->getId()) ?>&dateLimite=<?= $questionnaire->getDateLimite() ?>">
                        <?php $themeActuel = ""; ?>
                        <table class="table align-middle">
                            <?php foreach ($questions as $question) :
                                $idTheme = intval($question->getIdTheme());
                                $libelleTheme = $question->getLibelleTheme();
                                $numQuestion = intval($question->getNumQuestion());
                                $idQuestion = intval($question->getId());
                                $libelleQuestion = $question->getLibelleQuestion();
                                if ($themeActuel !== $libelleTheme) : ?>
                                    <thead class="table-light">
                                        <tr class="row">
                                            <?php $themeActuel = $libelleTheme; ?>
                                            <th class="col-md-12 text-md-start">Thème : <?= htmlspecialchars($themeActuel, ENT_QUOTES, 'UTF-8') ?></th>
                                        </tr>
                                    </thead>
                                <?php endif; ?>

                                <tbody class="row">
                                    <td class="col-md-4 text-md-start">
                                        <label>
                                            <?= htmlspecialchars($numQuestion . '. ' . $libelleQuestion, ENT_QUOTES, 'UTF-8') ?>
                                        </label>
                                    </td>
                                    <?php
                                    foreach ($options as $option) : ?>
                                        <td class="text-end">
                                            <input type="radio" name="reponse_<?= $numQuestion ?>_theme_<?= $idTheme ?>" value="<?= htmlspecialchars($option->getId(), ENT_QUOTES, 'UTF-8') ?>" required>
                                            <label><?= htmlspecialchars($option->getLibelleOption(), ENT_QUOTES, 'UTF-8') ?></label>
                                        </td>
                                    <?php endforeach; ?>
                                </tbody>
                            <?php endforeach; ?>
                        </table>
                        <div class="text-md-center">
                            <button type="submit" class="btn btn-primary">Confirmer mes réponses </button>
                        </div>
                        <input type="hidden" name="idQuestionnaire" value="<?= intval($questionnaire->getId()) ?>">
                        <input type="hidden" name="dateLimite" value="<?= htmlspecialchars($questionnaire->getDateLimite(), ENT_QUOTES, 'UTF-8') ?>">
                    </form>
                <?php endif; ?>
                </div>
            </div>
    </div>
</article>