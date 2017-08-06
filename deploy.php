<?php
namespace Deployer;
require 'recipe/common.php';

// Configuration
$host_url = '';
$deploy_path = '';
$ssh_key = '';
$git_repository = '';
$timezone = '';

// Setting up Deployer
date_default_timezone_set($timezone);

set('ssh_type', 'native');
set('ssh_multiplexing', true);

set('repository', $git_repository);
set('git_tty', true);
set('shared_files', []);
set('shared_dirs', []);
set('writable_dirs', []);
set('writable_mode', 'chmod');
set('keep_releases', 1);

// Servers
server('production', $host_url)
    ->user('forge')
    ->identityFile("~/.ssh/{$ssh_key}.pub", "~/.ssh/{$ssh_key}", '')
    ->set('deploy_path', $deploy_path)
    ->forwardAgent(true);


// Tasks

// Upload .env.prod file as .env to deploy path
desc('Environment upload');
task('upload:env', function() {
    upload('.env.prod', '{{deploy_path}}/.env');
});

desc('Deploy your project');
task('deploy', [
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);

desc('Check configuration variables');
task('deploy:check_config', function() use ($host_url, $deploy_path, $ssh_key, $git_repository, $timezone) {
    if (empty($host_url) || empty($deploy_path) || empty($ssh_key) ||
        empty($git_repository) || empty($timezone)) {
        writeln('');
        writeln('<comment>» Warning!</comment> You have to configure <info>deploy.php</info> first.');
        writeln('');
        exit();
    }
});
before('deploy', 'deploy:check_config');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
