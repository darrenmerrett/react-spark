<?php

namespace darrenmerrett\ReactSpark\app\Console\Commands;

use Illuminate\Console\Command;

class build extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'react-spark:build {watch?} {--production}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install react-spark resources, setup npm dependancies';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $args = $this->argument('watch')=="watch"?' watch':'';

        $args .= $this->option('production')?' --production':'';
        
        system("gulp --cwd ".base_path()." --gulpfile=./vendor/darrenmerrett/react-spark/src/gulpfile.js $args\n");

        print "\n";

    }

}
