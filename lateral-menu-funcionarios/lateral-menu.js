var menuitem = document.querySelectorAll('.item-menu')

function selectlink(){
    menuitem.forEach((item)=>
        item.classList.remove('ativo')
    )
    this.classList.add('ativo')
}

menuitem.forEach((item)=>
    item.addEventListener('click', selectlink)
)

//Expandir o menu

var btnbrg = document.querySelector('#btn-brg')
var lateralmenu = document.querySelector('.lateral-menu')

btnbrg.addEventListener('click', function(){
    lateralmenu.classList.toggle('burger')
})