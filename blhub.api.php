<?php
    $content = $_POST["content"];
    $location = $_POST["location"];
    $add_to_line = $_POST["line"]-1;
    $new_content = null;
    $data = file_get_contents($location);
    $data = explode("\n", $data);
    for ($line=0; $line<count($data); $line++) {
        if(stristr($data[$line], '<!-- WELOVEGOOGLE -->') == false) {
            $new_content .= $data[$line]."\n";
        }
        if($line==$add_to_line) {
            $new_content .= $content."\n";
        }
    }
    echo $new_content;
    file_put_contents($location, $new_content, FILE_TEXT);
?>