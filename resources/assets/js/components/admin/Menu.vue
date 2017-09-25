<template>
    <ul class="nav metismenu" id="side-menu">
        <li class="nav-header">
            <div class="dropdown profile-element"> <span>
                    <img alt="image" class="img-circle" src="/images/profile/profile1.jpg" width="48" height="48">
                     </span>
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"></strong>
                    </span>
                    <span class="text-muted text-xs block">管理員 <b class="caret"></b></span>Admin</span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="/">資料</a></li>
                        <li class="divider"></li>
                        <li><a href="/logout">登出</a></li>
                    </ul>
            </div>
            <div class="logo-element">
                A+
            </div>
        </li>
            <router-link v-for="menu in menus" :key="menu.url" :to="{path:menu.url}" tag="li" active-class="active">
                <a >
                    <i v-bind:class="[menu.iconClass]"></i>
                    <span class="nav-label">{{menu.title}}</span>
                </a>
            </router-link>
        <li class="landing_link">
            <a target="_blank" href="landing.html"><i class="fa fa-star"></i> <span class="nav-label">Landing Page</span> <span class="label label-warning pull-right">NEW</span></a>
        </li>
    </ul>
</template>
<script>
export default {
    name: 'menu',
    data() {
        return {
            menus: [
                {url:'/admin/dashboard',title:'控制面板',iconClass:'fa fa-th-large'},
                {url:'/admin/page',title:'页面管理',iconClass:'fa fa-files-o'},
                {url:'/admin/block',title:'区块管理',iconClass:'fa fa-table'}
            ]
        }
    }
}
</script>
