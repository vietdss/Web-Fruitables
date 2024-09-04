<?php

class BaseModel extends Database
{
    public $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function getAll($table)
    {
        $sql = "SELECT * FROM $table";
        $result = $this->conn->query($sql);

        return $result;
    }

    public function getById($table,$id)
    {
        $sql = "SELECT * FROM $table WHERE Id = '$id'";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    
    public function add($tableName, $data, $file = null)
    {
        $columns = implode(',', array_keys($data));
        $values = implode("','", array_values($data));

        if ($file) {
            $fileType = $file['type'];
            $fileName = $file['name'];
            $tmpName = $file['tmp_name'];
            $newFileName = basename($fileName);
            $targetPath = '../Content/assets/img/' . $newFileName;

            if (in_array($fileType, ['image/jpeg', 'image/jpg', 'image/png'])) {
                move_uploaded_file($tmpName, $targetPath);
                $data['Image'] = $fileName;
            }
        }

        $columns = implode(',', array_keys($data));
        $values = implode("','", array_values($data));

        $sql = "INSERT INTO $tableName($columns) VALUES ('$values')";
        $this->conn->query($sql);
    }
    public function edit($tableName, $data, $id, $file = null)
    {
        if ($file) {
            $fileType = $file['type'];
            $fileName = $file['name'];
            $tmpName = $file['tmp_name'];
            $newFileName = basename($fileName);
            $targetPath = '../Content/assets/img/' . $newFileName;

            if (in_array($fileType, ['image/jpeg', 'image/jpg', 'image/png'])) {
                move_uploaded_file($tmpName, $targetPath);
                $data['Image'] = $fileName;
            }
        }

        $updateFields = [];
        foreach ($data as $column => $value) {
            $updateFields[] = "$column = '$value'";
        }
        $updateString = implode(',', $updateFields);

        $sql = "UPDATE $tableName SET $updateString WHERE Id = '$id'";
        $this->conn->query($sql);
    }
    
    public function delete($tableName, $id)
    {
        $sql = "DELETE FROM $tableName WHERE Id = '$id'";
        $this->conn->query($sql);
    }
}
