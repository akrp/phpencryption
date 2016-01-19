# PHP Encrption
PHP's mcrypt functions can be used to encrypt data, but it's not easy to use them correctly. So Here is a simple PHP API which makes this process more easier than ever. On passing a string to the function crypt() the string can be encrypted and similarly decrypt() is used to decrypt the encrypted string easily.

### How to use PHP Encryption
1. Pass the value to php from html form
<pre>
input type="text" name="string"</pre>

2. Function to encrypt a string
<pre>
//function to encrypt a string
function encrypt($input)//pass the string to the function 
{
    $key = pack('H*', "12345678901234567890123456789012");//change the key as you need
    $ivs = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC); //get iv size
    $iv = mcrypt_create_iv($ivs, MCRYPT_RAND);//create an iv random value
    $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key,$input, MCRYPT_MODE_CBC, $iv); //encrypt the string
    $ciphertext = $iv . $ciphertext; //add with created iv value
    $output= base64_encode($ciphertext); //change to base64 format
    return $output;//return output
}
</pre>

3. Function to decrypt a string
<pre>
//function to decrypt an encrypted string
function decrypt($input)//pass the string to the function
{
    $key = pack('H*', "12345678901234567890123456789012");//change the key as you need but same as the key used to encrypt
    $ivs = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);//get iv size
    $iv = mcrypt_create_iv($ivs, MCRYPT_RAND);//create an iv random value
    $ciphertext_dec = base64_decode($input);//initially decode string from base64 format
    $iv_dec = substr($ciphertext_dec, 0, $ivs);//split the iv random value from the string
    $ciphertext_dec = substr($ciphertext_dec, $ivs); //split the iv random value from the string
    $output = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,$ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec); //decrypt the string
    return $output;//return output
}
</pre>

4. Use this in 'index.php'
<pre>
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
</pre>


#contribute
Contributions to phpencryption are welcome. Here is how you can contribute to phpencryption:

<a href='https://github.com/arunkumarpalaniappan/phpencryption/issues'> Submit bugs</a> and verify issues.

<a href='https://github.com/arunkumarpalaniappan/phpencryption/pulls'> Submit pull requests</a>  for bug fixes and features and discuss existing proposals.
