<?php

use App\Http\Controllers\BaseController;
use App\Requirement;
use Illuminate\Support\Facades\Input;

class VoteController extends BaseController
{
    public function getIndex() {
        return View::make('vote');
    }

    public function postIndex() {
        $r = new Requirement();
        $r->title = Input::get('title');
        $r->vote = 0;
        $r->status = Requirement::STATUS_NEW;
        $r->save();

        return $this->success($r);
    }
}