<?php

namespace App\Livewire\Recruits;

use Carbon\Carbon;
use App\Models\Recruit;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Footers\FooterRepositoryInterface;
use App\Repositories\Recruits\RecruitRepositoryInterface;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class RecruitCrud extends Component
{
    use WithFileUploads;

    protected $recruitRepos;
    protected $footerRepos;

    public $action;
    public $recruit;
    public $title_en;
    public $position_en;
    public $workplace_en;
    public $content_en;
    public $amount;
    public $expired_at;

    #[Rule('required', message: 'Chưa nhập tiêu đề')]
    public string $title_vi;
    #[Validate('required', message: 'Chưa nhập vị trí')]
    public string $position_vi;
    #[Validate('required', message: 'Chưa nhập nơi làm việc')]
    public string $workplace_vi;
    #[Validate('required', message: 'Chưa nhập nội dung')]
    public string $content_vi;
    #[Validate('required', message: 'Chưa nhập email liên hệ')]
    public string $email;
    #[Validate('required', message: 'Chưa nhập lương')]
    public string $salary;

    public function boot(
        RecruitRepositoryInterface $recruitRepos,
        FooterRepositoryInterface $footerRepos,
    ) 
    {
        $this->recruitRepos = $recruitRepos;
        $this->footerRepos = $footerRepos;
    }

    public function modalSetup($id)
    {
        if ($id == 0) {
            $this->action = 'create';
        } elseif ($id > 0) {
            $this->action = 'update';
        }
        // dd($id);
        $this->recruit = $this->recruitRepos->find($id);
        $this->getData();
    }


    public function getData()
    {
        $this->title_vi = $this->recruit->title_vi ?? '';
        $this->title_en = $this->recruit->title_en ?? '';
        $this->position_vi = $this->recruit->position_vi ?? '';
        $this->position_en = $this->recruit->position_en ?? '';
        $this->workplace_vi = $this->recruit->workplace_vi ?? 'Đà Nẵng';
        $this->workplace_en = $this->recruit->workplace_en ?? '';
        $this->content_vi = $this->recruit->content_vi ?? '';
        $this->content_en = $this->recruit->content_en ?? '';
        $this->salary = $this->recruit->salary ?? 'Thỏa thuận';
        $this->amount = $this->recruit->amount ?? 1;
        $this->email = $this->recruit->email ?? '';
        $this->expired_at = $this->recruit ? Carbon::parse($this->recruit->expired_at)->format('d/m/Y') : today()->format('d/m/Y');

        $this->dispatch('setDetailEditorContent');
        $this->dispatch('setDatetpickerValue');
        $this->resetErrorBag();
    }

    public function create()
    {
        $this->validate();
        $this->recruitRepos->create([
            'title_vi' => trim($this->title_vi),
            'title_en' => trim($this->title_en),
            'position_vi' => trim($this->position_vi),
            'position_en' => trim($this->position_en),
            'workplace_vi' => trim($this->workplace_vi),
            'workplace_en' => trim($this->workplace_en),
            'content_vi' => trim($this->content_vi),
            'content_en' => trim($this->content_en),
            'salary' => $this->salary,
            'amount' => $this->amount,
            'email' => trim($this->email),
            'expired_at' => Carbon::createFromFormat('d/m/Y', $this->expired_at)->format('Y-m-d'),
            'slug' => $this->title_en != '' ? Str::slug(trim($this->title_en)) : Str::slug(trim($this->title_vi)),
        ]);
        $this->dispatch('refreshList')->to('recruits.recruit-list');
        $this->dispatch('closeCrudRecruit');
    }

    public function update()
    {
        $this->validate();
        $this->recruit->update([
            'title_vi' => trim($this->title_vi),
            'title_en' => trim($this->title_en),
            'position_vi' => trim($this->position_vi),
            'position_en' => trim($this->position_en),
            'workplace_vi' => trim($this->workplace_vi),
            'workplace_en' => trim($this->workplace_en),
            'content_vi' => trim($this->content_vi),
            'content_en' => trim($this->content_en),
            'salary' => $this->salary,
            'amount' => $this->amount,
            'email' => trim($this->email),
            'expired_at' => Carbon::createFromFormat('d/m/Y', $this->expired_at)->format('Y-m-d'),
            'slug' => $this->title_en != '' ? Str::slug(trim($this->title_en)) : Str::slug(trim($this->title_vi)),
        ]);
        $this->dispatch('refreshList')->to('recruits.recruit-list');
        $this->dispatch('closeCrudRecruit');
    }

    public function render()
    {
        return view('admins.recruits.livewire.recruit-crud');
    }
}
