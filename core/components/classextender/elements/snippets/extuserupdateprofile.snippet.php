<?php
/**
 * ExtUserUpdateProfile snippet for ClassExtender extra
 *
 * Copyright 2013 by Bob Ray <http://bobsguides.com>
 * Created on 03-23-2014
 *
 * ClassExtender is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * ClassExtender is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * ClassExtender; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package classextender
 */

/**
 * Description
 * -----------
 * Set placeholders for and update extended user data
 *
 * Variables
 * ---------
 * @var $modx modX
 * @var $scriptProperties array
 *
 * @package classextender
 **/

$modx->lexicon->load('login:updateprofile');

$submission = isset($_POST['login-updprof-btn']) && ($_POST['login-updprof-btn'] == $modx->lexicon('login.update_profile'));


$data = null;
$user = null;
if (isset($modx->user) && ($modx->user instanceof modUser)) {
    $user =& $modx->user;
    if ($user instanceof extUser) {
        $data = $user->getOne('Data');
    } else {
        $user->set('class_key', 'extUser');
        $user->save();
        $user = $modx->getObject('extUser', $user->get('id'));
    }
}
/* @var $data userData */


if ((!$data) && $user) {
    $data = $modx->newObject('userData');
    $user->addOne($data);
}

$list = $modx->getChunk('ExtUserCategories');
$categoryList = explode(',', trim($list));

$fields = array();
if ($data) {
    $fields['firstName'] = $data->get('firstName');
    $fields['lastName'] = $data->get('lastName');
    $fields['title'] = $data->get('title');
    $fields['company'] = $data->get('company');


    foreach ($fields as $key => $field) {
        if (empty($field)) {
            $fields[$key] = '';
        }
    }
}
  
if ($submission) {
    $modx->request->sanitizeRequest();
    $dirty = false;
    foreach ($fields as $key => $value) {
        if (isset($_POST[$key])) {
            if ($value !== $_POST[$key]) {
                $data->set($key, $_POST[$key]);
                $dirty = true;
            }
        }
    }

    if ($dirty) {
        $user->save();
    }
}

return '';