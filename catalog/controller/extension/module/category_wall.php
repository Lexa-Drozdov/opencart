<?php
class ControllerExtensionModuleCategoryWall extends Controller {
    public function index() {
		$this->load->language('common/header');
        if (isset($this->request->get['path'])) {
            $parts = explode('_', (string) $this->request->get['path']);
        } else {
            $parts = array();
        }
        if (isset($parts[0])) {
            $data['category_id'] = $parts[0];
        } else {
            $data['category_id'] = 0;
        }
        if (isset($parts[1])) {
            $data['child_id'] = $parts[1];
        } else {
            $data['child_id'] = 0;
        }
        $this->load->model('catalog/category');
        $this->load->model('catalog/product');
        $data['categories'] = array();
        $categories = $this->model_catalog_category->getCategories(0);
        $this->load->model('tool/image');
        foreach ($categories as $category) {
            if ($category['image']) {
                $image = $this->model_tool_image->resize($category['image'], 500, 500);
            } else {
                $image = $this->model_tool_image->resize('placeholder.png', 500, 500);
            }
            $data['categories'][] = array(
                'name' => $category['name'],
                'image' => $image,
                'href' => $this->url->link('product/category', 'path=' . $category['category_id'])
            );
        }
        return $this->load->view('extension/module/category_wall', $data);
    }
}