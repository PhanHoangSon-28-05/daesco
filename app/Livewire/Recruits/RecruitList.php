<?php

namespace App\Livewire\Recruits;

use App\Models\Recruit;
use Livewire\Component;
use Livewire\WithPagination;
use App\Repositories\Recruits\RecruitRepositoryInterface;

class RecruitList extends Component
{
    use WithPagination;

    protected $recruitRepos;

    public $name = '';

    protected $listeners = [
        'refreshList' => '$refresh'
    ];

    public function boot(
        RecruitRepositoryInterface $recruitRepos
    ) 
    {
        $this->recruitRepos = $recruitRepos;
    }

    public function mount() {

    }

    public function updatedName() {
        $this->resetPage();
    }

    public function render()
    {
        $params = ['title_vi' => $this->name];
        $recruits = $this->recruitRepos->getPaginatedListRecruitsByParams($params, 10);
        return view('admins.recruits.livewire.recruit-list', [
            'recruits' => $recruits
        ]);
    }
}
