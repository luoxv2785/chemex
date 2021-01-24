<template>
    <view class="content">
        <u-input v-model="settings.domain" :border="true" class="row" placeholder="站点URL" type="text"/>
        <u-input v-model="settings.username" :border="true" class="row" placeholder="账户" type="text"/>
        <u-input v-model="settings.password" :border="true" class="row" placeholder="密码" type="text"/>
        <u-button class="row" type="primary" @click="save()">保存</u-button>
    </view>
</template>

<script>
export default {
    data() {
        return {
            settings: {
                domain: '',
                username: '',
                password: '',
                jwt: ''
            },
        }
    },
    onLoad() {
        this.getSettings();
    },
    methods: {
        bindDomainChange(e) {
            this.settings.domain = e.target.value;
        },
        bindUsernameChange(e) {
            this.settings.username = e.target.value;
        },
        bindPasswordChange(e) {
            this.settings.password = e.target.value;
        },
        getSettings() {
            let that = this;
            uni.getStorage({
                key: 'settings',
                success(res) {
                    that.settings.domain = res.data.domain;
                    that.settings.username = res.data.username;
                    that.settings.password = res.data.password;
                }
            })
        },
        save() {
            let that = this;
            uni.showLoading({
                title: '正在保存'
            });
            uni.request({
                method: 'POST',
                url: that.settings.domain + '/api/auth/login',
                data: {
                    username: that.settings.username,
                    password: that.settings.password
                },
                success(res) {
                    if (res.statusCode == 200) {
                        that.settings.jwt = 'bearer ' + res.data.access_token;
                        console.log(that.settings);
                        uni.setStorage({
                            key: 'settings',
                            data: that.settings,
                            success() {
                                uni.showModal({
                                    title: '提示',
                                    content: '登录成功',
                                    showCancel: false
                                })
                                uni.reLaunch({
                                    url: '../index/index'
                                })
                            },
                            fail(res) {
                                console.log(res);
                                uni.showModal({
                                    title: '提示',
                                    content: '认证失败，请检查',
                                    showCancel: false
                                })
                            },
                            complete() {
                                uni.hideLoading();
                            }
                        })
                    } else {
                        uni.showModal({
                            title: '错误',
                            content: '无法请求服务器',
                            showCancel: false
                        })
                    }
                },
                fail(res) {
                    uni.showModal({
                        title: '错误',
                        content: '未知错误',
                        showCancel: false
                    })
                },
                complete() {
                    uni.hideLoading();
                }
            })
        }
    }
}
</script>

<style>

</style>
