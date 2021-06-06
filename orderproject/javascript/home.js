let listTicket=[
{
    "id":"001",
    "name":"GÓI CÁ NHÂN",
    "course":"Gói theo tháng",
    "img":"image/Person.jpg",
    "describe":"Đăng ký ngay 12 tháng để được nhận ngay ưu đãi giảm giá 40%"
},
{
    "id":"002",
    "name":"GÓI PT 1-1",
    "course":"Gói theo buổi",
    "img":"image/PT1-1.jpg",
    "describe":"Đăng ký ngay để được huấn luyện viên hướng dẫn cụ thể"
},
{
    "id":"003",
    "name":"GÓI TẬP YOGA",
    "course":"Gói theo khóa",
    "img":"image/YOGA.jpg",
    "describe":"Đăng ký ngay khóa huấn luyện YOGA chuyên nghiệp"
},
{
    "id":"004",
    "name":"GÓI EMS",
    "course":"Liện hệ ngay",
    "img":"image/EMS.jpg",
    "describe":"Khóa tập mới giúp bạn sớm sở hữu vóc dáng thon gọn"
}
]



function addTicket(listTicket){
    for(let index = 0; index < listTicket.length; index++){
        const tic = listTicket[index];
        let ticket = `
        <div class="col-md-3 col-sm-6 col-12 text-center sell" style="max-height:500px">
          <div class="card">
          <h5 class="bg-warning mb-0" style="height:40px; padding-top:9px">${tic.name}</h5>
            <img class="card-img-top" src="${tic.img}">
            <div class="card-body">
              <h4 class="card-title">${tic.course}</h4>
              <p class="card-text">${tic.describe}</p>
              <a href="https://www.facebook.com/messages/t/211118519590778" target="_blank" class="btn">Liên hệ</a>
            </div>
          </div>
        </div>
        `;
        document.getElementById("list-ticket").innerHTML+=ticket;
    }
}
addTicket(listTicket);  