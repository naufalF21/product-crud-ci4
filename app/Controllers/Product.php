<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class Product extends Controller
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $data['products'] = $this->productModel->orderBy('created_at', 'DESC')->findAll();

        return view('products/index', $data);
    }

    public function new()
    {
        return view('products/create');
    }

    public function create()
    {
        $rules = [
            'name'        => 'required|max_length[255]',
            'description' => 'permit_empty|string',
            'price'       => 'required|numeric|greater_than_equal_to[0]',
            'stock'       => 'required|integer|greater_than_equal_to[0]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price'       => $this->request->getPost('price'),
            'stock'       => $this->request->getPost('stock'),
        ];

        $this->productModel->save($data);

        return redirect()->to(base_url('products'))->with('success', 'Product created successfully!');
    }

    public function show($id = null)
    {
        $data['product'] = $this->productModel->find($id);

        if (empty($data['product'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the product item: ' . $id);
        }

        return view('products/show', $data);
    }

    public function edit($id = null)
    {
        $data['product'] = $this->productModel->find($id);

        if (empty($data['product'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the product item: ' . $id);
        }

        return view('products/edit', $data);
    }

    public function update($id = null)
    {
        $rules = [
            'name'        => 'required|max_length[255]',
            'description' => 'permit_empty|string',
            'price'       => 'required|numeric|greater_than_equal_to[0]',
            'stock'       => 'required|integer|greater_than_equal_to[0]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price'       => $this->request->getPost('price'),
            'stock'       => $this->request->getPost('stock'),
        ];

        $this->productModel->update($id, $data);

        return redirect()->to(base_url('products'))->with('success', 'Product updated successfully!');
    }

    public function delete($id = null)
    {
        $this->productModel->delete($id);

        return redirect()->to(base_url('products'))->with('success', 'Product deleted successfully!');
    }
}
