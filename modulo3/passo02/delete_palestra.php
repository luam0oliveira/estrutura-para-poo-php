<?php

$con = pg_connect("host=kashin.db.elephantsql.com
        dbname=govbajfs
        user=govbajfs
        password=U_GQz_Of-a4R3X7l7E7W6HhOMKmOvHr9");

$id = $_GET['id'];

$query = "DELETE FROM palestras WHERE id='{$id}'";

pg_query($con, $query);