
const app = getApp()
Page({
  data: {
    Id: '',
    num:1,
    price:'',
    key:'',
    title: '', 
    total:'',
    img:'',
    order:'',
    status:''
  },
  getdata: function (heard){
    let self = this
    wx.request({
      url: app.data.API+`/index.php/api/WechatApplet/createOrder/s/${self.data.key}/i/${self.data.Id}/n/${self.data.num}`, //仅为示例，并非真实的接口地址
      data: {
      },
      header: heard,
      success(res) {
        console.log(res)
        if (res.data.error_code == '0') {
          self.setData({
            img: res.data.data.imageurl,
            num: res.data.data.num,
            order: res.data.data.order,
            price: res.data.data.price,
            title: res.data.data.title,
            total: res.data.data.total,
            status: res.data.data.total
          })
        }
      }
    })
  },
  payment: function () {
    let heard = {}
    heard.Cookie = wx.getStorageSync('cookieKey')
    let self = this
    wx.request({
      url: app.data.API +`/index.php/api/WechatApplet/pay/s/${self.data.key}/o/${self.data.order}`, //仅为示例，并非真实的接口地址
      data: {
      },
      header: heard,
      success(res) {
        console.log(res)
        if (res.data.error_code == '0') {
          wx.requestPayment({
            timeStamp: res.data.data.timeStamp,
            nonceStr: res.data.data.nonceStr,
            package: res.data.data.package,
            signType: res.data.data.signType,
            paySign: res.data.data.paySign,
            success(res) {
              wx.showToast({
                title: '支付成功',
                icon: 'success',
                duration: 2500
              })
              wx.navigateBack({
                delta: 2
              })
              console.log(res)
             },
            fail(err) {
              wx.showToast({
                title: '支付失败',
                icon: 'none',
                duration: 2500
              })
              console.log(err)
            }
          })
        }
      }
    })
  },
  onLoad: function (options) {
    console.log(options)
    this.setData({
      Id: options.id,
      key: wx.getStorageSync('Key'),
      num:options.num
    })
    let heard = {}
    heard.Cookie = wx.getStorageSync('cookieKey')
    this.getdata(heard)
  }
})