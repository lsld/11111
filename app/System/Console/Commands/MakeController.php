<?php

namespace System\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeController extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:controller {controller}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Controller';

    private $className;

    private $stub = __DIR__ . '/../stubs/model.stub';

    private $file;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->file = new Filesystem;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->buildClass();
    }

    public function getNamespace()
    {
        return "Web" . "\\" . "";
    }

    public function getClassName()
    {
        $this->className = Str::studly(class_basename($this->argument('model')));
        return $this->className;
    }

    public function getPath()
    {
        return base_path()
        . DIRECTORY_SEPARATOR
        ."app"
        . DIRECTORY_SEPARATOR
        . "Models"
        . DIRECTORY_SEPARATOR
        . $this->getClassName() . ".php";
    }

    public function buildClass()
    {
        $stub = $this->getStub();

        $stub = str_replace(
            'TempNamespace', $this->getNamespace(), $stub
        );

        $stub = str_replace(
            'TempClass', $this->getClassName(), $stub
        );

        return $this->createFile($stub);
    }

    private function createFile($content)
    {
        return $this->file->put($this->getPath(), $content);
    }

    protected function getStub()
    {

        if (isset($this->stub)) {
            return $this->file->get($this->stub);
        }

        throw new \Exception("Undefined property stub", 1);
    }
}
