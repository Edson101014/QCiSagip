<?php

function decrypt($value, $key) {

   $data = base64_decode($value);

   $iv = substr($data, 0, openssl_cipher_iv_length('aes-256-cbc'));

   $iv = str_pad($iv, 16, "\0");

   $encrypted = substr($data, openssl_cipher_iv_length('aes-256-cbc'));

   $result = openssl_decrypt($encrypted, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
   
   return $result;
}


?>