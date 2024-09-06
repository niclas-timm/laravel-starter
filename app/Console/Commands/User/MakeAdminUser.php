<?php

namespace App\Console\Commands\User;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class MakeAdminUser extends Command
{
    protected $signature = 'user:make-admin-user';

    protected $description = 'Create admin user from the .env file';

    public function handle()
    {
        $name = env('SUPER_ADMIN_NAME');
        $email = env('SUPER_ADMIN_EMAIL');
        $password = env('SUPER_ADMIN_PASSWORD');

        if (! $name || ! $email || ! $password) {
            $this->error('Please provide name, email and password in your .env file.');

            return;
        }

        $user = User::updateOrCreate(['email' => $email], [
            'name' => $name,
            'password' => Hash::make($password),
        ]);
        $this->info('Admin user created successfully. ID:'.$user->id);
    }
}
