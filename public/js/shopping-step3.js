let order_total = document.querySelector('.order-total');

function order_totalHandler(){
    order_total.classList.toggle('active');
}
order_total.addEventListener('click',order_totalHandler);
