var ws, name, client_list={},room_id,client_id;
room_id = getQueryString('room_id')?getQueryString('room_id'):1;
ws = new WebSocket("ws://127.0.0.1:2346");
function connect() {
    // 创建websocket
    ws = new WebSocket("ws://127.0.0.1:2346");
    // 当socket连接打开时，输入用户名
    ws.onopen = onopen;
    // 当有消息时根据消息类型显示不同信息
    ws.onmessage = onmessage;
    ws.onclose = function() {
        console.log("连接关闭，定时重连");
        connect();
    };
    ws.onerror = function() {
        console.log("出现错误");
        ws.close();
    };
}
function getQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return unescape(r[2]); return null;
}

// 连接建立时发送登录信息
function onopen()
{
    if(!name){show_prompt();}
    // 登录
    var login_data = '{"type":"login","client_name":"'+name.replace(/"/g, '\\"')+'"}';
    console.log("websocket握手成功，发送登录数据:"+login_data);
    ws.send(login_data);
}

/**
 * 输入姓名弹窗
 */
function show_prompt()
{
    name = prompt('输入你的名字：', '');
    if(!name || name=='null'){
        name = '游客';
    }
}

function send(e)
{
    let params = new URLSearchParams(document.location.search.substring(1));
    let message = $(".word-box").val();
    $(".word-box").val('');
    let data = '{"type":"say","to_client":"'+params.get('name')+'","client_name":"'+name+'","msg":"'+message+'"}';
    console.log('发送数据：'+data);
    ws.send(data);

}

function onmessage(e)
{
    console.log('onmessage:'+e.data);
    var data = JSON.parse(e.data);
    console.log('data',data)
    console.log('type',data['to_client'])
    switch(data['type']){
        // 服务端ping客户端
        case 'ping':
            console.log('接收到服务器心跳')
            break;
        // 登录 更新用户列表
        case 'login':
            var client_name = data['client_name'];
            if(data['client_list'])
            {
                client_id = data['client_id'];
                client_name = '你';
                client_list = data['client_list'];
            }
            else
            {
                client_list[data['client_id']] = data['client_name'];
            }
            console.log(data['client_name']+"登录成功");
            break;
        // 发言
        case 'say':
            console.log('ws say to:'+data.to_client);
            // 右边新增气泡
            if(name && name == data.to_client) {
                // 左边新增气泡
                let parent = $(".message-print-box");
                let childdiv=$('<div style="height: 71px;"><div class="user-chat-box opc-left">'+data.msg+'</div></div>');
                parent.append(childdiv);
            } else {
                let parent = $(".message-print-box");
                let childdiv=$('<div style="height: 71px;"><div class="user-chat-box opc-right">'+data.msg+'</div></div>');
                parent.append(childdiv);
            }
            break;
        // 用户退出 更新用户列表
        case 'logout':
            //{"type":"logout","client_id":xxx,"time":"xxx"}
            // say(data['from_client_id'], data['from_client_name'], data['from_client_name']+' 退出了', data['time']);
            delete client_list[data['from_client_id']];
    }
}
