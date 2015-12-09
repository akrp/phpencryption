<?php
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
?>
