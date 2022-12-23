<?php namespace App\Models;

use CodeIgniter\Model;

class Crud extends Model
{
    protected $table = 'cruds';
    protected $primaryKey = 'id';
    protected $allowedFields    = ['employee-code', 'name', 'department', 'position', 'hired-date', 'status'];
}
?>