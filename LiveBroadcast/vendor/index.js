var role = sessionStorage.getItem('role')
var uid = sessionStorage.getItem('id')
var wbtoken = sessionStorage.getItem('wbtoken');
var wbuuid = sessionStorage.getItem('wbuuid');

if(!wbtoken){
	alert('Whiteboard is not available');
}

if(role==='2'&&!wbuuid){
	alert('Whiteboard is not available now, please retry later.');
}

//var sdkToken = "WHITEcGFydG5lcl9pZD0zZHlaZ1BwWUtwWVN2VDVmNGQ4UGI2M2djVGhncENIOXBBeTcmc2lnPTc1MTBkOWEwNzM1ZjA2MDYwMTMzODBkYjVlNTQ2NDA0OTAzOWU2NjE6YWRtaW5JZD0xNTgmcm9sZT1taW5pJmV4cGlyZV90aW1lPTE1OTAwNzM1NjEmYWs9M2R5WmdQcFlLcFlTdlQ1ZjRkOFBiNjNnY1RoZ3BDSDlwQXk3JmNyZWF0ZV90aW1lPTE1NTg1MTY2MDkmbm9uY2U9MTU1ODUxNjYwODYxNzAw";
var sdkToken = wbtoken
var url;
var requestInit;
var allroom;
var ys = 1
var PageNumber = 1
if(role == '2'){
    url = `https://cloudcapiv4.herewhite.com/room/join?token=${sdkToken}&uuid=${wbuuid}`;
    requestInit = {
        method: 'POST',
        headers: {
            "content-type": "application/json",
        },
    };
}else{
    url = 'https://cloudcapiv4.herewhite.com/room?token=' + sdkToken;
    requestInit = {
        method: 'POST',
        headers: {
            "content-type": "application/json",
        },
        body: JSON.stringify({
            name: '我的第一个 White 房间',
            limit: 100, // 房间人数限制
            room:10
        }),
    };
}

// 请求创建房间
// 网络请求部分逻辑，请在服务器实现
fetch(url, requestInit).then(function(response) {
    // Step1: 服务器返回房间唯一标识 uuid 和 进入房间的秘钥 roomToken
    return response.json();
}).then(function(res) {
    console.log(res)
    // Step2: 加入房间
    return jionRoom(res);
}).then(function(room) {
    console.log(room)
    allroom = room
    // Step3: 加入成功后想白板绑定到指定的 dom 中
    bind(room);
}).catch(function(err) {
    console.log(err);
});

// 加入房间
function jionRoom (json) {
    // 初始化 SDK，初始化 SDK 的参数，仅对本地用户有效，默认可以不传
    var whiteWebSdk = new WhiteWebSdk({
        // 用户手动进行缩放操作时的上下限，默认 为 0.1~10。
        // 缩放 API 不受影响
        zoomMaxScale: 3, 
        zoomMinScale: 0.3,
        // 图片替换 API，可以在插入图片和创建新场景背景图时，替换传入的 url。
        // 如果没有需要，请不要传入，可以减少前端资源开销s
        // 使用该 API 后，服务器截屏时，会使用原始图片地址
        urlInterrupter: url => url,
    });
    if(role == '2'){
    	return whiteWebSdk.joinRoom({
            uuid: wbuuid,
            roomToken: json.msg.roomToken,
        });	        
    }else{
    	$.post("/index.php?s=/live/index/setwbuuid",{room:room,uuid:json.msg.room.uuid,isteacher:1},function(result){
    		if(result!='success'){
    			alert("在线白板暂不可用！");
    		}   		    		
    	});    
    	return whiteWebSdk.joinRoom({
            // 这里与
            uuid: json.msg.room.uuid,
            roomToken: json.msg.roomToken,
        });
    }
}
    
// 将白板绑定在一个元素上
function bind (room) {
    room.bindHtmlElement(document.getElementById('whiteboard'));
    room.putScenes("/", [{name: "init"+ys}])
    room.setScenePath('/init'+ys)
}
function baibanLeave(allroom){
        allroom.disconnect().then(function() {
            console.log("Leave room success");
        })
}
function check(val){
    switch(val) {
        case '选择':
            allroom.setMemberState({
                currentApplianceName: "selector",
            })
            break;
        case '铅笔':
            allroom.setMemberState({
                currentApplianceName: "pencil",
            })
            break;
        case '矩形':
            allroom.setMemberState({
                currentApplianceName: "rectangle",
            })
            break;
        case '椭圆':
            allroom.setMemberState({
                currentApplianceName: "ellipse",
            })
            break;
        case '橡皮':
            allroom.setMemberState({
                currentApplianceName: "eraser",
            })
            break;
        case '文字':
            allroom.setMemberState({
                currentApplianceName: "text",
            })
            break;
        case '添加':
            ys++
            allroom.putScenes("/", [{name: "init"+ys}])
            PageNumber = ys
            var div = '<div onclick="tab_switch(this)">'+ys+'</div>'
            $('.ys').append(div)
            $('.ys>div').eq(ys-1).addClass('tab_check').siblings().removeClass('tab_check')
            allroom.setScenePath('/init'+ys)
            break;
    } 
}

function dadada(e){
    f=document.getElementById('file').files[0]
    console.log(f)
    let reads = new FileReader()
    reads.readAsDataURL(f)
    reads.onload = function(e) {
        //这里上传接口·····
        let image = new Image();
        image.src = e.target.result;
        image.onload = function() {
            allroom.insertImage({
                uuid: uuid, 
                //图片中心在白板内部坐标的
                centerX: 0, 
                centerY: 0, 
                //图片在白板中显示的大小
                width: this.width, 
                height: this.height
            });
            // room.disableOperations = false;
            //返回路径---
            allroom.completeImageUpload(uuid, "http://127.0.0.1:5501/Capture001.png")
        }
    }
}
function tab_check(val){
    switch(val) {
        case '左':
            if(PageNumber==1){
                return;
            }else{
                PageNumber--;
                allroom.setScenePath('/init'+PageNumber)
                $('.ys>div').eq(PageNumber-1).addClass('tab_check').siblings().removeClass('tab_check')
            }
            break;
        case '右':
            if(PageNumber==$('.ys>div').length){
                return;
            }else{
                PageNumber++;
                allroom.setScenePath('/init'+PageNumber)
                $('.ys>div').eq(PageNumber-1).addClass('tab_check').siblings().removeClass('tab_check')
            }
            break;
    } 
}
function tab_switch(e){
    allroom.setScenePath('/init'+$(e).text())
    PageNumber = $(e).text()
    $('.ys>div').eq(PageNumber-1).addClass('tab_check').siblings().removeClass('tab_check')
}

