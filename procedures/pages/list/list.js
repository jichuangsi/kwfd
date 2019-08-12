//index.js
//获取应用实例
const app = getApp()
var heard = {}
Page({
  data: {
    navList:[{title:'全部',id:''}],
    gradeList: [{ title: '全部', id: '' }],
    teacherList:['所有名师'],
    num:0,
    gradenum:0,
    teachernum:0,
    state: 1,
    teacher: [],
    curriculum: [],
    navId: '',
    gradeId: '',
  },
  navclick:function(e){
    let index = e.currentTarget.dataset.index
    let id = e.currentTarget.dataset.id
    this.setData({
        num:index,
        navId: id
      })
    this.getcurriculum(heard)
  },
  gradeclick:function(e){
    let index = e.currentTarget.dataset.index
    let id = e.currentTarget.dataset.id
    this.setData({
        gradenum:index,
        gradeId:id
    })
    this.getcurriculum(heard)
  },
  teacherclick:function(e){
    let index = e.currentTarget.dataset.index
    this.setData({
        teachernum:index
      })
  },
  getlist: function (heard){
    let self = this
    wx.request({
      url: app.data.API +'/index.php/api/course/categoryQuery', //仅为示例，并非真实的接口地址
      data: {
      },
      header: heard,
      success(res) {
        console.log(res)
        if (res.data.error_code == '0') {
          console.log(3333333)
          self.setData({
            navList: self.data.navList.concat(...res.data.data[0]._),
            gradeList: self.data.navList.concat(...res.data.data[1]._)
          })
          console.log(self.data.navList)
        }
      }
    })
  },
  getcurriculum: function (heard) {
    let self = this
    let id
    if(self.data.navId&&self.data.gradeId){
      id = self.data.navId +'_'+ self.data.gradeId
    } else if (self.data.navId && !self.data.gradeId) {
      id = self.data.navId
    } else if (!self.data.navId && self.data.gradeId) {
      id = self.data.gradeId
    }
    console.log(id)
    wx.request({
      url: app.data.API +`/index.php/api/course/courseQuery/y/${id}`, //仅为示例，并非真实的接口地址
      data: {
      },
      header: heard,
      success(res) {
        console.log(res)
        if (res.data.error_code == '0') {
          self.setData({
            curriculum: res.data.data
          })
        }
      }
    })
  },
  getTeacher: function (heard) {
    let self = this
    wx.request({
      url: app.data.API +'/index.php/api/teacher/listQuery/p/1/r/3', //仅为示例，并非真实的接口地址
      data: {
      },
      header: heard,
      success(res) {
        console.log(res)
        if (res.data.error_code == '0') {
          self.setData({
            teacher: res.data.data
          })
        }
        // let article = res.data.data.info
        // WxParse.wxParse('articleTeacher', 'html', article, that, 0)
      }
    })
  },
  datailgo: function (e) {
    let id = e.currentTarget.dataset.id
    console.log(id)
    wx.navigateTo({
      url: `../datail/datail?id=${id}`
    })
  },
  //事件处理函数
  onLoad: function (options) {
    heard.Cookie = wx.getStorageSync('cookieKey')
    this.getcurriculum(heard)
    this.getTeacher(heard)
    this.getlist(heard)
    if(options.id == 1){
      this.setData({
        state:1
      })
    } else if (options.id == 2) {
      this.setData({
        state: 2
      })
    }
  }
})
