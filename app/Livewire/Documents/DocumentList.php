<?php

namespace App\Livewire\Documents;

use Livewire\Component;
use App\Repositories\Years\YearRepositoryInterface;
use App\Repositories\Categorys\CategoryRepositoryInterface;
use App\Repositories\Documents\DocumentRepositoryInterface;

class DocumentList extends Component
{
    protected $cateRepos;
    protected $documentRepos;
    protected $yearRepos;

    public $title;
    public $categories;
    public $category_id;
    public $years;
    public $selected_year;

    protected $listeners = ['refreshList' => '$refresh'];

    public function boot(
        CategoryRepositoryInterface $cateRepos,
        DocumentRepositoryInterface $documentRepos,
        YearRepositoryInterface $yearRepos
    )
    {
        $this->cateRepos = $cateRepos;
        $this->documentRepos = $documentRepos;
        $this->yearRepos = $yearRepos;
    }

    public function mount() 
    {
        // $this->categories = $this->cateRepos->getCateWithChild(3);
        $this->categories = $this->cateRepos->getChildNew(3);
        $this->years = $this->yearRepos->getAll()->sortByDesc('name');
    }

    public function updated($field)
    {
        if (in_array($field, ['title', 'category_id', 'selected_year'])) $this->resetPage();
    }

    public function render()
    {
        $params = [
            'title' => $this->title,
            'category_id' => $this->category_id,
            'year' => $this->selected_year,
        ];
        $documents = $this->documentRepos->getPaginatedListDocumentsByParams($params, 10);

        return view('admins.documents.livewire.document-list', [
            'documents' => $documents,
        ]);
    }
}
