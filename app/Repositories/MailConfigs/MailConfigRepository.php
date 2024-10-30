<?php

namespace App\Repositories\MailConfigs;

use App\Models\MailConfig;
use App\Repositories\BaseRepository;

class MailConfigRepository extends BaseRepository implements MailConfigRepositoryInterface
{
    public function getModel() {
        return MailConfig::class;
    }
}