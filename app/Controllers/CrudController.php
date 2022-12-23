<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Crud;

class CrudController extends BaseController
{
    public function index()
    {
        $crud = new Crud();
        $data['users'] = $crud->orderBy('id', 'ASC')->findAll();
        return view('Crud/index', $data);
    }

    public function update()
    {
        $crud = new Crud();
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('employee-name-edit'),
            'department' => $this->request->getVar('department-edit'),
            'position' => $this->request->getVar('position-edit'),
            'hired-date' => $this->request->getVar('hired-date-edit'),
            'status' => $this->request->getVar('status-edit'),
        ];
        $crud->update($id, $data);

        $crud = new Crud();
        $data['users'] = $crud->orderBy('id', 'ASC')->findAll();
        return view('Crud/index', $data);
    }

    public function filter()
    {
        $crud = new Crud();
        $department = $this->request->getVar('filter_value');
        $position = $this->request->getVar('position-s');
        $status = $this->request->getVar('status-s');
        $search = $this->request->getVar('search');
        $department = $this->request->getVar('filter_value');

        switch ($department) {
            case 'Online Tutorial Department':
                $data['users'] = $crud->where('department', $department)->findAll();
                break;
            case 'Sales':
                $data['users'] = $crud->where('department', $department)->findAll();
                break;
            case 'International Department':
                $data['users'] = $crud->where('department', $department)->findAll();
                break;
            case 'Inter Agency Department':
                $data['users'] = $crud->where('department', $department)->findAll();
                break;
            default:

                switch ($position) {
                    case 'CEO':
                        $data['users'] = $crud->where('position', $position)->findAll();
                        break;
                    case 'HR Assistant':
                        $data['users'] = $crud->where('position', $position)->findAll();
                        break;
                    case 'Finance Analyst':
                        $data['users'] = $crud->where('position', $position)->findAll();
                        break;
                    case 'Sales Staf':
                        $data['users'] = $crud->where('position', $position)->findAll();
                        break;
                    default:
                        switch ($status) {
                            case 'Active':
                                $data['users'] = $crud->where('status', $status)->findAll();
                                break;
                            case 'Inactive':
                                $data['users'] = $crud->where('status', $status)->findAll();
                                break;
                            case 'Resigned':
                                $data['users'] = $crud->where('status', $status)->findAll();
                                break;
                            default:
                                $data['users'] = $crud->orderBy('id', 'ASC')->findAll();
                        }
                }
        }

        return view('Crud/index', $data);
    }

    public function store()
    {
        $crud = new Crud();
        $data = [
            'employee-code' => $this->request->getVar('code'),
            'name' => $this->request->getVar('employee-name'),
            'department' => $this->request->getVar('department'),
            'position' => $this->request->getVar('position'),
            'hired-date' => $this->request->getVar('hired-date'),
            'status' => 'Active',
        ];
        $crud->insert($data);

        $crud = new Crud();
        $data['users'] = $crud->orderBy('id', 'ASC')->findAll();
        return view('Crud/index', $data);
    }

    public function delete($id = null)
    {
        $userModel = new Crud();
        $data['user'] = $userModel->where('id', $id)->delete($id);

        $crud = new Crud();
        $data['users'] = $crud->orderBy('id', 'ASC')->findAll();
        return view('Crud/index', $data);
    }
}
