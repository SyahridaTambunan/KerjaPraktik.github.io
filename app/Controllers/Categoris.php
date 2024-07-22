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
        return view('categoris', $data);
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
    public function edit($id)
    {
        $CategoryModel = new CategoryModel();
        $session = session();

        $location = $CategoryModel->find($id);
        if (!$location) {
            $session->setFlashdata('errors', 'Category not found.');
            return redirect()->to('/categories');
        }

        // Validasi input
        $rules = [
            'CategoryName' => 'required|min_length[3]|max_length[255]'
        ];

        if ($this->request->getMethod() === 'post' && !$this->validate($rules)) {
            $session->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        if ($this->request->getMethod() === 'post') {
            // Update data categories
            $data = [
                'CategoryName' => $this->request->getVar('CategoryName')
            ];

            $location->update($id, $data);
            $session->setFlashdata('success', 'Categories updated successfully!');
            return redirect()->to('/categories');
        }

        $data['categories'] = $location;
        return view('web/editcategories', $data);
    }
    public function delete($id = null)
    {
        if ($id === null) {
            return redirect()->to('/category')->with('error', 'Category ID is missing');
        }

        $model = new CategoryModel();

        if ($model->delete($id)) {
            return redirect()->to('/category')->with('success', 'category deleted successfully');
        } else {
            return redirect()->to('/category')->with('error', 'Failed to delete category');
        }
    }
}
