        <?php
        class Login extends CI_Controller {
            public function index() {
                $this->load->view('login_form');
            }

            public function process_login() {
                // Verifikasi data yang dikirim dari formulir
                $username = $this->input->post('username');
                $password = $this->input->post('password');

                // Cek username dan password di database
                $user = $this->login_model->login($username, $password);

                if ($user) {
                    // Jika login berhasil
                    $this->session->set_userdata('user_id', $user->users_kd);
                    $this->session->set_userdata('username', $user->username);
                    $data['berita'] = $this->model_app->view('berita')->result_array();
            		//
            		$data['message']="";
            		$this->template->load('template2','admin/list_berita',$data);
                } else {
                    // Jika login gagal
                    $this->session->set_flashdata('error', 'Username atau password salah');
                    $this->load->view('login_form');
                }
            }

            public function logout() {
                $this->session->sess_destroy();
                $this->load->view('login_form');
            }
        }