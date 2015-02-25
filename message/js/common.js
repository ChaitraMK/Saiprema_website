$(function(){
  
  
if($.cookie('u') != null){
  var name=$.cookie('u');
  $.ajax({
    type:'POST',
    url:"php/auth/auth_user.php",
    data:{name:name}
  }).done(function(result){
    console.log(result);
    if(!result){
      window.location.replace('login.html');
    }else{
        //$("#nav").load("nav/"+result['previlage']+"_nav.html");
        if(result['previlage']!=='admin' && $('html').attr('previlage')!=='all'){
          if($('html').attr('previlage')!==result['previlage']){
            window.location.replace('index.html');
          }
        }
        $('.previlage').text(result['previlage']);
        $('.logged_in').text(name);
        $('#user_img').attr('src','img/user/'+name+'.jpg');
        $('#nav-user-img').attr('src','img/user/'+name+'.jpg');
    }
  })
  }else{
    window.location.replace('login.html');
  }
  $.validator.addMethod("exactlength", function(value, element, param) {
   return this.optional(element) || value.length == param;
  }, $.format("Please enter exactly {0} digit/s."));

})

function pad_with_zeroes(number, length) {

    var my_string = '' + number;
    while (my_string.length < length) {
        my_string = '0' + my_string;
    }

    return my_string;

}

function isNumber(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}
