<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Pengaturan\LogAktivitas;
use App\Models\Pengaturan\ActivityLogChange;
use Illuminate\Support\Facades\Log;

class ProcessActivityLog implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $userId;
    protected $userType;
    protected $action;
    protected $modelType;
    protected $modelId;
    protected $changesToLog;
    protected $ipAddress;
    protected $userAgent;
    protected $description;

    /**
     * Create a new job instance.
     *
     * @param int|null $userId
     * @param string $userType
     * @param string $action
     * @param string $modelType
     * @param int $modelId
     * @param array $changesToLog
     * @param string|null $ipAddress
     * @param string|null $userAgent
     * @param string $description
     */
    public function __construct(
        $userId,
        string $userType,
        string $action,
        string $modelType,
        int $modelId,
        array $changesToLog,
        ?string $ipAddress,
        ?string $userAgent,
        string $description
    )
    {
        $this->userId = $userId;
        $this->userType = $userType;
        $this->action = $action;
        $this->modelType = $modelType;
        $this->modelId = $modelId;
        $this->changesToLog = $changesToLog;
        $this->ipAddress = $ipAddress;
        $this->userAgent = $userAgent;
        $this->description = $description;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            Log::info('Starting ProcessActivityLog job', [
                'job_id' => $this->job->getJobId() ?? 'N/A',
                'model_type' => $this->modelType,
                'model_id' => $this->modelId,
                'action' => $this->action
            ]);

            // Create the main log entry
            $logEntry = LogAktivitas::create([
                'user_id' => $this->userId,
                'user_type' => $this->userType,
                'action' => $this->action,
                'model_type' => $this->modelType,
                'model_id' => $this->modelId,
                'changes' => null,
                'ip_address' => $this->ipAddress,
                'user_agent' => $this->userAgent,
                'description' => $this->description,
            ]);

            Log::info('Created main log entry', [
                'log_entry_id' => $logEntry->id ?? 'N/A'
            ]);

            // Create entries in the activity_log_changes table
            if ($logEntry) {
                // Prepare data for createMany
                $changeDetailsData = [];
                foreach ($this->changesToLog as $change) {
                    $changeDetailsData[] = [
                        'activity_log_id' => $logEntry->id,
                        'field_name' => $change['field_name'],
                        'old_value' => $change['old_value'] ?? null,
                        'new_value' => $change['new_value'] ?? null,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }

                if (!empty($changeDetailsData)) {
                    ActivityLogChange::insert($changeDetailsData);
                    Log::info('Created activity log changes', [
                        'changes_count' => count($changeDetailsData)
                    ]);
                }
            }

            Log::info('Successfully completed ProcessActivityLog job', [
                'job_id' => $this->job->getJobId() ?? 'N/A'
            ]);

        } catch (\Exception $e) {
            Log::error('Failed to process activity log job', [
                'job_id' => $this->job->getJobId() ?? 'N/A',
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'log_data' => [
                    'user_id' => $this->userId,
                    'user_type' => $this->userType,
                    'action' => $this->action,
                    'model_type' => $this->modelType,
                    'model_id' => $this->modelId,
                    'changes_count' => count($this->changesToLog),
                ]
            ]);

            // Re-throw the exception to mark the job as failed
            throw $e;
        }
    }
}
