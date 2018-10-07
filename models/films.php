<?php

function films_all($link) {
    $query = "SELECT * FROM film ORDER by name ASC";
    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));

    $n = mysqli_num_rows($result);
    $films = array();
    for($i = 0; $i < $n; $i++)
    {
        $row = mysqli_fetch_assoc($result);
        $films[] = $row;
    }

    return $films;
}


function film_get($link, $id) {
    $query = sprintf("SELECT * FROM film WHERE id=%d", $id);
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
    if ($poster == '') $poster = 'default_poster.jpg';
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