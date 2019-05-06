<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user {--account=} {--password=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '创建管理员';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $account = $this->option('account');
        $password = $this->option('password');
        try {
            User::create([
                'name' => $account,
                'email' => $account,
                'password' => bcrypt($password),
            ]);
            $this->info('success');
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }

    }
}
