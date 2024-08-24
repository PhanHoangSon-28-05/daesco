<?php

namespace App\Livewire\Documents;

use Livewire\Component;
use App\Repositories\Categorys\CategoryRepositoryInterface;
use App\Repositories\Documents\DocumentRepositoryInterface;

class DocumentList extends Component
{
    protected $cateRepos;
    protected $documentRepos;

    public $categories;
    public $title;
    public $category_id;

    protected $listeners = ['refreshList' => '$refresh'];

    public function boot(
        CategoryRepositoryInterface $cateRepos,
        DocumentRepositoryInterface $documentRepos,
    )
    {
        $this->cateRepos = $cateRepos;
        $this->documentRepos = $documentRepos;
    }

    public function mount() 
    {
        // $this->categories = $this->cateRepos->getCateWithChild(3);
        $this->categories = $this->cateRepos->getChildNew(3);
    }

    public function render()
    {
        $params = [
            'title' => $this->title,
            'category_id' => $this->category_id,
        ];
        $documents = $this->documentRepos->getPaginatedListDocumentsByParams($params, 10);

        return view('admins.documents.livewire.document-list', [
            'documents' => $documents,
        ]);
    }
}
