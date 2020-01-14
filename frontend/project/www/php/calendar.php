<?php
include "config/config.php";

function build_calendar($month, $year){

    // First we create an array containing names of all days in a week
    $daysofWeek = array('Sunday','Monday','Tuesday','Wednesday', 'Thursday','Friday','Saturday');

    //Then we'll get the first day of the month that is in the argument of this function
    $firstDayOfMonth = mktime(0,0,0,$month,1,$year);

    //Getting number of days in a month contains
    $numberDays = date('t',$firstDayOfMonth);

    //Getting information about the first day of this month
    $dateComponents = getdate($firstDayOfMonth);

    //Getting the name of this month
    $monthName = $dateComponents['month'];

    //Getting the index value 0-6 of the first day of this month
    $daysOfWeek = $dateComponents['wdays'];

    //Getting the current date
    $datetoday = date('Y-m-d');

    //HTML Table
    $calendar .= "<table class='table table-bordered'>";
    
    $calendar .= "<center><h2>$monthName $year</h2></center>";

    $calendar .= "<tr>";

    //Creating the calendar headers
    foreach($daysOfWeek as $day){
        $calendar .= "<th class='header'>$day</th>";
    }

    $calendar .= "</tr><tr>";

    //The variable $dayOfWeek will make sure that there must be only 7 columns on our table
    if($dayOfWeek > 0){
        for($i=0;$i<$dayOfWeek;$i++){
            $calendar.="<td></td>";
        }
    }

        //Initiating the day counter
        $currentDay = 1;

        //Getting the month number

        $month = str_pad($month, 2, "0",STR_PAD_LEFT);

        while($currentDay <= $numberDays){ 
            
            //if seventh column (saturday) reached, start a new row
            if($dayOfWeek == 7){
                $dayOfWeek = 0;
                $calendar.= "</tr><tr>";
            }

            $currentDayRel = str_pad($currentDay,2,"0",STR_PAD_LEFT);
            $date ="$year-$month-$currentDayRel";

            $calendar.="<td><h4>$currentDay</h4></td>";

            $calendar.="</td>";

            //Increment the counters 
            $currentDay++;
            $dayOfWeek++:


        }

        //Completing the row of the last week in month, if necessary

        if($dayOfWeek != 7){

            $remainingDays = 7 -$dayOfWeek;
            for($i=0;$i<$remainingDays;$i++){
                $calendar.="<td></td>";
            }
        }

        $calendar.="</tr";
        $calendar.="</table";

        echo $calendar;

}



}
?>

<html>
<head>

<!-- CDN LINK FOR BOOTSTRAP-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                $dateComponents = getDate();
                $month = $dateComponents['mon'];
                $year = dateComponents['year'];
                echo build_calendar($month, $year);
                ?>
            </div>
        </div>
    </div>
</body>
</html>