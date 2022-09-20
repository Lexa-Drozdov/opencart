<?php
class ControllerAccountNews extends Controller {
    private $error = array();
    public function index() {
        if (!$this->customer->isLogged()) {
            $this->session->data['redirect'] = $this->url->link('account/news', '', true);

            $this->response->redirect($this->url->link('account/login', '', true));
        }

        if (isset($this->request->get['page'])) {
            $page = $this->request->get['page'];
        } else {
            $page = 1;
        }

        $this->load->language('account/news');

        $this->load->model('account/news');

        $this->load->model('tool/image');

        $this->document->setTitle($this->language->get('heading_title'));

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/home')
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_account'),
            'href' => $this->url->link('account/account', '', true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('account/news')
        );

        if (isset($this->session->data['success'])) {
            $data['success'] = $this->session->data['success'];

            unset($this->session->data['success']);
        } else {
            $data['success'] = '';
        }

        $url = '';

        if (isset($this->request->get['page'])) {
            $url .= '&page=' . $this->request->get['page'];
        }

        $data['news'] = array();

        $filter_data = array(
            'customer_id'    => $this->customer->getId(),
            'start'           => ($page - 1) * $this->config->get('config_limit_admin'),
            'limit'           => $this->config->get('config_limit_admin')
        );

        $results = $this->model_account_news->getNewslist($filter_data);
        $total = $this->model_account_news->getTotalNews($filter_data);

        foreach ($results as $result) {

            if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], 50, 50);
                } else {
                    $image = $this->model_tool_image->resize('no_image.png', 50, 50);
                }

                $data['news'][] = array(
                    'id'          => $result['id'],
                    'thumb'       => $image,
                    'name'        => $result['name'],
                    'short_name'  => $result['short_name'],
                    'description' => html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'),
                    'date_added'  => date($this->language->get('date_format_short'), strtotime($result['data_add'])),
                    'edit'        => $this->url->link('account/news/edit', 'id=' . $result['id'], true),
                    'delete'      => $this->url->link('account/news/delete', 'id=' . $result['id'], true)
                );
            }

        $url = '';

        if (isset($this->request->get['page'])) {
            $url .= '&page=' . $this->request->get['page'];
        }

        $pagination = new Pagination();
        $pagination->total = $total;
        $pagination->page = $page;
        $pagination->limit = 10;
        $pagination->url = $this->url->link('account/news', 'page={page}', true);

        $data['pagination'] = $pagination->render();

        $data['results'] = sprintf($this->language->get('text_pagination'), ($total) ? (($page - 1) * 10) + 1 : 0, ((($page - 1) * 10) > ($total - 10)) ? $total : ((($page - 1) * 10) + 10), $total, ceil($total / 10));


        $data['continue'] = $this->url->link('account/news/edit', '', true);

        $data['column_left'] = $this->load->controller('common/column_left');
        $data['column_right'] = $this->load->controller('common/column_right');
        $data['content_top'] = $this->load->controller('common/content_top');
        $data['content_bottom'] = $this->load->controller('common/content_bottom');
        $data['footer'] = $this->load->controller('common/footer');
        $data['header'] = $this->load->controller('common/header');

        $this->response->setOutput($this->load->view('account/newslist', $data));
    }


    public function delete(){

        if (!$this->customer->isLogged()) {
            $this->session->data['redirect'] = $this->url->link('account/news/delete', '', true);
            $this->response->redirect($this->url->link('account/login', '', true));
        }

        if($this->request->get['id']) {
            $this->load->model('account/news');
            $this->model_account_news->deleteNews($this->request->get['id']);
            $this->session->data['success'] = 'Delete ok!';
        }
        $this->response->redirect($this->url->link('account/news', '', true));
    }

    public function edit(){
        if (!$this->customer->isLogged()) {
            $this->session->data['redirect'] = $this->url->link('account/news/edit', '', true);

            $this->response->redirect($this->url->link('account/login', '', true));
        }

        $this->load->language('account/edit_news');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('account/news');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
            if($this->request->post['id'] > 0) {
                //var_dump($this->request->post);die;
                $this->model_account_news->editNews($this->request->post);
            }else{
                $this->model_account_news->addNews($this->request->post);
            }

            $this->session->data['success'] = 'Save News';

            $this->response->redirect($this->url->link('account/news', '', true));
        }

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/home')
        );

        $data['breadcrumbs'][] = array(
            'text' => 'Account',
            'href' => $this->url->link('account/account', '', true)
        );

        $data['breadcrumbs'][] = array(
            'text' => 'Edit News',
            'href' => $this->url->link('account/news/edit', '', true)
        );


        if (isset($this->error['name'])) {
            $data['error_name'] = $this->error['name'];
        } else {
            $data['error_name'] = '';
        }

        if (isset($this->error['short_name'])) {
            $data['error_short_name'] = $this->error['short_name'];
        } else {
            $data['error_short_name'] = '';
        }

        if (isset($this->error['description'])) {
            $data['error_description'] = $this->error['description'];
        } else {
            $data['error_description'] = '';
        }

        if (isset($this->error['filename'])) {
            $data['error_filename'] = $this->error['filename'];
        } else {
            $data['error_filename'] = '';
        }

        if ($this->request->server['REQUEST_METHOD'] != 'POST' && (isset($this->request->get['id']))) {
            $data['action'] = $this->url->link('account/news/edit', 'id=' . $this->request->get['id'] , true);
            $info = $this->model_account_news->getNewsId($this->request->get['id']);
        }

        #var_dump($info);die;

        if (isset($this->request->get['id'])) {
            $data['id'] = $this->request->get['id'];
        } elseif (!empty($info)) {
            $data['id'] = $info['id'];
        } else {
            $data['id'] = 0;
        }

        if (isset($this->request->post['name'])) {
            $data['name'] = $this->request->post['name'];
        } elseif (!empty($info)) {
            $data['name'] = $info['name'];
        } else {
            $data['name'] = '';
        }

        if (isset($this->request->post['short_name'])) {
            $data['short_name'] = $this->request->post['short_name'];
        } elseif (!empty($info)) {
            $data['short_name'] = $info['short_name'];
        } else {
            $data['short_name'] = '';
        }

        if (isset($this->request->post['description'])) {
            $data['description'] = $this->request->post['description'];
        } elseif (!empty($info)) {
            $data['description'] = $info['description'];
        } else {
            $data['description'] = '';
        }

        if (isset($this->request->post['status'])) {
            $data['status'] = $this->request->post['status'];
        } elseif (!empty($info)) {
            $data['status'] = $info['status'];
        } else {
            $data['status'] = false;
        }

        if (isset($this->request->post['image'])) {
            $data['image'] = $this->request->post['image'];
        } elseif (!empty($info)) {
            $data['image'] = $info['image'];
        } else {
            $data['image'] = '';
        }

        $this->load->model('tool/image');

        if (isset($this->request->post['image']) && is_file(DIR_IMAGE . $this->request->post['image'])) {
            $data['thumb'] = $this->model_tool_image->resize($this->request->post['image'], 100, 100);
        } elseif (!empty($info) && is_file(DIR_IMAGE . $info['image'])) {
            $data['thumb'] = $this->model_tool_image->resize($info['image'], 100, 100);
        } else {
            $data['thumb'] = $this->model_tool_image->resize('no_image.png', 100, 100);
        }

        $data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);


        if (isset($this->request->post['filename'])) {
            $data['filename'] = $this->request->post['filename'];
        } elseif (!empty($info)) {
            $data['filename'] = $info['filename'];
        } else {
            $data['filename'] = '';
        }

        if (isset($this->request->post['mask'])) {
            $data['mask'] = $this->request->post['mask'];
        } elseif (!empty($info)) {
            $data['mask'] = $info['mask'];
        } else {
            $data['mask'] = '';
        }


        $data['back'] = $this->url->link('account/news', '', true);

        $data['column_left'] = $this->load->controller('common/column_left');
        $data['column_right'] = $this->load->controller('common/column_right');
        $data['content_top'] = $this->load->controller('common/content_top');
        $data['content_bottom'] = $this->load->controller('common/content_bottom');
        $data['footer'] = $this->load->controller('common/footer');
        $data['header'] = $this->load->controller('common/header');

        $this->response->setOutput($this->load->view('account/newsedit', $data));
    }

    public function upload() {
        $this->load->language('account/news');

        $json = array();

        if (!$json) {
            if (!empty($this->request->files['file']['name']) && is_file($this->request->files['file']['tmp_name'])) {
                // Sanitize the filename
                $filename = basename(html_entity_decode($this->request->files['file']['name'], ENT_QUOTES, 'UTF-8'));

                // Validate the filename length
                if ((utf8_strlen($filename) < 3) || (utf8_strlen($filename) > 128)) {
                    $json['error'] = $this->language->get('error_filename');
                }


                if (file_exists($filename)) {
                    $size = filesize($filename);

                    if ($size >= 3145728) {
                        $json['error'] = 'Error size ';
                    }

                }
                // Allowed file extension types
                $allowed = array();

                $extension_allowed = preg_replace('~\r?\n~', "\n", $this->config->get('config_file_ext_allowed'));

                $filetypes = explode("\n", $extension_allowed);

                foreach ($filetypes as $filetype) {
                    $allowed[] = trim($filetype);
                }

                if (!in_array(strtolower(substr(strrchr($filename, '.'), 1)), $allowed)) {
                    $json['error'] = $this->language->get('error_filetype');
                }

                // Allowed file mime types
                $allowed = array();

                $mime_allowed = preg_replace('~\r?\n~', "\n", $this->config->get('config_file_mime_allowed'));

                $filetypes = explode("\n", $mime_allowed);

                foreach ($filetypes as $filetype) {
                    $allowed[] = trim($filetype);
                }

                if (!in_array($this->request->files['file']['type'], $allowed)) {
                    $json['error'] = $this->language->get('error_filetype');
                }

                // Check to see if any PHP files are trying to be uploaded
                $content = file_get_contents($this->request->files['file']['tmp_name']);

                if (preg_match('/\<\?php/i', $content)) {
                    $json['error'] = $this->language->get('error_filetype');
                }

                // Return any upload error
                if ($this->request->files['file']['error'] != UPLOAD_ERR_OK) {
                    $json['error'] = $this->language->get('error_upload_' . $this->request->files['file']['error']);
                }
            } else {
                $json['error'] = $this->language->get('error_upload');
            }
        }

        if (!$json) {
            $file = $filename;

            move_uploaded_file($this->request->files['file']['tmp_name'], DIR_DOWNLOAD . $file);

            $json['filename'] = $file;
            $json['mask'] = $filename;

            $json['success'] = $this->language->get('text_upload');
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function validateForm(){
        if ((utf8_strlen(trim($this->request->post['name'])) < 1) || (utf8_strlen(trim($this->request->post['name'])) > 255)) {
            $this->error['name'] = 'Error name';
        }

        if ((utf8_strlen(trim($this->request->post['short_name'])) < 1) || (utf8_strlen(trim($this->request->post['short_name'])) > 125)) {
            $this->error['short_name'] = 'Error Short Name';
        }

        if ((utf8_strlen($this->request->post['description']) < 10) || (utf8_strlen($this->request->post['description']) > 3000)) {
            $this->error['description'] = 'Error Description';
        }


        if ((utf8_strlen($this->request->post['filename']) < 3) || (utf8_strlen($this->request->post['filename']) > 128)) {
            $this->error['filename'] = 'Error name file';
        }

        if (!is_file(DIR_DOWNLOAD . $this->request->post['filename'])) {
            $this->error['filename'] = 'Error file';
        }

        return !$this->error;
    }
}
