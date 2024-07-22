<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ItemModel;
use App\Models\CategoryModel;

class Categoris extends BaseController
{
    var $model, $category;
    function __construct()
    {
        $this->model = new ItemModel();
        $this->category = new CategoryModel();
    }
    public function index()
    {
        $data['tes'] = $this->category->findAll();
        return view('web/categories/categoris', $data);
    }
    public function fetchData()
    {
        $itemModel = new ItemModel();
        $data = $itemModel->findAll();
        return json_encode($data);
    }

    public function create()
    {

        return view('web/categories/addcategory');
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
    public function edit($id)
    {
        $data['kategori'] = $this->category->find($id);
        return view('web/categories/edit', $data);
    }
}
