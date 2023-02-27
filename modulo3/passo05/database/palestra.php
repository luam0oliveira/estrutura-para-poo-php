<?php
require_once "database.php";

class Palestra extends Database {

    function __construct()
    {
        parent::__construct();
    }


    function save_palestra($palestra)
    {
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
            
            $palestra['id'] = $this->generate_id();
    
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

        $this->con->query($query);
    
        return $palestra;
    }
    

    function index_palestra(int $id)
    {
        $query = "SELECT * FROM palestras WHERE id={$id}";
    
        $result = $this->con->query($query)->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    function list_palestra()
    {
        $query = "SELECT * FROM palestras";

        $palestras = $this->con->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return $palestras;
    }

    function delete_palestra(int $id)
    {
        $query = "DELETE FROM palestras WHERE id='{$id}'";
    
        $this->con->query($query);
        
        return;
    }

    private function generate_id()
    {
        $query = "SELECT max(id) AS id FROM palestras";

        $result = $this->con->query($query)->fetch(PDO::FETCH_ASSOC);
        
        return (int) ($result['id'] + 1);
    }
}