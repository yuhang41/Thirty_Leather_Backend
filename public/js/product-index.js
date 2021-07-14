let AllCommodity = document.querySelector('.AllCommodity');
let Snowshoe = document.querySelector('.Snowshoe');

function AllCommodityHandler(){
    AllCommodity.classList.toggle('active');
}
function SnowshoeHandler(){
    Snowshoe.classList.toggle('active');
}
AllCommodity.addEventListener('click',AllCommodityHandler);
Snowshoe.addEventListener('click',SnowshoeHandler);