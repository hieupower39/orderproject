let products;

function init(json_products){
  products=json_products;
  display();
}

function display(){
    let html = '';
    products.forEach(element => {
        html = 
        `
        <div class="col-md-3 col-sm-6 col-12 text-center sell " style="max-height:500px">
        <div class="card">
          <img class="card-img-top" src="${element.product_img}">
          <div class="card-body">
            <h6>${element.product_name}</h6>
            <h5>${formatMoney(element.product_cost)} VNĐ</h5>
            <button class="btn" onclick="addToCart(${element.product_id});">Thêm vào giỏ hàng</button>
          </div>
        </div>
        </div>
        `;
        document.getElementById(element.product_type).innerHTML += html;
    });
   
}

function formatMoney(n) {
    return (Math.round(n * 100) / 100).toLocaleString();
}
