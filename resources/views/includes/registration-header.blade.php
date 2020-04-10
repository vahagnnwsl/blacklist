<nav>
    <div class="nav nav-tabs nav-fill" id="nav_tab" role="tablist">
        <a class="nav-item nav-link {{$type==='individual'? 'active': ''}}" id="nav-natural-tab"  href="{{route('registration','individual')}}"
           aria-controls="nav-natural" aria-selected="true"> ФИЗИЧЕСКОЕ ЛИЦО</a>
        <a class="nav-item nav-link {{$type==='individual-entrepreneur'? 'active': ''}}" id="nav-individual-tab" href="{{route('registration','individual-entrepreneur')}}"
           aria-controls="nav-individual" aria-selected="false"> ИНДИВИДУАЛЬНЫМ ПРЕДПРИНИМАТЕЛЬ</a>
        <a class="nav-item nav-link {{$type==='juridical'? 'active': ''}}" id="nav-juridical-tab" href="{{route('registration','juridical')}}"
           aria-controls="nav-juridical" aria-selected="false"> ЮРИДИЧЕСКОЕ ЛИЦО</a>
    </div>
</nav>

@push('css')
    <style>

        .invalid-feedback {
            display: block!important;
        }
        #nav_tab a {
            color: #6C757D !important;
        }

        #nav_tab .nav-item.show .nav-link, .nav-tabs .nav-link.active {
            color: #6C757D;
            background-color: transparent;
            border-color: transparent transparent #f3f3f3;
            border-bottom: 4px solid !important;

            font-weight: bold;
        }


    </style>

@endpush
