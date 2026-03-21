<article class="row">
    <div class="col-md-10 mx-auto">
        <?php
        $libelleQuestionnaire = $questionnaire->getLibelleQuestionnaire();
        $dateLimite = $questionnaire->getDateLimite();
        ?>
        <h2 class="p-3 text-md-center">Questionnaire</h2>
        <a class="btn btn-outline-primary" href="index.php?chx1=questionnaire&chx2=remplir&idPatient=<?= $idPatient ?>&idQuestionnaire=<?= intval($questionnaire->getId()) ?>&dateLimite=<?= htmlspecialchars($dateLimite, ENT_QUOTES, 'UTF-8') ?>">Modifier ma saisie</a>
        <br><br>

        <?php if (empty($reponses)) : ?>
            <div class="alert alert-warning" role="alert">
                Aucune réponse trouvée pour ce questionnaire.
            </div>
        <?php else : ?>
            <div class="card shadow mb-6">
                <div class="card-body">
                    <div class="row">
                        <h4 class="col-8 text-md-start">Questionnaire <?= htmlspecialchars($libelleQuestionnaire, ENT_QUOTES, 'UTF-8') ?> -- Vérification</h4>
                        <h6 class="col-4 align-center text-md-end">Date limite : <?= htmlspecialchars($dateLimite, ENT_QUOTES, 'UTF-8') ?></h6>
                    </div>
                    <form method="post" action="index.php?chx1=questionnaire&chx2=verificationReponses&idPatient=<?= intval($idPatient) ?>">
                        <?php $themeActuel = "";
                        $iteration = 0; ?>
                        <table class="table align-middle">
                            <?php foreach ($reponses as $reponse) :
                                $idTheme = $reponse['idTheme'];
                                $libelleTheme = $reponse['libelleTheme'];
                                $numQuestion = $reponse['numQuestion'];
                                $libelleQuestion = $reponse['libelleQuestion']; ?>

                                <thead class="table-light">
                                    <tr class="row">
                                        <?php if ($themeActuel !== $libelleTheme) :
                                            $themeActuel = $libelleTheme; ?>
                                            <th class="col-md-12 text-md-start">Thème : <?= htmlspecialchars($themeActuel, ENT_QUOTES, 'UTF-8') ?></th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>

                                <tbody class="row">
                                    <td class="col-8 text-md-start">
                                        <label>
                                            <?= htmlspecialchars($numQuestion . '. ' . $libelleQuestion, ENT_QUOTES, 'UTF-8') ?>
                                        </label>
                                    </td>
                                    <td class="col-4 text-end">
                                        <span class="badge bg-primary"><?= htmlspecialchars($reponse['libelleOption'], ENT_QUOTES, 'UTF-8') ?></span>
                                    </td>
                                </tbody>
                            <?php endforeach; ?>
                        </table>
                        <!-- Maybe osef de ces champs ici, à voir si nécessaire plus tard -->
                        <input type="hidden" name="idQuestionnaire" value="<?= intval($idQuestionnaire) ?>">
                        <input type="hidden" name="dateLimite" value="<?= htmlspecialchars($dateLimite, ENT_QUOTES, 'UTF-8') ?>">
                        <div class="text-md-center">
                            <button type="submit" class="btn btn-primary">Valider et envoyer</button>
                        </div>
                    </form>
                <?php endif; ?>
                </div>
            </div>
    </div>
</article>