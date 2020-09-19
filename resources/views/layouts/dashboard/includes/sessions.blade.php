
@if (session('success'))

<script>
    new Noty({
        type: 'success',
        layout: 'topRight',
        text: "<i class='fas fa-check-circle'></i> {{ session('success') }}",
        timeout: 2500,
        killer: true
    }).show();
</script>

@endif


@if (session('error'))

<script>
    new Noty({
        type: 'error',
        layout: 'topRight',
        text: "<i class='fas fa-exclamation-circle'></i> {{ session('error') }}",
        timeout: 5000,
        killer: true
    }).show();
</script>

@endif