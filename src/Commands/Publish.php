<?php

namespace Baimo\Cms\Commands;

use Illuminate\Console\Command;

class Publish extends Command
{
    protected $name = 'baimo-cms:publish';

    protected $description = 'publish';

    public function handle()
    {
        /*$this->call('vendor:publish', ['--provider'=>'Tymon\JWTAuth\Providers\LaravelServiceProvider']);
        $this->call('vendor:publish', ['--provider'=>'Lauthz\LauthzServiceProvider']);
        $this->call('vendor:publish', ['--provider'=>'Mews\Captcha\CaptchaServiceProvider']);*/
        $this->line('OK!!!!!');
    }
}