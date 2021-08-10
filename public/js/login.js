let data_block2 = document.querySelector('.data-block2');

let btn_groups = document.querySelector('.btn-groups');

let cancel = document.querySelector('.cancel');

let content_edits = [...document.querySelectorAll('.content-edit')];

// 編輯
data_block2.addEventListener('click', function () {
    judgment('flex',false);
});
// 取消
cancel.addEventListener('click', function () {
    judgment('none',true);
});
function judgment(display,readOnly){
    btn_groups.style.display = display;

    content_edits.forEach(edit=>{
        edit.readOnly = readOnly;
    });

}

// let click_toggles = [...document.querySelectorAll('.order-detail-click')];
// let squares = [...document.querySelectorAll('.square')];
// // + icon
// let pluss = [...document.querySelectorAll('.plus')];
// // - icon
// let minuss = [...document.querySelectorAll('.minus')];



// // 訂單明細按鈕
// click_toggles.forEach((click_toggle,index)=>{
//     click_toggle.addEventListener('click',()=>{
//         pluss[index].classList.toggle('active');
//         minuss[index].classList.toggle('active');
//     });
// });

