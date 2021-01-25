<?php
if(isset($_POST['year']) && isset($_POST['month'])) :
$monthTimestamp = strtotime($_POST['year'] . '/' . $_POST['month'] . '/' .'1'); // création du timestamp de la sélection
$date = getdate($monthTimestamp); // création du tableau getdate
$firstDay = $date['wday']; // numéro du 1er jour du mois (0 -> dimanche - 6 -> vendredi)
endif;

$cellNumber = 1;
$dayNumber = 1;
setlocale(LC_TIME, ['fr.UTF-8', 'fra.UTF-8', 'fr_FR.UTF-8']);
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>Calendrier</title>
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet" />
</head>

<body>
    <?php if(empty($_POST['year']) && empty($_POST['month'])) : ?>
    <form id="divForm" action="" method="post">
        <h1 id="formTitle">Calendrier</h2>
        <div id="FormSectionContainer">
            <div class="divFormSection">
                <label for="month">Mois</label>
                <select name="month">
                    <option value="">Sélectionnez un mois</option>
                    <option value="01">Janvier</option>
                    <option value="02">Février</option>
                    <option value="03">Mars</option>
                    <option value="04">Avril</option>
                    <option value="05">Mai</option>
                    <option value="06">Juin</option>
                    <option value="07">Juillet</option>
                    <option value="08">Août</option>
                    <option value="09">Septembre</option>
                    <option value="10">Octobre</option>
                    <option value="11">Novembre</option>
                    <option value="12">Décembre</option>
                </select>    
            </div>
            <div class="divFormSection">
                <label for="year">Année</label>
                <select name="year">
                    <option value="">Sélectionnez une année</option>
                    <?php 
                    for($year = 3000; $year >= 1900; $year--) : ?>
                        <option value="<?=$year?>"><?= $year ?></option>;
                    <?php endfor;?>
                </select>
            </div>
            <div id="buttonContainer">
                <input type="submit" value="Afficher le calendrier">
            </div>
        </div>
    </form>
        
    <?php // CALENDRIER
    else :
    require 'calendar.php';
    endif;
    ?>
</body>

</html>