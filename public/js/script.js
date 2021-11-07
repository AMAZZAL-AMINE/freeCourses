//function for showing th nav menu wheem click the nav button
function showNav() {
        var nav = document.querySelector('.navList');
        nav.style.display = 'block';
}
 
//function for hidding the nav menu wheen clicking the close button
function closMenu() {
    var nav = document.querySelector('.navList');
    nav.style.display = 'none';
}

//function for serashin showing ween click the button
function showSearsh() {
    var search = document.querySelector('.searshing');
    search.style.display = 'flex';
}

//function for hidding search
function closSearch() {
    var search = document.querySelector('.searshing');
    search.style.display = 'none';
}