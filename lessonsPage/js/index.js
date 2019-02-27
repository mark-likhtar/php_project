// const all = document.getElementById('all')
// const javascript = document.getElementById('javascript')
// const php = document.getElementById('php')
// const c_sharp = document.getElementById('c_sharp')
// const c_plus = document.getElementById('c_plus')
// const pyton = document.getElementById('pyton')
// const ruby = document.getElementById('ruby')
// if(location.href === 'http://localhost/DBlog/lessonsPage/lessons.php'){
//     all.style = 'background-color: #ccd0d7'
// }
// else if(location.href === 'http://localhost/DBlog/lessonsPage/lessons.php?javascript'){
//     javascript.style = 'background-color: #ccd0d7'
// }
// else if(location.href === 'http://localhost/DBlog/lessonsPage/lessons.php?php'){
//     php.style = 'background-color: #ccd0d7'
// }
// else if(location.href === 'http://localhost/DBlog/lessonsPage/lessons.php?c_sharp'){
//     c_sharp.style = 'background-color: #ccd0d7'
// }
// else if(location.href === 'http://localhost/DBlog/lessonsPage/lessons.php?c_plus'){
//     c_plus.style = 'background-color: #ccd0d7'
// }
// else if(location.href === 'http://localhost/DBlog/lessonsPage/lessons.php?pyton'){
//     pyton.style = 'background-color: #ccd0d7'
// }
// else if(location.href === 'http://localhost/DBlog/lessonsPage/lessons.php?ruby'){
//     ruby.style = 'background-color: #ccd0d7'
// }

var url = location.href.split('?')[1];
const element = document.getElementById(`${url}`);
const all = document.getElementById('all')
if(location.href === `http://localhost/DBlog/lessonsPage/lessons.php?${url}`){
    element.style = 'background-color: #ccd0d7'
}
else if(location.href ==='http://localhost/DBlog/lessonsPage/lessons.php'){
    all.style = 'background-color: #ccd0d7'
}