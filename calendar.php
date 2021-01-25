<?php
if(isset($_POST['year']) && isset($_POST['month'])) :
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $_POST['month'], $_POST['year']); // nombre de jours dans le mois sélectionné
endif;
if(isset($_POST['year']) && isset($_POST['month'])) : ?>
    <?php endif; ?>
    <div id="calContainer">
        <div id="calendarTitle"><h2 id="selectionMonth"><?= ucwords(strftime('%B %Y', $monthTimestamp)); ?></h2></div> <!-- ucwords : majuscule sur la 1ere lettre de la string -->
        <table id="calendar">
            <thead>
                <th>Lundi</th>
                <th>Mardi</th>
                <th>Mercredi</th>
                <th>Jeudi</th>
                <th>Vendredi</th>
                <th>Samedi</th> 
                <th>Dimanche</th>
            </thead>
            <tbody>
            <?php 
            $daysAdded = 0; // compteur jours ajoutés au calendrier
            while($daysAdded < $daysInMonth) : ?> <!-- TANT QUE nb jours ajoutés < nb de jours du mois -->
            <tr> <!-- création d'une ligne dans le tableau -->
            <?php for($td = 1; $td <= 7; $td++){ ?> <!-- boucle pour créer 7 cases par lignes -->
                    <td>
                        <?php if($firstDay != 0 && $cellNumber < $firstDay){
                            echo '';
                        }
                            elseif($firstDay !=0 && $cellNumber >= $firstDay && $cellNumber < ($firstDay + $daysInMonth)){
                                echo $dayNumber;
                                $dayNumber++;
                                $daysAdded++; }
                            elseif($firstDay !=0 && $cellNumber >= $firstDay && $cellNumber >= ($firstDay + $daysInMonth)){
                            echo ''; }
                            elseif($firstDay == 0 && $cellNumber < 7){
                                echo ' '; }
                            elseif($firstDay == 0 && $cellNumber >= 7 && $cellNumber < (7 + $daysInMonth)){
                                echo $dayNumber;
                                $dayNumber++;
                                $daysAdded++; }
                            else{
                                echo ''; } ?>
                    </td>
                    <?php $cellNumber++; } ?>
            </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <div id="infosPHP">
        <p>Timestamp de la sélection : <span class="varStyle"><?=$monthTimestamp?></span><br>Numéro du 1er jour du mois (0 = dimanche) : <span class="varStyle"><?= $firstDay ?></span><br>Nombre de jours dans le mois sélectionné : <span class="varStyle"><?=$daysInMonth?></span></p>
    </div>