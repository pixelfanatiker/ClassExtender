<?php
/**
 * resources transport file for ClassExtender extra
 *
 * Copyright 2013 by Bob Ray <http://bobsguides.com>
 * Created on 11-18-2013
 *
 * @package classextender
 * @subpackage build
 */

if (! function_exists('stripPhpTags')) {
    function stripPhpTags($filename) {
        $o = file_get_contents($filename);
        $o = str_replace('<' . '?' . 'php', '', $o);
        $o = str_replace('?>', '', $o);
        $o = trim($o);
        return $o;
    }
}
/* @var $modx modX */
/* @var $sources array */
/* @var xPDOObject[] $resources */


$resources = array();

$resources[1] = $modx->newObject('modResource');
$resources[1]->fromArray(array (
  'id' => 1,
  'type' => 'document',
  'contentType' => 'text/html',
  'pagetitle' => 'ClassExtender',
  'longtitle' => '',
  'description' => 'View this resource to create class and map files for an extended object.',
  'alias' => 'dont-quote-me',
  'link_attributes' => '',
  'published' => false,
  'isfolder' => false,
  'introtext' => 'View this resource to create class and map files for an extended object.',
  'richtext' => false,
  'template' => 'default',
  'menuindex' => 1,
  'searchable' => true,
  'cacheable' => true,
  'createdby' => 1,
  'editedby' => 1,
  'deleted' => false,
  'deletedon' => 0,
  'deletedby' => 0,
  'menutitle' => 'ClassExtender',
  'donthit' => false,
  'privateweb' => false,
  'privatemgr' => false,
  'content_dispo' => 0,
  'hidemenu' => true,
  'class_key' => 'modDocument',
  'context_key' => 'web',
  'content_type' => 1,
  'hide_children_in_tree' => 0,
  'show_in_tree' => 1,
  'properties' => NULL,
), '', true, true);
$resources[1]->setContent(file_get_contents($sources['data'].'resources/classextender.content.html'));

return $resources;
