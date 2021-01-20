<?php


class AbstractModel
{

    public $id;
    public $iduser;
    public $table;
    public $db;

    function __construct()
    {

        try {
            //faire gaffe, quand on héberge un site, bien mettre sans espace entre mysql:host=
            $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';',
                DB_USER,
                DB_PASSWORD);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    //read: lecture d'une table de la BDD par la clé primaire -->renvoie une seule ligne
    function read($fields = null)
    {
        if ($fields == null) {
            $fields = "*";
        }
        /* Exécute une requête préparée en passant un tableau de valeurs */
        $sql = ' SELECT ' . $fields . ' FROM ' . $this->table . ' WHERE id=:id';
        //echo $sql;
        //préparation PDO
        $sth = $this->db->prepare($sql);
        //chargement du résultat de la requête SQL en mémoire dans un tableau
        if ($sth->execute(array(':id' => $this->id))) {
            $data = $sth->fetch(PDO::FETCH_OBJ);
            foreach ($data as $key => $value) {
                //on peut créer "à la volée" les propriété de la classe
                $this->$key = $value;

            }
        } else {
            echo " erreur SQL";
        }
    }

    //save : insertion ou une modifcation d'une ligne dans la BDD
    function save($conditions, $data)
    {    //on verifie si id existe
        if (empty($data["id"])) {
            unset($data['id']);

            if (isset($conditions['table'])) {
                $this->table = $conditions['table'];
            }
            if (isset($conditions['fields'])) {
                $fields = explode(',', $conditions['fields']);
            }

            foreach ($data as $key => $value) {
                if (array_search($key, $fields) !== false) {
                    '';
                } else {
                    unset($data[$key]);
                }
            }

            //construction requete SQL
            $sql = "INSERT INTO " . $this->table . "(";
            $values = "";
            foreach ($data as $key => $value) {
                $sql .= $key . ",";
                $values .= ":" . $key . ",";
            }
            //enleve le dernier caractère, donc la virgule
            $sql = substr($sql, 0, -1);
            $values = substr($values, 0, -1);
            $sql .= ") VALUES(" . $values . ")";

            echo $sql;
            //prépration SQL
            $sth = $this->db->prepare($sql);

            //exécution SQL
            if ($sth->execute($data)) {
                //echo "Insertion OK : ".$this->db->lastInsertId();
                $this->id = $this->db->lastInsertId();
            } else {
                echo "erreur SQL";
            }

        } else {
            $this->id = $data['id'];
            //construction requete SQL
            $sql = "UPDATE " . $this->table . " SET ";
            $values = "";
            foreach ($data as $key => $value) {
                $sql .= $key . "= :" . $key . ",";

            }
            //enleve le dernier caractère, donc la virgule
            $sql = substr($sql, 0, -1);
            $sql .= " WHERE id=" . $this->id;
            echo $sql;

            //prépration SQL
            $sth = $this->db->prepare($sql);

            if ($sth->execute($data)) {
                echo "Maj OK ";
            } else {
                echo "erreur SQL";
            }
        }
    }

    //find: lecture d'une ou plusieurs table --> renvoie plusieurs lignes
    function findAll($data = '')
    {

        $fields = "*";
        $inner = " ";
        $condition = "1=1";
        $order = "";
        $limit = " ";

        if (isset($data["table"])) {
            $this->table = $data["table"];
        }
        if (isset($data["fields"])) {
            $fields = $data["fields"];
        }
        if (isset($data["inner"])) {
            $inner = $data["inner"];
        }
        if (isset($data["condition"])) {
            $condition = $data["condition"];
        }
        if (isset($data["order"])) {
            $order = ' ORDER BY ' . $data["order"];
        }
        if (isset($data["limit"])) {
            $limit = $data["limit"];
        }
        /* Exécute une requête préparée en passant un tableau de valeurs */
        $sql = ' SELECT ' . $fields . '
					 FROM ' . $this->table . '
					 ' . $inner . '
					 WHERE ' . $condition .
            $order . '
					 ' . $limit;
        echo $sql;
        //préparation PDO
        $sth = $this->db->prepare($sql);
        //chargement du résultat de la requête SQL en mémoire dans un tableau
        if ($sth->execute()) {
            $d = $sth->fetchAll(PDO::FETCH_OBJ);
            return $d;
        } else {
            echo " erreur SQL";
        }
    }

    //find: lecture d'une ou plusieurs table --> renvoie 1 ligne
    function findOneById($data)
    {
        //retourne l'élement courant du tableau

        return current($this->findAll($data));
    }

    //delete : on supprime une ligne sur clé primaire
    function delete()
    {

        /* Exécute une requête préparée en passant un tableau de valeurs */
        $sql = ' DELETE FROM ' . $this->table . ' WHERE id=:id';
        echo $sql;
        //préparation PDO
        $sth = $this->db->prepare($sql);
        //chargement du résultat de la requête SQL en mémoire dans un tableau
        if ($sth->execute(array(':id' => $this->id))) {
            //suppr ok
            return true;

        } else {
            //echo " erreur SQL";
            return false;
        }
    }

    function updatecolonnes($data)
    {
        //echo "UPDATE";
        echo "<PRE>";
        print_r($data);
        echo "</PRE>";
        $this->iduser = $_SESSION['user']->CODE_UTILISATEUR;
        //construction requete SQL
        $sql = "UPDATE " . $this->table . " SET ";
        $values = "";
        foreach ($data as $key => $value) {
            $sql .= $key . "= :" . $key . ",";
            echo $key;

        }
        //enleve le dernier caractère, donc la virgule
        $sql = substr($sql, 0, -1);
        $sql .= " WHERE CODE_UTILISATEUR=" . $this->iduser;
        //echo $sql;
        //prépration SQL
        $sth = $this->db->prepare($sql);

        if ($sth->execute($data)) {
            echo "Maj OK ";

        } else {
            echo "erreur SQL";
        }
    }

}


?>
