<?php
	
	$lvlPHP = array(
			"deb" =>"Débutant",
			"moy" =>"Moyen",
			"bon" =>"Bon",
			"exp" =>"Expert"
	);
	
	$nivPHP = $_GET['nivPHP'] ;
	
	$civilites = array(
		"m"=>"Monsieur" ,
		"mme"=>"Madame" ,
		"mlle"=>"Mademoiselle"
	);
	
	$civilite = $_GET['civilite'] ;
	
	$framework = array(
			"sym" => "Symfony",
			"code" => "Codelgniter",
			"fuel" => "FuelPHP",
			"cake" => "CakePHP",
			"lara" => "Laravel" );
	
	$frameSelectionnees = $_GET['frameworks'] ;
	
	
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Exercice 8</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="style.css">
    </head>
    
    <body>
		
		<h3>Récapitulation de votre candidature Développeur PHP</h3>
			<table>
					 <tr>
						<td>Civilité</td>
					<?php
						echo "<td>" . $civilites[$civilite] . "</td>";?>
					</tr>	
					<tr>
				<?php	if($_GET["nom"]== null ){
							echo "<td class='vide'>". "NOM". "</td>";
							echo "<td>"."</td>";
						}
						else{
							echo "<td>" ."NOM". "</td>";
							echo "<td>" .strtoupper($_GET["nom"])  . "</td> " ;	
						};
					echo "</tr>";
					echo "<tr>" ;
						if($_GET["prenom"]== null ){
							echo "<td class='vide'>" . "Prénom" . "</td>";
							echo "<td>"."</td>";
						}
						else{
							echo "<td>" . "Prénom" . "</td>";
							echo "<td>". ucfirst( strtolower($_GET["prenom"])) . "</td>"; 
						};
					echo "</tr>";
					echo "<tr>" ;
						if($_GET["date"] == null){
							echo "<td class='vide'>" . "Date de naissance" ."</td>";
							echo "<td>"."</td>";
						}
						else{
							echo "<td>" . "Date de naissance" ."</td>";
							echo "<td>". $_GET["date"] ;
						};
					echo "</tr>";	
					echo "<tr>" ;
						$tel = $_GET["tel"];
						if($_GET["tel"] == null){
							echo "<td class='vide'>"."Téléphone"."</td>";
							echo "<td>"."</td>";
						}
						elseif(preg_match("#[0][6][- \.?]?([0-9][0-9][- \.?]?){4}$#", $tel)){
							echo "<td>"."Téléphone"."</td>";
							echo "<td>". $_GET["tel"] ."</td>";
						}
						else{
							echo "<td class='vide'>" . "Téléphone" . "</td>";
							echo "<td class='vide'>" . "Saisie incorrect" . "</td>";
						};
					echo "</tr>";	
					echo "<tr>" ;
						$email = $_GET["email"];
						if($_GET["email"] == null){
							echo "<td class='vide'>"."Adresse électronique"."</td>";
							echo "<td>"."</td>";
						}
						elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
							$emailErr = "Invalid email format";
							echo "<td class='vide'>"."Adresse électronique"."</td>";
							echo "<td class='vide'>" . "L'adresse email '$email' est invalide." . "</td>";
						}
						else{
							echo "<td>"."Adresse électronique"."</td>";
							echo "<td>". $_GET["email"] ."</td>";
						};
					echo "</tr>";	
					echo "<tr>" ;
						echo "<td>"."Niveau en PHP"."</td>";
						echo "<td>".$lvlPHP[$nivPHP]."</td>";
						
					echo "</tr>";
					echo "<tr>" ;
						echo "<td>"."Frameworks PHP"."</td>";
						echo "<td>";
						foreach( $frameSelectionnees as $uneFrame ){
							echo "<ul>". "<li>" . $framework [ $uneFrame ] . " </li> "."</ul>";
						}
						echo "</td>";
					echo "</tr>";	
					echo "<tr>" ;
						echo "<td>"."Moi"."</td>";
						echo "<td>".$_GET["presentation"] ."</td>";
					echo "</tr>";
								
							?>
						
			</table>
			<br/>
			
		<input type="button" value="Retour"	onclick = "history.back()"></a>
	</body>
</html>
