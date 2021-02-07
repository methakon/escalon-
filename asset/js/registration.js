if(typeof this.NodeList.prototype.forEach != undefined )
{
    this.NodeList.prototype.forEach = Array.prototype.forEach;
}
class registration
{
     constructor() { 
         
         this.auther="SWARNA SEKHAR DHAR";
         document.reg=this;
         this.initialise();
     } 
     initialise()
     {
         $( "#category_id" ).click(function() {
                document.reg.reload_skills(this);
          });
         
         $( "#reload_captcha" ).click(function() {
                document.reg.reload_captcha();
          });
     }
     set_ranges()
     {
         $('.range_select').change( function() {
            this.parentElement.parentElement.querySelectorAll(".rval")[0].innerHTML =this.value;
              
         });
             
         
     }
    photo_validate()
    {
       
       return true;  
    }
    reload_captcha()
    {
         $.ajax({url: base_url+"index.php/index/get_captcha", success: function(result){
                 console.log(result);
              $("#captcha_div").html(result);
            }});
    }
    reload_skills(elem)
    {
        var cata = [];
        for (var i = 0; i < elem.length; i++) {
            if (elem.options[i].selected) cata.push(elem.options[i].value);
        }
        $.ajax({url: base_url+"index.php/index/get_skills",
            data: {
                category_id: cata
             },
            type: 'GET',
            dataType: 'html',
            success: function(result){
                 console.log(result);
              $("#skill_list_").html(result);
              document.reg.set_ranges();
            }});
        console.log(cata);
    }
 }
  
  
  
  
$(document).ready(function() {
   new registration;    
});