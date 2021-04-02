<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=crud1;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT * FROM clients WHERE id = 5');




/*<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    <fieldset class="informations">
        <legend>Ajouter un client</legend>
        <p>
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom_text" placeholder="Nom">
        </p>
        <p>
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom_text" placeholder="Prénom">
        </p>
        <p>
            <label for="birthday">Date de naissance</label>
            <input type="date" name="birthday" id="birthdate_text" placeholder="Date de naissance">
        </p>
        <p>
            <label for="fidelity_card">As-tu une carte de fidélité ? </label>
            <label for="fidelity_card_oui">oui</label>
            <input type="radio" name="fidelity_card" id="fidelity_card_oui" value= "oui">
            <label for="fidelity_card_non">non</label>
            <input type="radio" name="fidelity_card" id="fidelity_card_non" value="non">
        </p>
        <p>
            <label for="num_fidelity_card">Carte de fidélité</label>
            <input type="text" name="num_fidelity_card" id="num_fidelity_card_text" placeholder="Numéro de carte de fidélité">
        </p>
        <p>
            <label for="cardType">Select your type card</label>
            <select name="cardType" id="cartType">
            <option value="" default>--Please choose an option--</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            </select>
        </p>
        <?php
        echo "<table style= \"border: 0.1rem solid black\">\n<tbody>";

        while ($donnees = $reponse->fetch())
        {
            echo "<tr>\n<td style= \"border: 0.1rem solid black\"><input type=\"checkbox\" name=\"data\" value=".$donnees["id"].">".$donnees["id"]."</td><td style= \"border: 0.1rem solid black\">".$donnees["ville"] . "</td><td style= \"border: 0.1rem solid black\">" . $donnees["haut"] . "</td><td style= \"border: 0.1rem solid black\"> " . $donnees["bas"] . "</td></tr>\n";
        }

        echo "</tbody>\n</table>";
        ?>
    </fieldset>
    <input type="submit" id="submit" name="submit" value="Submit">
</form>
?>


<?php

if (isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["birthday"]) &&  isset($_POST["fidelity_card"])) {
    
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $bd = strval($_POST["birthday"]);
	$fidelity;
    $numFidelity = (int)$_POST["num_fidelity_card"];
    $typeCard = (int)$_POST["cardType"];

    if ($_POST["fidelity_card"] == "oui"){
        $fidelity = 1;
    } else {    
        $fidelity = 0;
        $numFidelity= "null";
    }

	$bdd->exec("INSERT INTO `clients` (lastName, firstName, birthDate, `card`, cardNumber ) VALUES ('$nom', '$prenom', '$bd', $fidelity, $numFidelity)");
    $bdd->exec("INSERT INTO `cards` (cardNumber, cardTypesId ) VALUES ($numFidelity, $typeCard)");

	echo "New record created successfully";
}
?>





<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    <fieldset class="informations">
        <legend>Ajouter un client</legend>
        <p>
            <label for="titre">Titre :</label>
            <input type="text" name="titre" id="titre_text" placeholder="Titre du spectacle">
        </p>
        <p>
            <label for="artiste">Artiste :</label>
            <input type="text" name="artiste" id="artiste_text" placeholder="Nom de l'artiste">
        </p>
        <p>
            <label for="date">Date :</label>
            <input type="date" name="date" id="date" placeholder="Date du spectacle">
        </p>

        <p>
        <label for="showType">Quel est le type de concert ?</label>
        <select name="showType" id="showType">
        <?php
                            $showType = array("Concert", "Théâtre", "Humour","Danse");
                            $index1 =1;
                                foreach ($showType as $key) {
                                    echo "<option value=\"" . $index1 . "\">" . $key . "</option></br>";
                                    $index1 +=1;
                                }
                            ?>
        </select>
        </p>
        <p>
            <label for="genres_selector1">genres :</label>
            <select name="genres1" id="genres_selector1">
                <option value="">-Choose a genres-</option>
                <?php
                $genres = array("Concert/Variété et chanson française", "Concert/Variété internationale", "Concert/Pop/Rock", "Concert/Musique électronique", "Concert/Folk", "Concert/Rap", "Concert/Hip Hop", "Concert/Slam", "Concert/Reggae", "Concert/Clubbing", "Concert/RnB", "Concert/Soul", "Concert/Funk", "Concert/Jazz", "Concert/Blues", "Concert/Country", "Concert/Gospel", "Concert/Musique du monde", "Concert/Classique", "Concert/Opéra", "Concert/Autres", "Théâtre/Drame", "Théâtre/Comédie", "Théâtre/Comtemporain", "Théâtre/Monologue", "Humour/One Man / Woman Show", "Humour/Café-Théâtre", "Humour/Stand Up", "Humour/Autres", "Danse/Comtemporaine", "Danse/Classique", "Danse/Urbaine");
                $index1 = 1;
                    foreach ($genres as $key) {
                        echo "<option id=\"$key\" value=\"" . $index1 . "\">" . $key . "</option></br>";
                        $index1 += 1;
                    }
                ?>
            </select>
        </p>
        <p>
            <label for="genres_selector2">genres :</label>
            <select name="genres2" id="genres_selector2">
                <option value="">-Choose a genres-</option>
                <?php
                $genres = array("Concert/Variété et chanson française", "Concert/Variété internationale", "Concert/Pop/Rock", "Concert/Musique électronique", "Concert/Folk", "Concert/Rap", "Concert/Hip Hop", "Concert/Slam", "Concert/Reggae", "Concert/Clubbing", "Concert/RnB", "Concert/Soul", "Concert/Funk", "Concert/Jazz", "Concert/Blues", "Concert/Country", "Concert/Gospel", "Concert/Musique du monde", "Concert/Classique", "Concert/Opéra", "Concert/Autres", "Théâtre/Drame", "Théâtre/Comédie", "Théâtre/Comtemporain", "Théâtre/Monologue", "Humour/One Man / Woman Show", "Humour/Café-Théâtre", "Humour/Stand Up", "Humour/Autres", "Danse/Comtemporaine", "Danse/Classique", "Danse/Urbaine");
                $index2 = 1;
                    foreach ($genres as $key) {
                        echo "<option id=\"$key\" value=\"" . $index2 . "\">" . $key . "</option></br>";
                        $index2 += 1;
                    }
                ?>
            </select>
        </p>
        <p>
            <label for="startHour">Durée :</label>
            <input type="time" name="startHour" id="startHour" step="1">
        </p>
        <p>
            <label for="duration">Commence à :</label>
            <input type="time" name="duration" id="duration" step="1">
        </p>
    </fieldset>
    <input type="submit" id="submit" name="submit" value="Submit">
</form>





<?php

if (isset($_POST["titre"]) && isset($_POST["artiste"]) && isset($_POST["date"]) &&  isset($_POST["showType"]) &&  isset($_POST["genres1"]) &&  isset($_POST["genres2"]) &&  isset($_POST["startHour"]) &&  isset($_POST["duration"])) {
    
    $titre = $_POST["titre"];
    $artiste = $_POST["artiste"];
    $date = strval($_POST["date"]);
    $showType = $_POST["showType"];
    $genres1 = $_POST["genres1"];
    $genres2 = $_POST["genres2"];
    $startHour = strval($_POST["startHour"]);
    $duration = strval($_POST["duration"]);
    
    $bdd -> exec("INSERT INTO `shows` (title, performer, `date`, showTypesId, firstGenresId, secondGenreId, duration, startTime ) VALUES ('$titre', '$artiste', '$date', $showType, $genres1, $genres2, '$startHour', '$duration')");

	echo "New record created successfully";
}
?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    <fieldset class="informations">
        <legend>Ajouter un client</legend>
        <p>
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom_text" placeholder="Nom">
        </p>
        <p>
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom_text" placeholder="Prénom">
        </p>
        <p>
            <label for="birthday">Date de naissance</label>
            <input type="date" name="birthday" id="birthdate_text" placeholder="Date de naissance">
        </p>
        <p>
            <label for="fidelity_card">As-tu une carte de fidélité ? </label>
            <label for="fidelity_card_oui">oui</label>
            <input type="radio" name="fidelity_card" id="fidelity_card_oui" value= "oui">
            <label for="fidelity_card_non">non</label>
            <input type="radio" name="fidelity_card" id="fidelity_card_non" value="non">
        </p>
        <p>
            <label for="num_fidelity_card">Carte de fidélité</label>
            <input type="text" name="num_fidelity_card" id="num_fidelity_card_text" placeholder="Numéro de carte de fidélité">
        </p>
        <?php
        echo "<table style= \"border: 0.1rem solid black\">\n<tbody>";

        while ($donnees = $reponse->fetch())
        {
            echo "<tr>\n<td style= \"border: 0.1rem solid black\"><input type=\"checkbox\" name=\"data\" value=".$donnees["id"].">".$donnees["id"]."</td><td style= \"border: 0.1rem solid black\">".$donnees["lastName"] . "</td><td style= \"border: 0.1rem solid black\">" . $donnees["firstName"] . "</td><td style= \"border: 0.1rem solid black\"> " . $donnees["birthDate"] . "</td></tr>\n";
        }

        echo "</tbody>\n</table>";
        ?>
    </fieldset>
    <input type="submit" id="submit" name="submit" value="Submit">
</form>



<?php


    
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $bd = strval($_POST["birthday"]);
	$fidelity;
    $numFidelity = (int)$_POST["num_fidelity_card"];

    if ($_POST["fidelity_card"] == "oui"){
        $fidelity = 1;
    } else {    
        $fidelity = 0;
        $numFidelity= "null";
    }

	$bdd->exec("UPDATE `clients`  SET lastName = '$nom', firstName = '$prenom', birthDate = '$bd', `card` = $fidelity, cardNumber= $numFidelity WHERE lastName =  '$nom' AND firstName = '$prenom'");

	echo "New record created successfully";
?>




<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    <fieldset class="informations">
        <legend>Ajouter un client</legend>
        <p>
            <label for="titre">Titre :</label>
            <input type="text" name="titre" id="titre_text" placeholder="Titre du spectacle">
        </p>
        <p>
            <label for="artiste">Artiste :</label>
            <input type="text" name="artiste" id="artiste_text" placeholder="Nom de l'artiste">
        </p>
        <p>
            <label for="date">Date :</label>
            <input type="date" name="date" id="date" placeholder="Date du spectacle">
        </p>

        <p>
        <label for="showType">Quel est le type de concert ?</label>
        <select name="showType" id="showType">
        <?php
                            $showType = array("Concert", "Théâtre", "Humour","Danse");
                            $index =1;
                                foreach ($showType as $key) {
                                    echo "<option value=\"" . $index . "\">" . $key . "</option></br>";
                                    $index +=1;
                                }
                            ?>
        </select>
        </p>
        <p>
            <label for="genres_selector1">genres :</label>
            <select name="genres1" id="genres_selector1">
                <option value="">-Choose a genres-</option>
                <?php
                $genres = array("Concert/Variété et chanson française", "Concert/Variété internationale", "Concert/Pop/Rock", "Concert/Musique électronique", "Concert/Folk", "Concert/Rap", "Concert/Hip Hop", "Concert/Slam", "Concert/Reggae", "Concert/Clubbing", "Concert/RnB", "Concert/Soul", "Concert/Funk", "Concert/Jazz", "Concert/Blues", "Concert/Country", "Concert/Gospel", "Concert/Musique du monde", "Concert/Classique", "Concert/Opéra", "Concert/Autres", "Théâtre/Drame", "Théâtre/Comédie", "Théâtre/Comtemporain", "Théâtre/Monologue", "Humour/One Man / Woman Show", "Humour/Café-Théâtre", "Humour/Stand Up", "Humour/Autres", "Danse/Comtemporaine", "Danse/Classique", "Danse/Urbaine");
                $index1 = 1;
                    foreach ($genres as $key) {
                        echo "<option id=\"$key\" value=\"" . $index1 . "\">" . $key . "</option></br>";
                        $index1 += 1;
                    }
                ?>
            </select>
        </p>
        <p>
            <label for="genres_selector2">genres :</label>
            <select name="genres2" id="genres_selector2">
                <option value="">-Choose a genres-</option>
                <?php
                $genres = array("Concert/Variété et chanson française", "Concert/Variété internationale", "Concert/Pop/Rock", "Concert/Musique électronique", "Concert/Folk", "Concert/Rap", "Concert/Hip Hop", "Concert/Slam", "Concert/Reggae", "Concert/Clubbing", "Concert/RnB", "Concert/Soul", "Concert/Funk", "Concert/Jazz", "Concert/Blues", "Concert/Country", "Concert/Gospel", "Concert/Musique du monde", "Concert/Classique", "Concert/Opéra", "Concert/Autres", "Théâtre/Drame", "Théâtre/Comédie", "Théâtre/Comtemporain", "Théâtre/Monologue", "Humour/One Man / Woman Show", "Humour/Café-Théâtre", "Humour/Stand Up", "Humour/Autres", "Danse/Comtemporaine", "Danse/Classique", "Danse/Urbaine");
                $index2 = 1;
                    foreach ($genres as $key) {
                        echo "<option id=\"$key\" value=\"" . $index2 . "\">" . $key . "</option></br>";
                        $index2 += 1;
                    }
                ?>
            </select>
        </p>
        <p>
            <label for="duration">Durée :</label>
            <input type="time" name="duration" id="duration" step="1">
        </p>
        <p>
            <label for="startHour">Commence à :</label>
            <input type="time" name="startHour" id="startHour" step="1">
        </p>
    </fieldset>
    <input type="submit" id="submit" name="submit" value="Submit">
    <?php
        echo "<table style= \"border: 0.1rem solid black\">\n<tbody>";

    while ($donnees = $reponse->fetch())
    {
        echo "<tr>\n<td style= \"border: 0.1rem solid black\"><input type=\"checkbox\" name=\"data\" value=".$donnees["id"].">".$donnees["id"]."</td><td style= \"border: 0.1rem solid black\">".$donnees["title"] . "</td><td style= \"border: 0.1rem solid black\">" . $donnees["startTime"] . "</td><td style= \"border: 0.1rem solid black\"> " . $donnees["date"] . "</td></tr>\n";
    }

    echo "</tbody>\n</table>"?>
</form>





<?php


    
    $titre = $_POST["titre"];
    $date = strval($_POST["date"]);
    $startHour = strval($_POST["startHour"]);
    
    $bdd -> exec("UPDATE `shows` SET  `date` = '$date', startTime = '$startHour' WHERE title = '$titre'");

	echo "New record created successfully";
?>



<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    <fieldset class="informations">
        <legend>Ajouter un client</legend>
        <p>
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom_text" placeholder="Nom">
        </p>
        <p>
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom_text" placeholder="Prénom">
        </p>
        <p>
            <label for="birthday">Date de naissance</label>
            <input type="date" name="birthday" id="birthdate_text" placeholder="Date de naissance">
        </p>
        <p>
            <label for="fidelity_card">As-tu une carte de fidélité ? </label>
            <label for="fidelity_card_oui">oui</label>
            <input type="radio" name="fidelity_card" id="fidelity_card_oui" value= "oui">
            <label for="fidelity_card_non">non</label>
            <input type="radio" name="fidelity_card" id="fidelity_card_non" value="non">
        </p>
        <p>
            <label for="num_fidelity_card">Carte de fidélité</label>
            <input type="text" name="num_fidelity_card" id="num_fidelity_card_text" placeholder="Numéro de carte de fidélité">
        </p>
        <?php
        echo "<table style= \"border: 0.1rem solid black\">\n<tbody>";

        while ($donnees = $reponse->fetch())
        {
            echo "<tr>\n<td style= \"border: 0.1rem solid black\"><input type=\"checkbox\" name=\"data\" value=".$donnees["id"].">".$donnees["id"]."</td><td style= \"border: 0.1rem solid black\">".$donnees["lastName"] . "</td><td style= \"border: 0.1rem solid black\">" . $donnees["firstName"] . "</td><td style= \"border: 0.1rem solid black\"> " . $donnees["birthDate"] . "</td></tr>\n";
        }

        echo "</tbody>\n</table>";
        ?>
    </fieldset>
    <input type="submit" id="submit" name="submit" value="Submit">
</form>



<?php


    
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];




	$bdd->exec("UPDATE `clients`  SET lastName = '$nom', firstName = '$prenom' WHERE id = 5");

	echo "New record created successfully";
*/?>