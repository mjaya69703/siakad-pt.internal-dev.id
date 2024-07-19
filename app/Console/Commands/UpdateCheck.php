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
    protected $signature = 'update:check';

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
        $client = new Client();
        $owner = 'mjaya69703';
        $repo = 'siakad-pt.internal-dev.id';
        $branch = 'dev-alpha';
        $url = "https://api.github.com/repos/$owner/$repo/branches/$branch";

        // Replace this with the method you use to get the current local commit SHA
        $localCommitSha = trim(shell_exec('git rev-parse HEAD'));

        try {
            $response = $client->get($url, [
                'headers' => [
                    'Accept' => 'application/vnd.github.v3+json',
                    'Authorization' => 'token ' . env('GITHUB_TOKEN'),
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

    // public function handle()
    // {
    //     $client = new Client();
    //     $owner = 'mjaya69703';
    //     $repo = 'siakad-pt.internal-dev.id';
    //     $branch = 'dev-alpha';
    //     $url = "https://api.github.com/repos/$owner/$repo/branches/$branch";

    //     try {
    //         $response = $client->get($url, [
    //             'headers' => [
    //                 'Accept' => 'application/vnd.github.v3+json',
    //                 'Authorization' => 'token ' . env('GITHUB_TOKEN'),
    //             ],
    //         ]);

    //         $data = json_decode($response->getBody(), true);
    //         $lastCommitSha = $data['commit']['sha'];
    //         $lastCommitDate = $data['commit']['commit']['author']['date'];
    //         $formattedDate = \Carbon\Carbon::parse($lastCommitDate)->format('l, d F Y H:i:s');

    //         $this->info("========================================");
    //         $this->info("       Latest Commit Information        ");
    //         $this->info("========================================");
    //         $this->info("");
    //         $this->info("Latest commit SHA:     $lastCommitSha");
    //         $this->info("Latest commit date:    $formattedDate");
    //         $this->info("");
    //         $this->info("========================================");
    //     } catch (\Exception $e) {
    //         $this->error('Error: ' . $e->getMessage());
    //     }
    // }

}
