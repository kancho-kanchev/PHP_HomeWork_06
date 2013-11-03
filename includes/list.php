<?php
if (isset($_GET['author_id'])) {
    $author_id = (int) $_GET['author_id'];
    // Сменил съм заявката за да връща повече от един автор на книга
    $q = mysqli_query($db, 'SELECT b.book_id, b.book_title, a.author_name as author_name, a.author_id
    FROM `authors` as a
    LEFT JOIN books_authors as ba
    ON ba.author_id = a.author_id
    LEFT JOIN books as b
    ON b.book_id = ba.book_id
    LEFT JOIN books_authors as ba2
    ON ba2.book_id = b.book_id
    WHERE ba2.author_id = '.$author_id);
} else {
    $q = mysqli_query($db, 'SELECT * FROM books as b INNER JOIN 
    books_authors as ba ON b.book_id=ba.book_id INNER JOIN authors as a
     ON a.author_id=ba.author_id');
}


$result = [];
while ($row = mysqli_fetch_assoc($q)) {
    //echo '<pre>'.print_r($row, true).'</pre>';
    $result[$row['book_id']]['book_title'] = $row['book_title'];
    $result[$row['book_id']]['authors'][$row['author_id']] = $row['author_name'];
}
$variables = array(
		'title'  => 'Списък',
		'result' => $result,
);

renderPage('list_html.php', $variables);
