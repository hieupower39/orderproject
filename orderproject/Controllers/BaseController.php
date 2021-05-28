<?php
class BaseController
{   
    const VIEW_FOLDER_NAME = 'Views';
    const MODEL_FOLDER_NAME = 'Models';
    /**
     * Description:
     * + path name: folderName.fileName
     * + Lấy từ sau thư mục View
     */
    protected function view($viewPath, array $data = [])
    {   
        foreach ($data as $key => $value){
            $$key = $value;
        }
        return require (self::VIEW_FOLDER_NAME . '/' . str_replace('.', '/', $viewPath).'.php');
    }

    protected function model($modelPath)
    {
        return require (self::MODEL_FOLDER_NAME . '/' . $modelPath .'.php');
    }

    protected function back(){
        return require("../request.php");
    }
}