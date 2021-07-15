document.querySelector('.img__btn').addEventListener('click', function() {
    document.querySelector('.cont').classList.toggle('s--signup');
});

let login = document.querySelector('#user-login');
let register = document.querySelector('#user-register');

login.addEventListener('click',()=>{
    let user_signin = document.querySelector('#user-signin');
    user_signin.submit();
});
register.addEventListener('click',()=>{
    let user_signin_register = document.querySelector('#user-signin-register');
    user_signin_register.submit();
})
