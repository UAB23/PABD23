function login(){
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    if(email=="catalinhabean@gmail.com" && password=="catalin123")
    {
        var newArticle = document.getElementById ( "newArticle" );
        newArticle.style.visibility = "visible" ;
    }
    else
    {
        console.log("User sau parola gresita");
    }
}