<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ItemModel;
use App\Models\LocationModel;
use App\Models\CategoryModel;

class Location extends BaseController
{
    var $model, $location;
    function __construct()
    {
        $this->model = new ItemModel();
        $this->location = new LocationModel();
    }

    public function index()
    {
        $data['tes'] = $this->location->findAll();
        return view('location', $data);
    }

    public function fetchData()
    {
        $itemModel = new ItemModel();
        $data = $itemModel->findAll();
        return json_encode($data);
    }

    public function create()
    {
        return view('web/addcategory');
    }

    public function submit_location()
    {
        $categoryModel = new LocationModel();
        $session = session();

        // Validasi input
        $rules = [
            'LocationName' => 'required|min_length[3]|max_length[255]'
        ];

        if (!$this->validate($rules)) {
            $session->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        // Simpan data lokasi
        $data = [
            'LocationName' => $this->request->getVar('LocationName')
        ];

        $categoryModel->save($data);
        $session->setFlashdata('success', 'Location added successfully!');
        return redirect()->to('/');
    }

    public function location()
    {
        return view('web/addlocation');
    }

    public function edit($id)
    {
        $locationModel = new LocationModel();
        $session = session();

        $location = $locationModel->find($id);
        if (!$location) {
            $session->setFlashdata('errors', 'Location not found.');
            return redirect()->to('/locations');
        }

        // Validasi input
        $rules = [
            'LocationName' => 'required|min_length[3]|max_length[255]'
        ];

        if ($this->request->getMethod() === 'post' && !$this->validate($rules)) {
            $session->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        if ($this->request->getMethod() === 'post') {
            // Update data lokasi
            $data = [
                'LocationName' => $this->request->getVar('LocationName')
            ];

            $locationModel->update($id, $data);
            $session->setFlashdata('success', 'Location updated successfully!');
            return redirect()->to('/locations');
        }

        $data['location'] = $location;
        return view('web/editlocation', $data);
    }
    public function delete($id = null)
    {
        if ($id === null) {
            return redirect()->to('/location')->with('error', 'Location ID is missing');
        }

        $model = new LocationModel();

        if ($model->delete($id)) {
            return redirect()->to('/location')->with('success', 'Location deleted successfully');
        } else {
            return redirect()->to('/location')->with('error', 'Failed to delete location');
        }
    }
    public function update($location)
    {
        $model = new LocationModel();

        $data = [
            'LocationName' => $this->request->getPost('LocationName'),
            'LacationDescription' => $this->request->getPost('LocationDescription'),
        ];

        if ($model->update($location, $data)) {
            return redirect()->to('/inventaris')->with('success', 'Data berhasil diperbarui');
        } else {
            return redirect()->back()->with('errors', $model->errors())->withInput();
        }
    }
}
