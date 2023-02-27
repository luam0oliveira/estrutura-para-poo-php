<?php
require_once "database/palestras.php";
require_once "database/palestra.php";


include_once "html/components/head.html";

$palestraDB = new Palestra();

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
    try{

      $row = $palestraDB->index_palestra($_GET['id']);
      
      foreach($row as $key => $value)
      {
        $form[$key] = $value;
      }
    }
    catch (Exception $e)
    {
      print $e->getMessage();
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
      try{

        $palestra = $palestraDB->save_palestra($form);
        
        $form = $palestra;
      }
      catch(Exception $e)
      {
        print $e->getMessage();
      }
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