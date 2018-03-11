sendOrder = () => {
    function formEncode(obj) {
        var str = [];
        for (var p in obj)
            str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
            console.log(str.join("&"));
        return str.join("&");
    }

    var requestObject = {
        email: 'vova.stepanenko2020@gmail.com',
        password: 'wtf'
    };

    // var data = JSON.stringify({
    //     name: 'Vova2'
    // });
    const promise = fetch("http://localhost/test_task/task3/post.php", {
        method: 'POST',
        body: 'email=test@post.com&pass=wtf',
        headers: {
            "Content-type": "application/x-www-form-urlencoded"
        }
    }).
    then(response => response.json()).then(data => {
        console.log(data)
    })
}

sendOrder();