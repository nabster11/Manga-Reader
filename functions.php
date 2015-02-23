<?php
	function openZip($file_to_open) {
		global $target;
		global $unique_folder;
		$zip = new ZipArchive();
			$x = $zip->open($file_to_open);
			if ($x === true) {
				$zip->extractTo($target . $unique_folder);
				$zip->close();

				unlink($file_to_open); #deletes the zip file. We no longer need it.
			} else {
				die("There was a problem. Please try again!");
			}
		}
?>