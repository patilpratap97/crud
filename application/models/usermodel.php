<?php
class usermodel extends CI_model{
   function create($formArray){
    $this->db->insert('crud1',$formArray);  //insert into users()
   }
   function all(){
     return $crud1= $this->db->get('crud1')->result_array();  // select * from crud1
   }
   function getUser($userid){
    $this->db->where('user_id',$userid);
   return $crud = $this->db->get('crud1')->row_array(); // select * from crud1 where user_id=?
  }
  function updateUser($userid,$formArray){
    $this->db->where('user_id',$userid);
    $this->db->update('crud1',$formArray); // update crud1 SET name=?, email=? where user_id=?
  }
   function deleteUser($userid)
   {
    $this->db->where('user_id',$userid);
    $this->db->delete('crud1');             // delete from crud1 where user_id=?
   }  
}
?>
