AOS.init({
    duration: 1200,
  })
// Initialize Swiper
var swiper = new Swiper(".mySwiper", {
    loop: true,
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
  });
  var swiper2 = new Swiper(".mySwiper2", {
    loop: true,
    spaceBetween: 10,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    thumbs: {
      swiper: swiper,
    },
  });

//tab切換分頁
$(".tab").each(function (index) {
    $(this).click(function (e) {
        triggletab();
        triigletabcontent();
        $(this).toggleClass("active");
        $(".tab-c")
            .eq(index)
            .toggleClass("active");
    });
});
//to remove all tab headers
function triggletab() {
    $(".tab").each(function () {
        $(this).removeClass("active");
    });
}
//triggle the tab content
function triigletabcontent() {
    $(".tab-c").each(function () {
        $(this).removeClass("active");
    });
}

//shoes parallax
document.addEventListener("mousemove",parallax);
function parallax(e){
    this.querySelectorAll('.layer').forEach(layer=>{
        const speed = layer.getAttribute('data-speed');

        const x =(window.innerWidth - e.pageX*speed)/100
        const y =(window.innerHeight - e.pageY*speed)/100
        layer.style.transform =`translateX(${x}px) translateY(${y}px)`

    })
}

//shoes 點擊效果
$(".click-button").each(function (index) {
  $(this).click(function (e) {
      // removeClick();
      $(".click-button")
          .eq(index)
          .toggleClass("active");
  });
});

//development-process-swiper
 let development_steps=['初登場','開發','合作廠商','結語']
 var swiper3 = new Swiper(".mySwiper3", {
   slidesPerView: 'auto',
   spaceBetween: 30,
   watchSlidesVisibility: true,
    watchSlidesProgress: true,
   navigation: {
     nextEl: ".button-next",
   },
   pagination: {
     el: ".pagination-next",
     clickable: true,
     renderBullet: function (index, className) {
       return '<span class="' + className + '">' + '<p>' +development_steps[index]+ '</p>'+ "</span>";
     },
   },
   thumbs: {
    swiper: swiper4,
  },
 });
 var swiper4 = new Swiper(".mySwiper4", {
   loop:true,
  slidesPerView: 'auto',
  spaceBetween: 30,
  navigation: {
    nextEl: ".button-next",
  },
  pagination: {
    el: ".pagination-next",
    clickable: true,
    renderBullet: function (index, className) {
      return '<span class="' + className + '">' + '<p>' +development_steps[index]+ '</p>'+ "</span>";
    },
  },
  thumbs: {
    swiper: swiper3,
  },
});

function updateQty(element,number){
  var qtyArea = element.parentElement;
  var input = qtyArea.querySelector('input');
  var qty = Number(input.value);
  var newQty = qty + number;
  if(newQty < 1){
    input.value = 1;
  }else{
    input.value= newQty;
}
}

//加法計算
var plusBtns = document.querySelectorAll('.plus-btn');
plusBtns.forEach(function(plusBtn){
    plusBtn.addEventListener('click',function(){
        updateQty(this,1);
    });
});
//減法計算
var minusBtns = document.querySelectorAll('.minus-btn');
minusBtns.forEach(function(minusBtn){
    minusBtn.addEventListener('click',function(){
        updateQty(this,-1);
    });
});
//fetch
let putcart = document.querySelector('.putcart');
let colorCheckboxs = document.querySelectorAll(".color-checkbox");
let sizeCheckboxs = document.querySelectorAll('.size-checkbox');
putcart.addEventListener('click',function(){
    let productId = putcart.dataset.id;
    let quantity = document.querySelector('#quantity');
    let csrf_token =document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    let formData =new FormData();
    colorCheckboxs.forEach(checkbox =>{
        if(checkbox.checked){
            formData.append('color[]',checkbox.value);
        }
    });
    sizeCheckboxs.forEach(checkbox =>{
        if(checkbox.checked){
            formData.append('size[]',checkbox.value);
        }
    });
    formData.append('_token',csrf_token);
    formData.append('productId',productId);
    formData.append('quantity',quantity.value);
    fetch('/front/product/add',{
        'method' : 'post',
        'body' : formData
    }).then(rep=>{
        return rep.text();
    }).then(result=>{
        if(result == 'success'){
            console.log(result);
            alert('已加入購物車');
        }
    })
});

