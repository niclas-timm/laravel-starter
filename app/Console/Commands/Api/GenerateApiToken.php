<?php

namespace App\Console\Commands\Api;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class GenerateApiToken extends Command
{
    protected $signature = 'api:generate-token {--userId=} {--email=}';

    protected $description = 'Command description';

    public function handle()
    {
        if (! $this->option('userId') && ! $this->option('email')) {
            $this->error('You must specify either a user ID or email address.');

            return;
        }

        $user = $this->option('userId')
            ? User::whereKey($this->option('userId'))->first()
            : User::where('email', $this->option('email'))->first();

        if (! $user) {
            $this->error('User not found');

            return;
        }
        $token = $user->createToken('api-token');

        $this->info('Token created: '.$token->plainTextToken);

        Log::info('Generated new api token for user: '.$user->email);
    }
}
