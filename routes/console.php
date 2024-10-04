<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('logs:clear', function() {
    exec('rm -f ' . storage_path('logs/*.log'));
    $this->comment('Logs have been removed!');
})->describe('Remove log files');
