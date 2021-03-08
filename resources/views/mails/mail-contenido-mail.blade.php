
Hola <i>{{ $datos_del_mail->receiver }}</i>,
<p>Por este medio te comunicamos que tu consulta esta disponible para su descarga.</p>
<p>Te recordamos que la descarga estará disponible unicamente por 24 horas a partir de la entrega de este correo electrónico.</p>


<div>
    <p><b>Podrás descargar en el siguiente enlace tu consulta : <br>
        </b>&nbsp;{{ $datos_del_mail->link }}</p>
</div>



Sin más por el momento, gracias.
<br/>
<i> Dirección de Sistemas de Información .2020 </i>
<br>
({{ $datos_del_mail->sender }})

