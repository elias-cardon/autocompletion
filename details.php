<?php
  require_once 'config.php';

  if (isset($_POST['submit'])) {
    $countryName = $_POST['search'];

    $sql = 'SELECT * FROM SW WHERE name = :name';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['name' => $countryName]);
    $row = $stmt->fetch();
  } else {
    header('location: .');
    exit();
  }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Details</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <header class="header-fixed">

  <div class="header-limiter">

    <h1><a href="#">Autocomplétion</a></h1>

    <nav>
      <a href="index.php">Accueil</a>
    </nav>

  </div>

</header>
  <div class="container-fluid">
    <div class="row mt-5">
      <div class="col-9 mx-auto">
        <div class="card shadow text-center">
          <div class="card-header">
            <h1><?= $row['name'] ?></h1>
          </div>
          <div class="card-body">
            <h4><b>Statut :</b> <?= $row['state'] ?></h4>
            <h4><b>Description :</b><br/><br/> <?= $row['description'] ?></h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>