<?php

namespace App\Livewire\User;

use App\Models\Role;
use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UserCrud extends Component
{
    public  $action,
        $account;

    #[Validate('required', message: 'Chưa nhập họ & tên')]
    public $name;
    #[Validate('required', message: 'Chưa nhập tên đăng nhập')]
    public $username;
    #[Validate('required', message: 'Chưa nhập mật khẩu')]
    public $password;
    #[Validate('required', message: 'Chưa chọn chức vụ')]
    public $role_id;

    public function modalSetup($id)
    {
        if ($id == 0) {
            $this->action = 'create';
        } elseif ($id > 0) {
            $this->action = 'update';
        } else {
            $this->action = 'delete';
        }

        $this->account = User::find(abs($id));

        $this->getData();
    }

    public function getData()
    {
        if ($this->account) {
            $this->name = $this->account->name ?? '';
            $this->username = $this->account->username ?? '';
            $this->role_id = $this->account->roles->first()->id;
        } else {
            $this->name = '';
            $this->username = '';
        }

        $this->resetErrorBag();
    }

    public function create()
    {
        $this->validate();
        $user = User::create([
            'name' => trim($this->name),
            'email' => trim($this->username) . '@gmail.com',
            'username' => trim($this->username),
            'password' => bcrypt($this->password),
        ]);

        $user->roles()->attach($this->role_id);

        $this->dispatch('refreshList')->to('user.user-list');
        $this->dispatch('closeCrudAccount');
    }

    public function update()
    {
        $this->validate();

        $user = $this->account->update([
            'name' => trim($this->name),
            'email' => trim($this->username) . '@gmail.com',
            'username' => trim($this->username),
            'role_id' => trim($this->role_id),
        ]);

        if ($user) {
            $this->user->roles()->sync($this->role_id);
        }

        $this->dispatch('refreshList')->to('user.user-list');
        $this->dispatch('closeCrudAccount');
    }

    public function delete()
    {
        $this->account->delete();

        $this->dispatch('refreshList')->to('user.user-list');
        $this->dispatch('closeCrudAccount');
    }

    public function render()
    {
        $roles = Role::all();

        return view('admins.account.livewire.user-crud')->with([
            'roles' => $roles,
        ]);;
    }
}
