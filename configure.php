<?php

// Function to execute shell commands
function executeCommand($command)
{
    // Execute the command and capture the output
    $output = shell_exec($command);
    // Output the result
    echo $output;
    echo str_repeat("-", 50) . "\n";
}

// Function to copy file contents, creating destination file if it doesn't exist
function copyEnvFile($source, $destination)
{
    // Check if the destination file already exists
    if (!file_exists($destination)) {
        // Read the contents of the source file
        $contents = file_get_contents($source);
        // Write the contents to the destination file
        file_put_contents($destination, $contents);
        echo "Created $destination file.\n";
    } else {
        echo "$destination file already exists, skipping copy.\n";
    }
}

// Array of commands to execute
$all_commands = [
    'composer install',
    'npm install',
    'cp .env.example .env',
    'php artisan key:generate',
    'php artisan twill:install',
    'php artisan migrate',
];

$commands = [
    'composer install',
    'npm install',
];

// Prompt the user to confirm before executing commands
echo "This script will execute the following commands:\n";
foreach ($all_commands as $command) {
    echo "$command\n";
}
echo "Press 'y' to continue: ";
$confirmation = trim(fgets(STDIN));

// Check if user wants to continue
if (strtolower($confirmation) !== 'y') {
    echo "Exiting...\n";
    exit;
}

// Execute each command
foreach ($commands as $command) {
    executeCommand($command);
}

// Copy .env.example to .env if .env doesn't exist
$envExamplePath = '.env.example';
$envPath = '.env';

if (file_exists($envExamplePath)) {
    copyEnvFile($envExamplePath, $envPath);
} else {
    echo "Error: .env.example file not found.\n";
}

echo str_repeat("-", 50) . "\n";

// Generate application key
executeCommand('php artisan key:generate');

echo str_repeat("-", 50) . "\n";

// Run database migrations
executeCommand('php artisan migrate');

echo str_repeat("-", 50) . "\n";

// Success message
echo "\033[0;32m Setup completed successfully! \033[0m";
