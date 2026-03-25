<?php 

foreach ($envReponse as $reponse) {
    echo $reponse['numQuestion'] . ' - ' . $reponse['idTheme'] . ' - ' . $reponse['idInclusion'] . ' - ' . $reponse['dateReponse'] . ' - ' . $reponse['dateConsult'] . '<br>';
}
