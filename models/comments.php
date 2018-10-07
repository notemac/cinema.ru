<?php

function getCommentsForFilm($link, $film_id) {
    $query = "SELECT * FROM comment WHERE film_id='$film_id' ORDER by id DESC";
    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));

    $n = mysqli_num_rows($result);
    $comments = array();
    for($i = 0; $i < $n; $i++)
    {
        $row = mysqli_fetch_assoc($result);
        $comments[] = $row; 
    }
    return $comments;
}

function comments_all($link) {
    $query = "SELECT t1.id, t1.film_id, t1.visitor_name, t1.text, t2.name AS film_name FROM
    ((SELECT id, film_id, visitor_name, text FROM comment) t1
    INNER JOIN
    (SELECT id, name FROM film) t2
    ON t1.film_id = t2.id) 
    ORDER by film_name ASC, id DESC";

    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));

    $n = mysqli_num_rows($result);
    $items = array();
    for($i = 0; $i < $n; $i++)
    {
        $row = mysqli_fetch_assoc($result);
        $items[$row['film_name']][] = ['id' => $row['id'], 'film_id' => $row['film_id'], 'visitor_name' => $row['visitor_name'],
            'text' => $row['text'], 'film_name' => $row['film_name']]; 
    }
    return $items;
}

function comment_get($link, $id) {
    $query = sprintf("SELECT * FROM comment WHERE id=%d", (int)$id);
    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));
    
    $comment = mysqli_fetch_assoc($result);
    return $comment;
}

function comment_add($link, $visitor_name, $text, $film_id) {
    $visitor_name = trim($visitor_name);
    if ($visitor_name == '') $visitor_name = 'anonymous';
    $text = trim($text);

    $sql = "INSERT INTO comment (visitor_name, text, film_id) VALUES ('%s', '%s', '%d')";
    $query = sprintf($sql, mysqli_real_escape_string($link, $visitor_name),
                        mysqli_real_escape_string($link, $text),
                        $film_id);
    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));
}

function comment_edit($link, $id, $visitor_name, $text) {
    $visitor_name = trim($visitor_name);
    if ($visitor_name == '') $visitor_name = 'anonymous';
    $text = trim($text);
    $sql = "UPDATE comment SET visitor_name='%s', text='%s' WHERE id='%d'";
    $query = sprintf($sql, mysqli_real_escape_string($link, $visitor_name),
                            mysqli_real_escape_string($link, $text),
                            $id);
    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));
    return mysqli_affected_rows($link);
}

function comment_delete($link, $id) {
    if ($id >= 0) {
        $query = sprintf("DELETE FROM comment WHERE id='%d'", $id);
        $result = mysqli_query($link, $query);
    
        if (!$result)
            die(mysqli_error($link));
    
        return mysqli_affected_rows($link); 
    }
}

?>