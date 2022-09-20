<?php
class ControllerCommonFooter extends Controller {
	public function index() {

        $currency_code = $this->session->data['currency'];
        $data['autocalc_currency'] = array(
            'value'           => (float)$this->currency->getValue($currency_code),
            'symbol_left'     => str_replace("'", "\'", $this->currency->getSymbolLeft($currency_code)),
            'symbol_right'    => str_replace("'", "\'", $this->currency->getSymbolRight($currency_code)),
            'decimals'        => (int)$this->currency->getDecimalPlace($currency_code),
            'decimal_point'   => $this->language->get('decimal_point'),
            'thousand_point'  => $this->language->get('thousand_point'),
        );
        $data['autocalc_option_special'] = $this->config->get('config_autocalc_option_special');
        $data['autocalc_option_discount'] = $this->config->get('config_autocalc_option_discount');
        $data['autocalc_not_mul_qty'] = $this->config->get('config_autocalc_not_mul_qty');
        $data['autocalc_select_first'] = $this->config->get('config_autocalc_select_first');
      
		$this->load->language('common/footer');

		$this->load->model('catalog/information');

		$data['informations'] = array();

		foreach ($this->model_catalog_information->getInformations() as $result) {
			if ($result['bottom']) {
				$data['informations'][] = array(
					'title' => $result['title'],
					'href'  => $this->url->link('information/information', 'information_id=' . $result['information_id'])
				);
			}
		}

		$data['contact'] = $this->url->link('information/contact');
		$data['return'] = $this->url->link('account/return/add', '', true);
		$data['sitemap'] = $this->url->link('information/sitemap');
		$data['tracking'] = $this->url->link('information/tracking');
		$data['manufacturer'] = $this->url->link('product/manufacturer');
		$data['voucher'] = $this->url->link('account/voucher', '', true);
		$data['affiliate'] = $this->url->link('affiliate/login', '', true);
		$data['special'] = $this->url->link('product/special');
		$data['account'] = $this->url->link('account/account', '', true);
		$data['order'] = $this->url->link('account/order', '', true);
		$data['wishlist'] = $this->url->link('account/wishlist', '', true);
		$data['newsletter'] = $this->url->link('account/newsletter', '', true);

		$data['powered'] = sprintf($this->language->get('text_powered'), $this->config->get('config_name'), date('Y', time()));

		// Whos Online
		if ($this->config->get('config_customer_online')) {
			$this->load->model('tool/online');

			if (isset($this->request->server['REMOTE_ADDR'])) {
				$ip = $this->request->server['REMOTE_ADDR'];
			} else {
				$ip = '';
			}

			if (isset($this->request->server['HTTP_HOST']) && isset($this->request->server['REQUEST_URI'])) {
				$url = ($this->request->server['HTTPS'] ? 'https://' : 'http://') . $this->request->server['HTTP_HOST'] . $this->request->server['REQUEST_URI'];
			} else {
				$url = '';
			}

			if (isset($this->request->server['HTTP_REFERER'])) {
				$referer = $this->request->server['HTTP_REFERER'];
			} else {
				$referer = '';
			}

			$this->model_tool_online->addOnline($ip, $this->customer->getId(), $url, $referer);
		}

		$data['scripts'] = $this->document->getScripts('footer');
		
		return $this->load->view('common/footer', $data);
	}
}
