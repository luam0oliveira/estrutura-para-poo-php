<?php
require_once "database/palestras.php";

include_once "html/components/head.html";

$form = [
  "id" => "",
  "name" => "",
  "palestrante" => "",
  "inicio" => "",
  "fim" => "",
];

if(isset($_GET['id']) || isset($_POST['id']))
{
  if(isset($_GET['id']))
  {
    $row = index_palestra($_GET['id']);

    foreach($row as $key => $value)
    {
      $form[$key] = $value;
    }
  }
  else
  {
    if(isset($_GET['action']) && $_GET['action']=='salvar')
    {
      foreach($_POST as $key => $value)
      {
        $form[$key] = $value;
      }

      $palestra = save_palestra($form);
      
      $form = $palestra;
    }
  }
}

$page = file_get_contents("html/form_palestras.html");
$page = str_replace("{{id}}", $form["id"], $page);
$page = str_replace("{{name}}", $form["name"], $page);
$page = str_replace("{{palestrante}}", $form["palestrante"], $page);
$page = str_replace("{{inicio}}", $form["inicio"], $page);
$page = str_replace("{{fim}}", $form["fim"], $page);
print($page);
  
?>