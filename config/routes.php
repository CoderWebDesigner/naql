<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass(DashedRoute::class);
Router::prefix('api', function ($routes) {
    $routes->extensions(['json', 'xml']);
    $routes->resources('Areas');
    $routes->resources('Chats');
    $routes->resources('MachineDetails');
    $routes->resources('MachineOwners');
    $routes->resources('MachinePhotos');
    $routes->resources('Machines');
    $routes->resources('Messages');
    $routes->resources('Owners');
    $routes->resources('Rates');
    $routes->resources('ReservationTypes');
    $routes->resources('Reservations');
    
  
    Router::connect('/api/users/register', ['controller' => 'Users', 'action' => 'add', 'prefix' => 'api']);
    $routes->fallbacks('InflectedRoute');
});

Router::scope('/', function (RouteBuilder $routes) {
 
     $routes->connect('/en', ['controller' => 'Owners', 'action' => 'homepageen']);

     $routes->connect('/', ['controller' => 'Owners', 'action' => 'homepage']);
     $routes->connect('/contactus', ['controller' => 'Owners', 'action' => 'contactus']);
     $routes->connect('/aboutus', ['controller' => 'Owners', 'action' => 'aboutus']);

    $routes->fallbacks('DashedRoute');
});
 
Plugin::routes();
