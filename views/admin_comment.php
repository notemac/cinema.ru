


SELECT t1.id, t1.film_id, t1.visitor_name, t1.text, t2.name AS film_name FROM
(SELECT id, film_id, visitor_name, text FROM `comment`) t1
INNER JOIN
(SELECT id, name FROM `film`) t2
ON t1.film_id = t2.id