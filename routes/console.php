<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
Artisan::command('convert', function () {
    $directory = public_path('files/1/news/');
    $mydir = dir($directory);
    while ($file = $mydir->read()) {
        if ((!is_dir("$directory/$file")) and ($file != '.') and ($file != '.')) {
            $path = "$directory/$file";
            $img = Image::make($path);
            $img->insert(public_path('images/mask.png'), 'bottom-left', 10, 10);
            $img->save($path);
            $this->info($file);
        }
    }
    $mydir->close();
});
Artisan::command('inspire', function () {
    /*
    $contents = file_get_contents('http://xianlicleaning.com/zh-cn/news/?page=7');
    preg_match_all('/href="(\/zh-cn\/news\/.+)"/i', $contents, $matches);
    foreach ($matches[1] as $k=> $link) {
        $news_contents = file_get_contents('http://xianlicleaning.com'.$link);
        preg_match_all('/<div class="topic">(.*)<\/div>/i', $news_contents, $matches1);
        preg_match_all('/<div class="content-article">([\s\S]*)<\/div>\s+<\/div>\s+<\/div>\s+<footer>/i', $news_contents, $matches2);
        $title = $matches1[1][0];
        $body = $matches2[1][0];
        preg_match_all('/src="(.*)"/Ui', $body, $matches3);
        foreach ($matches3[1] as $url) {
            if (strpos($url, 'http') === 0) {
                $img_url = urlencode($url);
            } else {
                $img_url = urlencode('http://xianlicleaning.com'.$url);
            }
            $a = array("%3A", "%2F", "%40", "%3D", "%3F","%26","%3B");
            $b = array(":", "/", "@", "=", "?","&",";");
            $img_url = str_replace($a, $b, $img_url);
            $img_content = file_get_contents($img_url);
            $path = "/files/1/news/".date("ymdhis").$k.rand(1, 9999999).'.jpg';
            file_put_contents(public_path($path), $img_content);
            $body = str_ireplace($url, $path, $body);
        }
        $post = new \App\Post;
        $post->title = $title;
        $post->thumb = '';
        $post->body = $body;
        $post->desc = '';
        $post->save();
    }
    */
    //$this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('admin:init', function () {
    if (\App\User::count() == 0) {
        $role = Role::create(['name' => 'superadmin']);
        Permission::create(['name' => 'global privileges']);
        $role->givePermissionTo('global privileges');
        $user = new \App\User();
        $user->name = 'admin';
        $user->email = 'admin@admin.com';
        $user->password = bcrypt('admin@2020');
        $user->save();
        //$user = \App\User::find(1);
        $user->givePermissionTo('global privileges');
        $user->assignRole(['superadmin']);
        $user->roles()->pluck('name');
    }
});
