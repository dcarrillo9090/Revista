<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model
{
     function __construct()
     {
          
          parent::__construct();
     }

     
     function get_user($username, $password)
     {
          $this -> db -> select('id_user,fullname,password');
          $this -> db -> where('id_user',$username);
          $this -> db -> where('password',md5($password));
          $this -> db -> from ('usuarios');
          $this -> db -> limit(1);
          $query = $this->db->get();
          if($query -> num_rows() == 1)
           {
          return true;
          }
          else
          {
          return false;
          }
    //      $sql = "select * from usuarios where id_user = '" . $usr . "' and password = '" . md5($pwd) . "'"   ;
     //     $query = $this->db->query($sql);
     //     return $query->num_rows();
     }

     public function count_results($table)
    {
        return $this->db->count_all_results($table);
    }

    public function consulta_get_where($id)
    {
        $query = $this->db->query("select * from usuarios where id_user = '" .$id. "'");
       if($query->num_rows() > 0 )
        {
            foreach ($query->result() as $row)
               {
   
               return $row->fullname;
   
               }
        } 
    }

    public function get_where($id,$password)
    {

        $query = $this->db->query("select * from usuarios where id_user = '" .$id. "' and password ='".md5($password)."'");
       if($query->num_rows() > 0 )
        {
          return true;
        }else{
          return false;
        }

    }

    public function privilegio($id)
    {

        $query = $this->db->query("select * from usuarios where id_user = '" .$id. "'");
       if($query->num_rows() > 0 )
        {
          foreach ($query->result() as $row)
               {
   
               return $row->privilegio;
   
               }
        }

    }

    public function consulta_get_mail($id)
    {
        $query = $this->db->query("select email from usuarios where id_user = '" . $id . "'");
        if($query->num_rows() > 0 )
        {
            foreach ($query->result() as $row)
               {
   
               return $row->email;
   
               }
        }
    }

    public function get_mail($id)
    {
        $query = $this->db->query("select email from usuarios where id_user = '" . $id . "'");
        if($query->num_rows() > 0 )
        {
            foreach ($query->result() as $row)
               {
   
               echo $row->email;
   
               }
        }
    }

}
?>