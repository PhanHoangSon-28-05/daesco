<?php

namespace App\Livewire\Documents;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Years\YearRepositoryInterface;
use App\Repositories\Categorys\CategoryRepositoryInterface;
use App\Repositories\Documents\DocumentRepositoryInterface;

class DocumentCrud extends Component
{
    use WithFileUploads;

    protected $cateRepos;
    protected $documentRepos;
    protected $yearRepos;

    public $action;
    public $document;
    public $categories;
    public $category_id;
    public $years;
    public $published_year;
    public $published_date;

    #[Rule('required', message: 'Chưa nhập tiêu đề')]
    public string $title;
    #[Validate('required', message: 'Chưa chọn File')]
    public $file;

    public function boot(
        CategoryRepositoryInterface $cateRepos,
        DocumentRepositoryInterface $documentRepos,
        YearRepositoryInterface $yearRepos,
    )
    {
        $this->cateRepos = $cateRepos;
        $this->documentRepos = $documentRepos;
        $this->yearRepos = $yearRepos;
    }

    public function mount() 
    {
        // $this->categories = $this->cateRepos->getCateWithChilds(3);
        $this->categories = $this->cateRepos->getChildNew(3);
        $this->years = $this->yearRepos->getAll()->sortByDesc('name');
        $this->published_date = today()->format('d/m/Y');
        $this->category_id = $this->categories->first()->id;
    }

    public function modalSetup($id)
    {
        if ($id == 0) {
            $this->action = 'create';
        } elseif ($id > 0) {
            $this->action = 'update';
        } else {
            $this->action = 'delete';
        }
        // dd($id);
        $this->document = $this->documentRepos->find(abs($id));
        $this->getData();
        $this->resetErrorBag();
    }

    public function getData() 
    {
        $this->title = $this->document->title ?? '';
        // $this->category_id = $this->document->category_id ?? $this->categories->first()->id;
        // $this->published_year = $this->document->published_year ?? $this->years->first()->name;
        // $this->published_date = ($this->document->created_at ?? today())->format('d/m/Y');
        $this->file = $this->document->file ?? '';

        if ($this->document) {
            $this->category_id = $this->document->category_id;
            $this->published_date = $this->document->created_at->format('d/m/Y');
        }

        $this->dispatch('set-datepicker', [
            'picker_id' => 'published_date', 
            'value' => $this->published_date,
        ]);
    }

    public function create() 
    {
        $this->validate();
        // dd($this->file);
        $filename = $this->file->getClientOriginalName();
        $path =  $this->file->storeAs('documents', $filename, 'public');
        $this->documentRepos->create([
            'category_id' => $this->category_id,
            'title' => trim($this->title),
            'file' => $path,
            'created_at' => Carbon::createFromFormat('d/m/Y', $this->published_date)->format('Y-m-d'),
        ]);
        $this->dispatch('refreshList')->to('documents.document-list');
        $this->dispatch('closeCrudDocument');
    }

    public function update() 
    {
        $this->validate();
        // dd($this->file);
        if (gettype($this->file) == 'string') {
            $path = $this->file;
        } else {
            $filename = $this->file->getClientOriginalName();
            $path =  $this->file->storeAs('documents', $filename, 'public');
        }
        $this->document->update([
            'category_id' => $this->category_id,
            'title' => trim($this->title),
            'file' => $path,
            'created_at' => Carbon::createFromFormat('d/m/Y', $this->published_date)->format('Y-m-d'),
        ]);
        $this->dispatch('refreshList')->to('documents.document-list');
        $this->dispatch('closeCrudDocument');
    }

    public function delete()
    {
        $this->document->delete();
        $this->dispatch('refreshList')->to('documents.document-list');
        $this->dispatch('closeCrudDocument');
    }

    public function updatedFile() 
    {
        if ($this->title == '') {
            $this->title = $this->file->getClientOriginalName();
        }
    }

    public function render()
    {
        return view('admins.documents.livewire.document-crud');
    }
}
