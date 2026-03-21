<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Clinique Pasteur - Accueil</title>
  <!-- Lien Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="public/css/style.css" rel="stylesheet">
</head>

<body>
  <!-- Barre de navigation -->
  <nav class="navbar navbar-dark sticky-top w-100" style="background-color: #004080;">
    <a class="navbar-brand" href="index.php">
      <img src="public/image/logoClinique.png" alt="Logo Clinique Pasteur" width="50" height="50" class="d-inline-block align-top">
    </a>
    <span class="navbar-text">
      <h1>Clinique Pasteur</h1>
    </span>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse w-100" id="navbarNav">
      <table class="w-100 nav-table">
        <thead>
          <tr class="nav-row">
            <th class="col-4"><a class="nav-link" href="index.php?chx1=rdv">
                <h3>Rendez-vous</h3>
              </a></th>
            <th class="col-4"><a class="nav-link" href="index.php?chx1=questionnaire">
                <h3>Questionnaire</h3>
              </a></th>
            <th class="col-4"><a class="nav-link" href="index.php?chx1=autre">
                <h3>Autres</h3>
              </a></th>
          </tr>
          <tr class="nav-row">
            <td></td>
            <td class="col-4"><a class="nav-link" href="index.php?chx1=questionnaire&chx2=aCompleter">
                <h6>Completer un Questionnaire</h6>
              </a></td>
            <td></td>
          </tr>
        </thead>
      </table>
    </div>
  </nav>
  <div class="container">