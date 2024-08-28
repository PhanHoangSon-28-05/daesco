<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Repositories\Documents\DocumentRepositoryInterface;

class DocumentController extends Controller
{
    protected $documentRepos;

    public function __construct(
        DocumentRepositoryInterface $documentRepos
    )
    {
        $this->documentRepos = $documentRepos;

        Session::put('menu', 'documents');
    }

    public function index() {
        return view('admins.documents.index');
    }

    public function addDownloadCount(Request $request)
    {
        $document_id = $request->input('document_id');
        $this->documentRepos->addDownloadCount($document_id);
    }
}
