<template>
    <view>
        <u-button class="row" type="warning" @click="scan()">扫码查询</u-button>
        <view class="row">资产编号：{{ data.asset_number }}</view>
        <view class="row">雇员：{{ data.staff.name }}</view>
        <view class="row">部门：{{ data.staff.department.name }}</view>
        <view class="row">名称：{{ data.name }}</view>
        <view class="row">描述：{{ data.description }}</view>
        <view class="row">分类：{{ data.category.name }}</view>
        <view class="row">厂商：{{ data.vendor.name }}</view>
        <view class="row">序列号：{{ data.sn }}</view>
        <view class="row">MAC：{{ data.mac }}</view>
        <view class="row">IP：{{ data.ip }}</view>
        <view class="row">购入日期：{{ data.purchased }}</view>
        <view class="row">购入价格：{{ data.price }}</view>
        <view class="row">购入途径：{{ data.channel.name }}</view>
        <image :src="data.photo" class="row" mode="aspectFit"></image>
    </view>
</template>

<script>
export default {
    data() {
        return {
            settings: '',
            data: {
                category: {},
                vendor: {},
                channel: {},
                staff: {
                    department: {}
                }
            }

        }
    },
    onLoad() {
        let that = this;
        uni.getStorage({
            key: 'settings',
            success(res) {
                that.settings = res.data;
            },
            fail() {
                uni.showModal({
                    title: '提示',
                    content: '没有找到配置信息',
                    showCancel: false,
                    success() {
                        uni.navigateTo({
                            url: '../setting/setting'
                        })
                    }
                })
            }
        })
    },
    methods: {
        scan() {
            let that = this;
            uni.scanCode({
                success: function (res) {
                    that.string = res.result;
                    uni.showLoading({
                        title: '正在读取'
                    })
                    uni.request({
                        url: that.settings.domain + '/api/query/' + that.string,
                        method: 'GET',
                        header: {
                            Authorization: that.settings.jwt
                        },
                        success(item) {
                            if (item.statusCode == 200 && item.data.code == 200) {
                                console.log(item.data.data);
                                that.data = item.data.data;
                                if (item.data.data.photo != undefined) {
                                    that.data.photo = that.settings.domain + '/uploads/' + item.data.data.photo;
                                }
                            }
                        },
                        fail(res) {
                            console.log(res);
                        },
                        complete() {
                            uni.hideLoading();
                        }
                    })
                }
            });
        }
    }
}
</script>

<style>
.content {
    padding: 80 upx;
}

.scan {
    color: white;
    width: 400 upx;
    height: 150 upx;
    margin: 50 upx auto 0 auto;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 40 upx;
    border-radius: 20 upx;
}
</style>
