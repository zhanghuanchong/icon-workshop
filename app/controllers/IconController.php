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
                $design->user_agent = Input::server('HTTP_USER_AGENT');
                $design->ip = Input::getClientIp();

                $files_folder = public_path('files');
                $folder = $files_folder . '/' . $design->folder . '/' . $id;
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, TRUE);
                }

                $file->move($folder, 'origin.' . $ext);

                $design->save();

                return $this->jsonResponse($id);
            }
        }
        return $this->jsonResponse('文件无效！', TRUE);
	}

    public function postGenerate()
    {
        $platforms = Input::get('platforms');

        $design = Design::find(Input::get('id'));
        $design->platform = implode(',', $platforms);
        $design->save();

        $design->generateIcons();

        return $this->jsonResponse(NULL);
    }

    public function getDetail ($id, $dataOnly = FALSE)
    {
        if ($dataOnly) {
            $design = Design::findOrFail($id);
            $platforms = explode(',', $design->platform);
            $data = array(
                'design' => $design,
                'platforms' => $platforms
            );
            return Response::json($data);
        }
        return Redirect::to('/#/icon/' . $id);
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
