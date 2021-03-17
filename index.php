<?php

$query = file_get_contents('http://127.0.0.1:8000/api/events/');
$events= json_decode($query,true);


?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="css/style.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>Reserva tu boleto</h3>
                    <p>Fácil y Sencillo</p>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nombre Completo" id="name" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Email" id="email" value="" />
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="event" id="event_id" onchange="boletosEvent(this.value)">
                              <option>Seleccione el evento</option>
                              <?php
                              foreach ($events as $event) {
                                  echo '<option value="'.$event['id'].'">'.$event['name'].'</option>';
                              }
                              ?>
                            </select>
                        </div>

                </div>
                <div class="col-md-6 login-form-2">
                    <table id="mitabla" class="table table-dark"><tr><td>Evento</td><td>Boleto</td><td></td></tr></table>
                </div>
            </div>
        </div>
<script src="js/custom.js"></script>