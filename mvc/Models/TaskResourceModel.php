<?php
namespace AHT\Models;

use AHT\Core\ResourceModel;

class TaskResourceModel extends ResourceModel
{
    public function __construct(TaskModel $model)
    {
        return $this->_init('tasks', 'id', $model);
    }
}
?>