<?php
  require_once 'config.php';

  if (isset($_POST['submit'])) {
    $countryName = $_POST['search'];

    $sql = 'SELECT * FROM countries WHERE country_name = :country_name';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['country_name' => $countryName]);
    $row = $stmt->fetch();
  } else {
    header('location: .');
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Details</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
</head>

<body>
  <header class="header-fixed">

  <div class="header-limiter">

    <h1><a href="#">Autocompletion</a></h1>

    <nav>
      <a href="index.php">Accueil</a>
    </nav>

  </div>

</header>
  <div class="container">
    <div class="row mt-5">
      <div class="col-5 mx-auto">
        <div class="card shadow text-center">
          <div class="card-header">
            <h1><?= $row['country_name'] ?></h1>
          </div>
          <div class="card-body">
            <!-- <h4><b>Code :</b> <?= $row['country_code'] ?></h4> -->
            <h4><b>Capitale :</b> <?= $row['city'] ?></h4>
            <h4><b>Description :</b> <?= $row['description'] ?></h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

<style type="text/css">
  .header-fixed {
  background-color:#292c2f;
  box-shadow:0 1px 1px #ccc;
  padding: 20px 40px;
  height: 80px;
  color: #ffffff;
  box-sizing: border-box;
  top:-100px;

  -webkit-transition:top 0.3s;
  transition:top 0.3s;
}

.header-fixed .header-limiter {
  max-width: 1200px;
  text-align: center;
  margin: 0 auto;
}

/*  The header placeholder. It is displayed when the header is fixed to the top of the
  browser window, in order to prevent the content of the page from jumping up. */

.header-fixed-placeholder{
  height: 80px;
  display: none;
}

/* Logo */

.header-fixed .header-limiter h1 {
  float: left;
  font: normal 28px Cookie, Arial, Helvetica, sans-serif;
  line-height: 40px;
  margin: 0;
}

.header-fixed .header-limiter h1 span {
  color: #5383d3;
}

/* The navigation links */

.header-fixed .header-limiter a {
  color: #ffffff;
  text-decoration: none;
}

.header-fixed .header-limiter nav {
  font:16px Arial, Helvetica, sans-serif;
  line-height: 40px;
  float: right;
}

.header-fixed .header-limiter nav a{
  display: inline-block;
  padding: 0 5px;
  text-decoration:none;
  color: #ffffff;
  opacity: 0.9;
}

.header-fixed .header-limiter nav a:hover{
  opacity: 1;
}

.header-fixed .header-limiter nav a.selected {
  color: #608bd2;
  pointer-events: none;
  opacity: 1;
}

/* Fixed version of the header */

body.fixed .header-fixed {
  padding: 10px 40px;
  height: 50px;
  position: fixed;
  width: 100%;
  top: 0;
  left: 0;
  z-index: 1;
}

body.fixed .header-fixed-placeholder {
  display: block;
}

body.fixed .header-fixed .header-limiter h1 {
  font-size: 24px;
  line-height: 30px;
}

body.fixed .header-fixed .header-limiter nav {
  line-height: 28px;
  font-size: 13px;
}


/* Making the header responsive */

@media all and (max-width: 600px) {

  .header-fixed {
    padding: 20px 0;
    height: 75px;
  }

  .header-fixed .header-limiter h1 {
    float: none;
    margin: -8px 0 10px;
    text-align: center;
    font-size: 24px;
    line-height: 1;
  }

  .header-fixed .header-limiter nav {
    line-height: 1;
    float:none;
  }

  .header-fixed .header-limiter nav a {
    font-size: 13px;
  }

  body.fixed .header-fixed {
    display: none;
  }

}
</style>