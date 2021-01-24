<template>
    <view class="content">
        <u-button class="row" type="primary" @click="toQuery()">查询模式</u-button>
        <u-button class="row" type="success" @click="toCheck()">盘点模式</u-button>
        <u-button class="row" type="info" @click="toSetting()">站点配置</u-button>
    </view>
</template>

<script>
export default {
    data() {
        return {
            title: 'Hello'
        }
    },
    onLoad() {

    },
    methods: {
        toQuery() {
            uni.navigateTo({
                url: '../query/query'
            })
        },
        toCheck() {
            uni.navigateTo({
                url: '../check/check'
            })
        },
        toSetting() {
            uni.navigateTo({
                url: '../setting/setting'
            })
        }
    }
}
</script>

<style>

</style>
