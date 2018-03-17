<?php

use Illuminate\Support\Facades\Input;
use \Illuminate\Http\Request;

class IconController extends BaseController {

	public function postUpload (Request $request)
	{
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            if ($file->isValid()) {
                $id = str_random(8);
                $ext = $file->getClientOriginalExtension();

                /** @var Design $design */
                $design = new Design;
                $design->id = $id;
                $design->folder = date('Ym');
                $design->ext = $ext;
                $design->original_name = $file->getClientOriginalName();
                $design->mime_type = $file->getMimeType();
                $design->user_agent = $request->server('HTTP_USER_AGENT');
                $design->ip = $request->getClientIp();

                $files_folder = public_path('files');
                $folder = $files_folder . '/' . $design->folder . '/' . $id;
                if (!file_exists($folder) && !@mkdir($folder, 0777, TRUE) && !is_dir($folder)) {
                    throw new \ErrorException('Failed to create folder');
                }

                $file->move($folder, 'origin.' . $ext);

                $design->save();

                return $this->json($id);
            }
        }
        return $this->json('文件无效！', TRUE);
	}

    public function postGenerate()
    {
        $platforms = Input::get('platforms');

        /** @var Design $design */
        $design = Design::find(Input::get('id'));
        $design->platform = implode(',', $platforms);
        $design->sizes = json_encode(Input::get('sizes'));
        $design->bg_color = Input::get('bgColor');
        $design->android_folder = Input::get('androidFolder');
        $design->android_name = Input::get('androidName', 'ic_launcher');
        $design->radius = (float)Input::get('radius');
        $design->save();

        $design->generateIcons();

        return $this->json(NULL);
    }

    public function getDetail ($id)
    {
        return Redirect::to('/#/icon/' . $id);
    }

    public function getApiDetail($id)
    {
        /**
         * @var Design $design
         */
        $design = Design::findOrFail($id);
        $platforms = array();
        if ($design->platform) {
            $platforms = explode(',', $design->platform);
        }
        $data = array(
            'generated' => $design->isGenerated(),
            'design' => $design,
            'platforms' => $platforms
        );

        $sizes = $design->sizes;
        if ($sizes) {
            $data['platforms'][] = Design::CUSTOM_FOLDER;
            $data['sizes'] = $sizes;
        }
        return Response::json($data);
    }

    public function getApiGenerate($id)
    {
        /**
         * @var $design Design
         */
        $design = Design::findOrFail($id);
        $design->generateIcons();
    }

    public function getDownload ($id, $regenerate = FALSE)
    {
        /** @var Design $design */
        $design = Design::findOrFail($id);
        $path = $design->package($regenerate);
        return Response::download($path);
    }

    public function postSubscribe()
    {
        /*$subscription = new Subscription;
        $subscription->mail = Input::get('mail');
        $subscription->design_id = Input::get('design_id');
        $subscription->user_agent = Input::server('HTTP_USER_AGENT');
        $subscription->ip = Input::getClientIp();

        $subscription->save();

        $subscription->sendZip();*/
    }

}
