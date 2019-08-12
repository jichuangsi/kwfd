//index.js
//获取应用实例
var WxParse = require('../../wxParse/wxParse.js');
const app = getApp()

Page({
  data: {
    loginstate:false,
    bdstate: true,
    zcstate: false,
    userName:'',
    emil:'',
    openId:'',
    key:'',
    teacher:[],
    curriculum:[]
  },
  //事件处理函数
  curriculumgo: function(){
    wx.navigateTo({
      url: '../list/list?id=1'
    })
  },
  Teachergo: function(){
    wx.navigateTo({
      url: '../list/list?id=2'
    })
  },
  getdata:function(heard){
    let that = this
    wx.request({
      url: app.data.API +'/index.php/api/aboutus/detailquery/id/1', //仅为示例，并非真实的接口地址
      data: {
      },
      header: heard,
      success (res) {
        // console.log(res.data.data[0].content)
        let article = res.data.data[0].content
        WxParse.wxParse('article', 'html', article, that, 0)
      }
    })
  },
  getcurriculum: function (heard){
    let self = this
    wx.request({
      url: app.data.API +'/index.php/api/course/courseQuery', //仅为示例，并非真实的接口地址
      data: {
      },
      header: heard,
      success (res) {
        console.log(res)
        if (res.data.error_code == '0') {
          self.setData({
            curriculum: res.data.data
          })
        }
      }
    })
  },
  getTeacher: function (heard){
    let self = this
    wx.request({
      url: app.data.API +'/index.php/api/teacher/listQuery/p/1/r/3', //仅为示例，并非真实的接口地址
      data: {
      },
      header: heard,
      success (res) {
        console.log(res)
        if (res.data.error_code == '0'){
          self.setData({
            teacher:res.data.data
          })
        }
        // let article = res.data.data.info
        // WxParse.wxParse('articleTeacher', 'html', article, that, 0)
      }
    })
  },

  login: function () {
    let self =this
    wx.login({
      success: res => {
        console.log(res)
        // 发送 res.code 到后台换取 openId, sessionKey, unionId
        wx.request({
          url: app.data.API +`/index.php/api/WechatApplet/login/code/${res.code}`, //仅为示例，并非真实的接口地址
          data: {
          },
          header: {
            'content-type': 'application/json' // 默认值
          },
          success(res) {
            console.log(res)
            if (res.data.error_code == '5005') {
              self.setData({
                loginstate : true,
                openId: res.data.openid,
                key: res.data.session_key
              })
            } else if (res.data.error_code == '0'){
              self.setData({
                openId: res.data.data.wx_applet_openid,
                key: res.data.data.wx_applet_session_key
              })
              wx.setStorageSync('Key', res.data.data.wx_applet_session_key)
              wx.setStorageSync('cookieKey', res.cookies[0])
              let heard = {}
              heard.Cookie = res.cookies[0]
              self.getdata(heard)
              self.getcurriculum(heard)
              self.getTeacher(heard)
            }
          },
        })
      }
    })
  },
  bd:function(){

    let self = this
    console.log(self.data.userName)
    wx.request({
      url: app.data.API +`/index.php/api/WechatApplet/binding/o/${self.data.openId}/u/${self.data.userName}/s/${self.data.key}`, //仅为示例，并非真实的接口地址
      data: {
      },
      header: {
        'content-type': 'application/json' // 默认值
      },
      success(res) {
        console.log(res)
        if (res.data.error_code == '5008'){
          wx.showToast({
            title: "没有此用户请前往注册",
            icon: 'none',//图标，支持"success"、"loading" 
            duration: 2000,//提示的延迟时间，单位毫秒，默认：1500 
          })
        } else if (res.data.error_code == '0') {
          self.setData({
            loginstate: false
          })
          wx.showToast({
            title: "绑定成功",
            icon: 'success',//图标，支持"success"、"loading" 
            duration: 1500,//提示的延迟时间，单位毫秒，默认：1500 
          })
        }
      },
    })
  },
  bdclick: function () {
    this.setData({
      zcstate:true,
      bdstate:false,
    })
  },
  zc: function () {
    let self = this
    console.log(self.data.userName)
    wx.request({
      url: app.data.API +`/index.php/api/WechatApplet/register/o/${self.data.openId}/u/${self.data.userName}/e/${self.data.emil}/s/${self.data.key}`, //仅为示例，并非真实的接口地址
      data: {
      },
      header: {
        'content-type': 'application/json' // 默认值
      },
      success(res) {
        console.log(res)
        if (res.data.data.error_code == '0') {
          self.setData({
            loginstate: false
          })
          wx.showToast({
            title: "注册成功",
            icon: 'success',//图标，支持"success"、"loading" 
            duration: 1500,//提示的延迟时间，单位毫秒，默认：1500 
          })
        } else {
          wx.showToast({
            title: "网络不稳定，请重新注册",
            icon: 'none',//图标，支持"success"、"loading" 
            duration: 2000,//提示的延迟时间，单位毫秒，默认：1500 
          })
        }
      },
    })
  },
  zcclick:function(){
    this.setData({
      zcstate: false,
      bdstate: true,
    })
  },
  userNameInput:function(e){
    let val = e.detail.value
    this.setData({
      userName: val
    })
  },
  emilInput: function (e) {
    let val = e.detail.value
    this.setData({
      emil: val
    })
  },
  datailgo:function(e){
    let id = e.currentTarget.dataset.id
    console.log(id)
    wx.navigateTo({
      url: `../datail/datail?id=${id}`
    })
  },
  onLoad: function () {
    this.login()
  }
})
