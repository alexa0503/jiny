<?php

namespace App\Http\Controllers\Cms;

use App\SiteConfig;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function index()
    {
        $site_configs = SiteConfig::all();
        return view('cms.dashboard',[
            'site_configs' => $site_configs,
        ]);
    }
    //网站设置更新
    public function siteUpdate(Request $request)
    {
        $body = $request->input('body');
        if( $body && is_array($body) ){
            foreach( $body as $id=>$v ){
                $site_config = SiteConfig::find($id);
                $site_config->body = $v ?: '';
                $site_config->save();
            }
        }
        return response()->json(['ret'=>0]);
    }
}
