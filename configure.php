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

// Prompt the user for environment credentials
echo "Please provide the environment credentials:\n";
$dbDatabase = readline("Database Name (default: laravel): ") ?: 'laravel';
$dbUsername = readline("Database Username (default: root): ") ?: 'root';
$dbPassword = readline("Database Password : ") ?: '';



// Run the necessary commands
echo "Running setup commands...\n";
executeCommand('composer install');
executeCommand('npm install');
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

    echo str_repeat("-", 50) . "\n";
}
// Update the .env file with the provided credentials
$envContents = file_get_contents('.env.example');
$envContents = preg_replace(
    ['/^\s*DB_DATABASE=.*/m', '/^\s*DB_USERNAME=.*/m', '/^\s*DB_PASSWORD=.*/m'],
    ["DB_DATABASE=$dbDatabase", "DB_USERNAME=$dbUsername", "DB_PASSWORD=$dbPassword"],
    $envContents
);
file_put_contents('.env', $envContents);

executeCommand('php artisan key:generate');
// executeCommand('php artisan twill:build --install');
executeCommand('php artisan migrate');

echo "Setup complete.\n";
