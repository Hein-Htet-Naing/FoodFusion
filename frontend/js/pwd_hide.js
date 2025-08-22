const pwd_eye = document.querySelector('#label .fa-eye');
const c_pwd_eye = document.querySelector('#confirmlabel .fa-eye');
const pwd = document.querySelector('#label input[type="password"]');
const c_pwd = document.querySelector('#confirmlabel input[type="password"]')



pwd_eye.onclick = () => {
      pwd.type = pwd.type === 'password' ? 'text' : 'password';
      pwd_eye.classList.toggle("fa-eye");
      pwd_eye.classList.toggle("fa-eye-slash");
}

c_pwd_eye.onclick = () => {
      c_pwd.type = pwd.type === 'password' ? 'text' : 'password';
      c_pwd_eye.classList.toggle("fa-eye");
      c_pwd_eye.classList.toggle("fa-eye-slash");
}


//hiding join us form

