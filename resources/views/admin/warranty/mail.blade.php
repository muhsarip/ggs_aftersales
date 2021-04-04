<div>
    <h2 style="text-align:center">
        {{config('app.name')}}
    </h2>
    <br><br>
    <h3>
        No. : <strong>{{$warranty->no}}</strong>
    </h3>
    <br>
    <p>Halo <strong>{{$warranty->name}},</strong></p>
    <br>
    <p>
        {{$text}}
    </p>
    <br>
    <p>Salam hormat,</p>

    <br><br>
    <hr>
    <div style="padding:0px 20% 0px 20% 0px;">

        <p style="color:gray">
            <i>Kamu tidak perlu membalas pesan ini, pesan ini dikirim otomatis oleh website {{config('app.name')}}</i>
        </p>
        <p>{{config('app.name')}} 2021</p>
    </div>

</div>