sendOrder = () => {
    var data = JSON.stringify( {name: 'Vova'} );    
    const promise = fetch("http://localhost/test_task/task3/post.php", {method: 'POST', body: data}).
                    then(response => response.json()).then(data => {console.log( data )})
}

sendOrder();