<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Patients extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'types' => array(
        'type' => 'VARCAHR',
        'constraint' => '20'
      ),
      'times' => array(
        'type' => 'INT',
        'constraint' => '6'
      ),
      'groups' => array(
        'type' => 'VARCAHR',
        'constraint' => '10'
      ),
      'id_card' => array(
        'type' => 'VARCHAR',
        'constraint' => '6'
      ),
      'title' => array(
        'type' => 'VARCHAR',
        'constraint' => '6'
      ),
      'firstname' => array(
        'type' => 'VARCHAR',
        'constraint' => '100'
      ),
      'lastname' => array(
        'type' => 'VARCHAR',
        'constraint' => '150'
      ),
      'picture' => array(
        'type' => 'VARCHAR',
        'constraint' => '100'
      ),
      'created' => array(
        'type' => 'INT',
        'constraint' => '11'
      ),
      'updated' => array(
        'type' => 'INT',
        'constraint' => '11'
      ),
      'added_by' => array(
        'type' => 'INT',
        'constraint' => '11'
      ),
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('patients');
  }

  public function down()
  {
    $this->dbforge->drop_table('patients');
  }
}
