<?php
namespace App;

class Principal extends \Simple\Mvc\Model{
    public function query_example(){
        return $this->db->query('select * from messages')->execute();
    }

    public function insert_example(){
        $data = [
            'title' => 'Hello!',
            'message' => 'Just testing...',
            'time' => 1327301464
        ];
        return $this->db->insert('messages', $data);
    }
}

?>