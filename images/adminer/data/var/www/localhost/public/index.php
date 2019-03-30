<?php
define('ADMINER_VERSION', trim(file_get_contents(__DIR__ . '/../VERSION')));

foreach (glob(__DIR__ . '/../lib/plugins/*.php') as $filepath) {
    include_once($filepath);
}

/**
 *  It is possible to combine customization and plugins
 *
 * ```php
 * class AdminerCustomization extends AdminerPlugin { }
 * return new AdminerCustomization($plugins);
 * ```
 *
 * @see https://www.adminer.org/en/plugins/#use
 *
 * @return AdminerPlugin
 */
function adminer_object()
{
    // required to run any plugin
    include_once(__DIR__ . '/../lib/plugin.php');

    // specify enabled plugins here
    $plugins = [
        FillLoginForm::class => [
            'server',
            $_SERVER['MYSQL_SERVER'],
            $_SERVER['MYSQL_USER'],
            $_SERVER['MYSQL_PASSWORD'],
            $_SERVER['MYSQL_DATABASE']
        ],
    ];

    foreach ($plugins as $klass => $params) {
        $plugins[$klass] = new $klass(...$params);
    }

    return new AdminerPlugin($plugins);
}

// include original Adminer or Adminer Editor
include(sprintf('%s/../adminer-%s.php', __DIR__, ADMINER_VERSION));