var url = location.pathname;
var urlPage = url.substr(url.lastIndexOf('/') + 1);
urlPage = urlPage.substr(0, urlPage.indexOf('.'))

document.getElementById(urlPage).classList.add('underline');