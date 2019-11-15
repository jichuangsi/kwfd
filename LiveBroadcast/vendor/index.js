var role = sessionStorage.getItem('role')
var uid = sessionStorage.getItem('id')
var roomid = sessionStorage.getItem('room')
var wbtoken = sessionStorage.getItem('wbtoken');
var wbuuid = sessionStorage.getItem('wbuuid');
var images = [];
var editState = 0
var img_list = []
var roomplayer = ''
var timer = ''

if(!wbtoken){
	alert('Whiteboard is not available');
}

if(role==='2'&&!wbuuid){
	alert('Whiteboard is not available now, please retry later.');
}

// var sdkToken = "WHITEcGFydG5lcl9pZD0zZHlaZ1BwWUtwWVN2VDVmNGQ4UGI2M2djVGhncENIOXBBeTcmc2lnPTc1MTBkOWEwNzM1ZjA2MDYwMTMzODBkYjVlNTQ2NDA0OTAzOWU2NjE6YWRtaW5JZD0xNTgmcm9sZT1taW5pJmV4cGlyZV90aW1lPTE1OTAwNzM1NjEmYWs9M2R5WmdQcFlLcFlTdlQ1ZjRkOFBiNjNnY1RoZ3BDSDlwQXk3JmNyZWF0ZV90aW1lPTE1NTg1MTY2MDkmbm9uY2U9MTU1ODUxNjYwODYxNzAw";
var sdkToken = wbtoken
var url;
var requestInit;
var allroom;
var ys = 1
var PageNumber = 1
var whiteWebSdk = null
var roomToken = null
//var mode = 'transitory'; // 临时房间模式
//var mode = 'persistent'; // 持久化房间模式
var mode = 'historied'; // 可回放房间模式
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
            name: roomid,//'我的第一个 White 房间',
            limit: 100, // 房间人数限制
            room:10,
            mode: mode, // 房间模式在这里体现
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
}).then(function(){
	if(role=='4'&&allroom){
		allroom.setViewMode("broadcaster");
		allroom.setViewMode("freedom");
		allroom.setViewMode("follower");
	}else{
		allroom.disableCameraTransform = true;
	}
	loadImages();
}).catch(function(err) {
    console.log(err);
});

