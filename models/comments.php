<?php

function comments_all($link) {
    $query = "SELECT t1.id, t1.film_id, t1.visitor_name, t1.text, t2.name AS film_name FROM
    ((SELECT id, film_id, visitor_name, text FROM comment) t1
    INNER JOIN
    (SELECT id, name FROM film) t2
    ON t1.film_id = t2.id) 
    ORDER by film_id DESC, id DESC";

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



function film_get($link, $id) {
    $query = sprintf("SELECT * FROM film WHERE id=%d", (int)$id);
    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));
    
    $film = mysqli_fetch_assoc($result);
    return $film;
}

function film_add($link, $name, $country, $genre, $actor, $description, $poster) {
    $name = trim($name);
    $country = trim($country);
    $genre = trim($genre);
    $actor = trim($actor);
    $description = trim($description);
    $poster = trim($poster);

    $sql = "INSERT INTO film (name, country, genre, actor, description, poster) VALUES ('%s', '%s', '%s', '%s', '%s', '%s')";
    $query = sprintf($sql, mysqli_real_escape_string($link, $name),
                        mysqli_real_escape_string($link, $country),
                        mysqli_real_escape_string($link, $genre),
                        mysqli_real_escape_string($link, $actor),
                        mysqli_real_escape_string($link, $description),
                        mysqli_real_escape_string($link, $poster));
    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));
}

function film_edit($link, $id, $name, $country, $genre, $actor, $description, $poster) {
    $name = trim($name);
    $country = trim($country);
    $genre = trim($genre);
    $actor = trim($actor);
    $description = trim($description);
    $poster = trim($poster);
    $sql = "UPDATE film SET name='%s', country='%s', genre='%s', actor='%s', description='%s' WHERE id='%d'";
    $query = sprintf($sql, mysqli_real_escape_string($link, $name),
                            mysqli_real_escape_string($link, $country),
                            mysqli_real_escape_string($link, $genre),
                            mysqli_real_escape_string($link, $actor),
                            mysqli_real_escape_string($link, $description),
                            $id);
    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));

    if ($poster != '') {
        $sql = "UPDATE film SET poster='%s' WHERE id='%d'";
        $query = sprintf($sql, mysqli_real_escape_string($link, $poster), $id);
        $result = mysqli_query($link, $query);
        if (!$result)
            die(mysqli_error($link));
    }
    return mysqli_affected_rows($link);
}

function film_delete($link, $id) {
    if ($id >= 0) {
        $query = sprintf("DELETE FROM film WHERE id='%d'", $id);
        $result = mysqli_query($link, $query);
    
        if (!$result)
            die(mysqli_error($link));
    
        return mysqli_affected_rows($link); 
    }
}

?>