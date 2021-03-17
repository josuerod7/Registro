function boletosEvent(id) {


                    $.ajax({
                      cache:false,
                      dataType:"json",
                      type: 'GET',
                      url: "http://127.0.0.1:8000/api/boletosevent/"+id,
                      success:  function(data){
						$.each(data, function(idx, opt) {
                  		$('#mitabla').append('<tr><td>Evento '+id+'</td><td>' + opt.code + '</td><td><button class="btn btn-primary" onclick="reservar(' + opt.id + ')">Reservar</button></td></tr>');

                      });
                  },
                      beforeSend:function(){
                      	console.log();
                      },
                      error:function(objXMLHttpRequest){}
                    });


}


function reservar(id) {

	var name	=	$('#name').val();
	var email   =	$('#email').val();
	var event_id=	$('#event_id').val();

	if (name!="" || email!="") {

					$.ajax({
                      cache:false,
                      dataType:"json",
                      type: 'POST',
                      url: "http://127.0.0.1:8000/api/buyers/",
                      data: {id:id, name:name, email:email, event_id:event_id},
                      complete:  function(data){
						Swal.fire({
						  title: 'Reserva Exitosa',
						  text: "Pronto te contactaremos!",
						  icon: 'success',
						  showCancelButton: false,
						  confirmButtonColor: '#3085d6',
						  cancelButtonColor: '#d33',
						  confirmButtonText: 'Ok'
							}).then((result) => {
								  if (result.isConfirmed) {
								  	location.reload();
								  }
							})

                  		},

                    });

	}else{


				Swal.fire({
				  icon: 'error',
				  title: 'Error',
				  text: 'Completa todos los campos',

				})

	}
                    


}