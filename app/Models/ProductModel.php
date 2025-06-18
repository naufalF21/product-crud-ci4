<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'description', 'price', 'stock'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'name'        => 'required|max_length[255]',
        'price'       => 'required|numeric|greater_than_equal_to[0]',
        'stock'       => 'required|integer|greater_than_equal_to[0]',
        'description' => 'permit_empty|string',
    ];

    protected $validationMessages = [];
    protected $skipValidation     = false;
}
