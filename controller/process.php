<?php
/*Taking in form input from View and inserting it into the database. Two tables, "HighRisk" and "LowRisk" are used.
The individual's information is added to "HighRisk" if they have had relevant symptoms, been in contact with someone
who has had symptoms, been in contact with someone who has tested Covid positive, or travelled beyond city limits.
Else, their information is added to the "LowRisk" table.*/

//declaring variables to store information entered in the form
$name = $email = $reason = $symptoms = $contactSymptoms = $contactCovid = $covidNegative = $travelDetails = '';
$age = 0;
$date = date("d/m/Y"); //retrieving current date from inbuilt function

//storing information entered in the form
foreach ($_POST as $question => $value) {
    switch ($question) {
        case 'name':
            $name = $value;
            break;
        case 'age':
            $age = $value;
            break;
        case 'email':
            $email = $value;
            break;
        case 'reason':
            $reason = $value;
            break;
        case is_array($value):
            $symptoms = implode(', ', $value); //converting array values to a single string separated by commas
            break;
        case 'SickRelative':
            $contactSymptoms = $value;
            break;
        case 'CovidPositiveRelative':
            $contactCovid = $value;
            break;
        case 'CovidNegative':
            $covidNegative = $value;
            break;
        case 'travel':
            $travelDetails = $value;
            break;
    }
}

//Establishing database connection and inserting values into the relevant "HighRisk" or "LowRisk" tables

$servername = "localhost"; //change as necessary
$username = "root"; //change as necessary
$password = "password"; //change as necessary
$dbname = "VisitorDB";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//creating prepared statement for HighRisk or LowRisk table based on user input
$stmt = "";
if ('' != $symptoms || 'yes' == $contactSymptoms || 'yes' == $contactCovid || '' != $travelDetails) {
    $stmt = $conn->prepare("INSERT INTO HighRisk(date, name, age, email, reason, CovidTest, Symptoms, ContactWithSymptoms, ContactWithCovPositive, Travel)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisssssss", $date, $name, $age, $email, $reason, $covidNegative, $symptoms, $contactSymptoms, $contactCovid, $travelDetails);
} else {
    $stmt = $conn->prepare("INSERT INTO LowRisk(date, name, age, email, reason, CovidTest)
        VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisss", $date, $name, $age, $email, $reason, $covidNegative);
}

//showing Thank You message after information is recorded
if ($stmt->execute() === TRUE) {
    echo "<h3>Thank you for your information</h3>";
} else {
    echo "There was an error recording your information.";
}

$conn->close(); //closing db connection
?>

