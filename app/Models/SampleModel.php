<?php

namespace App\Models;

use CodeIgniter\Model;

class SampleModel extends Model
{
    protected $table = 'samples';

    protected $primaryKey = 'id';

    protected $allowedFields = ['title', 'content'];
}
