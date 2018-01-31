<?php
return [
    'adminEmail' => 'admin@example.com',


    'cronJobs' => [
        'test/deni' => [
            'cron' => '* * * * *',
            'updateLogFile' => true,
        ],
        'test/twice' => [
            'cron' => '* * * * *',
        ],
    ],
];
