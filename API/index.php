<?php
require_once __DIR__ . '/vendor/altorouter/altorouter/AltoRouter.php';
require_once __DIR__ . '/vendor/autoload.php';

$router = new AltoRouter();
$router->setBasePath('/ski/API');
$router->map('GET', '/','ControllerRun#viewtest2');

$router->map('POST', '/insertParticipant','ControllerParticipants#insertParticipants');
$router->map('POST', '/insertTrial','ControllerTrial#insertTrial');
$router->map('GET', '/exportExcel','ControllerParticipants#exportExcel');
$router->map('GET', '/importExcel','ControllerRun#importExcel');

$router->map('GET', '/category', 'ControllerCategory#allCategories');
$router->map('GET', '/participant', 'ControllerParticipants#allParticipant');
$router->map('GET', '/run', 'ControllerRun#allRuns');
$router->map('GET', '/trial', 'ControllerTrial#allTrial');
$router->map('GET', '/participantByCategory', 'ControllerParticipants#participantByCategory');

$router->map('GET', '/truncateTable','ControllerParticipants#truncateTable');
$router->map('GET', '/deleteParticipant[i:id]','ControllerParticipants#deleteOneParticipant');

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