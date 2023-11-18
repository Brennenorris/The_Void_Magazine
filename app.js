Framework.addEventListener(Framework.getElement('#fetchDataBtn'), 'click', function () {
    Framework.fetchData('https://jsonplaceholder.typicode.com/todos/1', function (data) {
        const dataContainer = Framework.getElement('#dataContainer');
        dataContainer.innerHTML = `<p>User ID: ${data.userId}</p>
                                   <p>Title: ${data.title}</p>
                                   <p>Completed: ${data.completed}</p>`;
    });
});