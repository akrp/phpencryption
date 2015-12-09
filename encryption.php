<?php
function encrypt($input)
{
    $key = pack('H*', "12345678901234567890123456789012");
    $ivs = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $iv = mcrypt_create_iv($ivs, MCRYPT_RAND);
    $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key,$input, MCRYPT_MODE_CBC, $iv);
    $ciphertext = $iv . $ciphertext;
    $output= base64_encode($ciphertext);
	return $output;
}
function decrypt($input)
{
    $key = pack('H*', "12345678901234567890123456789012"");
    $ivs = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $iv = mcrypt_create_iv($ivs, MCRYPT_RAND);
    $ciphertext_dec = base64_decode($input);
    $iv_dec = substr($ciphertext_dec, 0, $ivs);
    $ciphertext_dec = substr($ciphertext_dec, $ivs);
    $output = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,$ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);
	return $output;
}
?>
