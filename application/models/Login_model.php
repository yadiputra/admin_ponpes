        <?php
        class Login_model extends CI_Model {
            public function login($username, $password) {
                $this->db->where('username', $username);
                $query = $this->db->get('users'); // Ganti 'users' dengan nama tabel pengguna
                $user = $query->row();

                // Verifikasi password (gunakan password_verify dari password hash)
                if (password_verify($password, $user->password)) {
                    return $user;
                } else {
                    return false;
                }
            }
        }