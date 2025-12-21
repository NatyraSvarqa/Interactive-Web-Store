function addData(){
    var name = document.getElementById('name').value;
    var lastname = document.getElementById('lastname').value;
    var username = document.getElementById('username').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

 localStorage.setItem('username', name);
localStorage.setItem('userlastname', lastname);
localStorage.setItem('userusername', username);
localStorage.setItem('useremail', email);
localStorage.setItem('userpassword', password); }