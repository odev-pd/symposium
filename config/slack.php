<?php

/*
 * This file is part of Laravel Slack.
 *
 * (c) Miguel Piedrafita <soy@miguelpiedrafita.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => 'main',

    /*
    |--------------------------------------------------------------------------
    | Slack Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Example
    | configuration has been included, but you may add as many connections as
    | you would like.
    |
    */

    'connections' => [

        'main' => [
            'hook' => env('SLACK_ENDPOINT'),
            'username' => 'Symposium',
            'channel'  => '#os-symposium-ops',
            'link_names'  => false,
        ],

        'alternative' => [
          'hook' => 'https://hooks.slack.com/...',
          'username' => 'api_client',
          'channel'  => '#general',
          'link_names'  => true,
        ],

    ],

];
