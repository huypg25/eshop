<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminSettingController extends BaseController
{
  /**
 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
 */
public function index()
{
    $this->setPageTitle('Settings', 'Manage Settings');
    return view('admin.settings.index');
}
/**
 * @param Request $request
 */
public function update(Request $request)
{

}
}
