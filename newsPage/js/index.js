var url = location.href.split('?')[1];
const element = document.getElementById(`${url}`);
const all = document.getElementById('all')
if(location.href === `http://localhost/DBlog/newsPage/news.php?${url}`){
    element.style = 'background-color: #ccd0d7'
}
else if(location.href ==='http://localhost/DBlog/newsPage/news.php'){
    all.style = 'background-color: #ccd0d7'
}