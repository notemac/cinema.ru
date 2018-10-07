<?php

function getTimetableOnDate($link, $date) {
    $query = "SELECT t1.date, t1.film_id, t1.time, t2.name AS film_name, t2.genre, t2.poster FROM
    ((SELECT date, film_id, time FROM timetable WHERE date='$date') t1
    INNER JOIN
    (SELECT id, name, genre, poster FROM film) t2
    ON t1.film_id = t2.id) ";

    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));

    $n = mysqli_num_rows($result);
    $seances = array();
    for($i = 0; $i < $n; ++$i)
    {
        $row = mysqli_fetch_assoc($result);
        $row['time'] = explode(' ', $row['time']);
        $seances[] = $row;
    }
    return $seances;
}

function seances_all($link) {
    $query = "SELECT t1.id, t1.film_id, t1.date, t1.time, t2.name AS film_name FROM
    ((SELECT id, film_id, date, time FROM timetable) t1
    INNER JOIN
    (SELECT id, name FROM film) t2
    ON t1.film_id = t2.id) 
    ORDER by date ASC";

    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));

    $n = mysqli_num_rows($result);
    $items = array();
    for($i = 0; $i < $n; $i++)
    {
        $row = mysqli_fetch_assoc($result);
        $items[$row['date']][] = ['id' => $row['id'], 'film_id' => $row['film_id'], 'date' => $row['date'],
            'time' => $row['time'], 'film_name' => $row['film_name']]; 
    }
    return $items;
}

function seance_get($link, $id) {
    $query = sprintf("SELECT * FROM timetable WHERE id=%d", (int)$id);
    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));
    
    $seance = mysqli_fetch_assoc($result);
    return $seance;
}

function seance_add($link, $film_id, $date, $time) {
    $time = trim($time);
    $sql = "INSERT INTO timetable (film_id, date, time) VALUES ('%d', '%s', '%s')";
    $query = sprintf($sql, $film_id, mysqli_real_escape_string($link, $date),
                        mysqli_real_escape_string($link, $time));
    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));
}

function seance_edit($link, $id, $film_id, $date, $time) {
    $time = trim($time);
    $sql = "UPDATE timetable SET film_id='%d', date='%s', time='%s' WHERE id='%d'";
    $query = sprintf($sql, $film_id, mysqli_real_escape_string($link, $date),
                            mysqli_real_escape_string($link, $time),
                            $id);
    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));
    return mysqli_affected_rows($link);
}

function seance_delete($link, $id) {
    if ($id >= 0) {
        $query = sprintf("DELETE FROM timetable WHERE id='%d'", $id);
        $result = mysqli_query($link, $query);
    
        if (!$result)
            die(mysqli_error($link));
    
        return mysqli_affected_rows($link); 
    }
}

?>