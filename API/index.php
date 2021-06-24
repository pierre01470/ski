<?php
require_once __DIR__ . '/vendor/altorouter/altorouter/AltoRouter.php';
require_once __DIR__ . '/vendor/autoload.php';

$router = new AltoRouter();
$router->setBasePath('/ski');

$router->map('GET', '/', 'ControllerParticipants#allParticipant');

$router->map('POST', '/insertParticipants', 'ControllerParticipants#insertParticipants');

$router->map('GET','/viewsAllParticipant','ControllerParticipants#AllParticipant');

$router->map('GET','/delete[i:id]','ControllerParticipants#deleteOneParticipant','delete');

$match = $router->match();
if ($match) {
    list($controller, $action) = explode('#', $match['target']);
    $obj = new $controller();
    callControl($obj, $action, $match);
}
function callControl($obj, $action, $match)
{
    if (is_callable(array($obj, $action))) {
        call_user_func_array(array($obj, $action), array($match['params']));
    }
}