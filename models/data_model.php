<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class data_model extends CI_Model
{
     function __construct()
     {
          
          parent::__construct();

     }

           

    public function insert_articulo($autor,$articulo,$claves,$resumen,$archivo)
    {

        $datos =  array('titulo' => $autor,
                        'autor' => $articulo,
                        'claves' => $claves,
                        'resumen' => $resumen,
                        'file' => $archivo
         );

        $this->db->insert('articulos',$datos);

    }

    public function publica_articulo($id)
    {
      
      $sql="update articulos set publicado='1' where id_articulo='$id'";
      //$query=$this->db->query($sql);
      if($query=$this->db->query($sql)){

      }
    }

    public function listar_articulo($id)
    {
      if($id==2){
      $sql='select * from articulos';
      }else{
      $sql='select * from articulos where publicado=1';
      }
      $query=$this->db->query($sql);
      return $query->result();
      /*
      foreach ($query->result() as $row) {
        echo $row->titulo;
        echo $row->autor;
        echo $row->claves;
        echo $row->resumen;
        echo $row->file;
      }*/

    }


    public function android()
    {

     $sql='select titulo,autor,resumen,claves,file from articulos where publicado=1';
      $query=$this->db->query($sql);
     
      echo "{";
      echo "\"articulos\":";
      $datos = array();
      foreach ($query->result() as $row) {
        $datos[]=$row;
      }
      echo json_encode($datos);
      
      echo "}";
      
    }

    
  } 
    
?>