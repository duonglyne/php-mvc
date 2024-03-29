<?php
namespace AHT\Core;

class Controller
{
    var $vars = [];
    var $layout = "default";

    function set($d)
    {
        $this->vars = array_merge($this->vars, $d);
    }

    function render($filename)
    {
        extract($this->vars);
        ob_start();
        require(ROOT . "Views/" . ucfirst(str_replace('Controller', '', str_replace("AHT\\Controllers\\", "", get_class($this)))) . '/' . $filename . '.php'); //AHT\Controllers\tasksController
        $content_for_layout = ob_get_clean();

        if ($this->layout == false)
        {
            $content_for_layout;
        }
        else
        {
            require(ROOT . "Views/Layouts/" . $this->layout . '.php');
        }
    }

    private function secure_input($data)
    {
        $data = trim($data); // loại khoảng trống
        $data = stripslashes($data); // loại bỏ dấu /, // -> /
        $data = htmlspecialchars($data); // chuyển dạng thực thể, html không còn tác dụng
        return $data;
    }

    protected function secure_form($form)
    {
        foreach ($form as $key => $value)
        {
            $form[$key] = $this->secure_input($value);
        }
    }

}
?>