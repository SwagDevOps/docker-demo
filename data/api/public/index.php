<?php

require_once(__DIR__ . '/../vendor/autoload.php');
error_reporting(E_ALL);

use JsonResponse as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app = new App();

$app->get('/', function (Request $request, Response $response) {
    /** @var Slim\Router $router */
    $router = $this->get('router');

    return $router->getNamedRoute('film_list')->run($request, $response);
});

# /film_list --------------------------------------------------------
$app->get('/film_list', function (Request $request, Response $response) {
    /**
     * @var DB $db
     */
    $db = $this->get('db');

    $params = $request->getQueryParams();
    $matchers = ($params['q'] ?? null) ? [
        sprintf('%s %%', $params['q']),
        sprintf('%% %s', $params['q'])
    ] : null;

    $stt = $db->execute($matchers
        ? 'SELECT * FROM film_list WHERE title LIKE ? OR title LIKE ? ORDER BY title ASC'
        : 'SELECT * FROM film_list ORDER BY title ASC', array_filter((array)$matchers));

    return $response->withData($stt->fetchAll());
})->setName('film_list');

# /film/{film_id:[0-9]+} --------------------------------------------
$app->get('/film/{film_id:[0-9]+}', function (Request $request, Response $response, array $args) {
    /**
     * @var DB $db
     */
    $db = $this->get('db');

    $stt = $db->execute('SELECT * FROM film WHERE film_id = ?', [
        $args['film_id']
    ]);

    return $response->withData($stt->fetch());
});

$app->run();
