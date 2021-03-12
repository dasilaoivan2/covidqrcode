<style>
    .qr {
        border: 1px solid black;
        width: 102px;
        padding: 2px;
        background-repeat: no-repeat;
        display: inline-flex;

    }

    .holder {

        border: 1px solid black;
        width: 110px;
        padding: 1px;
        float: left;
    }

    .fullname {

        font-size: 10px;
        height: 40px;
        padding-bottom: 10px;
    }

</style>
<?php $count = 1; ?>


@foreach($print_patients as $print_patient)

    <div class="holder">
        <div class="fullname">
            <p>{{$print_patient->fullname()}}</p>
        </div>


        <div class="qr">
            <div class="inline-block py-1 px-1">

                <img src="data:image/png;base64, {!!base64_encode(QrCode::eyeColor(0, 255, 165, 0, 0, 0, 0)->size(100)->format('png')->merge(asset('storage/seal1917.png'), .3, true)->errorCorrection('H')->generate('Fullname:'.$print_patient->fullname())) !!} ">

            </div>

        </div>

        {{--@if($count==40)--}}
        @if($count==36)
            <div style="page-break-before: always;"></div>
            <div style="page-break-after: always;"></div>
            {{--<p >&nbsp;</p>--}}
            {{--<p style="page-break-before: always;">&nbsp;</p>--}}
            <?php $count = 0;?>
        @endif
        <?php $count++;?>
    </div>

@endforeach

