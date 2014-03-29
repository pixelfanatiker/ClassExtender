<?php
/**
 * Build Schema script
 *
 * @package extendeduser
 * @subpackage build
 */

$mtime = microtime();
$mtime = explode(" ", $mtime);
$mtime = $mtime[1] + $mtime[0];
$tstart = $mtime;
set_time_limit(0);

require_once dirname(__FILE__) . '/build.config.php';
include_once MODX_CORE_PATH . 'model/modx/modx.class.php';
$modx= new modX();
$modx->initialize('mgr');
$modx->loadClass('transport.modPackageBuilder','',false, true);
echo '<pre>'; /* used for nice formatting of log messages */
$modx->setLogLevel(modX::LOG_LEVEL_INFO);
$modx->setLogTarget(XPDO_CLI_MODE ? 'ECHO' : 'HTML');

$root = dirname(dirname(__FILE__)).'/';
$sources = array(
    'model' =>  DEV_BASE_PATH . DEV_COMPONENT_NAME . '/core/components/' . DEV_COMPONENT_NAME . '/model/',
    'schema' => DEV_BASE_PATH . DEV_COMPONENT_NAME . '/core/components/' . DEV_COMPONENT_NAME . '/model/schema/extendeduser.mysql.schema.xml'
);

$manager= $modx->getManager();
$generator= $manager->getGenerator();

if (!is_dir($sources['model'])) {
  $modx->log(modX::LOG_LEVEL_ERROR,'Model directory not found!');
  die();
}
if (!file_exists($sources['schema'])) {
  $modx->log(modX::LOG_LEVEL_ERROR,'Schema file not found!');
  die();
}
$generator->parseSchema($sources['schema'],$sources['model']);
//$modx->addExtensionPackage('extendeduser', $sources['model']);
//$modx->addPackage('extendeduser', $sources['model']);
//$manager->createObjectContainer('userData');
//$manager->createObjectContainer('userProfileSocial');
//$manager->createObjectContainer('userAuthor');

$mtime= microtime();
$mtime= explode(" ", $mtime);
$mtime= $mtime[1] + $mtime[0];
$tend= $mtime;
$totalTime= ($tend - $tstart);
$totalTime= sprintf("%2.4f s", $totalTime);

echo "\nExecution time: {$totalTime}\n";

exit ();