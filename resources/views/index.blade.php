<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe
        src="https://www.googletagmanager.com/ns.html?id=GTM-MPNPBWF&gtm_auth=M1uwMq8aoy0QHU23YYZIFg&gtm_preview=env-2&gtm_cookies_win=x"
        height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="wrapper">
    @yield('content')
</div><!-- #wrapper -->
</body>
</html>
