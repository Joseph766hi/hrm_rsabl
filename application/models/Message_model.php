<?php

class Message_model extends CI_model 
{
    function getMessage($sender, $reciever)
    {
        $sql = "SELECT c.id as reciever_id, b.name as sender, c.name as reciever, a.datetime, a.message, a.filename, a.ext FROM message a JOIN employees b ON a.sender = b.id JOIN employees c ON a.reciever = c.id WHERE (b.id = ".$sender." AND c.id =  ".$reciever.") OR (b.id = ".$reciever." AND c.id =  ".$sender.")   ORDER BY a.datetime ASC ";

        return $this->db->query($sql);
    }
}