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
      $con = pg_connect("host=kashin.db.elephantsql.com
      dbname=govbajfs
      user=govbajfs
      password=U_GQz_Of-a4R3X7l7E7W6HhOMKmOvHr9");

      $id = $_GET['id'];

      $query = "SELECT * FROM palestras WHERE id={$id}";
      $result = pg_query($con, $query);
      $row = pg_fetch_assoc($result);
    ?>
    <form action="salvar_edicao.php" method="post">
      <div>
        <label for="id">Código: </label>
        <input type="number" name="id" id="id" readonly value="<?=$row['id']?>" />
      </div>

      <div>
        <label for="name">Nome: </label>
        <input type="text" name="name" id="name" value="<?=$row['name']?>" />
      </div>
      <div>
        <label for="palestrante">Palestrante: </label>
        <input type="text" name="palestrante" id="palestrante" value="<?=$row['palestrante']?>" />
      </div>
      <div>
        <label for="inicio">Inicio: </label>
        <input type="time" name="inicio" id="inicio" value="<?=$row['inicio']?>" />
      </div>
      <div>
        <label for="fim">Fim: </label>
        <input type="time" name="fim" id="fim" value="<?=$row['fim']?>"/>
      </div>
      <button type="submit">Editar</button>
    </form>
  </body>
</html>
