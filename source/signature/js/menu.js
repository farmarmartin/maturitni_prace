let menu = document.getElementById('menubtn')
let nav = document.getElementById('nav')
let header = document.getElementsByTagName('header')[0]
let link = document.getElementById('link')
let isActive = 1 //počítadlo

// funkce pro zobrazení nebo zmizení vertikálního <nav>u
menu.addEventListener('click', function(){
    if(isActive % 2 !== 0){
        nav.style.maxHeight = '30vh'    //nastavování stylu html elementů
        nav.style.display = 'flex'
        nav.style.flexDirection = 'column'
        menu.style.order = '-1'
        header.style.opacity = '40%'
        document.getElementsByTagName('main')[0].style.filter = 'blur(1rem)'

    }else{
        nav.style.maxHeight = ''
        nav.style.display = ''
        nav.style.flexDirection = 'row'
        header.style.opacity = ''
        document.getElementsByTagName('main')[0].style.filter = 'none'
    }
    isActive++ //inkrementace počítadla

})