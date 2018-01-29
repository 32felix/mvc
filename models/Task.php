<?php

/**

 * Created by PhpStorm.

 * User: Івася

 * Date: 23.07.2017

 * Time: 18:43

 */



class Task

{



    public $id;

    public $name;

    public $email;

    public $text;

    public $imageName = '';



    public function edit()

    {

        $this->id = isset($_POST['id']) ? $_POST['id'] : null;

        $this->name = $_POST['name'];

        $this->email = $_POST['email'];

        $this->text = $_POST['text'];



        $db = Db::getConnection();



        if ($this->id)

            $result = $db->query("SELECT * FROM Task WHERE id='".$this->id."'");



        if (!empty($result) && $task = $result->fetch_array(MYSQLI_ASSOC))

        {

            if ($result = $db->query("UPDATE Task 

             SET text='".$this->text."' 

             WHERE id='".$this->id."'"))

                return true;

        }

        else

        {

            if ($result = $db->query("INSERT INTO `Task`(`name`,`email`,`text`,`imageName`) VALUES 

                ('".$this->name."','".$this->email."','".$this->text."','".$this->imageName."')"))

                return true;

        }





        return false;

    }



    public function getTask($id=null)

    {

        $db = Db::getConnection();



        if (!$id)

            $id = $this->id ;



        if (!$id)

            return false;



        $result = $db->query("SELECT * FROM Task WHERE id='".$id."'");



        return $result->fetch_array(MYSQLI_ASSOC);

    }



    public static function getTasks ($page, $countRows=3, $sort='timeCreate')

    {

	if (trim($sort) == '')
		$sort = 'timeCreate';

	if (trim($page) == '')
		$page = 1;

	if (substr($sort, strlen($sort) - 1) == '-')
        $sort = substr($sort, 0, strlen($sort) - 1) . ' DESC';
	else
	    $sort .= ' ASC';

	$db = Db::getConnection();

	$result = $db->query("SELECT * FROM Task ORDER BY " . $sort . "
                                 LIMIT " . ($page - 1) * $countRows . ", " . $countRows,
         MYSQLI_USE_RESULT);

	$tasks = $result->fetch_all(MYSQLI_ASSOC);



        return $tasks;

    }

    public static function getCountPages ($countRows=3)

    {

        $db = Db::getConnection();



        $result = $db->query("SELECT count(*) as count FROM Task",

            MYSQLI_USE_RESULT);



        $tasks = $result->fetch_array(MYSQLI_ASSOC);



        return $tasks['count'] / $countRows;

    }

}