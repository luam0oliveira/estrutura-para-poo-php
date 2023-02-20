<?php

include_once "html/components/head.html";

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


if(isset($_GET['id']) && isset($_GET['action']) && $_GET['action']=='deletar')
{
  $id = $_GET['id'];

  $query = "DELETE FROM palestras WHERE id='{$id}'";

  pg_query($con, $query);
}

$query = "SELECT * FROM palestras";
$result = pg_query($con, $query);
$palestras = pg_fetch_all($result, PGSQL_ASSOC);

$rows = "";

foreach ($palestras as $palestra)
{
  $item = file_get_contents("html/components/table_row.html");
  $item = str_replace("{{id}}", $palestra["id"], $item);
  $item = str_replace("{{name}}", $palestra["name"], $item);
  $item = str_replace("{{palestrante}}", $palestra["palestrante"], $item);
  $item = str_replace("{{inicio}}", $palestra["inicio"], $item);
  $item = str_replace("{{fim}}", $palestra["fim"], $item);

  $rows .= $item;
}

$page = file_get_contents("html/lista_palestras.html");
$page = str_replace("{{rows}}", $rows, $page);

print ($page);

// <td>{$palestra['id']}</td>
// <td>{$palestra['name']}</td>
// <td>{$palestra['palestrante']}</td>
// <td>{$palestra['inicio']}</td>
// <td>{$palestra['fim']}</td>