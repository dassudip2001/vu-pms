<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mailsetting;

class MailsettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mailsetting::create([
            'mail_transport'            =>'smtp',
            'mail_host'                 =>'smtp.mailtrap.io',
            'mail_port'                 =>'587',
            'mail_username'             =>'580f02db8eb225',
            'mail_password'             =>'f83f5d0947941d',
            'mail_encryption'           =>'tls',
            'mail_from'                 => 'sudip5428@gmail.com',
        ]);
    }
}
