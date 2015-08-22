<?php

class Crud {

    protected $db;
    private $result;
    protected $table;

    public function __construct($db, $table) {
        $this->db = $db;
        $this->table = $table;
    }

    /*
     * Insert values into the table
     */

    public function insert($rows = null) {
        $command = 'INSERT INTO ' . $this->table;
        $row = null;
        $value = null;
        foreach ($rows as $key => $nilainya) {
            $row .="," . $key;
            $value .=", :" . $key;
        }

        $command .="(" . substr($row, 1) . ")";
        $command .="VALUES(" . substr($value, 1) . ")";

        $stmt = $this->db->prepare($command);
        try {
            $stmt->execute($rows);
            $rowcount = $stmt->rowCount();
            return $rowcount;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    /*
     * Delete records from the database.
     */

    public function delete($where = null) {
        $command = 'DELETE FROM ' . $this->table;

        $list = Array();
        $parameter = null;
        foreach ($where as $key => $value) {
            $list[] = "$key = :$key";
            $parameter .= ', ":' . $key . '":"' . $value . '"';
        }
        $command .= ' WHERE ' . implode(' AND ', $list);

        $json = "{" . substr($parameter, 1) . "}";
        $param = json_decode($json, true);

        $query = $this->db->prepare($command);
        try {
            $query->execute($param);
            $rowcount = $query->rowCount();
            return $rowcount;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    /*
     * Uddate Record
     */

    public function update($fild = null, $where = null) {
        $update = 'UPDATE ' . $this->table . ' SET ';
        $set = null;
        $value = null;
        foreach ($fild as $key => $values) {
            $set .= ', ' . $key . ' = :' . $key;
            $value .= ', ":' . $key . '":"' . $values . '"';
        }
        $update .= substr(trim($set), 1);
        $json = '{' . substr($value, 1) . '}';
        $param = json_decode($json, true);

        if ($where != null) {
            $update .= ' WHERE ' . $where;
        }
        try {
            $query = $this->db->prepare($update);
            $query->execute($param);
            $rowcount = $query->rowCount();
            return $rowcount;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    /*
     * Selects information from the database.
     */

    public function select($rows, $where = null, $order = null, $limit = null) {
        $command = 'SELECT ' . $rows . ' FROM ' . $this->table;
        if ($where != null)
            $command .= ' WHERE ' . $where;
        if ($order != null)
            $command .= ' ORDER BY ' . $order;
        if ($limit != null)
            $command .= ' LIMIT ' . $limit;

        $query = $this->db->prepare($command);
        $query->execute();

        $posts = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $posts[] = $row;
        }
        return $this->result = $posts;
    }

    public function selectWithSql($sql) {
        $query = $this->db->prepare($sql);
        $query->execute();
        $posts = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $posts[] = $row;
        }
        return $this->result = $posts;
    }

    /*
     * Returns the result set
     */

    public function getResult() {
        return $this->result;
    }

}

?>
