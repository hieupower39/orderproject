function userBill(){
    html = `
    <h2>ID ĐƠN HÀNG: ${bill["bill_id"]}</h2>
    
    <h4>Tiến độ đơn hàng </h4>
    <div class="detail">
    <div class="progress" style="height:30px" id="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-dark" style="width:25%">Đặt hàng</div>
    </div>
    <div class="flex-static">
        <div style="width:100%" id="dark">
            <h5> Đơn hàng đã đặt </h5> 
        </div>
        <div style="width:100%" id="info">
           
        </div>
        <div style="width:100%" id="warning">
            
        </div>
        <div style="width:100%" id="success">
            
        </div>     
       
    </div>
    </div>
    <h4>Nhật ký đơn hàng </h4>
    <div class="detail" id="log" style="min-height: 100px">
    </div>
    
    <h4> Thông tin giao hàng </h4>
    <div class="detail">
    <div class="information">
        <p><b>Tên khách hàng: </b> ${bill["name"]}</p>
        <p><b>Địa chỉ: </b>${bill["address"]}<br></p>
        <p><b>Số điện thoại: </b>${bill["phone"]}<br></p>
    </div> <br>    
    </div>
    <h4> Giỏ hàng </h4>
    <table class="table table-hover">
    <thead>
    <tr>
        <th></th>
        <th>Tên mặt hàng</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Thành tiền</th>
    </tr>
    </thead>
    <tbody  id="cart">
    
    </tbody>
    </table>   
    <h4 id="total"></h4>
    `
    document.getElementById("bill").innerHTML=html;
    progress=document.getElementById("progress").innerHTML;
    if(bill["bill_static"]>=1&&bill["bill_static"]!=4){
        progress = `
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" style="width:50%">Xác nhận</div>
        `;
        document.getElementById("info").innerHTML= `<h5> Đã xác nhận đơn hàng </h5> `
    }
    if(bill["bill_static"]>=2&&bill["bill_static"]!=4){
        progress = `
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" style="width:75%">Đang giao</div>
        `;
        document.getElementById("warning").innerHTML= `<h5> Đã giao cho ĐVVC </h5> `
    }
    if(bill["bill_static"]==3){
        progress = `
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width:100%">Hoàn thành</div>
        `;
        document.getElementById("success").innerHTML= `<h5> Đơn hàng đã nhận </h5> `
    }
    if(bill["bill_static"]==4){
        progress = `
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" style="width:100%">Đã hủy</div>
        `;
        document.getElementById("warning").innerHTML= `<h5> Đơn hàng đã hủy </h5> `
    }
    document.getElementById("progress").innerHTML=progress ;
    var detail = '';
    let total=0;
    let index=0;
    cart.forEach(element => {
        detail=detail+`
        <tr>
        <td width="100px"><img src="${element["product_img"]}" width="100px"></td>
        <td>${element["product_name"]}</td>
        <td>${formatMoney(element["product_cost"])}</td>
        <td>${element["amount"]}</td>
        <td>${formatMoney(element["total"])}</td>
        </tr>
    `;
    index++;
    total=total+Number(element["total"]);
    });
    document.getElementById("cart").innerHTML=detail;
    document.getElementById("total").innerHTML="Tổng: "+formatMoney(total)+" VNĐ";

    for(index=logs.length-1; index>=0;index--){
        element = logs[index];
        if(element["log_static"]==0){
            document.getElementById("dark").innerHTML+= element["log_date"];
        }
        if(element["log_static"]==1&&bill["bill_static"]!=4){
            document.getElementById("info").innerHTML+= element["log_date"];
        }
        if(element["log_static"]==2&&bill["bill_static"]!=4){
            document.getElementById("warning").innerHTML+= element["log_date"];
        }
        if(element["log_static"]==3&&bill["bill_static"]!=4){
            document.getElementById("success").innerHTML+= element["log_date"];
        }
        if(element["log_static"]==4){
            document.getElementById("warning").innerHTML+= element["log_date"];
        }
        document.getElementById("log").innerHTML+=("["+element["log_date"]+"]: "+element["log_message"]+"<br>")
    }
}

