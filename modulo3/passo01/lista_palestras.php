<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=], initial-scale=1.0" />
    <title>Passo 01</title>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/styles.css" />
  </head>
  <body>
    <main>
      <h1>Tabela de palestras para o dia 23/10/2023</h1>
      <table>
        <thead>
          <tr>
            <th colspan="2">Ações</th>
            <th>#</th>
            <th>Nome</th>
            <th>Palestrante</th>
            <th>Inicio</th>
            <th>Fim</th>
          </tr>
        </thead>
        <tbody>
          <?php

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
            
            $query = "SELECT * FROM palestras";
            $result = pg_query($con, $query);
            $palestras = pg_fetch_all($result, PGSQL_ASSOC);      
          
            foreach ($palestras as $palestra)
            {
              print ("
                <tr>
                  <td class=\"item-action\">
                    <a href=\"editar_palestra.php?id={$palestra['id']}\">
                      <img
                        class=\"icon\"
                        src=\"img/edit-svgrepo-com.svg\"
                        alt=\"Delete action\"
                      />
                    </a>
                  </td>
                  <td class=\"actions\">
                    <a href=\"delete_palestra.php?id={$palestra['id']}\">
                      <img
                        class=\"icon\"
                        src=\"img/delete-svgrepo-com.svg\"
                        alt=\"Edit action\"
                      />
                    </a>
                  </td>
                  <td>{$palestra['id']}</td>
                  <td>{$palestra['name']}</td>
                  <td>{$palestra['palestrante']}</td>
                  <td>{$palestra['inicio']}</td>
                  <td>{$palestra['fim']}</td>
                </tr>
              ");
            }
          ?>
        </tbody>
      </table>
      <div class="table-action">
        <a class="add-item" href="adicionar_palestra.php"
          ><img class="icon" src="img/add-circle-svgrepo-com.svg" /> Incluir
          palestra</a
        >
      </div>
    </main>
  </body>
</html>
