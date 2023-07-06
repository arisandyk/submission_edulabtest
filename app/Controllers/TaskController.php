<?php

namespace App\Controllers;

use App\Models\TaskModel;
use CodeIgniter\Controller;

class TaskController extends Controller
{
    public function index()
    {
        $taskModel = new TaskModel();
        $data['tasks'] = $taskModel->getTasks();
        return view('tasks/index', $data);
    }

    public function create()
    {
        return view('tasks/create');
    }

    public function store()
    {
        $taskModel = new TaskModel();
        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'status' => $this->request->getPost('status')
        ];
        $taskModel->insert($data);
        return redirect()->to('/tasks');
    }

    public function edit($id)
    {
        $taskModel = new TaskModel();
        $data['task'] = $taskModel->getTaskById($id);
        return view('tasks/edit', $data);
    }

    public function update($id)
    {
        $taskModel = new TaskModel();
        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'status' => $this->request->getPost('status')
        ];
        $taskModel->update($id, $data);
        return redirect()->to('/tasks');
    }

    public function delete($id)
    {
        $taskModel = new TaskModel();
        $taskModel->delete($id);
        return redirect()->to('/tasks');
    }

    public function checkDbConnection()
    {
        $db = \Config\Database::connect();

        if (!$db->connID) {
            $error = $db->error();
            return "Connection failed: " . print_r($error);
        }

        return "Connected successfully";
    }

}