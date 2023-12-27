<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST["name"];
    $prenom = $_POST["first-name"];
    $pseudo = $_POST["pseudo"];
    $email = $_POST["mail"];
    $mdp = $_POST["mdp"];
    $genre = $_POST["genrs"];
    $classe = $_POST["classe"];

    // Créer un tableau associatif avec les données
    $data = array(
        'nom' => $nom,
        'prenom' => $prenom,
        'pseudo' => $pseudo,
        'email' => $email,
        'mdp' => $mdp,
        'genre' => $genre,
        'classe' => $classe
    );

    // Charger le contenu actuel du fichier JSON
    $json_file = 'data.json';
    $current_data = file_get_contents($json_file);
    $current_data_array = json_decode($current_data, true);

    // Ajouter les nouvelles données au tableau
    $current_data_array[] = $data;

    // Convertir le tableau en format JSON
    $new_data_json = json_encode($current_data_array, JSON_PRETTY_PRINT);

    // Sauvegarder les données dans le fichier JSON
    file_put_contents($json_file, $new_data_json);

    // Rediriger l'utilisateur après le traitement du formulaire (par exemple, vers une page de confirmation)
    header("Location: confirmation.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/connection.css">
  <link rel="icon" type="image/png" sizes="192x192" href="/img/Stone.png">
  <title>Freezix.com | Connection</title>
</head>

<body>
  <header>
    <div class="connection">
      <img src="/img/compt-logo.png" alt="logo compte" width="20px">
      <h4>Mon Compte</h4>
    </div>

    <div class="nav-main-home">
      <div class="titre-site">
        <img src="https://www.1min30.com/wp-content/uploads/2017/09/icone-minecraft.png" alt="minecraft logo">
        <h2>FREEZIX.COM</h2>
      </div>
      <nav>
        <a href="home.html">
          <h1>Home</h1>
        </a>
        <a href="survie.html">
          <h1>Survie</h1>
        </a>
        <a href="youtube.html">
          <h1>Youtube</h1>
        </a>
        <a href="wiki.html">
          <h1>Wiki</h1>
        </a>
      </nav>
    </div>

  </header>
  <main>

    <h1>Espace connection</h1>

    <form action="process-form.php" method="post">

      <label for="name">Nom</label>
      <input type="text" required>

      <label for="first-name">Prenom</label>
      <input type="text">

      <label for="pseudo">Pseudo</label>
      <input type="text">

      <label for="mail">Email</label>
      <input type="email" required>

      <label for="mdp">Mot de passe</label>
      <input type="password">

      <p>Genre</p>
      <div class="genrs">
          <div>
              <label for="Homme">Homme</label>
              <input type="radio" id="Homme" name="genrs" value="homme">
          </div>
          <div>
              <label for="Femme">Femme</label>
              <input type="radio" id="Femme" name="genrs" value="femme">
          </div>
      </div>
      

      <label for="classe">Année</label>
      <select id="classe" name="classe">
          <option value="1">1er</option>
          <option value="2">2em</option>
          <option value="3">3em</option>
          <option value="4">4em</option>
      </select>

      <input class="btn" type="submit">

    </form>
  </main>
  <footer>
    <h1>&copy; FREEZIX - 2023</h1>
  </footer>

</body>

</html>

