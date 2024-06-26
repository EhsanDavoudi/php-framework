<?php
use system\BaseModel;

class UserModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function registerUser($array) {
        if($array['password'] && strlen($array['password']) >= 8 ){

            $insert_query = "INSERT INTO users (name, last_name, username, password, email, phone_number, address)
            VALUES ('" . $array['name'] . "', '" . $array['lastName'] . "', '" . $array['username'] . "', '" . strHash(strHash(strHash($array['password'])))
            . "', '" . $array['email'] . "', '" . $array['phoneNumber'] . "', '" . $array['address'] . "')";

            $result = $this->db->query($insert_query);
            return (bool)$result;
        }
        return false;
    }

    public function verify($array) {
        $verify_query = "SELECT * FROM users WHERE email = '" . $array['email'] . "' OR username = '" . $array['username'] . "' OR phone_number = '" . $array['phoneNumber'] . "'";
        return $this->db->row($verify_query);
    }

    /**
     * @param $username
     * @param $password
     * @return array|false|null
     */
    public function authenticateValidator($username = false, $password = false)
    {
        // comment
        /*
            comment
        */
        /**
         * comment
         */
        $whereCase = [];
        /* چک کردن دستی پسورد */
        $doubleHashedPassword = "";
        if ($username) {
            $doubleHashedPassword = strHash(strHash($password));
            $whereCase[] = "username = '$username'";
            $whereCase[] = "password = '".strHash($doubleHashedPassword)."'";
        } else if($this->session->get('userID') ) {
            $userID = $this->session->get('userID');
            $doubleHashedPassword = $this->session->get('userPass') ?: "";
            $whereCase[] = "id = '$userID'";
            $whereCase[] = "password = '".strHash($doubleHashedPassword)."'";
        }/* اضافه کردن شرط دیگری که زمانی که این دو برقرار نبودند اجرا شود */


        if ($username ||$this->session->get('userID')) {
            $userRow = $this->db->row("SELECT * FROM users WHERE " . implode(" AND ", $whereCase));
            if( $userRow ){
                $this->session->set('userID', $userRow['id']);
                $this->session->set('userPass', $doubleHashedPassword);
                return $userRow;
            }else{
                return null;
            }
        }
    }

    public function userInfo()
    {
        $id = $this->session->get('userID');
//        die($id);
        $NameAndLastname_query = "SELECT name, last_name FROM users WHERE id = '$id'";
        $userinfoNameResult = $this->db->row($NameAndLastname_query);
        return $userinfoNameResult['name'] . " " . $userinfoNameResult['last_name'];
    }
}