function modal() {
    var formdata = new FormData();

    let password=document.getElementById('password').value;
    formdata.append("password", "password");

    var requestOptions = {
        method: 'POST',
        body: formdata,
        redirect: 'follow'
    };

    fetch("https://pr-shutova.xn--80ahdri7a.site/chart/create", requestOptions)
        .then(response => response.text())
        .then(result => console.log(result=>{
            document.location.href='https://pr-shutova.xn--80ahdri7a.site/order/index?OrderSearch[id_order]=&OrderSearch[id_user]='.id_user;
        }))
        .catch(error => console.log('error', error));
}