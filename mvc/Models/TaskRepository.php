<?php
namespace AHT\Models;

use AHT\Models\TaskResourceModel;
use AHT\Models\TaskModel;

class TaskRepository
{
    protected $taskResourceModel;
    
    public function __construct(TaskModel $model)
    {
        $this->taskResourceModel = new TaskResourceModel($model);
    }

    public function add($model)
    {
        return $this->taskResourceModel->save($model);
    }

    public function edit($id)
    {
        return $this->taskResourceModel->edit($id);
    }

    public function show($id)
    {
        return $this->taskResourceModel->show($id);
    }

    public function showAll()
    {
        return $this->taskResourceModel->showAll();
    }

    public function delete($id)
    {
        return $this->taskResourceModel->delete($id);
    }
}
?>