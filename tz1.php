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
hostname��<?php echo $hostname ?><br/>
db��<?php echo $db ?><br/>
username��<?php echo $username ?><br/>
password��<?php echo $password ?><br/>
<?php echo $port ?><br/>
</div>
</body>
</html>