<?php
require_once "database/palestra.php";
require_once "database/database.php";

include_once "html/components/head.html";

$palestraDB = new Palestra();

if(isset($_GET['id']) && isset($_GET['action']) && $_GET['action']=='deletar')
{
  try{
    $palestraDB->delete_palestra($_GET['id']);
  }
  catch(Exception $e)
  {
    print $e->getMessage();
  }
}

try{
  $palestras = $palestraDB->list_palestra();
}
catch(Exception $e)
{
  print $e->getMessage();
}

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
