<?php
namespace Simple\Database;

class Database implements DatabaseInterface
{
    public $db;
    public $query;

    private $select;
    private $where;
    private $join;
    public function __construct()
    {
        chdir(realpath('../Engine'));
        $this->db = new \PDO('sqlite:database.sqlite3');
        $this->db->setAttribute(\PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION);
        $this->where = array();
        $this->join = array();
    }

    public function query($sql){
        $this->query = $sql;
        return $this;
    }
    public function insert($table, $data){
        $columns = "";
        $values = "";
        if (is_array($data)){
            foreach ($data as $i => $n) {
                $columns .= ', \'' . $i . '\'';
                $values .= ', \'' . $n . '\'';
            }
            $columns = substr($columns, 2);
            $values = substr($values, 2);
            $this->query = 'INSERT INTO ' .$table. ' ('. $columns .') VALUES ('. $values . ');';
        }
        return $this->db->exec($this->query);
    }
    public function delete($table, $id){

    }
    public function select($table){
        $this->select = 'SELECT * FROM '. $table . ' ';
        return $this;
    }
    public function where($cond){
        array_push($this->where, $cond);
        return $this;
    }
    public function join($table, $cond, $type = null){
        $obj = new \StdClass;
        $obj->table = $table;
        $obj->cond = $cond;
        $obj->type = $type;
        array_push($this->join, $obj);
        return $this;
    }

    private function prepare(){
        if (!empty($this->select)){
            $this->query = $this->select;
        }
        if (!empty($this->join)){
            foreach ($this->join as $n){
                $this->query .= $n->type . ' JOIN ' . $n->table . ' ON ' . $n->cond;
            }
        }
        if (!empty($this->where)) {
            foreach ($this->where as $i => $n) {
                if ($i == 0) {
                    $this->query .= ' WHERE ' . $n;
                } else {
                    $this->query .= ' AND ' . $n;
                }
            }
        }
    }

    private function close(){
        $this->db = null;
        $this->query = null;
        $this->select = null;
        $this->where = array();
        $this->join = array();
    }

    public function execute(){
        $this->prepare();
        $return = $this->db->query($this->query);
        $this->close();
        return $return;
    }



}