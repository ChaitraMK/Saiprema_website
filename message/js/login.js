function auth(){
	$('#e_user').hide();
	$('#e_pass').hide();
	var name=$('#username').val();
	var pass=hex_md5($('#password').val());
	console.log(pass);
	$.ajax({
    type:'POST',
    url:"php/login/check_user.php",
    data:{name:name,pass:pass}
  }).done(function(result){
    console.log(result);
    if(result==='1'){
    $.cookie('u', name);
    window.location.replace('index.html');
    }else{
      $('#e_pass').show();
      $('#e_user').show();
    }

  });

}
