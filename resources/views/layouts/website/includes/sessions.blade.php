@if (session('success'))

<script>
    new Noty({
        type: 'information',
        layout: 'bottomRight',
        text: "<i class='fas fa-check-circle'></i> {{ session('success') }}",
        theme: "metroui",
        timeout: 10000,
        killer: true
    }).show();
</script>

@endif

@if (session('error'))
<script>
$(this).load(function() {
    $('html, body').animate({
        scrollTop: $("#form").offset().top
    }, 2000);
});
</script>
<script>
    new Noty({
        type: 'error',
        layout: 'bottomRight',
        text: "<i class='fas fa-exclamation-circle'></i> {{ session('error') }}",
        timeout: 15000,
        killer: true
    }).show();
</script>



@endif