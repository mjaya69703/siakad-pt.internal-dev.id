<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;

class UpdateCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:check {--branch= : The branch to update from}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check update from alpha channel';

    /**
     * Execute the console command.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $branch = $this->option('branch') ?? 'stable';
        $client = new Client();
        $owner = 'mjaya69703';
        $repo = 'siakad-pt.internal-dev.id';
        $url = "https://api.github.com/repos/$owner/$repo/branches/$branch";

        // Get the current local commit SHA
        $localCommitSha = trim(shell_exec('git rev-parse HEAD'));

        try {
            $response = $client->get($url, [
                'headers' => [
                    'Accept' => 'application/vnd.github.v3+json',
                ],
            ]);

            $data = json_decode($response->getBody(), true);
            $remoteCommitSha = $data['commit']['sha'];

            if ($localCommitSha === $remoteCommitSha) {
                $this->info("You are using the latest version.");
            } else {
                $this->info("There is an update available. Your current version: $localCommitSha. Latest version: $remoteCommitSha.");
            }
        } catch (\Exception $e) {
            $this->error('Error: ' . $e->getMessage());
        }
    }

}
