<?php

namespace App\Http\Controllers;

use App\Requirement;
use Illuminate\Http\Request;
use View;

class VoteController extends BaseController
{
    public function getIndex() {
        return View::make('vote');
    }

    public function postIndex(Request $request) {
        $r = new Requirement();
        $r->title = $request->get('title');
        $r->vote = 0;
        $r->status = Requirement::STATUS_NEW;
        $r->save();

        return $this->success($r);
    }
}
