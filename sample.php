<?php
include("encryption.php");
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$string = $_POST['string'];
	$estring = encrypt($string);
	$dstring = decrypt($estring);
	if($string!="")
	{
		$myinput = "Entered String is : ".$string;
		$einput = "Encrypted String is : ".$estring;
		$dinput = "Decrypted String is : ".$dstring;
	}
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>PHP Encryption and Decryption</title>
	</head>
	<body>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			Enter a string to encrypt : <input type="text" name="string" required /><br>
			<input type="submit" value="Encrypt" />
		</form>
	<?php echo $myinput ?><br>
	<?php echo $einput ?><br>
	<?php echo $dinput ?><br>
	</body>
</html>
