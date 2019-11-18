<?php

$html = <<<EMAIL
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Document</title>
            <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
        </head>
        <body style="background: -webkit-linear-gradient(top, #7579ff, #b224ef); -moz-linear-gradient(top, #7579ff, #b224ef); -ms-linear-gradient(top, #7579ff, #b224ef); -o-linear-gradient(top, #7579ff, #b224ef); linear-gradient(top, #7579ff, #b224ef); background-repeat: no-repeat; height: 100%; text-align: center; font-family: 'Poppins', sans-serif;">

            <table style="margin-left: auto; margin-right: auto;">
            
                <tr style="margin-top: 200px;">
                
                    <td style="text-align: center; width: 700px;"><div style="margin-left: auto; margin-right: auto; font-size: 50px; background-color: white; height: 80px; width: 80px; border-radius: 50%; text-align: center;"><img src="cid:calendar-logo" style="height: 50px; width: 50px; position: absolute; margin-left: -25px; margin-top: 10px;" alt="Calendar logo"></div></td>
                    <td style="color: black; border: 2px solid black; padding: 5px; width: 100px; text-align: center; position: absolute; right: 10px; top: 30px;"><a style="color: black; text-decoration: none;" href="localhost/Calendar/contact.php">CONTACT</a></td>
                    <td style="color: black; border: 2px solid black; padding: 5px; width: 100px; text-align: center; position: absolute; left: 10px; top: 30px;"><a style="color: black; text-decoration: none;" href="localhost/Calendar/index.php">LOGIN PAGE</a></td>
                
                </tr>

                <tr style="text-align: center;">
                    <td><p style="margin-top: 100px;">Hello $username, here is your account activation link!</p><br/><br/></td>
                </tr>
                <tr style="text-align: center;">
                    <td>Please activate your account by clicking the following activation <br/> <a href='localhost/Calendar/activation.php?token=$token' target='_blank' alt='account activation link'>link</a></td>
                </tr>

            </table>


        </body>
    </html>
EMAIL;

?>