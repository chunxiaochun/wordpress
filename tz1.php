<?php
$services_json = json_decode(getenv("VCAP_SERVICES"),true);
$mysql_config = $services_json["mysql-5.1"][0]["credentials"];

$username = $mysql_config["username"];
$password = $mysql_config["password"];
$hostname = $mysql_config["hostname"];
$port = $mysql_config["port"];
$db = $mysql_config["name"];
?>
<html>
<body>

<div>
hostname£º<?php echo $hostname ?><br/>
db£º<?php echo $db ?><br/>
username£º<?php echo $username ?><br/>
password£º<?php echo $password ?><br/>
<?php echo $port ?><br/>
</div>
</body>
</html>