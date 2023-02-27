<?php
require_once "database/palestras.php";

include_once "html/components/head.html";

if(isset($_GET['id']) && isset($_GET['action']) && $_GET['action']=='deletar')
{
  delete_palestra($_GET['id']);
}

$palestras = list_palestra();

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
