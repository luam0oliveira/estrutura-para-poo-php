<?php

$palestra_dados['id'] = $_POST['id'];
$palestra_dados['name'] = $_POST['name'];
$palestra_dados['palestrante'] = $_POST['palestrante'];
$palestra_dados['inicio'] = $_POST['inicio'];
$palestra_dados['fim'] = $_POST['fim'];

$con = pg_connect("host=kashin.db.elephantsql.com
dbname=govbajfs
user=govbajfs
password=U_GQz_Of-a4R3X7l7E7W6HhOMKmOvHr9");

$query = "INSERT INTO
                palestras(id, name, palestrante, inicio, fim)
                VALUES (
                        '{$palestra_dados['id']}',
                        '{$palestra_dados['name']}',
                        '{$palestra_dados['palestrante']}',
                        '{$palestra_dados['inicio']}',
                        '{$palestra_dados['fim']}'
                        );";
pg_query($con, $query);