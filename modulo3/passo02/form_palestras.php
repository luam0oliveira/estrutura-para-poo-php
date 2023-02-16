<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=], initial-scale=1.0" />
    <title>Passo 01</title>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/styles.css" />
  </head>
  <body>
    <?php
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
    ?>
    <form action="form_palestras.php?action=salvar" method="post">
      <div>
        <label for="id">Código: </label>
        <input type="number" name="id" id="id" readonly value="<?=$form['id']?>" />
      </div>

      <div>
        <label for="name">Nome: </label>
        <input type="text" name="name" id="name" value="<?=$form['name']?>" />
      </div>
      <div>
        <label for="palestrante">Palestrante: </label>
        <input type="text" name="palestrante" id="palestrante" value="<?=$form['palestrante']?>" />
      </div>
      <div>
        <label for="inicio">Inicio: </label>
        <input type="time" name="inicio" id="inicio" value="<?=$form['inicio']?>" />
      </div>
      <div>
        <label for="fim">Fim: </label>
        <input type="time" name="fim" id="fim" value="<?=$form['fim']?>"/>
      </div>
      <button type="submit">Salvar</button>
    </form>
  </body>
</html>
