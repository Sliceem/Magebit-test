<?

require_once './Core/DB.php';

class UserData
{
    public $table = 'user_data';
    public $columns;
    public $values;
    public $email;

    public function showUserData($email)
    {
        $user = DB::getInstance()->searchUser($this->table, $email);
        return $user;
    }

    public function ret($array)
    {
        return $array;
    }

    public function updateUserData($data)
    {
        $this->createColumns($data);
        $this->setEmail($data);
        $this->values = array_values($data);
        DB::getInstance()->updateUserInfo($this->table, $this->columns, $this->values, $this->email);
    }

    public function createColumns($data)
    {
        $columns = array_keys($data);
        $columnToString = '';
        foreach ($columns as $column) {
            $columnToString .= $column . '=?,';
        }
        $this->columns = rtrim($columnToString, ',');
    }

    public function setEmail($data)
    {
        $this->email = $data['user_email'];
    }
}


// filter_var(trim($column), FILTER_SANITIZE_STRING).'=?,'; 
