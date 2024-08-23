<?php

namespace App\Repositories\Documents;

use App\Repositories\RepositoryInterface;

interface DocumentRepositoryInterface extends RepositoryInterface
{
    public function getPaginatedListDocumentsByParams($params, $paginate, $sort);
    public function getPaginatedDocumentsByCateID($id, $paginate);
    public function getPaginatedDocuments($paginate);
    public function addDownloadCount($id);
}
