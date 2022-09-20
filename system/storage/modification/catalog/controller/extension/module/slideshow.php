<?php
class ControllerExtensionModuleSlideshow extends Controller {
	public function index($setting) {
$data['language'] = $this->load->controller('common/language');
		$data['lang'] = $this->config->get('config_language_id');
		$data['slider_text_slider_status'] = $this->config->get('slider_text_slider_status');
		$data['slider_text_slider_text1'] = $this->config->get('slider_text_slider_text1');
		$data['slider_text_slider_text2'] = $this->config->get('slider_text_slider_text2');
		$data['slider_text_slider_text3'] = $this->config->get('slider_text_slider_text3');
		$data['slider_text_slider_link'] = $this->config->get('slider_text_slider_link');
		$data['slider_text_slider_textlink'] = $this->config->get('slider_text_slider_textlink');
		static $module = 0;		

		$this->load->model('design/banner');
		$this->load->model('tool/image');

		
		$data['banners'] = array();

		$results = $this->model_design_banner->getBanner($setting['banner_id']);

		foreach ($results as $result) {
			if (is_file(DIR_IMAGE . $result['image'])) {
				$data['banners'][] = array(
					'title' => $result['title'],
					'link'  => $result['link'],
					'image' => HTTP_SERVER.'image/'.$result['image']
				);
			}
		}

		$data['module'] = $module++;

		return $this->load->view('extension/module/slideshow', $data);
	}
}