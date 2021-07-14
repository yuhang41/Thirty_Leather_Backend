let less = document.querySelectorAll('.less');
let plus = document.querySelectorAll('.plus');
let inputs = document.querySelectorAll('input[type=number]');
let discount_price = document.querySelectorAll('.discount-price');//折扣價
let original_price = document.querySelectorAll('.original-price');//原價
let subtotal_price = document.querySelectorAll('.subtotal-price');//小計

let difference = document.querySelector('.difference');//差多少可免運費
let subtotal_total = document.querySelector('.subtotal-total');//小計
let shipping_total = document.querySelector('.shipping-total');//運費
let order_total_price = document.querySelector('.order-total-price');//總金額

let count = 0;
start();
function start(){
    subtotal_price.forEach((item,index) =>{
        item.textContent = item.dataset.subtotal * inputs[index].value;
        count += parseInt(item.textContent);
        resultTotal();
    });
}
less.forEach((item,index)=>{
    item.addEventListener('click',()=>{
        if(inputs[index].value > 1){
            Calculation(-1,index);
            update(index);
        }
    })
})
plus.forEach((item,index)=>{
    item.addEventListener('click',()=>{
        Calculation(1,index);
        update(index);
    })
})
function Calculation(number,index){
    let subtotal = subtotal_price[index].dataset.subtotal * number;
    inputs[index].value = parseInt(inputs[index].value) + number;
    subtotal_price[index].textContent = parseInt(subtotal_price[index].textContent) + subtotal
    count += subtotal;
    resultTotal();
}
function resultTotal(){
    let free = 0;
    subtotal_total.textContent = count;
    shipping_total.textContent = count > 1000 ? 0 : 60;
    order_total_price.textContent = count + parseInt(shipping_total.textContent);
    free = 1000 - count;
    difference.textContent = free > 0 ? free : 0 ;
}

inputs.forEach((input)=>{
    input.addEventListener('change',()=>{
        if(parseInt(input.value) <= 1){
            input.value = 1;
        }
        count = 0;
        start();
    })
})

function update(index){
    let formData =new FormData();
    let productId = inputs[index].dataset.id;
    let newValue = inputs[index].value;
    let csrf_token =document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    formData.append('_token',csrf_token);
    formData.append('productId',productId);
    formData.append('newValue',newValue);
    fetch('/front/product/update',{
        'method' : 'post',
        'body' : formData
    }).then(rep=>{
        return rep.text();
    }).then(result=>{
        if(result == 'success'){
            console.log('更新成功')
        }
    });
}
