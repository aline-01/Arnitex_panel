//this is my script 

//these script's is for recent_message in admin panel 
const SELECT_PERSONEL = document.querySelector(".select_personel");
const SELECT_PEROSNEL_FORM = document.querySelector(".select_personel_form")

SELECT_PERSONEL.addEventListener("change",(select_personel_box)=> {
    SELECT_PEROSNEL_FORM.submit()
    // window.location.href="/admin area/message/recent message/"    
},false)
