<?php
    require_once '../../constants.php';
    new LoginUser();

    class LoginUser {
        private $connection;

        public function __construct() {
            $this->connection = connect_database();

            if (isset($_POST['operation'])) {
                $operation = $_POST['operation'];
                if ($operation == 'login_user') {
                    $this->login_user();

                } elseif ($operation == 'social_sign_in') {
                    $this->social_sign_in();
                }
            }
        }

        private function login_user() {
            $statement = $this->connection->prepare('SELECT user_id, first_name, last_name, user_name, date_of_birth, 
                  email_address, mobile_contact, user_password, password_salt, user_account, user_roles, profile_picture 
                FROM table_users WHERE email_address = :credential OR mobile_contact = :credential LIMIT 1');
            $statement->bindParam(':credential', $_POST['credential']);
            $statement->execute();

            if ($statement->rowCount() == 0) {
                echo json_encode(['code' => 2]);
                die();
            }

            $data = $statement->fetch();

            if($data['user_account'] == 'google.com'){
                echo json_encode(['code' => 3]);
                die();
            }

            if($data['user_account'] == 'facebook.com'){
                echo json_encode(['code' => 4]);
                die();
            }

            if ((hash('sha512', $_POST['login_password'] . $data['password_salt']) != $data['user_password'])) {
                echo json_encode(['code' => 5]);
                die();
            }

            if (isset($_POST['mobile'])) {
                $data['code'] = 1;
                echo json_encode($data);
            } else {
                $this->finalise_login($data);
            }
        }

        private function social_sign_in() {
            $statement = $this->connection->prepare('SELECT user_id FROM table_users WHERE  email_address = :email_address LIMIT 1');
            $statement->bindParam(':email_address', $_POST['email_address']);
            $statement->execute();

            if ($statement->rowCount() == 1) {
                $user_id = ($statement->fetch())['user_id'];

                $statement = $this->connection->prepare("UPDATE table_users SET first_name = :first_name, last_name = :last_name,
                       email_address = :email_address, user_account = :user_account, profile_picture = :profile_picture,
                       user_password = '', password_salt = '' WHERE user_id = :user_id");
                $statement->bindParam(':first_name', $_POST['first_name']);
                $statement->bindParam(':last_name', $_POST['last_name']);
                $statement->bindParam(':email_address', $_POST['email_address']);
                $statement->bindParam(':user_account', $_POST['user_account']);
                $statement->bindParam(':profile_picture', $_POST['profile_picture']);
                $statement->bindParam(':user_id', $user_id);
                $statement->execute();

                $statement = $this->connection->prepare('SELECT * FROM table_users WHERE user_id = :user_id LIMIT 1');
                $statement->bindParam(':user_id', $user_id);
                $statement->execute();

                $data = $statement->fetch();
                if (isset($_POST['mobile'])) {
                    $data['code'] = 1;
                    echo json_encode($data);
                } else {
                    $this->finalise_login($data);
                }

            } else {
                $statement = $this->connection->prepare("INSERT INTO table_users (first_name, last_name, user_name, date_of_birth,
                         email_address, mobile_contact, user_password, password_salt, user_account, user_roles, profile_picture) 
                            VALUES (:first_name, :last_name, '', -100000000000, :email_address, '', '', '', :user_account, :user_roles,
                                    :profile_picture)");
                $user_roles = json_encode(['student' => 1]);
                $statement->bindParam(':first_name', $_POST['first_name']);
                $statement->bindParam(':last_name', $_POST['last_name']);
                $statement->bindParam(':email_address', $_POST['email_address']);
                $statement->bindParam(':user_account', $_POST['user_account']);
                $statement->bindParam(':profile_picture', $_POST['profile_picture']);
                $statement->bindParam(':user_roles', $user_roles);
                $statement->execute();
                $user_id = $this->connection->lastInsertId();

                $statement = $this->connection->prepare('SELECT * FROM table_users WHERE user_id = :user_id LIMIT 1');
                $statement->bindParam(':user_id', $user_id);
                $statement->execute();
                $data = $statement->fetch();

                if (isset($_POST['mobile'])) {
                    $data['code'] = 1;
                    echo json_encode($data);
                } else {
                    $this->finalise_login($data);
                }
            }
        }

        private function finalise_login(array $data) {
            // remove all session variables
            session_unset();
            // destroy the session
            session_destroy();
            //start session
            session_start();
            $_SESSION['user_id'] = $data['user_id'];
            $_SESSION['first_name'] = $data['first_name'];
            $_SESSION['last_name'] = $data['last_name'];
            $_SESSION['user_name'] = $data['user_name'];
            $_SESSION['date_of_birth'] = $data['date_of_birth'];
            $_SESSION['email_address'] = $data['email_address'];
            $_SESSION['mobile_contact'] = $data['mobile_contact'];
            $_SESSION['user_account'] = $data['user_account'];
            $_SESSION['user_roles'] = $data['user_roles'];
            $_SESSION['profile_picture'] = $data['profile_picture'];
            $_SESSION['user_account'] = $data['user_account'];

            echo json_encode(['code' => 1]);
        }
    }
