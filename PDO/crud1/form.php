<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=crud1;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

/*$reponse = $bdd->query('SELECT * FROM clients LIMIT 20');
while($donnees = $reponse->fetch()) {
    echo $donnees["lastName"] . "</br>";
}*/

/*$reponse = $bdd->query('SELECT * FROM clients WHERE card = 1');
while($donnees = $reponse->fetch()) {
    echo $donnees["lastName"] . "</br>";
}*/

/*$reponse = $bdd->query('SELECT * FROM clients WHERE lastName LIKE "M%" ORDER BY lastName ASC');
while($donnees = $reponse->fetch()) {
    echo "Nom : " . $donnees["lastName"] . "</br>Prénom : " . $donnees["firstName"] . "</br>";
}*/

/*$reponse = $bdd->query('SELECT * FROM shows');
while($donnees = $reponse->fetch()) {
    echo $donnees["title"] . " par " . $donnees["performer"] . ", le " . $donnees["date"] . " à " . $donnees["startTime"] . ".</br>";
}*/

$reponse = $bdd->query('SELECT * FROM clients');

while($donnees = $reponse->fetch()) {
    if ($donnees["card"] == "1") {
        $fidelite = "Oui";
    }
    else {
        $fidelite = "Non";
    }

    if($donnees["cardNumber"] == null) {
        $donnees["cardNumber"] = "-";
    }

    echo "Nom : " . $donnees["lastName"] . "</br>Prénom : " . $donnees["firstName"] . "</br>Date de naissance : " . $donnees["birthDate"] . "</br>Carte de fidélité : " . $fidelite . "</br>Numéro de carte : " . $donnees["cardNumber"] . "</br>";
    
?>