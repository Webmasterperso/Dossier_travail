
<section id='connection'>

    <h1>Connection administrateur</h1>
    <?php
    if (isset($_GET['erreur'])) {
        $err = $_GET['erreur'];
        if ($err == 1 || $err == 2)
            echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
    }
    ?>


    <form action="../index.php?action=connection" method="post">
        <div>
            <label for="user">Identifiant</label><br />
            <input type="text" id="user" name="user" />
        </div>
        <div>
            <label for="password">Mot de passe</label><br />
            <input type="password" name="password"></textarea>
        </div>
        <div>
            <input type="submit" id="submit" value="Connexion" />
        </div>
    </form>

</section>