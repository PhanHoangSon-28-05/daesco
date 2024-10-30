<?php

namespace App\Providers;

use Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class MailConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    { 
        $config = DB::table('mail_configs')->first();

        Config::set('mail.mailers.smtp.transport', 'smtp'); // config in env
        Config::set('mail.mailers.smtp.host', 'smtp.gmail.com'); // config in env
        Config::set('mail.mailers.smtp.port', '587'); // config in env
        Config::set('mail.mailers.smtp.encryption', 'tls'); // config in env
        Config::set('mail.mailers.smtp.username', $config->username ?? ''); // config in database
        Config::set('mail.mailers.smtp.password', $config->password ?? ''); // config in database
        Config::set('mail.from.address', $config->from_address ?? ''); // config in database
        Config::set('mail.from.name', $config->from_name ?? ''); // config in database
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
