<?php
class ControllerExtensionModuleSliderText extends Controller {
    private $error = array(); 
    public function index() {   
	
		$language = $this->load->language('extension/module/slider_text');
        $data = array_merge($language);
		
        $this->document->setTitle($this->language->get('heading_title'));
        
        $this->load->model('setting/setting');
        
        $this->load->model('tool/image');  
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $this->model_setting_setting->editSetting('slider_text', $this->request->post);    

            $this->session->data['success'] = $this->language->get('text_success');
        
            if(isset($this->request->post['save_stay']) and $this->request->post['save_stay']=1)
			$this->response->redirect($this->url->link('extension/module/slider_text', 'user_token=' . $this->session->data['user_token'], true));
			else
			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true));
        }
		
            $data['text_image_manager'] = 'Image manager';
            $data['user_token'] = $this->session->data['user_token'];       
        
		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];
			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

        $config_data = array(
        'slider_text_slider_text1',
		'slider_text_slider_text2',
		'slider_text_slider_text3',
		'slider_text_slider_link',
		'slider_text_slider_textlink',
		'slider_text_slider_status',
		);
      
        foreach ($config_data as $conf) {
        if (isset($this->request->post[$conf])) {
                $data[$conf] = $this->request->post[$conf];
            } else {
                $data[$conf] = $this->config->get($conf);
            }
        }
		if (isset($this->request->post['slider_text_slider_status'])) {
			$data['slider_text_slider_status'] = $this->request->post['slider_text_slider_status'];
		} elseif ($this->config->get('slider_text_slider_status')) {
			$data['slider_text_slider_status'] = $this->config->get('slider_text_slider_status');
		} else {
			$data['slider_text_slider_status'] = 0;
		}
        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }
        
        $data['breadcrumbs'] = array();
		
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);
		
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true)
		);
        
        $data['breadcrumbs'][] = array(
            'text'      => $this->language->get('heading_title'),
            'href'      => $this->url->link('extension/module/slider_text', 'user_token=' . $this->session->data['user_token'], true)
        );
				
		$data['action'] = $this->url->link('extension/module/slider_text', 'user_token=' . $this->session->data['user_token'], true);
		
		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true);
    
        if (isset($this->request->post['slider_text_module'])) {
            $modules = explode(',', $this->request->post['slider_text_module']);
        } elseif ($this->config->get('slider_text_module') != '') {
            $modules = explode(',', $this->config->get('slider_text_module'));
        } else {
            $modules = array();
        }           
                
		$this->load->model('localisation/language');
		
		$data['languages'] = $this->model_localisation_language->getLanguages();
		
        $data['modules'] = $modules;
        
        if (isset($this->request->post['slider_text_module'])) {
            $data['slider_text_module'] = $this->request->post['slider_text_module'];
        } else {
            $data['slider_text_module'] = $this->config->get('slider_text_module');

		}
		
		$data['slider_text_modules'] = array();

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/module/slider_text', $data));

    }
	
	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/module/slider_text')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}
	public function uninstall() {
      $this->load->model('setting/setting');
      $this->model_setting_setting->deleteSetting('slider_text');

}
}