<?php
namespace AHT\Core;

use AHT\Core\Model;
use AHT\Config\Database;

class ResourceModel implements ResourceModelInterface
{
    private $table;
    private $id;
    private $model;

    public function _init($table, $id, $model)
    {
        $this->table = $table;
        $this->id = $id;
        $this->model = $model;
    }

    public function save($model)
    {
        $properties = $this->model->getProperties();
        $keys = "";
        $values = "";
        unset($properties['id']);
        foreach ($properties as $key => $value)
        {
            $keys .= $key . ", ";
            $values .= "'$value'" . ", ";
        }
        $sql = "INSERT INTO " .$this->table. " (" .rtrim($keys, ", "). ") VALUES (" .rtrim($values, ", "). ")";
        $reg = Database::getBdd()->prepare($sql);
        return $reg->execute();

    }

    public function edit($id)
    {
        $properties = $this->model->getProperties();
        unset($properties['id']);
        unset($properties['created_at']);
        $update = "";

        foreach ($properties as $key => $value)
        {
            $update .=$key . " = '" . $value . "', ";
        }
        $sql = "UPDATE " .$this->table. " SET " .trim($update, ", "). " WHERE " .$this->id. "= ?";
        $reg = Database::getBdd()->prepare($sql);

        return $reg->execute([$id]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM " .$this->table. " WHERE " .$this->id. "= ?;";
        $reg = Database::getBdd()->prepare($sql);

        return $reg->execute([$id]);
    }

    public function show($id)
    {
        $sql = "SELECT * FROM " .$this->table. " WHERE ".$this->id. " = ?;";
        $reg = Database::getBdd()->prepare($sql);
        $reg->execute([$id]);

        return $reg->fetch();
    }

    public function showAll()
    {
        $sql = "SELECT * FROM " .$this->table;
        $reg = Database::getBdd()->prepare($sql);
        $reg->execute();

        return $reg->fetchAll();
    }
}
?>