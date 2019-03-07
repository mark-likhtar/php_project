var url = location.href.split('?')[1];
const element = document.getElementById(`${url}`);
const all = document.getElementById('all')
if(location.href === `http://localhost/DBlog/lessonsPage/lessons.php?${url}`) {
    element.style = 'background-color: #ccd0d7'
}
else if(location.href === `http://localhost/DBlog/newsPage/news.php?${url}`) {
    element.style = 'background-color: #ccd0d7'
}
else if(location.href === `http://localhost/DBlog/forumPage/forum.php?${url}`) {
    element.style = 'background-color: #ccd0d7'
}
else {
    all.style = 'background-color: #ccd0d7'
}