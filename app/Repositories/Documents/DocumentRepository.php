<?php

namespace App\Repositories\Documents;

use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Storage;

class DocumentRepository extends BaseRepository implements DocumentRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Document::class;
    }

    public function getPaginatedListDocumentsByParams($params = [], $paginate = 10, $sort = 'asc')
    {
        $documents = $this->model->orderBy('created_at', $sort);

        $title = $params['title'] ?? '';
        $category_id = $params['category_id'] ?? '';
        $year = $params['year'] ?? '';

        if ($title != '') {
            $documents->whereLike('title', '%' . $title . '%');
        }

        if ($category_id != '') {
            $documents->where('category_id', $category_id);
        }

        if ($year != '') {
            $documents->whereYear('created_at', $year);
            // $documents->whereDate('created_at', '>=', "{$year}-1-1 00:00:00")
            // ->whereDate('created_at', '<=', "{$year}-12-31 23:59:59");
        }

        return $documents->paginate($paginate);
    }

    public function getPaginatedDocumentsByCateID($id = 0, $paginate = 10)
    {
        return $this->model->where('category_id', $id)->paginate($paginate);
    }

    public function getPaginatedDocuments($paginate = 10)
    {
        return $this->model->paginate($paginate);
    }

    public function addDownloadCount($id)
    {
        $document = $this->find($id);
        $download_count = $document->download_count;
        $document->update(['download_count' => ++$download_count]);
    }
}
