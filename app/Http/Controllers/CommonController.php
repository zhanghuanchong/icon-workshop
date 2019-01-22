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
            return $this->json('文件未找到！', true);
        }

        $file = $request->file('file');
        if (!$file->isValid()) {
            return $this->json('文件无效！', true);
        }

        $size = $file->getClientSize();
        if ($size > 10485760 /* 1024 * 1024 * 10 */) {
            return $this->json('请压缩文件至 10M 以下后重试。', true);
        }

        $files_folder = public_path('files');
        $folder = $files_folder . '/temp';
        if (!file_exists($folder) && !@mkdir($folder, 0777, TRUE) && !is_dir($folder)) {
            return $this->json('文件保存失败！', true);
        }

        $id = str_random(16);
        $ext = $file->getClientOriginalExtension();
        $file->move($folder, $id . '.' . $ext);

        return $this->json('/files/temp/' . $id . '.' . $ext);
    }
}