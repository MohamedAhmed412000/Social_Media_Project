


    function changeClass(){
        this.className = "NotifyOld";  
         }

    window.onload = function(){
        let notify = document.getElementsByClassName("NotifyNew");
        for (let i = 0 ; i < notify.length ; i++ ){
        notify[i].addEventListener( 'click',  changeClass);
        }
    }



