function billDetail(){
    displayBill();
    displayDetail();
    displayLog();
}  

function displayBill(){
    var html = `
        <h2> ID ĐƠN HÀNG: ${bill[0]["bill_id"]}</h2>
        <div id="${bill[0]["bill_id"]}">
            ${getStatic(bill[0]["bill_static"], bill[0]["bill_id"])}
        </div>
        <br>
        <h4> Thông tin khách hàng </h4>
        <form class="information">
            <b><label for="name">Tên khách hàng: </label></b><br>
            <input type="text" id="name" value="${bill[0]["name"]}"><br>
            <b><label for="name">Địa chỉ: </label></b><br> 
            <input type="text" id="address" value="${bill[0]["address"]}"><br>
            <b><label for="name">Số điện thoại: </label></b><br>
            <input type="text" id="phone" value="${bill[0]["phone"]}"><br>
        </form> <br>    
        
        <h4> Thông tin đặt hàng </h4>
        <table class="table table-dark table-striped table-bordered">
        <thead>
        <tr>
            <th>ID hàng</th>
            <th>Tên mặt hàng</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>
        </thead>
        <tbody  id="detail">
        
        </tbody>
        </table>
        <div class="btn-group">
            <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" id="pro">
                Chọn sản phẩm
            </button>
            <div class="dropdown-menu" id="products">
            </div>
            <div id="choose">
                <button type="button" class="btn btn-primary">Thêm sản phẩm</button>
            </div>
        </div>
        </div>
        <br><br>
        <h4 id="total"></h4>
        <button type="button" class="btn btn-primary" onclick="updateDetail()">Cập nhật</button>
        <button type="button" class="btn btn-primary" onclick="deleteBill()">Xóa đơn hàng</button><br><br>
        <h4>Nhật ký đơn hàng </h4>
        <div class="detail" id="log" style="min-height: 100px">
        </div><br>
        <b><label for="name">Tin nhắn: </label></b>
        <input type="text" id="message" style="width:500px">
        <button type="button" class="btn btn-primary" onclick="addLog()">Thêm nhật ký</button><br><br>
    `;
    document.getElementById("bill").innerHTML=html;
    
}

function displayDetail(){
    var list = '';  
    products.forEach(element => {
        list = list + `
        <button class="btn dropdown-item" onclick="chooseProduct(${element["product_id"]})">${element["product_id"]}. ${element["product_name"]}</button>
        `
    });
    document.getElementById("products").innerHTML=list;
    var detail = '';
    let total=0;
    let index=0;
    cart.forEach(element => {
        detail=detail+`
        <tr id="${element["product_id"]}">
        <td>${element["product_id"]}</td>
        <td>${element["product_name"]}</td>
        <td>${formatMoney(element["product_cost"])}</td>
        <td><input id="amount${element["product_id"]}" style="width: 60px" type="number" onchange="amountUpdate(${element["product_id"]})" value="${element["amount"]}"></td>
        <td>${formatMoney(element["total"])}</td>
        <td><button class="btn btn-danger" onclick="deleteCartItem(${index})">Xóa</button></td>
        </tr>
    `;
    index++;
    total=total+Number(element["total"]);
    });
    document.getElementById("detail").innerHTML=detail;
    document.getElementById("total").innerHTML="Tổng: "+formatMoney(total)+" VNĐ";
}

function displayLog(){
    for(index=logs.length-1; index>=0;index--){
        element = logs[index];
        document.getElementById("log").innerHTML+=("["+element["log_date"]+"]: "+element["log_message"]+"<br>")
    }
}

function formatMoney(n) {
    return (Math.round(n * 100) / 100).toLocaleString();
}

function chooseProduct(id){
    var name;
    products.forEach(element => {
        if(element["product_id"]==id){
            name=element["product_name"];
        }    
    });
    document.getElementById("pro").innerHTML=`${id}. ${name}`;
    document.getElementById("choose").innerHTML= `<button type="button" class="btn btn-primary" onclick="addProduct(${id})">Thêm sản phẩm</button>`;
}

function addProduct(id){
    var check=false;
    cart.forEach(element => {
        if(element["product_id"]==id){
            check = true;
        }    
    });
    if(check){
        alert("Sản phẩm đã có trong giỏ hàng bạn có thể thay đổi số lượng trong giỏ hàng");
        return;
    }
    var product;
    products.forEach(element => {
        if(element["product_id"]==id){
            product=element;
        }    
    });
    var object = {
        product_id: id,
        product_name: product["product_name"],
        product_cost: product["product_cost"],
        amount: "1",
        total: product["product_cost"]
    }
    cart.push(object);
    displayDetail();
}

function amountUpdate(id){
    var amount=document.getElementById("amount"+id).value;
    if(amount<1){
        displayDetail();
        return;
    }
    cart.forEach(element => {
        if(element["product_id"]==id){
            element["amount"]=amount;
            element["total"]=element["amount"]*element["product_cost"];
        };
    });
    displayDetail();
}

function updateDetail(){
    if(bill[0]["bill_static"]>=3){
        alert("Không thể câp nhật đơn hàng đã xong");
        return;
    }
    var name = document.getElementById("name").value;
    var address = document.getElementById("address").value;
    var phone = document.getElementById("phone").value;
    var xhttp = new XMLHttpRequest();
    var detail=JSON.stringify(cart);
    xhttp.open("POST", "index.php?controller=bill&action=update", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`name=${name}&address=${address}&phone=${phone}&cart=${detail}&id=${bill[0]["bill_id"]}`);
    logMessage(bill[0]["bill_id"], "Đơn hàng đã được cập nhật");
    alert("Cập nhật thành công");
}

function deleteCartItem(index){
    cart.splice(index, 1);
    displayDetail();
}

function deleteBill(){
    var xhttp = new XMLHttpRequest();
    //    xhttp.onreadystatechange = function() {
    //     if (this.readyState == 4 && this.status == 200) {
    //       alert(this.responseText);
    //     }
    //       };
    xhttp.open("POST", "index.php?controller=bill&action=delete", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`bill_id=${bill[0]["bill_id"]}`);
    window.location="index.php?controller=admin";
}

function logMessage(id, message){
    var date=getDate();
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "index.php?controller=bill&action=updatelog", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`static=10&id=${id}&date=${date}&message=${message}`);
    return date;
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

function addLog(){
    var id=bill[0]["bill_id"];
    var message=document.getElementById("message").value;
    var date = logMessage(id, message);
    document.getElementById("log").innerHTML=("["+date+"]: "+message+"<br>")+document.getElementById("log").innerHTML;
}
