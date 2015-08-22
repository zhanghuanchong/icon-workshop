<?php

class IconController extends BaseController {

	public function postUpload ()
	{
        if (Input::hasFile('file')) {
            $file = Input::file('file');
            if ($file->isValid()) {
                $id = str_random(8);
                $ext = $file->getClientOriginalExtension();

                $design = new Design;
                $design->id = $id;
                $design->folder = date('Ym');
                $design->ext = $ext;
                $design->original_name = $file->getClientOriginalName();
                $design->mime_type = $file->getMimeType();
                $design->platform = Input::get('platform') ? Input::get('platform') : 'ios_android';
                $design->user_agent = Input::server('HTTP_USER_AGENT');
                $design->ip = Input::getClientIp();

                $files_folder = public_path('files');
                $folder = $files_folder . '/' . $design->folder . '/' . $id;
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, TRUE);
                }

                $file->move($folder, 'origin.' . $ext);

                $design->save();

                $platforms = explode(',', $design->platform);
                $design->generateIcons($platforms);

                return $this->jsonResponse($id);
            }
        }
        return $this->jsonResponse('文件无效！', TRUE);
	}

    public function getDetail ($id)
    {
        $design = Design::findOrFail($id);
        $platforms = explode(',', $design->platform);
        return Response::view('icon/detail', array(
            'design' => $design,
            'platforms' => $platforms
        ));
    }

    public function getDownload ($id, $regenerate = FALSE)
    {
        $design = Design::findOrFail($id);
        $path = $design->package($regenerate);
        return Response::download($path);
    }

    public function postSubscribe()
    {
        $subscription = new Subscription;
        $subscription->mail = Input::get('mail');
        $subscription->design_id = Input::get('design_id');
        $subscription->user_agent = Input::server('HTTP_USER_AGENT');
        $subscription->ip = Input::getClientIp();

        $subscription->save();

        $subscription->sendZip();
    }

}
