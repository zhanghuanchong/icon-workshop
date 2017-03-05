<?php

class VoteController extends BaseController
{
    public function getIndex() {
        return View::make('vote');
    }
}