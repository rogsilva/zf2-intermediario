<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return array(
    'mail' => array(
        'name' => 'smtp.gmail.com',
        'host' => 'smtp.gmail.com',
        'connection_class' => 'login',
        'connection_config' => array(
            'username' => 'ress.rogerio@gmail.com',
            'password' => '******',
            'ssl' => 'tls',
            'port' => 465,
            'from' => 'ress.rogerio@gmail.com'
        )
    )
);
