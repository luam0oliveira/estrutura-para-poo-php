<?php

function init_palestra_con()
{
    $con = pg_connect("host=kashin.db.elephantsql.com
        dbname=govbajfs
        user=govbajfs
        password=U_GQz_Of-a4R3X7l7E7W6HhOMKmOvHr9");

    $query = "CREATE TABLE IF NOT EXISTS palestras(
        id INTEGER PRIMARY KEY,
        name TEXT NOT NULL,
        palestrante TEXT NOT NULL,
        inicio TEXT NOT NULL,
        fim TEXT NOT NULL);";

    pg_query($con, $query);
    
    return $con;
}

function generate_id()
{
    $con = init_palestra_con();

    $query = "SELECT max(id) AS id FROM palestras";

    $result = pg_fetch_assoc(pg_query($con, $query));
    
    return (int) ($result['id'] + 1);
}

// save(create or update) palestra 
function save_palestra($palestra)
{
    $con = init_palestra_con();

    $query = "";

    if(isset($palestra['id']) && is_numeric($palestra['id']))
    {
        $query = "UPDATE palestras
            SET 
                name = '{$palestra['name']}',
                palestrante = '{$palestra['palestrante']}',
                inicio = '{$palestra['inicio']}',
                fim = '{$palestra['fim']}'
            WHERE
                id = '{$palestra['id']}';";
    }
    else
    {
        
        $palestra['id'] = generate_id();

        $query = "INSERT INTO
            palestras(id, name, palestrante, inicio, fim)
            VALUES (
                '{$palestra['id']}',
                '{$palestra['name']}',
                '{$palestra['palestrante']}',
                '{$palestra['inicio']}',
                '{$palestra['fim']}'
            );";
    }

    pg_query($con, $query);

    return $palestra;
}

// return void
function delete_palestra(int $id)
{
    $con = init_palestra_con();
    
    $query = "DELETE FROM palestras WHERE id='{$id}'";
    
    pg_query($con, $query);
    
    return;
}

// return a palestra data
function index_palestra(int $id)
{
    $con = init_palestra_con();

    $query = "SELECT * FROM palestras WHERE id={$id}";
    
    $result = pg_fetch_assoc(pg_query($con, $query));

    return $result;
}

// return a array of palestra array
function list_palestra()
{
    $con = init_palestra_con();

    $query = "SELECT * FROM palestras";

    $palestras = pg_fetch_all(pg_query($con, $query));

    return $palestras;
}