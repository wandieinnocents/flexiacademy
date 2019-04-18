<?php
    session_start();

    date_default_timezone_set('Africa/Kampala');
    define("username", "william");
    define("password", "dev2525");
    define("host", "localhost");
    define("dbname", "flexiacademy");

    new Data();

    class Data {
        private $connection;

        public function __construct() {
            $this->connection = connect_database();

            if (isset($_POST['operation'])) {
                $operation = $_POST['operation'];
                if ($operation == 'create_account') {
                    $this->create_account();
                } elseif ($operation == 'login_user') {
                    $this->login_user();
                } elseif ($operation == 'logout_user') {
                    $this->logout_user();
                }
            }
        }

        private function logout_user() {
            // remove all session variables
            session_unset();
            // destroy the session
            session_destroy();

            echo json_encode(array('code' => 1));
        }

        private function social_sign_in($user_account, $first_name, $last_name, $user_name, $date_of_birth,
                                        $email_address, $mobile_contact) {

        }

        private function create_account() {
            $statement = $this->connection->prepare('SELECT user_id FROM table_users 
                        WHERE  email_address = :email_address');
            $statement->bindParam(':email_address', $_POST['email_address']);
            $statement->execute();
            if ($statement->rowCount() > 0) {
                echo json_encode(array('code' => 2));
                die();
            }

            $statement = $this->connection->prepare('SELECT user_id FROM table_users 
                          WHERE  mobile_contact = :mobile_contact');
            $statement->bindParam(':mobile_contact', $_POST['mobile_contact']);
            $statement->execute();
            if ($statement->rowCount() > 0) {
                echo json_encode(array('code' => 3));
                die();
            }

            $statement = $this->connection->prepare('INSERT INTO table_users (first_name, last_name, user_name, date_of_birth, 
                         email_address, mobile_contact, user_password, password_salt, user_account, user_roles) VALUES (:first_name, :last_name, 
                         :user_name, :date_of_birth, :email_address, :mobile_contact, :user_password, :password_salt, :user_account, :user_roles)');

            $password_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), TRUE));
            $user_password = hash('sha512', $_POST['user_password'] . $password_salt);
            $date_of_birth = strtotime($_POST['date_of_birth']);
            $user_roles = array('student' => 1);
            $user_roles = json_encode($user_roles);
            $user_account = 'flexi_account';

            $statement->bindParam(':first_name', $_POST['first_name']);
            $statement->bindParam(':last_name', $_POST['last_name']);
            $statement->bindParam(':user_name', $_POST['user_name']);
            $statement->bindParam(':date_of_birth', $date_of_birth);
            $statement->bindParam(':email_address', $_POST['email_address']);
            $statement->bindParam(':mobile_contact', $_POST['mobile_contact']);
            $statement->bindParam(':user_password', $user_password);
            $statement->bindParam(':password_salt', $password_salt);
            $statement->bindParam(':user_roles', $user_roles);
            $statement->bindParam(':user_account', $user_account);
            $statement->execute();

            $connection = NULL;
            echo json_encode(array('code' => 1));
        }

        private function login_user() {
            $statement = $this->connection->prepare('SELECT user_id, first_name, last_name, user_name, date_of_birth, 
                  email_address, mobile_contact, user_password, password_salt, user_account, user_roles 
                FROM table_users WHERE email_address = :credential OR mobile_contact = :credential LIMIT 1');
            $statement->bindParam(':credential', $_POST['credential']);
            $statement->execute();

            if ($statement->rowCount() == 0) {
                echo json_encode(array('code' => 2));
                die();
            }

            $data = $statement->fetch();

            if ((hash('sha512', $_POST['login_password'] . $data['password_salt']) != $data['user_password'])) {
                echo json_encode(array('code' => 3));
                die();
            }

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

            echo json_encode(array('code' => 1));
        }
    }

    function connect_database() {
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

        try {
            $connection = new PDO("mysql:host=" . host . ";dbname=" . dbname . ";charset=utf8",
                username, password, $options);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $connection;
        } catch (PDOException $ex) {
            return NULL;
        }
    }

    function get_rating($rating, $total = '') {
        $_0_5 = ($rating >= 0.5 ? 'voted' : '') . ($rating >= 1.0 || $rating == 0.0 ? ' d-none' : '');
        $_1_0 = ($rating >= 1.0 ? 'voted' : '');
        $_1_5 = ($rating >= 1.5 ? 'voted' : '') . ($rating >= 2.0 || $rating <= 1.0 ? ' d-none' : '');
        $_2_0 = ($rating >= 2.0 ? 'voted' : '');
        $_2_5 = ($rating >= 2.5 ? 'voted' : '') . ($rating >= 3.0 || $rating <= 2.0 ? ' d-none' : '');
        $_3_0 = ($rating >= 3.0 ? 'voted' : '');
        $_3_5 = ($rating >= 3.5 ? 'voted' : '') . ($rating >= 4.0 || $rating <= 3.0 ? ' d-none' : '');
        $_4_0 = ($rating >= 4.0 ? 'voted' : '');
        $_4_5 = ($rating >= 4.5 ? 'voted' : '') . ($rating >= 5.0 || $rating <= 4.0 ? ' d-none' : '');
        $_5_0 = ($rating >= 5.0 ? 'voted' : '');

        $show = $total == '' ? 'd-none' : '';

        echo <<<EOT
         <span class='rating'>
            <i class='fa fa-star-half $_0_5'></i>
            <i class='fa fa-star $_1_0'></i>
            <i class='fa fa-star-half $_1_5'></i>
            <i class='fa fa-star $_2_0'></i>
            <i class='fa fa-star-half $_2_5'></i>
            <i class='fa fa-star $_3_0'></i>
            <i class='fa fa-star-half $_3_5'></i>
            <i class='fa fa-star $_4_0'></i>
            <i class='fa fa-star-half $_4_5'></i>
            <i class='fa fa-star $_5_0'></i>
            <small class='$show'>($total)</small>
         </span>
EOT;
    }