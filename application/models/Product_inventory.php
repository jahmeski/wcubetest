<?php

class Product_inventory extends CI_Model {

    public function getProducts() {
		$query = $this->db->get('products');
		return $query->result();
	}

		public function saveProduct($inputs) {
		$inputs += ['created_at' => date('Y-m-d H:i:s')];
		return $this->db->insert('products', $inputs);
		}
		
		public function updateProduct($input, $id) {
			$input += ['updated_at' => date('Y-m-d H:i:s')];
			return $this->db->where('id', $id)->update('products', $input);
		}

		public function deleteProduct($id) {
			return $this->db->delete('products', array('id' => $id));
		}
}
?>
