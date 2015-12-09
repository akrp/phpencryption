# PHP Encrption
PHP's mcrypt functions can be used to encrypt data, but it's not easy to use them correctly. So Here is a simple PHP API which makes this process more easier than ever. On passing a string to the function crypt() the string can be encrypted and similarly decrypt() is used to decrypt the encrypted string easily.

It can be done through these steps:

1. Import the encryption API to your .html file under <head> </head> tags.
2. Save it as .php
3. To encrypt pass a value to the function encrypt($string);
4. To decrypt pass the decrypted string to decrypt($encodedstring);

An Example:<br>
1. This PHP encrypts the Content<br>
2. Pass the value to PHP variable from HTML<br>
3. Display the encrypted and decrypted string<br><br>
<pre><?php<br>
if ($_SERVER["REQUEST_METHOD"] == "POST")<br>
{<br>
	$string = $_POST['string'];<br>
	$estring = encrypt($string);<br>
	$dstring = decrypt($estring);<br>
	if($string!="")<br>
	{<br>
		$myinput = "Entered String is : ".$string;<br>
		$einput = "Encrypted String is : ".$estring;<br>
		$dinput = "Decrypted String is : ".$dstring;<br>
	}<br>
}<br>
?></pre>


<pre>
type = "text" name = "string"
</pre>
	<?php echo $myinput ?>
	<?php echo $einput ?>
	<?php echo $dinput ?>
 
