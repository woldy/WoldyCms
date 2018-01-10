<?php
namespace Woldy\Cms\Commands;
use Illuminate\Console\Command;
// use Illuminate\Container\Container;
// use Illuminate\Filesystem\Filesystem;
// use Laracasts\Generators\Migrations\NameParser;
// use Laracasts\Generators\Migrations\SchemaParser;
// use Laracasts\Generators\Migrations\SyntaxBuilder;
// use Symfony\Component\Console\Input\InputOption;
// use Symfony\Component\Console\Input\InputArgument;
class TestCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'wcms:test';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'wcms test';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        echo "hello woldy!\n";
    }

}
