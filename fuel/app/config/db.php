<?php
/**
 * Use this file to override global defaults.
 *
 * See the individual environment DB configs for specific config information.
 */

return array(
    'active' => 'testdb',
    /**
     * Base config, just need to set the DSN, username and password in env. config.
     */
    'default' => array(
        'type'        => 'pdo',
        'connection'  => array(
            'persistent' => false,
        ),
        'identifier'   => '`',
        'table_prefix' => '',
        'charset'      => 'utf8',
        'enable_cache' => true,
        'profiling'    => false,
    ),

    'testdb' => array(
        'type'   => 'pdo',
        'connection' => array(
            'hostname'   => 'localhost',
            'database'   => 'データベース名',
            'username'   => 'ユーザ名',
            'password'   => 'パスワード',
            'persistent' => FALSE,
        ),
        'table_prefix' => '',
        'charset'      => 'utf8',
        'caching'      => false,
        'profiling'    => true,
    ),
);
