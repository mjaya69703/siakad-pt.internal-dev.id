<?php
// Define the directory to scan
$directory = '/path/your/project/public';
$outputDirectory = $directory;
$outputBaseName = 'scan-result';
$outputExtension = '.txt';
$maxRetention = 7;

// Get the current time
$currentTime = time();

// Initialize an array to hold the results
$results = [];

// Function to get the time difference in a human-readable format
function timeDifference($time1, $time2) {
    $diff = abs($time1 - $time2);
    $days = floor($diff / (60 * 60 * 24));
    return $days;
}

// Function to scan the directory
function scanDirectory($dir, $currentTime, &$results) {
    $files = scandir($dir);

    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $filePath = $dir . DIRECTORY_SEPARATOR . $file;

            if (is_file($filePath) && (pathinfo($filePath, PATHINFO_EXTENSION) === 'php' || pathinfo($filePath, PATHINFO_EXTENSION) === 'html')) {
                $fileMTime = filemtime($filePath);
                $daysAgo = timeDifference($currentTime, $fileMTime);

                if ($daysAgo <= 7) {
                    $results[] = $filePath . ' - upload ' . $daysAgo . ' hari yang lalu';
                }
            } elseif (is_dir($filePath)) {
                scanDirectory($filePath, $currentTime, $results);
            }
        }
    }
}

// Function to manage file retention
function manageRetention($outputDirectory, $outputBaseName, $outputExtension, $maxRetention) {
    for ($i = $maxRetention; $i > 1; $i--) {
        $oldFile = $outputDirectory . DIRECTORY_SEPARATOR . $outputBaseName . '-' . str_pad($i - 1, 2, '0', STR_PAD_LEFT) . $outputExtension;
        $newFile = $outputDirectory . DIRECTORY_SEPARATOR . $outputBaseName . '-' . str_pad($i, 2, '0', STR_PAD_LEFT) . $outputExtension;

        if (file_exists($oldFile)) {
            rename($oldFile, $newFile);
        }
    }
}

// Manage file retention
manageRetention($outputDirectory, $outputBaseName, $outputExtension, $maxRetention);

// Scan the directory
scanDirectory($directory, $currentTime, $results);

// Write the results to the output file
$outputFile = $outputDirectory . DIRECTORY_SEPARATOR . $outputBaseName . '-01' . $outputExtension;
file_put_contents($outputFile, implode(PHP_EOL, $results));

echo "Scan complete. Results saved to $outputFile";
?>
