<?

require_once './Core/DB.php';

class UserData
{
    public $table = 'user_data';
    public $columns;
    public $values;
    public $email;

    //Get user from current DB
    public function showUserData($email)
    {
        $user = DB::getInstance()->searchUser($this->table, $email);
        return $user;
    }
    //Update user Info, from form
    public function updateUserData($data)
    {
        $this->createColumns($data);
        $this->setEmail($data);
        $this->values = array_values($data);
        DB::getInstance()->updateUserInfo($this->table, $this->columns, $this->values, $this->email);
    }

    //Generate column names
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
