<?php
namespace Woldy\Cms\Commands;
use Illuminate\Console\Command;
use DB;
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
        $file_path=__DIR__.'/../resources/wcms.sql';
        $sql=explode(";",file_get_contents($file_path));
        array_pop($sql);//干掉最后一行
        $c=count($sql);
        for($i=0;$i<count($sql);$i++) {
          DB::statement($sql[$i]);
          echo "importing data ".($i+1)."/$c\r";
        }
        echo "\ndone!\n";
    }
}
