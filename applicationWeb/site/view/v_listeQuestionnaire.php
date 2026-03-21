<article class="row">
    <div class="col-md-10 mx-auto">
        <h2 class="p-3 text-md-center">Questionnaires à compléter avant vos prochains rendez-vous</h2>

        <?php if (empty($qListe)) : ?>
            <div class="alert alert-info" role="alert">
                Aucun questionnaire à compléter pour le moment.
            </div>
        <?php else : ?>
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <form method="POST" action="">
                        <table class="table align-middle">
                            <thead class="table-light">
                                <tr class="row">
                                    <th class="col-md-2 text-md-start">Questionnaire</th>
                                    <th class="col-md-8 text-md-center">Description</th>
                                    <th class="col-md-2 text-md-end">Date du rendez-vous</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($qListe as $questionnaire) : ?>
                                    <?php
                                    $patient = $idPatient;
                                    $urlRemplir = 'index.php?chx1=questionnaire&chx2=remplir&idPatient=' . $idPatient .
                                        '&idQuestionnaire=' . intval($questionnaire->getId()) .
                                        '&dateLimite=' . $questionnaire->getDateLimite();
                                    ?>
                                    <tr class="row" role="link" id="redirectionForm"
                                        onclick="document.location.href='<?= htmlspecialchars($urlRemplir, ENT_QUOTES, 'UTF-8') ?>'">
                                        <td class="col-md-2 text-md-start">
                                            <?= htmlspecialchars($questionnaire->getLibelleQuestionnaire()) ?>
                                        </td>
                                        <td class="col-md-8 text-md-center">
                                            <?= htmlspecialchars($questionnaire->getDescQuestionnaire()) ?>
                                        </td>
                                        <td class="col-md-2 text-md-end">
                                            <?= htmlspecialchars($questionnaire->getDateLimite()) ?>
                                        </td>
                                    </tr>

                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
</article>