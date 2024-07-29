<?php

namespace App\Models;

use CodeIgniter\Model;

class LocationModel extends Model
{
    protected $table            = 'locations';
    protected $primaryKey       = 'LocationID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'LocationName', 'LocationDescription'
    ];

    public function getLocationNameById($id)
    {
        return $this->where('LocationID', $id)->first();
    }
}
