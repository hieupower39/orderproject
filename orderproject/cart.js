var keyLocalStorageCartItem = 'listCartItem';

function show(json_products){
  products=json_products;
  showListItemInCart();
}

/* Tạo ra đối tượng item trong cart*/
function addItemToCart(idProduct, amount){
    var cartItem = new Object();
    cartItem.idProduct = idProduct;
    cartItem.amount = amount;
    return cartItem;
}
/* Lấy toàn bộ item trong giỏ hàng */
function getListItemInCart(){
    var listItemInCart = new Array();
    var jsonListItemInCart = localStorage.getItem(keyLocalStorageCartItem);
    if(jsonListItemInCart!=null)
        listItemInCart = JSON.parse(jsonListItemInCart);
    return listItemInCart;
}
/*Lưu vào localStorage */
function saveListItemToLocalStorage(listItemInCart){
    var jsonListItemInCart = JSON.stringify(listItemInCart);
    localStorage.setItem(keyLocalStorageCartItem, jsonListItemInCart);
}
function addToCart(idProduct){
    var listItemInCart = getListItemInCart();
    var isExist = false;
    for(var index = 0; index<listItemInCart.length; index++){
        var item = listItemInCart[index];
        if(item.idProduct==idProduct){
            listItemInCart[index].amount++;
            isExist=true;
        }
    }
    if(isExist==false){
        listItemInCart.push(addItemToCart(idProduct, 1));
    }
    saveListItemToLocalStorage(listItemInCart);
    alert("Sản phẩm đã được thêm vào giỏ hàng");
    cartAlert();
}

function updateCart(idProduct, amount){
    var listItemInCart = getListItemInCart();
    var money=0;
    for(var index = 0; index<listItemInCart.length; index++){
        var item = listItemInCart[index];
        if(item.idProduct==idProduct){
            if(amount>0)
                listItemInCart[index].amount=amount;
            else
                listItemInCart.splice(index,1);
        }
        money=amount*item.cost
    }
    saveListItemToLocalStorage(listItemInCart);
    cartAlert();
}

      var listAmount=0;
      var money=0;
      function updateAmount(indexID){
        var amount =  document.getElementById("id"+indexID).value;
        
        if(amount>0){
          var prize = $(document.getElementById("cost"+indexID)).text();
          prize = prize.split(',').join('');
          prize = prize.split('.').join('');
          document.getElementById("total"+indexID).innerHTML=`<p>${formatMoney(amount*prize)} VNĐ</p>`;
          
          updateCart(indexID, amount);
          updateMoney();
          document.getElementById("checkout").innerHTML=`<b>Tổng tiền: </b>${formatMoney(money)} VNĐ`;
        }
        else{
          remove(indexID);
        }
      } 
      //Xóa 1 vật phẩm
      function remove(indexID){
        var check = confirm("Bạn có muốn xóa?");
        if(check){
          updateCart(indexID, 0);
          updateMoney();
          var childe=document.getElementById("item"+indexID);
          childe.remove();
          listAmount--;
          document.getElementById("header-list").innerText=`Danh sách sản phẩm (${listAmount})`;
        }
        else{
          document.getElementById("id"+indexID).value=1;
        }
        if(getListItemInCart().length==0){
          emptyList();
          return;
        }
        document.getElementById("checkout").innerHTML=`<b>Tổng tiền: </b>${formatMoney(money)} VNĐ`;
      }

      function showListItemInCart(){
        var listItemInCart = getListItemInCart();
        var html = listCartItemToHTML(listItemInCart);
        document.getElementById("cart").innerHTML+=html;
      }
      /*Chuyển danh sách item thành html*/
      function listCartItemToHTML(listItemInCart){
          listAmount=listItemInCart.length;
          var html=`<h1 id='header-list'>Danh sách sản phẩm (${listAmount})</h1>
                    <div class="cart-item cart-header" >
                      <div class="image" >
                          <img src="" alt="">
                      </div>
                      <p class="name">Sản phẩm</p>
                      <div class="cost">
                          <p>Đơn giá</p>
                      </div>
                      <p class="amount">Số lượng</p>
                      <p class="total">Thành tiền</p>
                      <p class="delete">Xóa</p>
                    </div>`;
          if(listItemInCart.length==0){
            emptyList();
            return ``;
          }
          for(var index=0; index < listItemInCart.length; index++){
              html+=cartItemToHTML(listItemInCart[index]);
          }
          html+=`
          <div class="checkout">
            <p id="checkout"><b>Tổng tiền: </b>${formatMoney(money)} VNĐ</p>
            <div>
              <button type="button" class="btn btn-primary btn-lg" onclick="checkOut()">Thanh toán</button>
            </div>
          </div>`;
          return html;
      }
      /*Chuyển 1 item thành html*/
      function cartItemToHTML(cartItem){
        var item = findProductByID(cartItem.idProduct);
        var html = `
            <div class="cart-item in-cart" id="item${cartItem.idProduct}">
                <div class="image" >
                    <img src="${item.img}"  alt="">
                </div>
                <p class="name" >${item.name}</p>
                <div class="cost" >
                    <p id="cost${cartItem.idProduct}">${formatMoney(item.cost)}</p>
                </div>
                <input type="number" class="amount" id="id${cartItem.idProduct}" oninput="updateAmount(${cartItem.idProduct})"  value=${cartItem.amount}>
                <div class="total" id="total${cartItem.idProduct}">
                  <p>${formatMoney(cartItem.amount*item.cost)} VNĐ</p>
                </div>
                <div class="delete" onclick="remove(${cartItem.idProduct})">
                    <i class="fas fa-trash"></i>
                </div>
            </div>
          `;
          money+=cartItem.amount*item.cost;
          return html;
      }
      function emptyList(){
        document.getElementById("cart").innerHTML=`<h3>Không có sản phẩm nào trong giỏ hàng</h3>`;
      }
      function checkOut(){
        var listItemInCart = new Array();
        localStorage.removeItem(keyLocalStorageCartItem);
        showListItemInCart();
        alert("Bạn đã thanh toán thành công");
        cartAlert();
      }
      function updateMoney(){
        money=0;
        var listItemInCart = getListItemInCart();
        for(var index=0; index < listItemInCart.length; index++){
              var cartItem = listItemInCart[index];
              var item = findProductByID(cartItem.idProduct);
              money+=cartItem.amount*item.cost;
          }
      }
function cartAlert(){
   var len = getListItemInCart().length;
   if(len>0)
    document.getElementById("nav-icon").innerHTML=`<span class="badge badge-pill badge-danger">${len}</span><i class="fas fa-shopping-cart "></i>`;
  else 
    document.getElementById("nav-icon").innerHTML=`<i class="fas fa-shopping-cart "></i>`;
}    

function findProductByID(idProduct){
  var product = new Object();
  var pro;
  products.forEach(element => {
    if(idProduct==element.product_id){
      pro=element;
    }
  });
  product.name=pro.product_name;
  product.img=pro.product_img;
  product.cost=pro.product_cost;
  product.type=pro.product_t;
  return product;
}