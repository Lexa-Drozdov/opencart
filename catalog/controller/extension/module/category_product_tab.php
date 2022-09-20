<?php
class ControllerExtensionModuleCategoryProductTab extends Controller {
	public function index($setting) {
		static $module = 0;
		
		$this->load->language('extension/module/featured');

		$this->load->model('catalog/category');

		$this->load->model('catalog/product');

		$this->load->model('tool/image');

		$data['categories'] = array();

		if (!$setting['limit']) {
			$setting['limit'] = 4;
		}
		
		if ($setting['subcategory']) {
			$sub_category = true;
		} else {
			$sub_category = false;
		}
		
		if ($setting['sorted'] == 1) {
			$sorted = 'p.date_added';
		} elseif ($setting['sorted'] == 2) {
			$sorted = 'p.name';
		} elseif ($setting['sorted'] == 3) {
			$sorted = 'p.price';
		} elseif ($setting['sorted'] == 4) {
			$sorted = 'p.rating';
		} elseif ($setting['sorted'] == 5) {
			$sorted = 'p.model';
		} elseif ($setting['sorted'] == 6) {
			$sorted = 'best_product';
		} else {
			$sorted = 'p.name';
		}
		
		if (!empty($setting['category'])) {
			$categories = array_slice($setting['category'], 0);

			foreach ($categories as $category_id) {
				$category_info = $this->model_catalog_category->getCategory($category_id);

				if ($category_info) {
					
					$products = array();

					$filter_data = array(
						'filter_category_id' 	=> $category_id,
						'filter_sub_category' 	=> $sub_category,
						'sort'               	=> $sorted,
						'order'              	=> 'DESC',
						'start'              	=> 0,
						'limit'              	=> $setting['limit']
					);


					$results = $this->model_catalog_product->getProducts($filter_data);

					
					foreach ($results as $result) {
						if($result){
							if ($result['image']) {
								$image = $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height']);
							} else {
								$image = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
							}

							if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
								$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
							} else {
								$price = false;
							}

							if ((float)$result['special']) {
								$special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
							} else {
								$special = false;
							}

							if ($this->config->get('config_tax')) {
								$tax = $this->currency->format((float)$result['special'] ? $result['special'] : $result['price'], $this->session->data['currency']);
							} else {
								$tax = false;
							}

							if ($this->config->get('config_review_status')) {
								$rating = $result['rating'];
							} else {
								$rating = false;
							}

							$products[] = array(
								'product_id'  => $result['product_id'],
								'thumb'       => $image,
								'name'        => $result['name'],
								'description' => utf8_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
								'price'       => $price,
								'special'     => $special,
								'tax'         => $tax,
								'rating'      => $rating,
								'href'        => $this->url->link('product/product', 'product_id=' . $result['product_id'])
							);
						}
				 	}
					$data['categories'][] = array(
						'category_id' => $category_info['category_id'],
						'products'	  => $products,
						'name'        => $category_info['name'],
						'href'        => $this->url->link('product/category', 'path=' . $category_info['category_id'])
					);
				}
			}
		}
		
		$data['module'] = $module++;
		
		if ($data['categories']) {
			return $this->load->view('extension/module/category_product_tab', $data);
		}
	}
}