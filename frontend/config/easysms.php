<?php

$ch = curl_init();

$url = "http://www.eazy2sms.in/SMS.aspx?Userid=anwar123&Password=anwar@123&Mobile=7385455311&Message=Dear User Your OTP is 123456, Thank You. www.sdadvertisements.com&Type=1&TempId=81359";
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_HEADER, 0);

curl_exec($ch);

curl_close($ch);
?>