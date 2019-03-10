<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {

	public function index()
	{
		$products = $this->products->getProducts();
		$this->load->view('inventory', ['products' => $products]);
	}

	public function save() 
	{
		$this->form_validation->set_rules('name', 'Name', 'required|is_unique[products.name]');
		$this->form_validation->set_rules('price', 'Price', 'required|numeric');
		$this->form_validation->set_rules('stock', 'Stock', 'required|numeric');

		if ($this->form_validation->run() === FALSE)
		{
			$products = $this->products->getProducts();
			$this->load->view('inventory', ['products' => $products]);
			
		}
		else
		{
			$inputs = $this->input->post();
			if ($this->products->saveProduct($inputs)) {
				$this->session->set_flashdata('msg', 'Product added successfully!');
			} 
			else {
				$this->session->set_flashdata('msg', 'Failed to add the product!');
			}

			return redirect('inventory');
		}
	}

	public function update() 
	{
	
		$this->form_validation->set_rules('name', 'Name', 'required|is_unique[products.name]');
		$this->form_validation->set_rules('price', 'Price', 'required|numeric');
		$this->form_validation->set_rules('stock', 'Stock', 'required|numeric');

		if ($this->form_validation->run() === FALSE)
		{
			foreach($_POST as $key => $value){
				$data['error'][$key] = form_error($key);
			}
			$data = [
				'name' => form_error('name'),
				'price' => form_error('price'),
				'stock' => form_error('stock'),
			];
			echo json_encode($data); 
		}
		else
		{
			$id = $this->input->post('id');
			
			$input = [
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'price' => $this->input->post('price'),
				'stock' => $this->input->post('stock'),
			];
			$data = $this->products->updateProduct($input, $id);
			if ($data) {
				$this->session->set_flashdata('msg', 'Product updated successfully!');
			} 
			else {
				$this->session->set_flashdata('msg', 'Failed to update the product!');
			}
			echo json_encode($data);
		}
	}

	public function delete($id) 
	{
		if ($this->products->deleteProduct($id)) {
			$this->session->set_flashdata('msg', 'Product deleted successfully!');
		}
		else {
			$this->session->set_flashdata('msg', 'Product failed to delete!');
		}
		return redirect('inventory');
	}
}
