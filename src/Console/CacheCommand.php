<?php

namespace Woldy\Cms\Providers;
use Illuminate\Console\Command;

class KeyFilterCommand extends Command{
  protected $name = 'cache:key filter';
  protected $description = 'test';


  public function __construct(){
      parent::__construct();
  }

  public function handle(){
    echo 'xxxx';
  }
}
