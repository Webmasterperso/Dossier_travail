<section id='connection'>

    <?php
    if (!isset($_SESSION['user'])) {

        echo '<h2>Connection administrateur</h2>';
    } else {
        echo '<h2>modification administrateur</h2>';
    }
    ?>

    <form action="index.php?action=connection" method="post">
        <div>
            <label for="user">Identifiant</label><br />
            <input type="text" id="user" name="user" />
        </div>
        <div>
            <label for="password">Mot de passe</label><br />
            <input type="password" name="password"></textarea>
        </div>
        <div>
            <?php
            if (!isset($_SESSION['user'])) {

                echo '<input type="submit" id="submit" name="send" value="Connexion" />';
            } else {
                echo '<input type="submit" id="submit" name="send" value="Modifier" />';
            }
            ?>

            
        </div>
    </form>

</section>