<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class UserList extends Component
{
    protected $listeners = [
        'refreshList' => '$refresh'
    ];
    public function render()
    {
        $accounts = User::all();
        return view('admins.account.livewire.user-list', ['accounts' => $accounts]);
    }
}
