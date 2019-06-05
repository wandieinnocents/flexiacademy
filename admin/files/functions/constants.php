<?php
    session_start();

    /*  echo $_SERVER['HTTP_USER_AGENT'];
      $browser = get_browser($_SERVER['HTTP_USER_AGENT'], true);
      print_r($browser);*/

    date_default_timezone_set('Africa/Kampala');
    define("username", "william");
    define("password", "dev2525");
    define("host", "localhost");
    define("dbname", "flexiacademy");

    function connect_database() {
        $options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'];

        try {
            $connection = new PDO("mysql:host=" . host . ";dbname=" . dbname . ";charset=utf8",
                username, password, $options);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $connection;
        } catch (PDOException $ex) {
            return null;
        }
    }

    function get_categories(pdo $connection) {
        $statement = $connection->prepare('SELECT count(structure_id) AS structure_number FROM course_structure LIMIT 1');
        $statement->execute();
        $structure_number = ($statement->fetch())['structure_number'];
        echo <<<EOT
                <li>
                    <label>
                        <input type="checkbox" class="icheck" checked> &nbsp;All
                        <small>($structure_number)</small>
                    </label>
                </li>
EOT;

        $statement = $connection->prepare('SELECT count(structure_id) AS structure_number, category_name
                     FROM course_structure 
                        INNER JOIN course_categories ON course_structure.category_id = course_categories.category_id
                    GROUP BY category_name ORDER BY category_name');
        $statement->execute();

        foreach ($statement->fetchAll() as $row) {
            $structure_number = $row['structure_number'];
            $category_name = $row['category_name'];
            echo <<<EOT
                    <li>
                        <label>
                            <input type="checkbox" class="icheck"> &nbsp;$category_name
                            <small>($structure_number)</small>
                         </label>
                    </li>
EOT;
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

        return <<<EOT
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