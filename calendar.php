<?php

    session_start();
    if($_SESSION['loggedIn'] == false) {
        header("Location: index.php");
        unset($_SESSION['loggedIn']);
    }

    require "dbConnection/dbconn.php";

    $id = $_SESSION['userId'];
    $sql = "SELECT * FROM `Users` WHERE `Id` = $id";
    $result = $conn->query($sql);
    $result = $result->fetch();
    if ($result['is_active'] == 0) {
        header("Location: index.php");
        $_SESSION['loginError'] = "You need to activate your account first! Email with activation link was sent to your email address.";
    }

    // Set timezone
    date_default_timezone_set('Europe/Warsaw');
    // Get prev & next month
    if (isset($_GET['ym'])) {
        $ym = $_GET['ym'];
    } else {
        // This month
        $ym = date('Y-m');
    }

    $thisMonth = date('Y-m');
    // Check format
    $timestamp = strtotime($ym . '-01');  // the first day of the month
    if ($timestamp === false) {
        $ym = date('Y-m');
        $timestamp = strtotime($ym . '-01');
    }
    // Today (Format:2018-08-8)
    $today = date('Y-m-d');
    // Title (Format:August, 2018)
    $title = date('F, Y', $timestamp);
    $titleHidden = date('m', $timestamp);
    // Create prev & next month link
    $prev = date('Y-m', strtotime('-1 month', $timestamp));
    $next = date('Y-m', strtotime('+1 month', $timestamp));
    // Number of days in the month
    $day_count = date('t', $timestamp);
    // 1:Mon 2:Tue 3: Wed ... 7:Sun
    $str = date('N', $timestamp);
    // Array for calendar
    $weeks = [];
    $week = '';
    // Add empty cell(s)
    $week .= str_repeat('<td></td>', $str - 1);
    for ($day = 1; $day <= $day_count; $day++, $str++) {
        if ($day < 10) {
            $day = "0".$day;
        }
        $date = $ym . '-' . $day;
        if ($today == $date) {
            $week .= '<td class="main today addEvent '.$date.'">';
        } else {
            $week .= '<td class="main addEvent '.$date.'">';
        }
        $week .= $day . '</td>';
        // Sunday OR last day of the month
        if ($str % 7 == 0 || $day == $day_count) {
            // last day of the month
            if ($day == $day_count && $str % 7 != 0) {
                // Add empty cell(s)
                $week .= str_repeat('<td></td>', 7 - $str % 7);
            }
            $weeks[] = '<tr>' . $week . '</tr>';
            $week = '';
        }
    }

    //Setting up variables for next and previus mini calendars

    // $prevMonthTimestamp = strtotime($prev . '-01');
    // $nextMonthTimestamp = strtotime($next . '-01');
    // $prevMonthTitle = date('F, Y', $prevMonthTimestamp);
    // $nextMonthTitle = date('F, Y', $nextMonthTimestamp);
    // $prevMonthDay_count = date('t', $prevMonthTimestamp);
    // $nextMonthDay_count = date('t', $nextMonthTimestamp);
    // $prevMonthStr = date('N', $prevMonthTimestamp);
    // $nextMonthStr = date('N', $nextMonthTimestamp);
    // $prevMonthWeeks = [];
    // $nextMonthWeeks = [];
    // $prevMonthWeek = '';
    // $nextMonthWeek = '';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calendar</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/calendar.js"></script>
    <script src="https://kit.fontawesome.com/c98a31cca4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/calendar.css">
</head>
<body>
    <div class="blur"></div>
    <div class="container">
        <div class="calendar">
            <h3><span class='date'><?=$title?></span><br/><a href="?ym=<?=$prev;?>">&lt; prev </a> | <a class="thisMonth" href="?ym=<?=$thisMonth ?>"> this month </a> | <a href="?ym=<?=$next;?>">next &gt;</a></h3>
            <!-- Main calendar -->
            <table class="table table-striped table-bordered main-calendar">
                <thead>
                    <tr>
                        <th class="workDay main">MONDAY</th>
                        <th class="workDay main">TUESDAY</th>
                        <th class="workDay main">WEDNESDAY</th>
                        <th class="workDay main">THURSDAY</th>
                        <th class="workDay main">FRIDAY</th>
                        <th class="weekend main">SATURDAY</th>
                        <th class="weekend main">SUNDAY</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                        foreach ($weeks as $week) {
                            echo $week;
                        }

                    ?>

                </tbody>
            </table>
          
        </div>
    </div>
    <div class="box">
         <a class="logoutBtn" href="logout.php">Log out</a>         
         <div class="addEventMenu">
            <form action="#" method="post">
                <p>Add Event</p>
                <p class="clickedDay"><?=$ym."-"?></p>
                <p class="closeEventMenu">CLOSE</p>
                <input type="text" class="eventName" name="eventTitle" placeholder="Name">
                <textarea class="eventDescription" name="eventDescription" placeholder="Description"></textarea>
                <input type="text" class="eventPlace" name="eventPlace" placeholder="Place"><br/>
                <input type="time" class="eventStartHour" name="eventStartHour"><br/>
                <input type="time" class="eventEndHour" name="eventEndHour"><br/>
                <input type="color" class="eventColor" name="eventColor"><br/>
                <input type="hidden" value="<?=$titleHidden?>" class="month">
                <input type="hidden" value="<?=$_SESSION['userId']?>" class="userId">
                <button class="addEventBtn" name="submit">Add Event</button>
            </form>
        </div>      
    </div>
</body>
</html>
