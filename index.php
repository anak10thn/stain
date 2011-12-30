<?php
/*
 *      This program is free software; you can redistribute it and/or modify
 *      it under the terms of the GNU General Public License as published by
 *      the Free Software Foundation; either version 2 of the License, or
 *      (at your option) any later version.
 *      
 *      This program is distributed in the hope that it will be useful,
 *      but WITHOUT ANY WARRANTY; without even the implied warranty of
 *      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *      GNU General Public License for more details.
 *      
 *      You should have received a copy of the GNU General Public License
 *      along with this program; if not, write to the Free Software
 *      Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 *      MA 02110-1301, USA.
 * 		
 * 		created by ibnu yahya <ibnu.yahya@toroo.org>
 * 
 */
session_start();
define('PATH', dirname(__FILE__) . '/');
define('DIR','stain/');
define('HOSTNAME',"http://".$_SERVER['HTTP_HOST']."/".DIR);
define('MODULE', PATH . 'module/');
define('TCAKE', PATH . 'tcake/');
define('THEMES', PATH . 'themes/');
define('VIEW', PATH . 'apps/view/');
define('MODEL', PATH . 'apps/model/');
define('CONTROLLER', PATH . 'apps/controller/');
require_once TCAKE . 'gen.php';
require_once MODEL . 'index.php';
require_once VIEW . 'index.php';
//require_once CONTROLLER . 'index.php';
