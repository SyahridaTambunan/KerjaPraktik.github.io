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
    public function category_store()
    {

        $categoryModel = new CategoryModel();
        $session = session();

        // Validasi input
        $rules = [
            'CategoryName' => 'required|min_length[3]|max_length[255]'
        ];

        if (!$this->validate($rules)) {
            $session->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        // Simpan data kategori
        $data = [
            'CategoryName' => $this->request->getVar('CategoryName')
        ];

        $categoryModel->save($data);
        $session->setFlashdata('success', 'Category added successfully!');
        return redirect()->to('/');
    }
    public function location()
    {
        return view('web/addlocation');
    }
}
