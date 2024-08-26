<?php

namespace App\Livewire\Recruits;

use App\Models\Recruit;
use Livewire\Component;
use Livewire\WithPagination;
use App\Repositories\Years\YearRepositoryInterface;
use App\Repositories\Recruits\RecruitRepositoryInterface;

class RecruitList extends Component
{
    use WithPagination;

    protected $recruitRepos;
    protected $yearRepos;

    public $name = '';
    public $years;
    public $selected_year;

    protected $listeners = [
        'refreshList' => '$refresh'
    ];

    public function boot(
        RecruitRepositoryInterface $recruitRepos,
        YearRepositoryInterface $yearRepos
    ) 
    {
        $this->recruitRepos = $recruitRepos;
        $this->yearRepos = $yearRepos;
    }

    public function mount() {
        $this->years = $this->yearRepos->getAll()->sortByDesc('name');
    }

    public function updated($field) {
        if (in_array($field, ['name', 'selected_year'])) $this->resetPage();
    }

    public function render()
    {
        $params = [
            'title_vi' => $this->name,
            'year' => $this->selected_year,
        ];
        $recruits = $this->recruitRepos->getPaginatedListRecruitsByParams($params, 10);
        return view('admins.recruits.livewire.recruit-list', [
            'recruits' => $recruits
        ]);
    }
}
