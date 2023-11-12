const Framework = {
    // DOM manipulation
    getElement(selector) {
        return document.querySelector(selector);
    },

    // Event handling
    addEventListener(element, event, callback) {
        element.addEventListener(event, callback);
    },

    // AJAX request
    fetchData(url, callback) {
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                callback(JSON.parse(xhr.responseText));
            }
        };
        xhr.open('GET', url, true);
        xhr.send();
    }
};