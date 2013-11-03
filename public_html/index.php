<?php
require_once '..'.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'functions.php';
require_once '..'.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'render.php';
if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'add-book':
        	$tiltle = 'Нова книга';
            $page = 'add_book.php';
            break;
        case 'authors':
        	$tiltle = 'Автори';
            $page = 'authors.php';
            break;
        default:
        	$tiltle = 'Списък';
            $page = 'list.php';
            break;
    }
} else {
	$tiltle = 'Списък';
    $page = 'list.php';
}
require_once '..'.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.$page;