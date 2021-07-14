let delete_btn = document.querySelector('.delete-btn');
let password_window = document.querySelector('.password-background');
delete_btn.addEventListener('click',function(){
    password_window.style.display = 'none'
});


let modify_button = document.querySelector('.modify-btn');
let password_modify = document.querySelector('#password-modify');
let old_password = document.querySelector('#old-password');
let new_password = document.querySelector('#new-password');
let confirm_password = document.querySelector('#confirm-password');
modify_button.addEventListener('click',()=>{
    if(old_password.value && new_password.value && confirm_password.value){
        if(new_password.value == confirm_password.value){
            password_modify.submit();
        }else{
            alert('確認密碼輸入錯誤');
        }
    }else{
        alert('請輸入密碼');
    }
});
