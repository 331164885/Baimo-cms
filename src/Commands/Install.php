<?php

namespace Baimo\Cms\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class Install extends Command
{
    protected $name = 'baimo-cms:install';

    protected $description = 'Installation of BaimoCMS';

    public function handle()
    {
        $this->call('baimo-base:install');
    }

}