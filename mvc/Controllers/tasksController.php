<?php
namespace AHT\Controllers;

use AHT\Core\Controller;
use AHT\Models\TaskModel;
use AHT\Models\TaskRepository;

class tasksController extends Controller
{
    private $task;
    private $taskRespository;

    public function __construct()
    {
        $this->task = new TaskModel();
        $this->taskRespository = new TaskRepository($this->task);
    }
    function index()
    {
        $d['tasks'] = $this->taskRespository->showAll();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"])){
            $this->task->setTitle($_POST["title"]);
            $this->task->setDescription($_POST["description"]);
            $this->task->setCreatedAt(date('Y-m-d H:i:s'));
            $this->task->setUpdatedAt(date('Y-m-d H:i:s'));

            if ($this->taskRespository->add($this->task))
            {
                header("Location: http://localhost/mvc/");
            }
        } else 
        {
            $this->render("create");
        }

        
    }

    function edit($id){
        $d["task"] = $this->taskRespository->show($id);

        if (isset($_POST["title"])){
            $this->task->setTitle($_POST["title"]);
            $this->task->setDescription($_POST["description"]);
            $this->task->setUpdatedAt(date('Y-m-d H:i:s'));

            if ($this->taskRespository->edit($id)){
                header("Location: http://localhost/mvc/");
            }
        } else
        {
            $this->set($d);
            $this->render("edit");
        }
        
    }

    function delete($id)
    {
        if ($this->taskRespository->delete($id)){
            header("Location: http://localhost/mvc/");
        }
    }
}
?>