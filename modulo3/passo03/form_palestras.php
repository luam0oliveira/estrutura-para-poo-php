<?php
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
  $con = pg_connect("host=kashin.db.elephantsql.com
  dbname=govbajfs
  user=govbajfs
  password=U_GQz_Of-a4R3X7l7E7W6HhOMKmOvHr9");
  
  if(isset($_GET['id']))
  {
    $id = $_GET['id'];

    $query = "SELECT * FROM palestras WHERE id={$id}";
    $result = pg_query($con, $query);
    $row = pg_fetch_assoc($result);

    foreach($row as $key => $value)
    {
      $form[$key] = $value;
    }
  }
  else
  {
    $query = "";
    if(isset($_GET['action']) && $_GET['action']=='salvar')
    {
      foreach($_POST as $key => $value)
      {
        $form[$key] = $value;
      }

      if(isset($form['id']) && is_numeric($form['id']))
      {
        $query = "UPDATE palestras
                  SET 
                      name = '{$form['name']}',
                      palestrante = '{$form['palestrante']}',
                      inicio = '{$form['inicio']}',
                      fim = '{$form['fim']}'
                  WHERE
                      id = '{$form['id']}';";
      }
      else
      {
        $query = "SELECT max(id) AS id FROM palestras";

        $result = pg_query($con, $query);
        $row = pg_fetch_assoc($result);
        $form['id'] = (int) ($row['id'] + 1);

        $query = "INSERT INTO
              palestras(id, name, palestrante, inicio, fim)
              VALUES (
                      '{$form['id']}',
                      '{$form['name']}',
                      '{$form['palestrante']}',
                      '{$form['inicio']}',
                      '{$form['fim']}'
                      );";
      }
    }
    pg_query($con, $query);
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