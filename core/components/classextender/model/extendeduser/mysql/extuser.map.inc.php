<?php
$xpdo_meta_map['extUser']= array (
  'package' => 'extendeduser',
  'version' => '1.0.0',
  'extends' => 'modUser',
  'fields' => 
  array (
  ),
  'fieldMeta' => 
  array (
  ),
  'composites' => 
  array (
    'Data' => 
    array (
      'local' => 'id',
      'class' => 'userData',
      'foreign' => 'userdata_id',
      'cardinality' => 'one',
      'owner' => 'local',
    ),
  ),
);
