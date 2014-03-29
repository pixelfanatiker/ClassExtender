<?php
$xpdo_meta_map['userData']= array (
  'package' => 'extendeduser',
  'version' => '1.0.0',
  'table' => 'user_data',
  'extends' => 'xPDOSimpleObject',
  'fields' => 
  array (
    'userdata_id' => NULL,
    'firstName' => NULL,
    'lastName' => NULL,
    'title' => NULL,
    'company' => NULL,
    'dor' => NULL,
    'affiliate' => NULL,
    'usertype' => NULL,
  ),
  'fieldMeta' => 
  array (
    'userdata_id' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'phptype' => 'integer',
      'null' => false,
      'attributes' => 'unsigned',
    ),
    'firstName' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '50',
      'phptype' => 'string',
      'null' => true,
    ),
    'lastName' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '50',
      'phptype' => 'string',
      'null' => true,
    ),
    'title' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '100',
      'phptype' => 'string',
      'null' => true,
    ),
    'company' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '100',
      'phptype' => 'string',
      'null' => true,
    ),
    'dor' => 
    array (
      'dbtype' => 'datetime',
      'phptype' => 'datetime',
    ),
    'affiliate' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '100',
      'phptype' => 'string',
      'null' => true,
    ),
    'usertype' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '100',
      'phptype' => 'string',
      'null' => true,
    ),
  ),
  'indexes' => 
  array (
    'userdata_id' => 
    array (
      'alias' => 'userdata_id',
      'primary' => false,
      'unique' => true,
      'type' => 'BTREE',
      'columns' => 
      array (
        'userdata_id' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
  ),
  'aggregates' => 
  array (
    'extUser' => 
    array (
      'local' => 'userdata_id',
      'foreign' => 'id',
      'cardinality' => 'one',
      'owner' => 'foreign',
    ),
  ),
);
