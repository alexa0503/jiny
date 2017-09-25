<template>
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="loading" v-if="loading">
              Loading...
            </div>
            <div class="ibox-content" v-if="loaded">
                <div class="row">
                    <div class="col-sm-5 m-b-xs">
                        <router-link :to="{ name: 'pageCreate'}" tag="button" class="btn btn-sm btn-primary">创建新页面</router-link>
                        <router-link :to="{ name: 'pageIndexTrashed'}" tag="button" class="btn btn-sm btn-warning" v-if="this.$route.path != '/admin/page/trashed'"><i class="fa fa-trash"></i></router-link>
                        <router-link :to="{ name: 'pageIndex'}" tag="button" class="btn btn-sm btn-primary" v-else>返回</router-link>
                    </div>
                    <div class="col-sm-4 m-b-xs">
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group"><input type="text" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
                            <button type="button" class="btn btn-sm btn-primary"> Go!</button> </span></div>
                    </div>
                </div>
                <div class="table-responsive">
                    <div class="dataTables_wrapper form-inline dt-bootstrap">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th class="sorting" tabindex="0" aria-controls="" aria-label="">ID</th>
                                <th>Title</th>
                                <th>别名</th>
                                <th>描述</th>
                                <th>显示菜单</th>
                                <th tabindex="1">创建时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in results.data">
                                    <td>{{ item.id }}</td>
                                    <td>{{ item.title }}</td>
                                    <td>{{ item.alias }}</td>
                                    <td>{{ item.desc }}</td>
                                    <td v-if="item.menu_display === 1">是</td>
                                    <td v-else>否</td>
                                    <td>{{ item.created_at }}</td>
                                    <td v-if="!item.deleted_at">
                                        <router-link :to="{ name: 'pageEdit', params: { id: item.id }}" tag="button" class="btn btn-sm btn-primary">编辑</router-link>
                                        <button class="btn btn-sm" v-on:click="deleteHandler(item.id)">刪除</button>
                                    </td>
                                    <td v-else>
                                        <button class="btn btn-sm btn-warning" v-on:click="deleteHandler(item.id)">恢复</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="dataTables_paginate paging_simple_numbers">
                            <pagination :data="results" v-on:pagination-change-page="getResults"></pagination>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'pageIndex',
        data() {
            return {
                results: {},
                page: 'list',
                loading: false,
                loaded: false
            }
        },
        created() {
            this.getResults();
        },
        watch: {
            // 如果路由有变化，会再次执行该方法
            '$route': 'getResults'
        },
        methods: {
            getResults(page){
                this.loading = true
                this.loaded = false
                if (typeof page === 'undefined') {
                    page = 1;
                }
                var url = '/admin/api/page?page='+page;
                if( this.$route.path == '/admin/page/trashed' ){
                    url = '/admin/api/page?trashed=y&page='+page;
                }
                var _this = this;
                axios.get(url,{
                })
                .then((response) => {
                    _this.loading = false
                    _this.loaded = true
                    _this.results=response.data;
                })
                .catch(function (error) {
                    _this.loading = false
                    _this.loaded = false
                    console.log(error);
                });
            },
            deleteHandler(id){
                if(confirm('继续此操作？')){
                    this.loading = true
                    var _this = this;
                    axios.delete('/admin/api/page/'+id,{
                    })
                    .then((response) => {
                        _this.loading = false
                        _this.loaded = true
                        _this.getResults();
                    })
                    .catch(function (error) {
                        _this.loading = false
                        _this.loaded = false
                        console.log(error);
                    });
                }
            }
        }
    }

</script>
