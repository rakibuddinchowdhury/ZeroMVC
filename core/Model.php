<?php

namespace Core;

abstract class Model
{
    // The child class must define which table it uses
    abstract public function tableName(): string;

    public function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }

    // Get all records from the table
    public function all()
    {
        $tableName = $this->tableName();
        $statement = $this->prepare("SELECT * FROM $tableName");
        $statement->execute();
        return $statement->fetchAll();
    }

    // Find a specific record
    public function find($id)
    {
        $tableName = $this->tableName();
        $statement = $this->prepare("SELECT * FROM $tableName WHERE id = :id");
        $statement->execute(['id' => $id]);
        return $statement->fetch();
    }
    // Add this inside abstract class Model
    public function save($data)
    {
        $tableName = $this->tableName();
        
        // Get keys (column names) and create placeholders (:name, :email)
        $keys = array_keys($data);
        $columns = implode(',', $keys);
        $placeholders = implode(',', array_map(fn($key) => ":$key", $keys));
        
        $sql = "INSERT INTO $tableName ($columns) VALUES ($placeholders)";
        
        $statement = $this->prepare($sql);
        return $statement->execute($data);
    }
    // Add this to core/Model.php
    public function delete($id)
    {
        $tableName = $this->tableName();
        $statement = $this->prepare("DELETE FROM $tableName WHERE id = :id");
        return $statement->execute(['id' => $id]);
    }
    // Add this to core/Model.php
    public function update($id, $data)
    {
        $tableName = $this->tableName();
        
        // Transform keys into "name = :name, email = :email"
        $setParams = "";
        foreach (array_keys($data) as $key) {
            $setParams .= "$key = :$key,";
        }
        $setParams = rtrim($setParams, ","); // Remove trailing comma

        $sql = "UPDATE $tableName SET $setParams WHERE id = :id";
        
        // Add the ID to the data array so execute() binds it correctly
        $data['id'] = $id;
        
        $statement = $this->prepare($sql);
        return $statement->execute($data);
    }
}