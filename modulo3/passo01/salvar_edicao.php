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

$query = "UPDATE palestras
            SET 
                name = '{$palestra_dados['name']}',
                palestrante = '{$palestra_dados['palestrante']}',
                inicio = '{$palestra_dados['inicio']}',
                fim = '{$palestra_dados['fim']}'
            WHERE
                id = '{$palestra_dados['id']}';";
pg_query($con, $query);