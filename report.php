<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
</head>
<body>
    <form action="sendReport.php" method="post">
        <input type="email" placeholder="email" name="email">
        <textarea name="message" placeholder="Message"></textarea>
        <label for="reportCause">Error type</label>
        <select name="reportCause">
            <option value="loginError">Login Error</option>
            <option value="registrationError">Registration Error</option>
            <option value="brokenSite">Broken Site (bugs on site)</option>
            <option value="mailError">Mail Error</option>
            <option value="other">Other (specify in message below)</option>
        </select>
        <button name="reportBtn">Send Report</button>
    </form>
</body>
</html>