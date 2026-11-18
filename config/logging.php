<?php
return ['default'=>'stack','deprecations'=>['channel'=>'null','trace'=>false],'channels'=>['stack'=>['driver'=>'single','path'=>storage_path('logs/laravel.log'),'level'=>'debug'],'single'=>['driver'=>'single','path'=>storage_path('logs/laravel.log'),'level'=>'debug'],'null'=>['driver'=>'monolog','handler'=>Monolog\Handler\NullHandler::class]]];
