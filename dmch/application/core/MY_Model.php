<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

  public $table;

  public function __construct()
  {
      parent::__construct();
      $this->table = explode('_',get_Class($this))[0];
      $this->load->database();
  }

  function save($tablename="",$data)
  {
      if($tablename=="")
          $tablename = $this->table;

      $op = 'update';
      $keyExists = FALSE;
      $fields = $this->db->field_data($tablename);

      foreach ($fields as $field) :
        if ($field->primary_key==1) :
            $keyExists = TRUE;
            if (isset($data[$field->name])) :
              $this->db->where($field->name, $data[$field->name]);
            else :
              $op = 'insert';
            endif;
        endif;
      endforeach;

      if ($keyExists && $op=='update') :
        $this->db->set($data);
        $this->db->update($tablename);
        return $this->db->affected_rows();
      endif;

      $this->db->insert($tablename,$data);
      return $this->db->affected_rows();
  }

  function search($tablename="",$conditions=NULL,$limit=NULL,$offset=NULL,$order_by=NULL)
  {
      if ($tablename=="")
          $tablename = $this->table;

      if ($conditions != NULL) :
        if (is_array($conditions)) :
          foreach ($conditions as $key => $value) :
            $this->db->where($key,$value);
          endforeach;
        else :
          $this->db->where($conditions);
        endif;
      endif;

      if($limit != NULL)
          $this->db->limit($limit);

      if($offset != NULL)
          $this->db->offset($offset);

      if($order_by != NULL) :
        if (is_array($order_by)) :
          foreach ($order_by as $key => $value) :
            $this->db->order_by($key,$value);
          endforeach;
        else:
          $this->db->order_by($order_by);
        endif;
      else:
        $this->db->order_by('id','DESC');
      endif;

      return $this->db->get($tablename);
  }

  function search_id($tablename="",$id)
  {
      if($tablename=="")
          $tablename = $this->table;

      return $this->db->limit(1)->get_where($tablename,'id='.$id);
  }

  function insert($tablename="",$data)
  {
      if($tablename=="")
          $tablename = $this->table;

      $this->db->insert($tablename,$data);
      return $this->db->affected_rows();
  }

  function update($tablename="",$data,$conditions)
  {
      if($tablename=="")
          $tablename = $this->table; $this->db->where($conditions);

      $this->db->update($tablename,$data);
      return $this->db->affected_rows();
  }

  function delete($tablename="",$id)
  {
      if($tablename=="")
          $tablename = $this->table;

      $this->db->where('id',$id);
      $this->db->delete($tablename);
      return $this->db->affected_rows();
  }

}
