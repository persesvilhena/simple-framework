<?php
namespace Simple\Database;


interface DatabaseInterface
{
    public function query($sql);
    public function insert($table, $data);
    public function delete($table, $id);
    public function select($table);
    public function where($cond);
    public function join($table, $cond, $type = null);
}