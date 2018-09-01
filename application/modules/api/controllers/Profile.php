<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'modules/api/libraries/REST_Controller.php';

class Profile extends REST_Controller {

    function __construct()
    {
        parent::__construct();
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        // $method = $_SERVER['REQUEST_METHOD'];
        // if ($method == "OPTIONS") {
        //     die();
        // }
    }

    private $table = 'profile';

    public function index_get()
    {
        $id = $this->get('id');;

        if ($id === NULL) {
            $query = $this->db->get($this->table);
        }
        else {
            $query = $this->db->get_where($this->table, array('id' => $id));
        }

        if ($query) {
            if ($query->num_rows() > 0) {
                $this->response($query->result(), REST_Controller::HTTP_OK);
            }
            else {
                $this->response([
                    'status' => FALSE,
                    'message' => 'Not found'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
        else {
            $this->response([
                'status' => FALSE,
                'message' => $this->db->error()['message']
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function index_post()
    {
        $data = array(
            'name'          => $this->post('name'),
            'address'       => $this->post('address'),
            'email'         => $this->post('email'),
            'phone'         => $this->post('phone'),
            'image'         => $this->post('image'),
            'created_at'    => date('Y-m-d H:i:s'),
            'created_by'    => 'Ricky'
        );

        if ($this->validation('post')) {

            $insert = $this->db->insert($this->table, $data);

            if ($insert) {
                $this->response($data, REST_Controller::HTTP_CREATED);
            }
            else {
                $this->response([
                    'status' => FALSE,
                    'message' => $this->db->error()['message']
                ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
        else {
            $this->response([
                'status' => FALSE,
                'message' => validation_errors()
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $id = (int) $this->get('id');

        if ($id <= 0) {
            $this->response([
                'status' => FALSE,
                'message' => 'Bad Request'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }

        $data = array(
            'name'      => $this->put('name'),
            'address'   => $this->put('address'),
            'email'     => $this->put('email'),
            'phone'     => $this->put('phone'),
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => 'Ricky'
        );

        if ($this->put('image')) {
            $data['image']  = $this->put('image');
        }

        if ($this->validation('put')) {

            $update = $this->db->update($this->table, $data, array('id' => $id));

            if ($update) {
                $this->response($data, REST_Controller::HTTP_ACCEPTED);
            }
            else {
                $this->response([
                    'status' => FALSE,
                    'message' => 'Not modified'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
        else {
            $this->response([
                'status' => FALSE,
                'message' => validation_errors()
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_delete()
    {
        $id = (int) $this->get('id');

        if ($id <= 0) {
            $this->response([
                'status' => FALSE,
                'message' => 'Bad Request'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }

        $this->db->delete($this->table, array('id' => $id));

        if ($this->db->affected_rows()) {
            $this->response([
                'status' => TRUE,
                'message' => 'Deleted'
            ], REST_Controller::HTTP_NO_CONTENT);
        }
        else {
            $this->response([
                'status' => FALSE,
                'message' => $this->db->error()['message']
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    private function validation($method)
	{
		$this->load->library('form_validation');

        $data = array(
            array(
                'field' => 'name',
                'label' => 'name',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'address',
                'label' => 'address',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'email',
                'label' => 'email',
                'rules' => 'trim|required|valid_email'
            ),
            array(
                'field' => 'phone',
                'label' => 'phone',
                'rules' => 'trim|required'
            )
        );

        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_data($this->$method());
		$this->form_validation->set_rules($data);
		return $this->form_validation->run();
	}

}
