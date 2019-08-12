
var WxParse = require('../../wxParse/wxParse.js');
const app = getApp()
Page({
  data: {
    Id:'',
    text:1
  },
  ipt:function(e){
    let val = this.validateNumber(e.detail.value)
    console.log(val)
    if(val == 0 && val != ''){
      console.log(111)
      val = 1
    }
    this.setData({
      text:val
    })
  }, 
  validateNumber(val) {
    return val.replace(/\D/g, '')
  },
  plus:function(){
    console.log(111)
    let num = parseInt(this.data.text)
    num++
    console.log(num)
    this.setData({
      text: num
    })
  },
  reduce: function () {
    let num = parseInt(this.data.text)
    if(num <= 1){
      num = 1
    }else{
      num--
    }
    this.setData({
      text: num
    })
  },
  getdata: function (heard){
    let that = this
    wx.request({
      url: app.data.API +`/index.php/api/course/detailQuery/id/${that.data.Id}`, //仅为示例，并非真实的接口地址
      data: {
      },
      header: heard,
      success (res) {
        console.log(res)
        let article = res.data.data.content
        WxParse.wxParse('article', 'html', article, that, 0)
      }
    })
  },
  orderlgo: function () {
    let id = this.data.Id
    let num = this.data.text
    console.log(id)
    wx.navigateTo({
      url: `../Order/Order?id=${id}&num=${num}`
    })
  },
  onLoad: function (options) {
    this.setData({
      Id: options.id
    })
    let heard = {}
    heard.Cookie = wx.getStorageSync('cookieKey')
    this.getdata(heard)
  }
})