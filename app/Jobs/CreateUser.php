<?php

namespace App\Jobs;

use App\Models\PhoneBook;
use App\Models\User;
use App\Models\UserCountry;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class CreateUser
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected array $data;

    /**
     * Create a new job instance.
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        try {
            $country = UserCountry::firstOrCreate([
                'name' => $this->data['country']['name'],
                'idd' => $this->data['country']['idd'],
            ]);

            $user = User::create([
                'name' => $this->data['name'],
                'email' => $this->data['email'],
                'country_id' => $country->id
            ]);

            PhoneBook::create([
                'number' => $this->data['phone'],
                'user_id' => $user->id,
                'country_id' => $country->id
            ]);
        } catch (\Exception $e) {
            Log::error($e);
        }

        return $user;
    }
}
