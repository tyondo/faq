<?php

namespace Tyondo\Faq\Commands\Publish;

use Illuminate\Support\Facades\Artisan;
use Tyondo\Faq\Commands\BaseCommand;

class Assets extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'faq:publish:assets {--y|y : Skip question?} {--f|force : Overwrite existing files.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish faq public assets';

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
        // Gather arguments...
        $publish = $this->option('y') ?: false;
        $force = $this->option('force') ?: false;

        if (! $publish) {
            $publish = $this->confirm('Publish faq core public assets?');
        }

        // Publish assets...
        if ($publish) {
            $exitCode = Artisan::call('vendor:publish', [
                '--provider' => 'Tyondo\Faq\TyondoFaqServiceProvider',
                '--tag' => 'public',
                '--force' => $force,
            ]);
            $this->progress(5);
            $this->line(PHP_EOL.'<info>✔</info> Success! Faq core public assets have been published.');
        }
    }
}
