<?php
function renderPage($contentFile, $variables = array()) {
	if (count($variables) > 0) {
		foreach ($variables as $key => $value) {
			if (strlen($key) > 0) {
				$$key = $value;
			}
		}
	}
	require_once '..'.DIRECTORY_SEPARATOR.'template'.DIRECTORY_SEPARATOR.'header.php';
	if (file_exists('..'.DIRECTORY_SEPARATOR.'template'.DIRECTORY_SEPARATOR.$contentFile)) {
		require '..'.DIRECTORY_SEPARATOR.'template'.DIRECTORY_SEPARATOR.$contentFile;
	} else {
		require '..'.DIRECTORY_SEPARATOR.'template'.DIRECTORY_SEPARATOR.'404.php';
	}
	require '..'.DIRECTORY_SEPARATOR.'template'.DIRECTORY_SEPARATOR.'footer.php';
}