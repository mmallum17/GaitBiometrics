//changelanguage script
//based off 
//https://stackoverflow.com/questions/32008125/using-javascript-to-change-website-language
$(document).ready(function(){
    try{
        if(lang == "en" || lang == "es"){
            if(lang == "en"){
                changeToEnglish();
            }else if(lang == "es"){
                changeToSpanish();
            }else{
                changeToEnglish();
            }
        }
    }catch(e){
        if (localStorage.getItem("language")) {
            var language = localStorage.getItem("language");
            if(language == "Spanish"){
                changeToSpanish();
            }
            else{
                changeToEnglish();
            }
        }
        else
        {
            changeToEnglish();
        }
    }
});

$('#btnEnglish').click(function(){
    changeToEnglish();
});

$('#btnSpanish').click(function() {
    changeToSpanish();
});


function changeToEnglish(){
    localStorage.setItem("language", "English");
    $('[lang="en"]').show();
    $('[lang="es"]').hide();

}
function changeToSpanish(){
    localStorage.setItem("language", "Spanish");
    $('[lang="es"]').show();
    $('[lang="en"]').hide();

}
