<template>
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="alert alert-success alert-dismissable" v-if="submitted">
                <i class="fa fa-check"></i>恭喜，操作成功，
                <router-link :to="{ name: 'pageIndex'}" tag="a" class="alert-link">返回</router-link>。
            </div>
            <div class="ibox-content" v-if="!submitted">
                <form class="form-horizontal" v-on:submit.prevent="onSubmit">
                    <div class="form-group" v-bind:class="{'has-error':errors.title}">
                        <label for="title" class="col-lg-2 col-md-3 control-label">标题</label>
                        <div class="col-lg-10 col-md-9">
                            <input type="text" v-model="title" class="form-control" value="">
                            <label v-if="errors.title" class="help-block">{{ errors.title[0] }}</label>
                        </div>
                    </div>
                    <div class="form-group" v-bind:class="{'has-error':errors.alias}">
                        <label for="alias" class="col-lg-2 col-md-3 control-label">[限英文]别名</label>
                        <div class="col-lg-10 col-md-9">
                            <input type="text" v-model="alias" class="form-control" value="">
                            <label v-if="errors.alias" class="help-block">{{ errors.alias[0] }}</label>
                        </div>
                    </div>
                    <div class="form-group" v-bind:class="{'has-error':errors.desc}">
                        <label for="desc" class="col-lg-2 col-md-3 control-label">描述</label>
                        <div class="col-lg-10 col-md-9">
                            <textarea class="form-control" v-model="desc"></textarea>
                            <label v-if="errors.desc" class="help-block">{{ errors.desc[0] }}</label>
                        </div>
                    </div>
                    <div class="form-group" v-bind:class="{'has-error':errors.menu_display}">
                        <label for="desc" class="col-lg-2 col-md-3 control-label">显示菜单</label>
                        <div class="col-lg-10 col-md-9">
                            <div class="row">
                            <div class="col-lg-3 col-md-3">
                                <select v-model="menu_display" class="form-control">
                                    <option disabled value="">请选择</option>
                                    <option value="1">是</option>
                                    <option value="0">否</option>
                                </select>
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <label v-if="errors.menu_display" class="help-block">{{ errors.menu_display[0] }}</label>
                            </div></div>
                        </div>
                    </div>
                    <div class="form-group" v-bind:class="{'has-error':errors.sort_id}">
                        <label for="alias" class="col-lg-2 col-md-3 control-label">排序</label>
                        <div class="col-lg-10 col-md-9">
                            <div class="row">
                                <div class="col-lg-3 col-md-3"><input type="text" v-model="sort_id" class="form-control" value="0"></div>
                                <div class="col-lg-9 col-md-9">
                                    <label v-if="errors.sort_id" class="help-block">{{ errors.sort_id[0] }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" v-bind:class="{'has-error':errors.body}">
                        <label for="body" class="col-lg-2 col-md-3 control-label">内容</label>
                        <div class="col-lg-10 col-md-9">
                            <ckeditor v-model="body" :config="config"  @blur="onBlur($event)" @focus="onFocus($event)"></ckeditor>
                            <label v-if="errors.body" class="help-block">{{ errors.body[0] }}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-md-9 col-lg-offset-2 col-md-offset-3">
                            <button class="btn btn-default ml15" type="submit">提 交</button>
                            <router-link :to="{ name: 'pageIndex'}" tag="button" class="btn btn-sm btn-primary">返回</router-link>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</template>
<script>
import Ckeditor from 'vue-ckeditor2'
    export default {
        name: 'pageCreate',
        components: {
            Ckeditor
        },
        data() {
            return {
                errors: {},
                title: '',
                menu_display: '',
                alias: '',
                body: '',
                sort_id: '999',
                desc: '',
                submitted:false,
                submitting:false,
                config:{filebrowserBrowseUrl: '/filemanager'}
            }
        },
        created() {
        },
        /*
        mounted: function () {
          this.getList();
          console.log('mounted: got here')
        },
        */
        methods: {
            onSubmit(){
                var _this = this;
                _this.submitting = true
                axios.post('/admin/api/page',{
                    title: this.title,
                    menu_display: this.menu_display,
                    alias: this.alias,
                    body: this.body,
                    sort_id: this.sort_id,
                    desc: this.desc,
                })
                .then((response) => {
                    _this.submitting = false
                    _this.submitted = true
                })
                .catch(function (error) {
                    _this.submitting = false
                    if( error.response.status === 422 ){
                        _this.errors = error.response.data;
                    }
                });
            }
        }
    }

</script>
