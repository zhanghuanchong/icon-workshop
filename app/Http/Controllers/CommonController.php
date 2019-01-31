<?php
/**
 * Created by PhpStorm.
 * User: hans
 * Date: 2019/1/21
 * Time: 18:57
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class CommonController extends BaseController
{
    public function uploadFile(Request $request)
    {
        if (!$request->hasFile('file')) {
            return $this->failed('文件未找到！');
        }

        $file = $request->file('file');
        if (!$file->isValid()) {
            return $this->failed('文件无效！');
        }

        $size = $file->getClientSize();
        if ($size > 10485760 /* 1024 * 1024 * 10 */) {
            return $this->failed('请压缩文件至 10M 以下后重试。');
        }

        $files_folder = public_path('files');
        $folder = $files_folder . '/temp';
        if (!file_exists($folder) && !@mkdir($folder, 0777, TRUE) && !is_dir($folder)) {
            return $this->failed('文件保存失败！');
        }

        $id = str_random(16);
        $ext = $file->getClientOriginalExtension();
        $file->move($folder, $id . '.' . $ext);

        return $this->success('/files/temp/' . $id . '.' . $ext);
    }
}