let add_shoppingCarts = document.querySelectorAll('.add-shoppingCart');
let check = document.querySelectorAll('.fa-check');
let orderBuy = document.querySelectorAll('.order-status');
// let delete_shoppingCarts = document.querySelectorAll('.delete-cart');
let csrf_token =document.querySelector('meta[name="csrf-token"]').getAttribute('content');

add_shoppingCarts.forEach((cart,index) =>{
    cart.addEventListener('click',()=>{
        let productId = cart.dataset.id;
        let size = cart.dataset.size;
        let color = cart.dataset.color;
        let color_id  =  cart.dataset.color_id;
        let quantity = 1;
        let formData =new FormData();
        formData.append('_token',csrf_token);
        formData.append('productId',productId);
        formData.append('size',size);
        formData.append('color',color);
        formData.append('quantity',quantity);
        formData.append('color_id',color_id);
        fetch('/front/product/add' ,{
            'method' : 'POST',
            'body' : formData
        }).then(rep=>{
            return rep.text();
        }).then(result=>{
            if(result == 'success'){
                console.log('更新成功')
                shoppingCart(index)
            }else{
                alert('已加入購物車');
                starIcon[index].classList.remove('active');
            }
        });
    });
});
//效果
function shoppingCart(index){
    if(eval(add_shoppingCarts[index].dataset.bool)){
        add_shoppingCarts[index].dataset.bool = false;
        cartClick(index);

        let promise = new Promise((resolve)=>{
            window.setTimeout(function(){
            cartUnclick(index);
            return resolve();
            },500)
        })

        promise.then(()=>{
            window.setTimeout(function(){
            cartDelete(index);
            },250)
        });
    }
}
function cartClick(index){
    add_shoppingCarts[index].classList.add( 'active' );
    everyStyle('','block','active',index);
};

function cartUnclick(index){
    if( orderBuy[index].classList.contains('active')){
        everyStyle('加入購物車','none','active2',index);
        add_shoppingCarts[index].classList.remove('active');
    }
};
function cartDelete(index){
    orderBuy[index].classList.remove('active');
    orderBuy[index].classList.remove('active2');
    add_shoppingCarts[index].dataset.bool = true;
}

function everyStyle(data,display,className,index){
    add_shoppingCarts[index].firstChild.data = data;
    check[index].style.display = display ;
    orderBuy[index].classList.add( className );
}
let anchor = document.querySelector('.a-anchor');
console.log(anchor);
anchor.addEventListener('click',function(){
  window.scrollTo(0, top);
})
//刪除
// delete_shoppingCarts.forEach((cart,index) =>{
//     cart.addEventListener('click',()=>{
//         let formData =new FormData();
//         let productId = cart.dataset.id;
//         let cartId = cart.dataset.color_id;;
//         formData.append('_token',csrf_token);
//         formData.append('productId',productId);
//         formData.append('cartId',cartId);
//         fetch('/front/user/deleteFollow',{
//             'method' : 'post',
//             'body' : formData
//         }).then(rep=>{
//             return rep.text();
//         }).then(result=>{
//             if(result == 'success'){
//                 alert('刪除成功');
//             }else{
//                 alert('已經在追蹤清單裡');
//             }
//         });
//     });
// });
