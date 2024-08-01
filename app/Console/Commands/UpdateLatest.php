<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;

class UpdateLatest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'update:latest';
    protected $signature = 'update:latest {--branch= : The branch to update from}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the local repository from the alpha channel if an update is available';

    /**
     * Execute the console command.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $branch = $this->option('branch') ?? 'stable'; // Default to 'dev-alpha' if no branch is provided
        $client = new Client();
        $owner = env('GITHUB_OWNER', 'mjaya69703');
        $repo = env('GITHUB_REPO', 'siakad-pt.internal-dev.id');
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
                $this->info("An update is available. Updating from version: $localCommitSha to version: $remoteCommitSha.");

                // Pull the latest changes from the remote repository
                $output = [];
                $returnVar = null;
                exec("git pull origin $branch 2>&1", $output, $returnVar);

                // Check if the command was successful
                if ($returnVar === 0) {
                    $this->info("Successfully updated to the latest version from the '$branch' branch.");
                } else {
                    $this->error("Failed to update. Error: " . implode("\n", $output));
                }
            }
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $this->error('Request Error: ' . $e->getMessage());
        } catch (\Exception $e) {
            $this->error('Error: ' . $e->getMessage());
        }
    }
}
