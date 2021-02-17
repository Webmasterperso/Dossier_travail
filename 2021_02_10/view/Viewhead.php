<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Billet simple pour l'Alaska</title>
  <meta name="description" content="Billet simple pour l'Alaska, Roman numérique de Jean forterochoe par chapitre" />
  <!--Polices-->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Montserrat&display=swap" rel="stylesheet" />
  <!--favicom-->
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png" />
  <link rel="manifest" href="/site.webmanifest" />
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#066783" />
  <meta name="msapplication-TileColor" content="#333333" />
  <meta name="theme-color" content="#ffffff" />
  <!--fontawesome-->
  <script src="https://kit.fontawesome.com/a1efcfbe5e.js" crossorigin="anonymous"></script>
  <!--css-->
  <link href="styleprojet4masson.css" rel="stylesheet" />
  <!--TinyMCE-->
  <script src="https://cdn.tiny.cloud/1/qfw6s6sx4pvsntv7t1in07fn2m1jxkuutrinitvom3b8kpfj/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script type="text/javascript">
    tinymce.init({
      selector: "textarea#textchapter",
      menubar: 'edit'
    });
  </script>
  <!-- META VIEWPORT permet de controler le zoom et la mise en page sur les navigateur mobile et tablette -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
  <header>
    <!--logo et menu-->
    <nav>
      <div id="menu">
        <p>
          <a href="index.php"><img src="view/media/logo.png" alt="logo" class="logo" /></a>
        </p>
        <ul>
          <li><a href="index.php">Accueil</a></li>
          <li><a href="#modemploi">Chapitres</a></li>
          <li><a href="#resa">Auteur</a></li>
        </ul>
      </div>

      <div id="titre">
        <h1 id="titresite">Blog de Jean Forteroche</h1>
        <?php
        if (isset($_SESSION['user']))
        {
        echo'<h2 id="soustitre">Espace administrateur</h2>';
        }
        ?>
      </div>
    </nav>

    <?php
        if (!isset($_SESSION['user']))
        {
    ?>
    <section id="fenetre">
      <h2 id="titrelivre">Billet simple pour l'Alaska</h2>
      <article id="concept">
        <h3>Suivez-moi...</h3>
        <p>
          Je vous invite à partir à l'aventure numérique de mon nouveau roman.
          Chapitre après chapitre, mois après mois, l'attente sera pour vous
          l'occasion de digérer chaque étape et d'imaginer la suite... avant
          d'être surpris... </br> Auriez-vous pris cette route.... sans doute non ! mais laissez-vous porter jusqu'à la fin...
        </p>
      </article>
    </section>
    <?php } ?>
  </header>

  <!--section view-->