// 加入房间
function jionRoom (json) {
    // 初始化 SDK，初始化 SDK 的参数，仅对本地用户有效，默认可以不传
    whiteWebSdk = new WhiteWebSdk({
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
    	roomToken = json.msg.roomToken;
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
    f=document.getElementById('file').files
    console.log(f)    

    var data = { "room": roomid};
    // 开始上传
    $.ajaxFileUpload({
        secureuri: false,// 是否启用安全提交，默认为 false
        type: "POST",
        url: "/index.php?s=/live/index/uploadPictures",
        fileElementId: "file",// input[type=file] 的 id
        dataType: "json",// 返回值类型，一般位 `json` 或者 `text`
        data: data,// 添加参数，无参数时注释掉
        success: function (ret, status) {
            // 成功
            console.log(ret);
            // 触发展示图片
        	
        	if(ret&&ret['status']===1&&ret['data']&&ret['data'].length>0){
                var html = ""
                for(let a in ret['data']){
                    html += '<div class="img" data-id="'+ret['data'][a]['id']+'" onclick="img_check(this)">'
                    html += '<img src="'+ret['data'][a]['path']+'" alt=""></img>'
                    html += '<div class="img_del">'
                    html += '<img src="./assets/images/错.png" alt="">'
                    html += '</div>'
                    html += '<div class="img_check">'
                    html += '<img src="./assets/images/打勾.png" alt="">'
                    html += '</div>'
                    html += '</div>'
                }
                $('.img_list').children().remove()
                $('.img_list').append(html)
            // 	if(images.length>0){        		
            // 		clearImage();
            // 	}
        		
        	// 	images = ret['data'];        	
    	       	
            // 	for (let a in ret['data']) {            		
            // 		if(a==0){
            // 			loadImage(a)
            // 		}else{
            // 			ys++
            // 			allroom.putScenes("/", [{name: "init"+ys}])
            // 			var div = '<div onclick="tab_switch(this)">'+ys+'</div>'
            // 			$('.ys').append(div)
            // 		}        		
            // 	}
        	}        	
        },
        error: function (data, status, e) {
            // 失败
        	console.log(e);
        }
    });
    
    /*for(var i=0;i<f.length;i++){

	    let reads = new FileReader()
	    reads.readAsDataURL(f[i])
	    reads.onload = function(e) {
	        //这里上传接口·····
	        let image = new Image();
	        image.src = e.target.result;
	        image.onload = function() {
	        	var uuid = Math.floor(Math.random()*100+1)+'f';
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
    }*/
}
function loadImages(){
	if(role == '4'){		
		$.post("/index.php?s=/live/index/getPictures",{room:room},function(ret){
			console.log(ret);  
			if(ret&&ret['status']===1&&ret['data']&&ret['data'].length>0){
			// 	images = ret['data'];
			// 	for (let a in ret['data']) {            		
            // 		if(a==0){
            // 			loadImage(a)
            // 		}else{
            // 			ys++
            // 			allroom.putScenes("/", [{name: "init"+ys}])
            // 			var div = '<div onclick="tab_switch(this)">'+ys+'</div>'
            // 			$('.ys').append(div)
            // 		}        		
            // 	}
                var html = ""
                for(let a in ret['data']){
                    html += '<div class="img" data-id="'+ret['data'][a]['id']+'" onclick="img_check(this)">'
                    html += '<img src="'+ret['data'][a]['path']+'" alt=""></img>'
                    html += '<div class="img_del">'
                    html += '<img src="./assets/images/错.png" alt="">'
                    html += '</div>'
                    html += '<div class="img_check">'
                    html += '<img src="./assets/images/打勾.png" alt="">'
                    html += '</div>'
                    html += '</div>'
                }
                $('.img_list').append(html)
			}
		});
	}	
}
function loadImage(index){
	if(images.length==0) return;
	var uuid = Math.floor(Math.random()*100+index)+'f';
	
	let image = new Image();
	image.src = images[index]['path'];
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
	allroom.completeImageUpload(uuid, images[index]['path'])
	}
}
function clearImage(){
	for(let i = 1; i <= ys; i++){
		allroom.removeScenes("/init" + i);
	} 
	ys = 1
	$('.ys').empty();            	
	allroom.putScenes("/", [{name: "init"+ys}])
    allroom.setScenePath('/init'+ys)
    var div = '<div class="tab_check" onclick="tab_switch(this)">'+ys+'</div>'
	$('.ys').append(div)
}
function removeImage(ids){
	$.post("/index.php?s=/live/index/removePictures",{room:room,imageId:ids},function(ret){
		console.log(ret); 
		if(ret&&ret['status']===1&&ret['data']&&ret['data'].length>=0){
		// 	if(images.length>0){        		
        // 		clearImage();
        // 	}
		// 	images = ret['data'];
		// 	for (let a in ret['data']) {            		
        // 		if(a==0){
        // 			loadImage(a)
        // 		}else{
        // 			ys++
        // 			allroom.putScenes("/", [{name: "init"+ys}])
        // 			var div = '<div onclick="tab_switch(this)">'+ys+'</div>'
        // 			$('.ys').append(div)
        // 		}        		
        // 	}
        // }
        var html = ""
        for(let a in ret['data']){
            html += '<div class="img" data-id="'+ret['data'][a]['id']+'" onclick="img_check(this)">'
            html += '<img src="'+ret['data'][a]['path']+'" alt=""></img>'
            html += '<div class="img_del">'
            html += '<img src="./assets/images/错.png" alt="">'
            html += '</div>'
            html += '<div class="img_check">'
            html += '<img src="./assets/images/打勾.png" alt="">'
            html += '</div>'
            html += '</div>'
        }
        $('.img_list').children().remove()
        $('.img_list').append(html)
    }
	});
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
    loadImage(PageNumber-1)
}
function tab_switch(e){
    allroom.setScenePath('/init'+$(e).text())
    PageNumber = $(e).text()
    $('.ys>div').eq(PageNumber-1).addClass('tab_check').siblings().removeClass('tab_check')
    loadImage(PageNumber-1)
}
function img_check(val){
    if(editState == 0){
        if($(val).find('.img_check').css('display')=='none'){
            $(val).find('.img_check').css('display','block')
        }else{
            $(val).find('.img_check').css('display','none')
        }
    }else{
        if($(val).find('.img_del').css('display')=='none'){
            $(val).find('.img_del').css('display','block')
        }else{
            $(val).find('.img_del').css('display','none')
        }
    }
    let checklist = $('.img_check')
    checklist.push($('.img_del'))
    for(let i = 0; i<checklist.length;i++){
    	if($(checklist[i]).css('display') == 'block'){
		    $('.btn_img').css('display','block')
		    $('.qk_btn').css('display','none')
		    return
	    }else{
		    $('.btn_img').css('display','none')
		    $('.qk_btn').css('display','block')
	    }
    }
}
function qk_btn() {
	clearImage()
	img_none()
}
function edit_btn(){
    editState = 1
    $('.edit_btn').css('display','none')
    $('.qx_edit').css('display','block')
    $('.img').find('img').siblings().css('display','none')
}
function qx_edit(){
    editState = 0
    $('.edit_btn').css('display','block')
    $('.qx_edit').css('display','none')
    $('.img').find('img').siblings().css('display','none')
}
function img_none(){
    editState = 0
    $('.img_box')[0].style.transform = "translateX(-110%)"
    $('.edit_btn').css('display','block')
    $('.qx_edit').css('display','none')
    $('.img').find('img').siblings().css('display','none')
}
function img_btn(){
    var arr = []
    var del = ''
    if(editState == 0){
        var arr_check = $('.img_check')
        for (let i = 0;i<arr_check.length;i++){
        	if($(arr_check[i]).css('display') == 'block'){
        	arr.push({id:$(arr_check[i]).parent().attr('data-id'),path:$(arr_check[i]).parent().find('img').attr('src')})
        	}
        }
        // 创建新的白板页面or嵌图片
        if(images.length>0&&arr.length!=0){ 
            clearImage();
        }
        images = arr;
        for (let a in arr) {            		
            if(a==0){
                loadImage(a)
            }else{
                ys++
                allroom.putScenes("/", [{name: "init"+ys}])
                var div = '<div onclick="tab_switch(this)">'+ys+'</div>'
                $('.ys').append(div)
            }        		
        }
    }else{
        var arr_del = $('.img_del')
        for (let a = 0;a<arr_del.length;a++){
        	if($(arr_del[a]).css('display') == 'block'){
        		arr.push({id:$(arr_del[a]).parents().attr('data-id'),path:$(arr_del[a]).parent().find('img').attr('src')})
        	}
        }
        editState = 0
        // 删除所选中的图片id、路径；
        if(arr.length == 1){
            del = arr[0].id
        }else if(arr.length > 1){
            for(let j = 0; j < arr.length; j++){
                if(arr.length == 1){
                    del = arr[j].id
                }else{
                    del += arr[j].id + ','
                }
            }
        }
        $('.edit_btn').css('display','block')
        $('.qx_edit').css('display','none')
        removeImage(del)
    }
    console.log(arr)
    img_none()
    $('.img').find('img').siblings().css('display','none')
}

function replay(){
	whiteWebSdk.replayRoom({
	    room: wbuuid,
	    roomToken: roomToken,
	    //beginTimestamp: beginTimestamp,
	    //mediaURL: mediaURL,
	    //duration: duration,
	}).then(function(player) {
        console.log(player)
        roomplayer = player
	    // 获取到 player 实例
	    // 与 room 调用类似，与获取到 player 实例后，你需要将 player 绑定到 HTML 的 div 上。
	    player.bindHtmlElement(document.getElementById('whiteboard'));
	    //player.setObserverMode("directory");
        player.play();
        $('#whiteboard').css('position','relative')
        $('#whiteboard').css('z-index','99999')
        $('#whiteboard').css('background','#fff')
        $('.replaystate').css('display','block')
        $('.play_state').css('display','none')
        timer = setInterval(function(){
            if(((roomplayer.scheduleTime/roomplayer.timeDuration)*100) >= 100){
                $('.jdt > span').css('width','100%')
                clearInterval(timer)
                replayout()
            }else{
                $('.jdt > span').css('width',((roomplayer.scheduleTime/roomplayer.timeDuration)*100)+ '%')
            }
        },100)
	})
	
}
function replayout(){
    roomplayer.stop();
    $('#whiteboard').css('z-index','0')
    $('.replaystate').css('display','none')
    clearInterval(timer)
}
function replayplay(){
    roomplayer.play();
    $('.play_state').css('display','none')
    $('.stop_state').css('display','block')
}
function replaystop(){
    roomplayer.pause();
    $('.play_state').css('display','block')
    $('.stop_state').css('display','none')
}
function jdt(event,val){
    roomplayer.seekToScheduleTime(event.offsetX/val.offsetWidth*roomplayer.timeDuration);
}
