function displayBills(){
    if(bills.length>0){
        html="<h2>Danh sách đơn hàng</h2>";
        for(index=bills.length-1; index>=0;index--) {
            var element = bills[index];
            html+=`
            <div class="flex-container">
                <div><img src="image/logo.jpg" alt="" height="100px"></div>
                <div style="width:100%">
                    <h5>ID đơn hàng: ${element["bill_id"]}</h5>
                    <b>Địa chỉ giao hàng: ${element["address"]}</b> <br> 
                    <b>Trạng thái đơn hàng:</b> ${getStatic(element["bill_static"])} <br> 
                    <a href="index.php?controller=bill&id=${element["bill_id"]} ">Xem chi tiết</a>
                </div>
                
            </div>
            <hr> 
            `
        }
        document.getElementById("bill").innerHTML=html;
    }
    else{
        document.getElementById("bill").innerHTML="<h2>Hiện chưa có đơn hàng</h2>";
    }
}

function getStatic(static){
    if(static==0){
        return "Đã đặt đơn hàng"
    }
    if(static==1){
        return "Đơn hàng đã xác nhận"
    }
    if(static==2){
        return "Đơn hàng đang được vận chuyển"
    }
    if(static==3){
        return "Đơn hàng đã hoàn thành"
    }
    return "Đơn hàng đã bị hủy"
}