var bills;
function changeStatic(static, id){
    updateLog(static, id);
    var xhttps = new XMLHttpRequest();
    //   xhttp.onreadystatechange = function() {
    //     if (this.readyState == 4 && this.status == 200) {
    //       alert(this.responseText);
    //     }
        //   };
    xhttps.open("POST", "index.php?controller=bill&action=changestatic", true);
    xhttps.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttps.send(`static=${static}&id=${id}`);

    document.getElementById(id).innerHTML = getStatic(static, id);
    
}

function displayAllBill(json){
    bills=json;
    display();
}

function display(){
    html=``;
    for (var index=bills.length-1; index >=0; index--){
        var element = bills[index];
        html = html + `
        <tr>
            <td>${element["bill_id"]}</td>
            <td>${element["name"]}</td>
            <td>${element["address"]}</td>
            <td>${element["phone"]}</td>
            <td id="${element["bill_id"]}">${getStatic(element["bill_static"], element["bill_id"])}</td>
            <td><a href="index.php?controller=bill&id=${element["bill_id"]}">Xem chi tiết<a></td>
        </tr>
        `;
    }
        
    
    document.getElementById('bill').innerHTML = html;
}

function getStatic(static, id){
    var html='';
    if(static==0){
        html =  `
     <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                                Chưa xác nhận<span class="caret"></span>
                            </button>
                            <div class="dropdown-menu">
                            <button class="btn dropdown-item" onclick="changeStatic(1, ${id});">Xác nhận</button>

                            <button class="btn dropdown-item" onclick="changeStatic(4, ${id});">Hủy</button>
                            </div>
    `;
    }
    if(static==1){
        html =  `
     <button type="button" class="btn btn-info btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                                Đã xác nhận<span class="caret"></span>
                            </button>
                            <div class="dropdown-menu">
                        
                            <button class="btn dropdown-item" onclick="changeStatic(2, ${id});">Giao hàng</button>
   
                            <button class="btn dropdown-item" onclick="changeStatic(4, ${id});">Hủy</button>
                            </div>
    `;
    }

    if(static==2){
        html =  `
     <button type="button" class="btn btn-warning btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                                Đang giao hàng<span class="caret"></span>
                            </button>
                            <div class="dropdown-menu">

                            <button class="btn dropdown-item" onclick="changeStatic(3, ${id});">Hoàn thành</button>
                            <button class="btn dropdown-item" onclick="changeStatic(4, ${id});">Hủy</button>
                            </div>

    `;
    }

    if(static==3){
        html =  `
     <button type="button" class="btn btn-success btn-sm" data-toggle="dropdown">
                                Đã hoàn thành
                            </button>
                            
                
    `;
    }
    
    if(static==4){
        html =  `
     <button type="button" class="btn btn-danger btn-sm" data-toggle="dropdown">
                                Đã hủy
                            </button>

    `;
    }
    return html;
}

function updateLog(static, id){
    var date=getDate();
    var message;
    if(static==1){
        message="Đã xác nhận đơn hàng"
    }
    if(static==2){
        message="Đơn hàng đang được giao"
    }
    if(static==3){
        message="Đơn hàng đã được nhận"
    }
    if(static==4){
        message="Đơn hàng đã bị hủy"
    }
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "index.php?controller=bill&action=updatelog", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`static=${static}&id=${id}&date=${date}&message=${message}`);
    if(document.getElementById("log")!=null)
        document.getElementById("log").innerHTML=("["+date+"]: "+message+"<br>")+document.getElementById("log").innerHTML;
}

function getDate(){
    var date = new Date();
    var str = reString(date.getHours())+":"+reString(date.getMinutes())
    +" "+reString(date.getDay())+"-"+reString((date.getMonth()+1))+"-"+date.getFullYear();
    return str;
  }
  
  function reString(num){
    if(num<10)
      return "0"+num;
    return num;
  }