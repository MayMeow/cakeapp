<?php
/**
 * Created by PhpStorm.
 * User: may
 * Date: 2/16/2017
 * Time: 10:27 PM
 */

return [

    'CakeApp' => [
        'nginx' => [
            'port' => '80',
            /**
             * Path to CakeAPP Application
             * Do not change if you dont know what you are doing
             */
            'root' => '/var/www/html/webroot'
        ],

        /**
         * Email Settings
         */
        'email' => [
            /**
             * @deprecated Use domain instead FROM
             */
            'from' => 'cakeapp@cakehub.sk',

            /**
             * Domain is used for 'from' email configuration
             * All sent emails will be <username>@<CakeApp.email.domain>
             */
            'domain' => 'cakehub.sk',

            /**
             * Used in Service desk to reply tickets by email
             * Incoming email using IMAP server type
             */
            'incoming' => [
                /**
                 * Used to generate email address for outgoing emails and checking what incoming email is for ServiceDesk
                 */
                'prefix' => 'css.id.',
                'user' => 'users@cakehub.sk',
                'password' => '33m9wt5Bn',
                'server' => 'imap.websupport.sk',
                'port' => '143'
            ]
        ],

        /**
         * Settings for Git
         */
        'Git' => [
            'externalUrl' => 'cakeapp.sk',
            'port' => '2279',

            /**
             * IF you set more paths, all files will be stored randomly in one of them
             */
            'paths' => [
                'git-data' => [DATA_STORE . 'git-data' . DS . 'repositories' . DS],
            ]
        ],

        /**
         * Buckets Configuration
         */
        'Buckets' => [
            // Price in EUR/1GB
            'price' => 0.09,

            /**
             * IF you set more paths, all files will be stored randomly in one of them
             */
            'paths' => [
                'buckets-data' => [DATA_STORE . 'buckets-data' . DS]
            ]
        ],

        'Certificates' => [
            'paths' => [
                'ca-data' => [DATA_STORE . 'ca-data' . DS]
            ]
        ]
    ],

    /**
     * @deprecated use cakeApp instead of CodeAdvent
     * Following configuration will be removed in next (v18.0) major release
     *
     * Base Configurations from CodeAdven Application
     */
    'CodeAdvent' => [
        'ssl' => false,
        'externalUrl' => env('EXTERNAL_URL', 'http://localhost:8965'),

        /**
         * Default color theme for Application
         * To use bootswatch app you can use bootswatch/yeti
         * bootstrap-maymeow
         */
        'adminTheme' => 'bootstrap-maymeow'
    ],

    /**
     * CakeBootstrap plugin configuration
     */
    'CakeBootstrap' => [
        /**
         * @Deprecated
         * Use MayMeow.Crud instead configuration
         */
        //'adminTopMenu' => 'mcloud_admin_menu',

        /**
         * IF its used as elektron application
         */
        'elektronApp' => false
    ],

    /**
     * Cake Authentication plugin configuration
     */
    'CakeAuth' =>  [
        'newPassUrl' => ''
    ],

    /**
     * Cake Storage configurations
     */
    'CakeStorage' => [
        'rsyncPort' => env('RSYNC_PORT', '32107'),

        /**
         * Buckets and disks prices in EUR for 1GB
         */
        'diskPrice' => env('DISK_PRICE', 0.137)
    ],

    /**
     * Cake Docker settings
     */
    'CakeCompute' => [
        'dockerSocket' => env('DOCKER_SOCKET', 'tcp://10.11.220.12:7838')
    ]
];