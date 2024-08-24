<?php

namespace App\Livewire\Recruits;

use App\Models\Recruit;
use Livewire\Component;
use App\Repositories\Recruits\RecruitRepositoryInterface;

class RecruitDelete extends Component
{
    protected $recruitRepos;

    public $recruit;

    public function boot(
        RecruitRepositoryInterface $recruitRepos,
    ) 
    {
        $this->recruitRepos = $recruitRepos;
    }

    public function getData($id)
    {
        $this->recruit = $this->recruitRepos->find($id);
    }

    public function delete()
    {
        $this->recruit->delete();
        $this->reset();
        $this->dispatch('refreshList')->to('recruits.recruit-list');
        $this->dispatch('closeDeleteRecruit');
    }
    public function render()
    {
        return view('admins.recruits.livewire.recruit-delete');
    }
}
