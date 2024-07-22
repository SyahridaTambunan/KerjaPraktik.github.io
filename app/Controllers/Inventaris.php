<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ItemModel;
use App\Models\CategoryModel;

class Inventaris extends BaseController
{
    var $model;
    function __construct()
    {
        $this->model = new ItemModel();
        $this->model = new ItemModel();
    }
    public function index()
    {
        $data['tes'] = $this->model->findAll();
        return view('inventaris', $data);
    }
    public function fetchData()
    {
        $itemModel = new ItemModel();
        $data = $itemModel->findAll();
        return json_encode($data);
    }
    public function add()
    {
        return view('web/addinventaris');
    }



    public function create()
    {

        return view('web/addcategory');
    }

    public function inventaris_store()
    {
        $itemModel = new ItemModel();
        $session = session();

        // Validasi input
        $rules = [
            'ItemName' => 'required',
            'CategoryID' => 'required',
            'LocationID' => 'required',
            'Quantity' => 'required',
            'PurchaseDate' => 'required',
            'Price' => 'required',
        ];

        if (!$this->validate($rules)) {
            $session->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        // Simpan data kategori
        $data = [
            'ItemName' => $this->request->getVar('ItemName'),
            'CategoryID' => $this->request->getVar('CategoryID'),
            'LocationID' => $this->request->getVar('LocationID'),
            'Quantity' => $this->request->getVar('Quantity'),
            'PurchaseDate' => $this->request->getVar('PurchaseDate'),
            'Price' => $this->request->getVar('Price')
        ];

        $itemModel->save($data);
        $session->setFlashdata('success', 'Inventaris added successfully!');
        return redirect()->to('/');
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
    public function delete()
    {
        $model = new ItemModel();
        $id = $this->request->getPost('ItemID');
        $model->delete($id);

        return redirect()->to('/index');
    }
    public function edit($id)
    {
        $model = new ItemModel();

        // Retrieve the item details
        $data['item'] = $model->find($id);

        if ($this->request->getMethod() == 'post') {
            // Get POST data
            $postData = [
                'ItemID' => $this->request->getPost('ItemID'),
                'ItemName' => $this->request->getPost('ItemName'),
                'ItemDescription' => $this->request->getPost('ItemDescription'),
                // Add other fields as necessary
            ];

            // Validation rules
            $validationRules = [
                'ItemName' => 'required|min_length[3]',
                'ItemDescription' => 'required|min_length[5]',
                // Add other validation rules as necessary
            ];

            // Validate the form data
            if ($this->validate($validationRules)) {
                // Update the item in the database
                $model->update($id, $postData);

                // Redirect to the index page or another page
                return redirect()->to('/index');
            } else {
                // If validation fails, pass validation errors to the view
                $data['validation'] = $this->validator;
            }
        }

        // Load the edit view with the item data and validation errors (if any)
        return view('items/edit', $data);
    }

    public function update($id)
    {
        $model = new ItemModel();

        $data = [
            'ItemName' => $this->request->getPost('ItemName'),
            'CategoryID' => $this->request->getPost('CategoryID'),
            'LocationID' => $this->request->getPost('LocationID'),
            'Quantity' => $this->request->getPost('Quantity'),
            'PurchaseDate' => $this->request->getPost('PurchaseDate'),
            'Price' => $this->request->getPost('Price'),
        ];

        if ($model->update($id, $data)) {
            return redirect()->to('/inventaris')->with('success', 'Data berhasil diperbarui');
        } else {
            return redirect()->back()->with('errors', $model->errors())->withInput();
        }
    }
}
