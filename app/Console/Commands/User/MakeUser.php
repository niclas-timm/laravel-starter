<?php

namespace App\Console\Commands\User;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class MakeUser extends Command
{
    protected $signature = 'user:make-user {--email=} {--name=}';

    protected $description = 'Create a user';

    public function handle()
    {
        $name = $this->option('name');
        $email = $this->option('email');

        if (! $name || ! $email) {
            $this->error('Please provide name, email and password.');

            return;
        }

        if (User::whereEmail($email)->exists()) {
            $this->error('User with the email '.$email.' already exists');

            return;
        }

        $password = $this->secret('What is the password?');

        $passwordConfirmed = $this->secret('Please repeat the password');

        if (! $password === $passwordConfirmed) {
            $this->error('Passwords do not match. Please try again.');

            return;
        }

        $user = User::create([
            'email' => $email,
            'name' => $name,
            'password' => Hash::make($password),
        ]);

        $this->info('User created successfully.');
        Log::info('Created new admin user: '.$user->email);
    }
}
