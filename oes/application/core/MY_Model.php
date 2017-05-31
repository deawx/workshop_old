<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

  public $table_name = '';
  public $primary_key = 'id';
  public $order_by = 'id DESC';

  function search($conditions=NULL,$limit=NULL,$offset=NULL,$order_by=NULL,$table_name=NULL)
  {
    if ($table_name === NULL)
      $table_name = $this->table_name;

    if ($conditions != NULL) :
      if (is_array($conditions)) :
        foreach ($conditions as $key => $value) :
          $this->db->where($key,$value);
        endforeach;
        else :
          $this->db->where($conditions);
        endif;
      endif;

      if ($limit != NULL)
        $this->db->limit($limit);

      if ($offset != NULL)
        $this->db->offset($offset);

      if ($order_by !== NULL) :
        if (is_array($order_by)) :
          foreach ($order_by as $key => $value) :
            $this->db->order_by($key,$value);
          endforeach;
        else:
          $this->db->order_by($order_by);
        endif;
      else:
        $this->db->order_by($this->order_by);
      endif;

      return $this->db->get($table_name);
    }

    function search_id($id=NULL,$table_name=NULL)
    {
      $id = intval($id);
      if ($id !== NULL)
        $this->db->where($this->primary_key, $id);

      if ($table_name === NULL)
        $table_name = $this->table_name;

      return $this->db->get($table_name);
    }

    function save($data,$table_name=NULL)
    {
      if ($table_name === NULL)
        $table_name = $this->table_name;

      $op = 'update';
      $keyExists = FALSE;
      $fields = $this->db->field_data($this->table_name);

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

      $this->db->set($data);
      if ($keyExists && $op=='update') :
        $this->db->update($table_name);
      else:
        $this->db->insert($table_name);
      endif;

      return $this->db->affected_rows();
    }

    function remove($id,$table_name=NULL)
    {
      $id = intval($id);
      if ($id === NULL)
        return FALSE;

      if ($table_name === NULL)
        $table_name = $this->table_name;

      $this->db->where($this->primary_key,$id);
      $this->db->delete($table_name);

      return $this->db->affected_rows();
    }

  }
