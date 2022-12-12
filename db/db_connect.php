<?PHP
$host = "localhost";
$user = "haesu0903";
$password = "okbaro400!";
$dbname = "haesu0903";

$link = new mysqli($host, $user, $password);
$link->query("use $dbname");
?>