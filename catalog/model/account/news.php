<?php
class ModelAccountNews extends Model {
    public function getNewslist($data = array()) {
        $sql = "SELECT * FROM " . DB_PREFIX . "customer_news n";

        $sql .= " LEFT JOIN " . DB_PREFIX . "customer_news_description nd ON (n.id = nd.id)  
                  WHERE nd.language_id = '" . (int)$this->config->get('config_language_id') . "'";

        if (!empty($data['customer_id'])) {
            $sql .= " AND n.customer_id = '" . (int)$data['customer_id'] . "'";
        }

        if (!empty($data['status'])) {
            $sql .= " AND n.status = '" . (int)$data['status'] . "'";
        }

        if (isset($data['start']) || isset($data['limit'])) {
            if ($data['start'] < 0) {
                $data['start'] = 0;
            }

            if ($data['limit'] < 1) {
                $data['limit'] = 20;
            }

            $sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
        }

        $query = $this->db->query($sql);

        return $query->rows;
    }

    public function getTotalNews() {
        $sql = "SELECT COUNT(*) AS total FROM " . DB_PREFIX . "customer_news n WHERE 1";

        if (!empty($data['customer_id'])) {
            $sql .= " AND n.customer_id = '" . (int)$data['customer_id'] . "'";
        }

        if (!empty($data['status'])) {
            $sql .= " AND n.status = '" . (int)$data['status'] . "'";
        }

        $query = $this->db->query($sql);

        return $query->row['total'];
    }

    public function getNewsId($id){
        $sql = "SELECT * FROM " . DB_PREFIX . "customer_news n";

        $sql .= " LEFT JOIN " . DB_PREFIX . "customer_news_description nd ON (n.id = nd.id)  
                  WHERE nd.language_id = '" . (int)$this->config->get('config_language_id') . "'
                  AND n.id = '" . (int)$id . "' 
                  AND n.customer_id = '" . (int)$this->customer->getId() . "'";


        $query = $this->db->query($sql);

        return $query->row;
    }

    public function deleteNews($id){
        $this->db->query("DELETE FROM " . DB_PREFIX . "customer_news WHERE id = '" . (int)$id . "' AND customer_id = '" . (int)$this->customer->getId() . "'");
        $this->db->query("DELETE FROM " . DB_PREFIX . "customer_news_description WHERE id = '" . (int)$id . "'");
    }

    public function editNews($data = array()){
        $this->db->query("UPDATE " . DB_PREFIX . "customer_news SET  
                          status   = '" . (int)$data['status'] . "',
                          mask     = '" . $this->db->escape($data['status']) . "',
                          filename = '" . $this->db->escape($data['filename']) . "',  
                          data_add = NOW() 
                          WHERE id = '" . (int)$data['id'] . "' AND customer_id = '" . (int)$this->customer->getId() . "'");

        if (isset($data['image'])) {
            $this->db->query("UPDATE " . DB_PREFIX . "customer_news SET image = '" . $this->db->escape($data['image']) . "' WHERE id = '" . (int)$data['id'] . "'");
        }

        $this->db->query("DELETE FROM " . DB_PREFIX . "customer_news_description WHERE id = '" . (int)$data['id'] . "'");

        $this->db->query("INSERT INTO " . DB_PREFIX . "customer_news_description SET 
                          id          ='" . (int)$data['id'] . "',
                          language_id = '" . (int)$this->config->get('config_language_id') . "', 
                          name        = '" . $this->db->escape($data['name']) . "',
                          short_name  = '" . $this->db->escape($data['short_name']) . "', 
                          description = '" . $this->db->escape($data['description']) . "'");

    }

    public function addNews($data = array()){
        $this->db->query("INSERT INTO " . DB_PREFIX . "customer_news SET  
                          status   = '" . (int)$data['status'] . "',
                          mask     = '" . $this->db->escape($data['status']) . "',
                          filename = '" . $this->db->escape($data['filename']) . "',  
                          customer_id = '" . (int)$this->customer->getId() . "',
                          data_add = NOW()");

        $id = $this->db->getLastId();

        if (isset($data['image'])) {
            $this->db->query("UPDATE " . DB_PREFIX . "customer_news SET image = '" . $this->db->escape($data['image']) . "' WHERE id = '" . (int)$id . "'");
        }

        $this->db->query("INSERT INTO " . DB_PREFIX . "customer_news_description SET 
                          id          ='" . (int)$id . "',
                          language_id = '" . (int)$this->config->get('config_language_id') . "', 
                          name        = '" . $this->db->escape($data['name']) . "',
                          short_name  = '" . $this->db->escape($data['short_name']) . "', 
                          description = '" . $this->db->escape($data['description']) . "'");

    }


}
