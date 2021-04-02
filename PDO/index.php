<?php 
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=weatherapp;charset=utf8','root','');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

$resultat = $bdd->query('SELECT * FROM `météo` ');?>



<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    <fieldset class="informations">
        <legend>Add a city</legend>
        <p>
            <label for="city">Ville :</label>
            <input type="text" name="ville" id="ville_text" placeholder="Ville">
        </p>
        <p>
            <label for="haut">Haut</label>
            <input type="text" name="haut" id="haut_text" placeholder="Haut" >
        </p>
        <p>
            <label for="bas">Bas</label>
            <input type="text" name="bas" id="bas_text" placeholder="Bas">
        </p>

		<?php
		echo "<table>\n<tbody>";

		while ($donnees = $resultat->fetch()){
			echo "<tr>\n<td style= \"border: 0.1rem solid black\"><input type=\"checkbox\" name=\"data\" value=".$donnees["id"].">".$donnees["id"]."</td><td style= \"border: 0.1rem solid black\">".$donnees["ville"] . "</td><td style= \"border: 0.1rem solid black\">" . $donnees["haut"] . "</td><td style= \"border: 0.1rem solid black\"> " . $donnees["bas"] . "</td></tr>\n";
		}
		echo "</tbody>\n</table>";
		
		?>
    </fieldset>
    <input type="submit" id="submit" name="submit" value="Submit">
</form>





<?php

if (isset($_POST["ville"]) && isset($_POST["haut"]) && isset($_POST["bas"])) {

    $ville = $_POST["ville"];
    $haut = $_POST["haut"];
    $bas = $_POST["bas"];
	$id = $_POST["data"];

	$bdd->exec("INSERT INTO `météo` (ville, haut, bas) VALUES ('$ville', $haut, $bas)");

	echo "New record created successfully";

	$bdd->exec('DELETE FROM `météo`  WHERE id = '.$id.' ');
	
}




?>
