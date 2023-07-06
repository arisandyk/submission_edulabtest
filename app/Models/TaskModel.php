<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'description', 'status'];

    public function getTasks()
    {
        return $this->findAll();
    }

    public function getTaskById($id)
    {
        return $this->where('id', $id)->first();
    }
}