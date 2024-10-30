<?php

namespace App\Livewire\MailConfigs;

use Livewire\Component;
use App\Models\MailConfig;

class MailConfigShow extends Component
{
    public $mail_config;
    public $username;
    public $password;
    public $from_address;
    public $from_name;
    public $to_address;

    public function mount() {
        $this->mail_config = MailConfig::first();
        $this->getData();
    }

    public function getData() {
        $this->username = $this->mail_config->username ?? '';
        $this->password = $this->mail_config->password ?? '';
        $this->from_address = $this->mail_config->from_address ?? '';
        $this->from_name = $this->mail_config->from_name ?? '';
        $this->to_address = $this->mail_config->to_address ?? '';
    }

    public function getParams() {
        return [
            'username' => trim($this->username),
            'password' => trim($this->password),
            'from_address' => trim($this->from_address),
            'from_name' => trim($this->from_name),
            'to_address' => trim($this->to_address),
        ];
    }

    public function save() {
        if ($this->mail_config) {
            $this->mail_config->update($this->getParams());
        } else {
            MailConfig::create($this->getParams());
        }
    }

    public function render()
    {
        return view('admins.mail-configs.livewire.mail-config-show');
    }
}
