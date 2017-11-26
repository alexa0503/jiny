<?php

namespace App\Http\Middleware;

use Closure;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        \Menu::make('menu', function ($menu) {
            $menu->add('控制面板', ['url'=>'cms/dashboard','class'=>'bg-palette1']);
            $category = $menu->add('产品分类',['url'=>route('category.index'),'class'=>'openable bg-palette2']);
            $category->add('查看', ['url'=>route('category.index'),'class'=>'bg-palette2']);
            $category->add('添加', ['url'=>route('category.create'),'class'=>'bg-palette2']);

            $item = $menu->add('产品管理',['url'=>route('item.index') ,'class'=>'openable bg-palette3']);
            $item->add('查看', ['url'=>route('item.index'),'class'=>'bg-palette3']);
            $item->add('添加', ['url'=>route('item.create'),'class'=>'bg-palette3']);

            $item = $menu->add('解决方案分类',['url'=>route('solution_category.index') ,'class'=>'openable bg-palette3']);
            $item->add('查看', ['url'=>route('solution_category.index'),'class'=>'bg-palette3']);
            $item->add('添加', ['url'=>route('solution_category.create'),'class'=>'bg-palette3']);

            $item = $menu->add('解决方案',['url'=>route('solution.index') ,'class'=>'openable bg-palette3']);
            $item->add('查看', ['url'=>route('solution.index'),'class'=>'bg-palette3']);
            $item->add('添加', ['url'=>route('solution.create'),'class'=>'bg-palette3']);

            $item = $menu->add('技术资料',['url'=>route('support.type.index',1) ,'class'=>'openable bg-palette3']);
            $item->add('查看', ['url'=>route('support.type.index',1),'class'=>'bg-palette3']);
            $item->add('添加', ['url'=>route('support.type.create',1),'class'=>'bg-palette3']);

            $item = $menu->add('样本下载',['url'=>route('support.type.index',2) ,'class'=>'openable bg-palette3']);
            $item->add('查看', ['url'=>route('support.type.index',2),'class'=>'bg-palette3']);
            $item->add('添加', ['url'=>route('support.type.create',2),'class'=>'bg-palette3']);

            $item = $menu->add('新闻资讯',['url'=>route('support.type.index',3) ,'class'=>'openable bg-palette3']);
            $item->add('查看', ['url'=>route('support.type.index',3),'class'=>'bg-palette3']);
            $item->add('添加', ['url'=>route('support.type.create',3),'class'=>'bg-palette3']);

            $page = $menu->add('页面管理',['url'=>url('cms/page/block/index'),'class'=>'openable bg-palette4']);
            $pages = \App\Page::all();
            foreach($pages as $v){
                $page->add($v->title, ['url'=>route('page.block.index',['page'=>$v->id]),'class'=>'bg-palette4']);
            }
            //
            //$menu->add('作品管理', ['route'=>('work.index'),'class'=>'bg-palette2']);
        });
        return $next($request);
    }
}
