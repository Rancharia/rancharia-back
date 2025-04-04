<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeRepository extends Command
{
    protected $signature = 'make:repository {name}';
    protected $description = 'Cria um novo repositório sem interface';

    public function handle()
    {
        $name = $this->argument('name');
        $filesystem = new Filesystem();

        $repositoryPath = app_path("Repositories/{$name}Repository.php");

        if ($filesystem->exists($repositoryPath)) {
            $this->error("O repositório {$name}Repository já existe!");
            return;
        }


        $repositoryTemplate = "
<?php

namespace App\Repositories;

use App\Models\\{$name};

class {$name}Repository {
    protected \$model;

    public function __construct({$name} \$model) {
        \$this->model = \$model;
    }
}
        ";

        $filesystem->ensureDirectoryExists(app_path('Repositories'));
        $filesystem->put($repositoryPath, $repositoryTemplate);

        $this->info("Repositório {$name}Repository criado com sucesso!");
    }
}
