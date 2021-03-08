<div wire:poll.60s>
{{--    {{ now() }}--}}
    @if($online === true)
        <div class="align-content-center">
            <div class="btn btn-outline-{{ colorBoolean($REPUVE) }}">REPUVE: {{ txtColorBoolean($REPUVE) }} <i class="far fa-check-circle"></i></div>
            <div class="btn btn-outline-{{ colorBoolean($SAF) }}">SAF: {{ txtColorBoolean($SAF) }}  <i class="far fa-check-circle"></i></div>
            <div class="btn btn-outline-{{ colorBoolean($ADIP) }}">ADIP: {{ txtColorBoolean($ADIP) }}  <i class="far fa-check-circle"></i></div>
            <div class="btn btn-outline-{{ colorBoolean($SEDEMA) }}">SEDEMA: {{ txtColorBoolean($SEDEMA) }}  <i class="far fa-check-circle"></i></div>
            <div class="btn btn-outline-{{ colorBoolean($SSC) }}">SSC: {{ txtColorBoolean($SSC) }}  <i class="far fa-check-circle"></i></div>
            <div class="btn btn-outline-{{ colorBoolean($RENAPO) }}">RENAPO: {{ txtColorBoolean($RENAPO) }}  <i class="far fa-check-circle"></i></div>
        </div>
    @else
        <h1>El servicio de validación no se encuentra disponible por el momento</h1>
    @endif
</div>
